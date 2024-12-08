<?php

namespace App\Http\Controllers;

use App\Models\AnswersMathFirstKg;
use App\Models\ArabicAnswerFirstKg;
use App\Models\ArabicAnswerSecondThird;
use App\Models\Classes;
use App\Models\MathAnswerSecondThird;
use App\Models\ScienceAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function teacher()
    {
        $users = User::where('role', 'teacher')->get(); // Fetch only teachers
        $classes = Classes::all();
        return view('admin.pages.teachers.manageTeachers', compact('users', 'classes')); // Adjust the view path as needed
    }
    public function homeDash()
    {
        if (Auth::user()->role == 'teacher') {

            $users = User::with('class')->where('role', 'student')->where('class_id', Auth::user()->class_id)->paginate(10); // Fetch only teachers
            $countStudents = User::where("role", "student")
                ->where('class_id', Auth::user()->class_id)
                ->count();
        } else {
            $users = User::with('class')->where('role', 'student')->paginate(10); // Fetch only teachers
            $countStudents = User::where("role", "student")
                ->count();
        }
        $countTeachers = User::where("role", "teacher")
            ->count();
        $uniqueUserIds = collect([
            AnswersMathFirstKg::select('user_id')->distinct()->pluck('user_id'),
            MathAnswerSecondThird::select('user_id')->distinct()->pluck('user_id'),
            ArabicAnswerFirstKg::select('user_id')->distinct()->pluck('user_id'),
            ArabicAnswerSecondThird::select('user_id')->distinct()->pluck('user_id'),
            ScienceAnswer::select('user_id')->distinct()->pluck('user_id'),
        ])->flatten()->unique();

        // Total count of users who participated
        $totalStudents = $uniqueUserIds->count();
        return view('admin.pages.index', compact('users', 'countStudents', 'countTeachers', 'totalStudents'));
    }
    public function students()
    {
        if (Auth::user()->role == 'manager') {

            $users = User::with(['class', 'roadmaps' => function ($query) {
                $query->selectRaw('user_id, max(level) as max_level')->groupBy('user_id');
            }])
                ->where('role', 'student')
                ->withCount([
                    'mathAnswersFirst as first_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Math First KG exam
                    },
                    'mathAnswersSecondThird as second_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Math Second/Third exam
                    },
                    'arabicAnswersFirstKg as third_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Arabic First KG exam
                    },
                    'arabicAnswersSecondThird as fourth_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Arabic Second/Third exam
                    },
                    'scienceAnswers as fifth_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Science exam
                    }
                ])
                ->get();
        } else {
            $users = User::with(['class', 'roadmaps' => function ($query) {
                $query->selectRaw('user_id, max(level) as max_level')->groupBy('user_id');
            }])
                ->where('role', 'student')
                ->withCount([
                    'mathAnswersFirst as first_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Math First KG exam
                    },
                    'mathAnswersSecondThird as second_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Math Second/Third exam
                    },
                    'arabicAnswersFirstKg as third_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Arabic First KG exam
                    },
                    'arabicAnswersSecondThird as fourth_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Arabic Second/Third exam
                    },
                    'scienceAnswers as fifth_exam_completed' => function ($query) {
                        $query->whereNotNull('user_id'); // Ensure the user has answered the Science exam
                    }
                ])
                ->where('class_id', Auth::user()->class_id)->get();
        }
        // For each user, check if they have completed any of the exams and set a flag
        foreach ($users as $user) {
            // Check if the user has completed any of the exams
            $user->passed_all_exams = $user->first_exam_completed > 0 || $user->second_exam_completed > 0 || $user->third_exam_completed > 0 || $user->fourth_exam_completed > 0 || $user->fifth_exam_completed > 0;
        }

        // Pass all variables to the view using compact
        return view('admin.pages.students.manageStudents', compact('users'));
    }


    public function showProfile()
    {
        // Check if the user has answers for each of the exams
        $first = AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists();
        $second = MathAnswerSecondThird::with('question')->where('user_id', Auth::user()->id)->exists();
        $third = ArabicAnswerFirstKg::with('question')->where('user_id', Auth::user()->id)->exists();
        $fourth = ArabicAnswerSecondThird::with('question')->where('user_id', Auth::user()->id)->exists();
        $fifth = ScienceAnswer::with('question')->where('user_id', Auth::user()->id)->exists();

        // Pass the results to the view using compact
        return view('user.pages.profileWithExams', compact('first', 'second', 'third', 'fourth', 'fifth'));
    }

    public function showresult(string $id)
    {
        $user = User::with('roadmaps')->where('id', $id)->first(); // Fetch only teachers
        return view('admin.pages.students.studentResult', compact('user')); // Adjust the view path as needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('admin.pages.teachers.createTeacher', compact('classes')); // Ensure this matches your form view file
    }
    public function createStudent()
    {
        $classes = Classes::all();
        return view('admin.pages.students.createStudents', compact('classes')); // Ensure this matches your form view file
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                'regex:/^[\p{L}]+\s[\p{L}]+$/u' // Ensure the name has two words separated by a space
            ],
            'national_id' => 'required|numeric|unique:users,national_id', // Ensure national_id is unique in users table
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/' // Ensure password contains at least one uppercase letter and one number
            ],
            'role' => 'required|in:student,teacher,manager',
            'age' => 'nullable|numeric|min:0',
            'class_id' => 'required_if:role,teacher|nullable|numeric', // Required if role is 'teacher'
        ], $this->arabicValidationMessages());

        // Create a new user in the 'users' table
        $teacher = new \App\Models\User(); // Assuming User is your model for the 'users' table
        $teacher->name = $validatedData['name'];
        $teacher->national_id = $validatedData['national_id'];
        $teacher->password = bcrypt($validatedData['password']); // Hash the password for security
        $teacher->role = $validatedData['role'];
        $teacher->age = $validatedData['age'] ?? null;
        $teacher->class_id = $validatedData['class_id'] ?? null;

        // Save the new teacher record
        $teacher->save();

        // Redirect with a success message
        return redirect()->route('viewTeachers')->with('success', 'تم حفظ البيانات بنجاح!');
    }
    public function storeStudent(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                'regex:/^[\p{L}]+\s[\p{L}]+$/u' // Ensure the name has two words separated by a space
            ],
            'national_id' => 'required|numeric|unique:users,national_id', // Ensure national_id is unique in users table
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/' // Ensure password contains at least one uppercase letter and one number
            ],
            'age' => 'nullable|numeric|min:0',
            'class_id' => 'required_if:role,student|nullable|numeric', // Required if role is 'student'
        ], $this->arabicValidationMessages());

        // Create a new user in the 'users' table
        $student = new \App\Models\User(); // Assuming User is your model for the 'users' table
        $student->name = $validatedData['name'];
        $student->national_id = $validatedData['national_id'];
        $student->password = bcrypt($validatedData['password']); // Hash the password for security
        $student->role = "student";
        $student->age = $validatedData['age'] ?? null;
        $student->class_id = $validatedData['class_id'] ?? null;

        // Save the new student record
        $student->save();

        // Redirect with a success message
        return redirect()->route('viewStudents')->with('success', 'تم حفظ البيانات بنجاح!');
    }

    private function arabicValidationMessages()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب.',
            'name.regex' => 'تنسيق حقل الاسم غير صالح. يجب أن يتكون الاسم من كلمتين (الاسم الأول والاسم الأخير).',
            'name.max' => 'يجب ألا يزيد الاسم عن 50 حرفًا.',
            'national_id.required' => 'الرقم الوطني مطلوب.',
            'national_id.numeric' => 'الرقم الوطني يجب أن يكون رقماً.',
            'national_id.unique' => 'الرقم الوطني مسجل مسبقاً.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.regex' => 'تنسيق حقل كلمة المرور غير صالح. يجب أن تحتوي كلمة المرور على حرف كبير واحد على الأقل ورقم.',
            'password.min' => 'كلمة المرور يجب ألا تقل عن 8 أحرف.',
            'role.required' => 'الدور مطلوب.',
            'role.in' => 'الدور غير صالح. يجب أن يكون أحد الخيارات: طالب، معلم، مدير.',
            'age.numeric' => 'العمر يجب أن يكون رقماً.',
            'age.min' => 'العمر يجب أن يكون صفراً أو رقماً موجباً.',
            'class_id.required_if' => 'رقم الصف مطلوب إذا كان الدور معلم.',
            'class_id.numeric' => 'رقم الصف يجب أن يكون رقماً.',
        ];
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the ID
            if (!is_numeric($id)) {
                return redirect()->route('teacher.index')->with('error', 'المعرف غير صالح.');
            }

            // Find the teacher by ID
            $teacher = User::findOrFail($id);

            // Ensure the user is a teacher
            // if ($teacher->role !== 'teacher') {
            //     return redirect()->route('teacher.index')->with('error', 'يمكنك فقط تحديث بيانات المعلمين.');
            // }

            // Validate the incoming request data
            $validatedData = $request->validate(
                [
                    'name' => 'required|string|max:50',
                    'national_id' => 'required|numeric|unique:users,national_id,' . $teacher->id,
                    'role' => 'required|in:student,teacher,manager',
                    'age' => 'nullable|numeric|min:0',
                    'class_id' => 'nullable|numeric',
                ],
                $this->arabicValidationMessages()
            );

            // Update the teacher's information
            $teacher->update($validatedData);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'تم تحديث بيانات  بنجاح!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle case where the teacher ID does not exist
            return redirect()->route('teacher.index')->with('error', 'لم يتم العثور على .');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {

            // Redirect back with a generic error message
            return redirect()->route('viewTeachers')->with('error', 'حدث خطأ أثناء تحديث البيانات. يرجى المحاولة مرة أخرى!');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Check if the ID is numeric and valid
            if (!is_numeric($id)) {
                return redirect()->route('viewTeachers')->with('error', 'المعرف غير صالح.');
            }

            // Find the teacher by ID
            $teacher = User::findOrFail($id);

            // Check if the user role is teacher (to avoid accidental deletion of non-teacher users)
            if ($teacher->role !== 'teacher') {
                return redirect()->route('viewTeachers')->with('error', 'يمكنك فقط حذف المعلمين.');
            }

            // Delete the teacher
            $teacher->delete();

            // Redirect back with a success message
            return redirect()->route('viewTeachers')->with('success', 'تم حذف المعلم/ة بنجاح!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle case where the teacher ID does not exist
            return redirect()->route('viewTeachers')->with('error', 'لم يتم العثور على المعلم/ة.');
        } catch (\Exception $e) {
            // Redirect back with a generic error message
            return redirect()->route('viewTeachers')->with('error', 'حدث خطأ أثناء الحذف. يرجى المحاولة مرة أخرى!');
        }
    }
    // student delete
    public function destroyStudent($id)
    {
        try {
            // Check if the ID is numeric and valid
            if (!is_numeric($id)) {
                return redirect()->route('viewStudents')->with('error', 'المعرف غير صالح.');
            }

            // Find the student by ID
            $student = User::findOrFail($id);

            // Check if the user role is student (to avoid accidental deletion of non-student users)
            if ($student->role !== 'student') {
                return redirect()->route('viewStudents')->with('error', 'يمكنك فقط حذف الطلاب.');
            }

            // Delete the student
            $student->delete();

            // Redirect back with a success message
            return redirect()->route('viewStudents')->with('success', 'تم حذف الطالب/ة بنجاح!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle case where the student ID does not exist
            return redirect()->route('viewStudents')->with('error', 'لم يتم العثور على الطالب/ة.');
        } catch (\Exception $e) {
            // Redirect back with a generic error message
            return redirect()->route('viewStudents')->with('error', 'حدث خطأ أثناء الحذف. يرجى المحاولة مرة أخرى!');
        }
    }
}
