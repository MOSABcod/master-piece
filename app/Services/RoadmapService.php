<?php

namespace App\Services;

use App\Models\Roadmap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RoadmapService
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    /**
     * Generate and save the roadmap and HTML table based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return array|null ['roadmap' => string, 'html_table' => string] or null if score >= 80
     */
    public function generateRoadmap(array $studentPerformance, float $percentageScore): ?array
    {
        if ($percentageScore >= 80) {
            return null; // No roadmap needed
        }

        // Create a unique cache key based on student performance and score
        $cacheKey = 'roadmap_' . md5(json_encode($studentPerformance) . $percentageScore);

        // Attempt to retrieve from cache
        // if (Cache::has($cacheKey)) {
        //     return Cache::get($cacheKey);
        // }

        // Prepare the prompt for OpenAI to generate a roadmap in Arabic
        $prompt = $this->generateRoadmapPrompt($studentPerformance, $percentageScore);

        // Send the prompt to OpenAI and get the roadmap
        try {
            $roadmapResponse = $this->openAIService->generateResponse($prompt);
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            throw new \Exception('فشل الاتصال بخدمة توليد خطة التحسين.');
        }

        // Generate the HTML table
        $htmlTable = $this->generateHtmlTable($studentPerformance, $percentageScore);

        // Save the roadmap and HTML table to the database
        Roadmap::create([
            'user_id' => Auth::id(),
            'generated_by' => 'OpenAI',
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ]);
        // dd(Roadmap::create([
        //     'user_id' => Auth::id(),
        //     'generated_by' => 'OpenAI',
        //     'response' => $roadmapResponse,
        //     'result' => $htmlTable,
        // ]));
        // Prepare the data to return
        $roadmapData = [
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ];

        // Store in cache for future requests (optional)
        Cache::put($cacheKey, $roadmapData, now()->addHours(1)); // Cache for 1 hour

        return $roadmapData;
    }

    /**
     * Generate the prompt for OpenAI based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return string
     */
    private function generateRoadmapPrompt(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'مهارات العد' => 9,
            'مهارات التلاعب بالأعداد' => 5,
            'مهارات حل المسائل' => 4,
        ];

        // Start building the performance summary
        $summary = "الطالب حصل على نتيجة إجمالية: " . number_format($percentageScore, 2) . "%.\n";
        $summary .= "تفاصيل الأداء:\n";

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);
            $summary .= "$skill: $totalScore / $totalPossible ($percentageFormatted%)\n";
        }

        // Construct the final prompt
        $prompt = "الطالب يحتاج إلى تحسين في بعض المهارات. بناءً على أدائه في المهارات التالية:\n$summary\nيرجى تقديم خطة تحسين بالخطوات باللغة العربية تركز على تطوير هذه المهارات.";

        return $prompt;
    }


    /**
     * Generate an HTML table summarizing student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return string
     */
    public function generateHtmlTable(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'مهارات العد' => 9,
            'مهارات التلاعب بالأعداد' => 5,
            'مهارات حل المسائل' => 4,
        ];

        // Start building the HTML table
        $table = '<h2>نتيجة امتحان الرياضيات للروضة والصف الأول</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">';
        $table .= '<thead>';
        $table .= '<tr><th>المهارة</th><th>النتيجة</th><th>التقييم</th></tr>';
        $table .= '</thead><tbody>';

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;

            $table .= '<tr>';
            $table .= "<td>{$skill}</td>";
            $table .= "<td>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td>" . number_format($percentage, 2) . "%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p>النتيجة الإجمالية: " . number_format($percentageScore, 2) . "%</p>";

        return $table;
    }
}
