<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswersMathFirstKg;
use App\Models\ArabicAnswerFirstKg;
use App\Models\ArabicAnswersFirstKg;
use App\Models\ArabicAnswerSecondThird;
use App\Models\ArabicSecondThird;
use App\Models\MathAnswerSecondThird;
use App\Models\ScienceAnswer;
use App\Models\ScienceAnswers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MathFirstKgController extends Controller
{
    public function saveAnswers(Request $request)
    {
        // Store the exam timer from the request input
        $remainingTime = $request->input('timer');
        // dd($remainingTime);
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
            // Save answers
            foreach ($answers as $questionId => $answer) {
                AnswersMathFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            // Redirect back with success message
            return redirect()->route('homepage')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'resetTimer' => true,
            ]);
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
        // dd($remainingTime);
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
            // Save answers
            foreach ($answers as $questionId => $answer) {
                MathAnswerSecondThird::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            // Redirect back with success message
            return redirect()->route('homepage')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'resetTimer' => true,
            ]);
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
        // dd($remainingTime);
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
            // Save answers
            foreach ($answers as $questionId => $answer) {
                ArabicAnswerFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            // Redirect back with success message
            return redirect()->route('homepage')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'resetTimer' => true,
            ]);
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
        // dd($request->input('answers'));
        // dd($remainingTime);
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
            // Save answers
            foreach ($answers as $questionId => $answer) {
                ArabicAnswerSecondThird::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            // Redirect back with success message
            return redirect()->route('homepage')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'resetTimer' => true,
            ]);
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
        // dd($request->input('answers'));
        // dd($remainingTime);
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
            // Save answers
            foreach ($answers as $questionId => $answer) {
                ScienceAnswer::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            // Redirect back with success message
            return redirect()->route('homepage')->with([
                'sweet_alert' => [
                    'type' => 'success',
                    'title' => 'نجاح!',
                    'message' => 'تم حفظ الإجابات بنجاح!',
                ],
                'remaining_time' => $remainingTime,
                'resetTimer' => true,
            ]);
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
