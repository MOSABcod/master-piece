<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswersMathFirstKg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MathFirstKgController extends Controller
{
    public function saveAnswers(Request $request)
    {
        // Simulate user authentication for API (if necessary)
        $userId = $request->user()->id ?? null; // Assuming API token provides user
        if (!$userId) {
            return response()->json([
                'status' => 'error',
                'message' => 'المستخدم غير مصرح.',
            ], 401);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'answers' => 'required|array',
            'answers.*' => 'required',
        ], [
            'answers.required' => 'يجب تقديم الإجابات.',
            'answers.*.required' => 'يجب على جميع الأسئلة أن تحتوي على إجابة.',
        ]);

        if ($validator->fails()) {
            // Group errors to avoid duplicates
            $errors = array_unique($validator->errors()->all());

            return response()->json([
                'status' => 'error',
                'message' => 'فشل التحقق من البيانات.',
                'errors' => $errors,
            ], 422);
        }

        try {
            $answers = $request->input('answers', []);

            // Save answers
            foreach ($answers as $questionId => $answer) {
                AnswersMathFirstKg::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'answer' => $answer,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'تم حفظ الإجابات بنجاح!',
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء حفظ الإجابات. يرجى المحاولة مرة أخرى.',
            ], 500);
        }
    }
}
