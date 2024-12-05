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

class MathFirstKgController extends Controller
{
    public function saveAnswers(Request $request)
    {
        $studentAnswers = AnswersMathFirstKg::with('question')->where('user_id', Auth::user()->id)->get();
        dd($studentAnswers);
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
            // Save answers and compare with the correct answers
            foreach ($answers as $questionId => $answer) {
                // Fetch the correct answer for the question
                $question = MathFirstKg::where('id', $questionId)->first();

                // Check if the question exists
                if (!$question) {
                    continue; // Skip if question not found
                }

                // Compare the user's answer with the correct answer
                $isCorrect = strtolower(trim($answer)) === strtolower(trim($question->correct_answer)) ? true : false;

                // Save the answer to the database
                AnswersMathFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect, // Store whether the answer is correct
                ]);
            }
            $result = AnswersMathFirstKg::where('user_id', $userId)->where('is_correct', 1)->count();
            $countofqus = MathFirstKg::count();
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

    public function saveAnswersSecMath(Request $request)
    {
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
