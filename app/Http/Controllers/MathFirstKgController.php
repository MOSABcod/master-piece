<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswersMathFirstKg;
use App\Models\ArabicAnswerFirstKg;
use App\Models\ArabicAnswersFirstKg;
use App\Models\ArabicAnswerSecondThird;
use App\Models\ArabicFirstKg;
use App\Models\ArabicSecondThird;
use App\Models\MathAnswerSecondThird;
use App\Models\MathFirstKg;
use App\Models\MathSecondThird;
use App\Models\Science;
use App\Models\ScienceAnswer;
use App\Models\ScienceAnswers;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\RoadmapService;

class MathFirstKgController extends Controller
{
    protected $roadmapService;

    public function checkApplyMathFirst(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.math.mathQuizFirst');
    }

    public function checkApplyMathSec(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.math.mathQuizSecAndThird');
    }

    public function checkApplyArabicFirst(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.arabic.first');
    }

    public function checkApplyArabicSec(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.arabic.secondAndThird');
    }

    public function checkApplyScience(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.science.science');
    }

    public function __construct(RoadmapService $roadmapService)
    {
        $this->roadmapService = $roadmapService;
    }
    //======================================= save first and KG and make roadmap for enhancment===============================
    public function saveAnswers(Request $request)
    {
        $user = Auth::user();
        if (in_array($user->role, ['teacher', 'manager'])) {
            return redirect()->route('homepage')->with('error', 'لا يُسمح للمعلمين أو المديرين بالتقديم.');
        }

        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');

        // Ensure the user is authenticated
        $userId = Auth::id(); // Get the authenticated user ID
        if (!$userId) {
            return redirect()->route('login')->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'يجب تسجيل الدخول لحفظ الإجابات.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        // Validation
        $answers = $request->input('answers', []);
        $totalQuestions = 18; // Update this number based on the total number of questions
        $missingAnswers = [];

        // Check for missing answers
        foreach (range(1, $totalQuestions) as $questionId) {
            if (!isset($answers[$questionId]) || trim($answers[$questionId]) === '') {
                $missingAnswers[] = $questionId;
            }
        }

        if (count($missingAnswers) > 0) {
            // Calculate the number of unanswered questions
            $missingCount = count($missingAnswers);
            $missingList = implode(', ', $missingAnswers); // List the unanswered question IDs
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => "لم يتم الإجابة على $missingCount سؤال/أسئلة: $missingList.",
                ],
                'remaining_time' => $remainingTime,
            ])->withInput();
        }

        try {
            // Calculate the result and percentage score

            $countOfQuestions = MathFirstKg::count();



            // saving in database the answers

            foreach ($answers as $questionId => $answer) {
                // dd($request->all());
                // Fetch the correct answer for the question
                $question = MathFirstKg::where('id', $questionId)->first();
                // dd($request->all());

                if (!$question) {
                    continue; // Skip if question not found
                }
                // dd($request->all());

                // Check if the user's answer is correct
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? 1 : 0;

                // Save the user's answer to the database
                AnswersMathFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }
            $result = AnswersMathFirstKg::where('user_id', $userId)->where('is_correct', 1)->count();
            $percentageScore = ($result / $countOfQuestions) * 100;
            // Prepare student performance data
            $studentPerformance = $this->calculateStudentPerformance($userId);
            // Use RoadmapService to generate roadmap and HTML table
            // dd($percentageScore);
            $roadmap = $this->roadmapService->generateRoadmap($studentPerformance, $percentageScore);
            $htmlTable = $this->roadmapService->generateHtmlTable($studentPerformance, $percentageScore);
            // Redirect with all necessary data
            return redirect()->route('result')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'countofqus' => $countOfQuestions,
                'resetTimer' => true,
                'result' => $result,
                'percentage_score' => $percentageScore,
                'student_performance' => $studentPerformance,
                'roadmap' => $roadmap,
                'html_table' => $htmlTable,
            ])->with('result', $result);
        } catch (\Exception $e) {
            // Handle exceptions

            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }
    }

    /**
     * Calculate student performance per skill.
     *
     * @param int $userId
     * @return array
     */
    private function calculateStudentPerformance(int $userId): array
    {
        // Define the mapping of question IDs to skills
        $questionToSkillMap = [
            1  => 'مهارات العد',
            2  => 'مهارات العد',
            3  => 'مهارات حل المسائل',
            4  => 'مهارات حل المسائل',
            5  => 'مهارات العد',
            6  => 'مهارات العد',
            7  => 'مهارات العد',
            8  => 'مهارات العد',
            9  => 'مهارات العد',
            10 => 'مهارات العد',
            11 => 'مهارات حل المسائل',
            12 => 'مهارات حل المسائل',
            13 => 'مهارات العد',
            14 => 'مهارات التلاعب بالأعداد',
            15 => 'مهارات التلاعب بالأعداد',
            16 => 'مهارات التلاعب بالأعداد',
            17 => 'مهارات التلاعب بالأعداد',
            18 => 'مهارات التلاعب بالأعداد',
        ];

        // Define the skills and their total questions
        $skills = [
            'مهارات العد' => 9,
            'مهارات التلاعب بالأعداد' => 5,
            'مهارات حل المسائل' => 4,
        ];

        // Initialize performance array
        $performance = [];
        foreach ($skills as $skill => $totalQuestions) {
            $performance[$skill] = [
                'total_score' => 0,
                'total_possible' => $totalQuestions,
            ];
        }

        // Retrieve all answers for the user
        $answers = AnswersMathFirstKg::where('user_id', $userId)->get();

        foreach ($answers as $answer) {
            $questionId = $answer->question_id;

            // Determine the skill based on question ID
            $skill = $questionToSkillMap[$questionId] ?? null;

            if ($skill && array_key_exists($skill, $performance)) {
                if ($answer->is_correct) {
                    $performance[$skill]['total_score'] += 1; // Assuming each correct answer is 1 point
                }
                // 'total_possible' is already initialized based on the defined question counts
            }
        }

        return $performance;
    }

    public function saveAnswersSecMath(Request $request)
    {
        $user = Auth::user();
        if (in_array($user->role, ['teacher', 'manager'])) {
            return redirect()->route('homepage')->with('error', 'لا يُسمح للمعلمين أو المديرين بالتقديم.');
        }
        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');

        // Ensure the user is authenticated
        $userId = Auth::id(); // Get the authenticated user ID
        if (!$userId) {
            return redirect()->route('login')->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'يجب تسجيل الدخول لحفظ الإجابات.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        // Validation
        $answers = $request->input('answers', []);
        $totalQuestions = 25; // Update this number based on the total number of questions
        $missingAnswers = [];

        // Check for missing answers
        foreach (range(1, $totalQuestions) as $questionId) {
            if (!isset($answers[$questionId]) || trim($answers[$questionId]) === '') {
                $missingAnswers[] = $questionId;
            }
        }

        if (count($missingAnswers) > 0) {
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => "لم يتم الإجابة على " . count($missingAnswers) . " سؤال/أسئلة.",
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        try {
            // Save answers and validate correctness
            foreach ($answers as $questionId => $answer) {
                // Fetch the correct answer for the question
                $question = MathSecondThird::where('id', $questionId)->first();

                if (!$question) {
                    continue; // Skip if question not found
                }

                // Check if the user's answer is correct
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? 1 : 0;

                // Save the user's answer to the database
                MathAnswerSecondThird::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            // Calculate the result: number of correct answers
            $result = MathAnswerSecondThird::where('user_id', $userId)
                ->where('is_correct', 1)
                ->count();
            $countofqus = MathSecondThird::count();

            // Redirect to the result page with the result
            // Redirect back with success message
            return redirect()->route('result')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'countofqus' => $countofqus,
                'resetTimer' => true,
            ])->with('result', $result);
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }
    }

    public function saveAnswersFirstAr(Request $request)
    {
        $user = Auth::user();
        if (in_array($user->role, ['teacher', 'manager'])) {
            return redirect()->route('homepage')->with('error', 'لا يُسمح للمعلمين أو المديرين بالتقديم.');
        }
        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');

        // Ensure the user is authenticated
        $userId = Auth::id(); // Get the authenticated user ID
        if (!$userId) {
            return redirect()->route('login')->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'يجب تسجيل الدخول لحفظ الإجابات.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        // Validation
        $answers = $request->input('answers', []);
        $totalQuestions = 12; // Update this number based on the total number of questions
        $missingAnswers = [];

        // Check for missing answers
        foreach (range(1, $totalQuestions) as $questionId) {
            if (!isset($answers[$questionId]) || trim($answers[$questionId]) === '') {
                $missingAnswers[] = $questionId;
            }
        }

        if (count($missingAnswers) > 0) {
            // Calculate the number of unanswered questions
            $missingCount = count($missingAnswers);
            $missingList = implode(', ', $missingAnswers); // List the unanswered question IDs
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => "لم يتم الإجابة على $missingCount سؤال/أسئلة: $missingList.",
                ],
                'remaining_time' => $remainingTime,
            ])->withInput();
        }

        try {
            // Save answers and validate correctness
            foreach ($answers as $questionId => $answer) {
                // Fetch the correct answer for the question
                $question = ArabicFirstKg::where('id', $questionId)->first();

                if (!$question) {
                    continue; // Skip if question not found
                }

                // Check if the user's answer is correct
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? 1 : 0;

                // Save the user's answer to the database
                ArabicAnswerFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            // Calculate the result: number of correct answers
            $result = ArabicAnswerFirstKg::where('user_id', $userId)
                ->where('is_correct', 1)
                ->count();

            $countofqus = ArabicFirstKg::count();

            // Redirect to the result page with the result
            // Redirect back with success message
            return redirect()->route('result')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'countofqus' => $countofqus,
                'resetTimer' => true,
            ])->with('result', $result);
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }
    }
    public function saveAnswersSecAr(Request $request)
    {
        $user = Auth::user();
        if (in_array($user->role, ['teacher', 'manager'])) {
            return redirect()->route('homepage')->with('error', 'لا يُسمح للمعلمين أو المديرين بالتقديم.');
        }
        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');

        // Ensure the user is authenticated
        $userId = Auth::id(); // Get the authenticated user ID
        if (!$userId) {
            return redirect()->route('login')->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'يجب تسجيل الدخول لحفظ الإجابات.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        // Validation
        $answers = $request->input('answers', []);
        $totalQuestions = 12; // Update this number based on the total number of questions
        $missingAnswers = [];

        // Check for missing answers
        foreach (range(1, $totalQuestions) as $questionId) {
            if (!isset($answers[$questionId]) || trim($answers[$questionId]) === '') {
                $missingAnswers[] = $questionId;
            }
        }

        if (count($missingAnswers) > 0) {
            // Calculate the number of unanswered questions
            $missingCount = count($missingAnswers);
            $missingList = implode(', ', $missingAnswers); // List the unanswered question IDs
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => "لم يتم الإجابة على $missingCount سؤال/أسئلة: $missingList.",
                ],
                'remaining_time' => $remainingTime,
            ])->withInput();
        }

        try {
            // Save answers and validate correctness
            foreach ($answers as $questionId => $answer) {
                // Fetch the correct answer for the question
                $question = ArabicSecondThird::where('id', $questionId)->first();

                if (!$question) {
                    continue; // Skip if question not found
                }

                // Check if the user's answer is correct
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? 1 : 0;

                // Save the user's answer to the database
                ArabicAnswerSecondThird::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            // Calculate the result: number of correct answers
            $result = ArabicAnswerSecondThird::where('user_id', $userId)
                ->where('is_correct', 1)
                ->count();
            $countofqus = ArabicSecondThird::count();

            return redirect()->route('result')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'countofqus' => $countofqus,
                'resetTimer' => true,
            ])->with('result', $result);
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }
    }

    public function saveAnswersScience(Request $request)
    {
        $user = Auth::user();
        if (in_array($user->role, ['teacher', 'manager'])) {
            return redirect()->route('homepage')->with('error', 'لا يُسمح للمعلمين أو المديرين بالتقديم.');
        }
        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');

        // Ensure the user is authenticated
        $userId = Auth::id(); // Get the authenticated user ID
        if (!$userId) {
            return redirect()->route('login')->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'يجب تسجيل الدخول لحفظ الإجابات.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }

        // Validation
        $answers = $request->input('answers', []);
        $totalQuestions = 11; // Update this number based on the total number of questions
        $missingAnswers = [];

        // Check for missing answers
        foreach (range(1, $totalQuestions) as $questionId) {
            if (!isset($answers[$questionId]) || trim($answers[$questionId]) === '') {
                $missingAnswers[] = $questionId;
            }
        }

        if (count($missingAnswers) > 0) {
            // Calculate the number of unanswered questions
            $missingCount = count($missingAnswers);
            $missingList = implode(', ', $missingAnswers); // List the unanswered question IDs
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => "لم يتم الإجابة على $missingCount سؤال/أسئلة: $missingList.",
                ],
                'remaining_time' => $remainingTime,
            ])->withInput();
        }

        try {
            // Save answers and validate correctness
            foreach ($answers as $questionId => $answer) {
                // Fetch the correct answer for the question
                $question = Science::where('id', $questionId)->first();

                if (!$question) {
                    continue; // Skip if question not found
                }

                // Check if the user's answer is correct
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? 1 : 0;

                // Save the user's answer to the database
                ScienceAnswer::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            // Calculate the result: number of correct answers
            $result = ScienceAnswer::where('user_id', $userId)
                ->where('is_correct', 1)
                ->count();
            $countofqus = Science::count();

            return redirect()->route('result')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'countofqus' => $countofqus,
                'resetTimer' => true,
            ])->with('result', $result);
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with([
                'sweet_alert' => [
                    'type' => 'error',
                    'title' => 'خطأ!',
                    'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
                ],
                'remaining_time' => $remainingTime,
            ]);
        }
    }
}
