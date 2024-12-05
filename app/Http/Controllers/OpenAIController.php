<?php

namespace App\Http\Controllers;

use App\Models\AnswersMathFirstKg;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function ask(Request $request)
    {
        // Retrieve the student's answers with associated questions
        $studentAnswers = AnswersMathFirstKg::with('question')
            ->where('user_id', Auth::user()->id)
            ->get();

        // Initialize variables for score calculation
        $totalPossibleScore = 100 * $studentAnswers->count(); // Assuming each question is worth 100 points
        $totalScore = 0;

        // Calculate the total score by summing the 'is_correct' field (1 for correct, 0 for incorrect)
        foreach ($studentAnswers as $answer) {
            $totalScore += $answer->is_correct == 1 ? 100 : 0; // Add 100 points if the answer is correct
        }

        // Calculate the percentage score
        $percentageScore = ($totalScore / $totalPossibleScore) * 100;

        // If the score is less than 80%, generate a roadmap
        if ($percentageScore < 80) {
            // Prepare the prompt for OpenAI to generate a roadmap in Arabic
            $prompt = $this->generateRoadmapPrompt($studentAnswers, $percentageScore);

            // Send the prompt to OpenAI and get the roadmap
            $response = $this->openAIService->generateResponse($prompt);

            // Return the response (the generated roadmap)
            return response()->json(['response' => $response]);
        }

        return response()->json(['response' => 'Student passed with good results']);
    }

    private function generateRoadmapPrompt($studentAnswers, $percentageScore)
    {
        // Build the student performance summary to send to OpenAI
        $summary = "الطالب حصل على نتيجة إجمالية: $percentageScore%.\n";
        $summary .= "تفاصيل الأداء:\n";

        // Loop through the student answers and include each question and answer score in the prompt
        foreach ($studentAnswers as $answer) {
            $questionText = $answer->question->question_text; // Assuming 'question_text' is the column in the 'math_first_kg' table
            $score = $answer->is_correct == 1 ? 100 : 0; // Correct answers score 100, incorrect score 0
            $summary .= "$questionText: $score%\n";
        }

        // Request OpenAI to generate a roadmap for the student
        $prompt = "الطالب يحتاج إلى تحسين في بعض المهارات. بناءً على أدائه في المهارات التالية: $summary ";
        $prompt .= "يرجى تقديم خطة تحسين بالخطوات باللغة العربية.";

        return $prompt;
    }
}
