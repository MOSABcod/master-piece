<?php

namespace App\Http\Controllers;


use App\Models\AnswersMathFirstKg;
use App\Models\Roadmap;
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
        // Retrieve the data passed from saveAnswers
        $studentAnswers = $request->input('answers', []);
        $percentageScore = $request->input('percentage_score', 0);
        $studentPerformance = $request->input('student_performance', []);

        // Generate the roadmap
        if ($percentageScore < 80) {
            // Prepare the prompt for OpenAI to generate a roadmap in Arabic
            $prompt = $this->generateRoadmapPrompt($studentPerformance, $percentageScore);

            // Send the prompt to OpenAI and get the roadmap
            $response = $this->openAIService->generateResponse($prompt);

            // Save the roadmap response to the database
            $roadmap = new Roadmap();
            $roadmap->user_id = Auth::user()->id;
            $roadmap->generated_by = 'OpenAI';
            $roadmap->response = $response;
            $roadmap->save();

            // Return the response (the generated roadmap)
            return response()->json([
                'roadmap' => $response,
            ]);
        }

        return response()->json([
            'message' => 'Student passed with good results',
        ]);
    }

    private function generateHtmlTable($studentPerformance, $percentageScore)
    {
        // Start building the HTML table
        $table = '<h2>نتيجة امتحان الرياضيات للروضة والصف الأول</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">';
        $table .= '<thead>';
        $table .= '<tr><th>المهارة</th><th>النتيجة</th><th>التقييم</th></tr>';
        $table .= '</thead><tbody>';

        foreach ($studentPerformance as $skill => $performance) {
            $totalScore = $performance['total_score'];
            $totalPossible = $performance['total_possible'];
            $percentage = ($totalScore / $totalPossible) * 100;

            $table .= '<tr>';
            $table .= "<td>{$skill}</td>";
            $table .= "<td>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td>{$percentage}%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p>النتيجة الإجمالية: {$percentageScore}%</p>";

        return $table;
    }

    private function generateRoadmapPrompt($studentPerformance, $percentageScore)
    {
        // Build the student performance summary to send to OpenAI
        $summary = "الطالب حصل على نتيجة إجمالية: $percentageScore%.\n";
        $summary .= "تفاصيل الأداء:\n";

        // Include performance for each skill
        foreach ($studentPerformance as $skill => $performance) {
            $summary .= "$skill: {$performance['total_score']} / {$performance['total_possible']} (" . ($performance['total_score'] / $performance['total_possible']) * 100 . "%)\n";
        }

        // Request OpenAI to generate a roadmap for the student
        $prompt = "الطالب يحتاج إلى تحسين في بعض المهارات. بناءً على أدائه في المهارات التالية: $summary ";
        $prompt .= "يرجى تقديم خطة تحسين بالخطوات باللغة العربية.";

        return $prompt;
    }
}
