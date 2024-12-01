<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function teacher()
    {
        $users = User::where('role', 'teacher')->get(); // Fetch only teachers
        return view('admin.pages.teachers.manageTeachers', compact('users')); // Adjust the view path as needed
    }
    public function students()
    {
        $users = User::where('role', 'student')->get(); // Fetch only teachers
        return view('admin.pages.students.manageStudents', compact('users')); // Adjust the view path as needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.teachers.createTeacher'); // Ensure this matches your form view file
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'national_id' => 'required|numeric|unique:users,national_id', // Ensure national_id is unique in users table
            'password' => 'required|string|min:8',
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

    private function arabicValidationMessages()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب',
            'name.string' => 'اسم المستخدم يجب أن يكون نصاً',
            'name.max' => 'اسم المستخدم يجب ألا يزيد عن 50 حرفاً',
            'national_id.required' => 'الرقم الوطني مطلوب',
            'national_id.numeric' => 'الرقم الوطني يجب أن يكون رقماً',
            'national_id.unique' => 'الرقم الوطني مسجل مسبقاً',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.string' => 'كلمة المرور يجب أن تكون نصاً',
            'password.min' => 'كلمة المرور يجب ألا تقل عن 8 أحرف',
            'role.required' => 'الدور مطلوب.',
            'role.in' => 'الدور غير صالح. يجب أن يكون أحد الخيارات: طالب، معلم، مدير',
            'age.numeric' => 'العمر يجب أن يكون رقماً',
            'age.min' => 'العمر يجب ألا يكون رقماً سالباً',
            'class_id.required_if' => 'رقم الصف مطلوب ',
            'class_id.numeric' => 'رقم الصف يجب أن يكون رقماً',
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
            if ($teacher->role !== 'teacher') {
                return redirect()->route('teacher.index')->with('error', 'يمكنك فقط تحديث بيانات المعلمين.');
            }

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
            return redirect()->route('teacher.index')->with('success', 'تم تحديث بيانات المعلم/ة بنجاح!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle case where the teacher ID does not exist
            return redirect()->route('teacher.index')->with('error', 'لم يتم العثور على المعلم/ة.');
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
}
