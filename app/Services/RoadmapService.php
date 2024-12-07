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
        $table = '<h2 style="text-align:center; color:#27703b; font-size:24px; margin-bottom:20px;">نتيجة امتحان الرياضيات للروضة والصف الأول</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse; border:2px solid #27703b; font-family:Arial, sans-serif; font-size:16px;">';
        $table .= '<thead>';
        $table .= '<tr style="background-color:#f4f4f4; color:#27703b;">';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">المهارة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">النتيجة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">التقييم</th>';
        $table .= '</tr>';
        $table .= '</thead><tbody>';

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;

            $rowBackground = ($percentage >= 50) ? '#e6f4e6' : '#f9f9f9'; // Green for good performance, light gray otherwise

            $table .= "<tr style='background-color:{$rowBackground};'>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$skill}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>" . number_format($percentage, 2) . "%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p style='text-align:center; margin-top:20px; font-size:18px; color:#27703b;'>النتيجة الإجمالية: <strong>" . number_format($percentageScore, 2) . "%</strong></p>";

        return $table;
    }

    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ============================= math sec ===================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    /**
     * Generate and save the roadmap and HTML table based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return array|null ['roadmap' => string, 'html_table' => string] or null if score >= 80
     */
    public function generateRoadmapMathSec(array $studentPerformance, float $percentageScore): ?array
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
        $prompt = $this->generateRoadmapPromptMathSec($studentPerformance, $percentageScore);

        // Send the prompt to OpenAI and get the roadmap
        try {
            $roadmapResponse = $this->openAIService->generateResponse($prompt);
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            throw new \Exception('فشل الاتصال بخدمة توليد خطة التحسين.');
        }

        // Generate the HTML table
        $htmlTable = $this->generateHtmlTableMathSec($studentPerformance, $percentageScore);

        // Save the roadmap and HTML table to the database
        Roadmap::create([
            'user_id' => Auth::id(),
            'generated_by' => 'OpenAI',
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ]);

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
    private function generateRoadmapPromptMathSec(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'مهارات العد' => 5,
            'مهارات التلاعب بالأعداد' => 12,
            'مهارات حل المسائل' => 7,
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
    public function generateHtmlTableMathSec(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'مهارات العد' => 5,
            'مهارات التلاعب بالأعداد' => 12,
            'مهارات حل المسائل' => 7,
        ];

        // Start building the HTML table
        $table = '<h2 style="color:#27703b; text-align:center; font-size:24px; margin-bottom:20px;">نتيجة امتحان الرياضيات للصف الثاني والصف الثالث</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse; font-family: Arial, sans-serif; font-size:16px;">';
        $table .= '<thead>';
        $table .= '<tr style="background-color:#f4f4f4; color:#27703b;">';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">المهارة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">النتيجة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">التقييم</th>';
        $table .= '</tr>';
        $table .= '</thead><tbody>';

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);

            // Alternate row background based on performance
            $rowBackground = ($percentage >= 50) ? '#e6f4e6' : '#f9f9f9';

            $table .= "<tr style='background-color:{$rowBackground};'>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$skill}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$percentageFormatted}%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p style='text-align:center; font-size:18px; margin-top:20px; color:#27703b;'>النتيجة الإجمالية: <strong>" . number_format($percentageScore, 2) . "%</strong></p>";

        return $table;
    }

    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ============================= arabic first ===============================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    /**
     * Generate and save the roadmap and HTML table based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return array|null ['roadmap' => string, 'html_table' => string] or null if score >= 80
     */
    public function generateRoadmapArabic(array $studentPerformance, float $percentageScore): ?array
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
        $prompt = $this->generateRoadmapPromptArabic($studentPerformance, $percentageScore);

        // Send the prompt to OpenAI and get the roadmap
        try {
            $roadmapResponse = $this->openAIService->generateResponse($prompt);
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            throw new \Exception('فشل الاتصال بخدمة توليد خطة التحسين.');
        }

        // Generate the HTML table
        $htmlTable = $this->generateHtmlTableArabic($studentPerformance, $percentageScore);

        // Save the roadmap and HTML table to the database
        Roadmap::create([
            'user_id' => Auth::id(),
            'generated_by' => 'OpenAI',
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ]);

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
    private function generateRoadmapPromptArabic(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'الوعي الصوتي' => 6,
            'قراءة أصوات الحروف' => 8,
            'الكتابة' => 4,
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
    public function generateHtmlTableArabic(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'الوعي الصوتي' => 6,
            'قراءة أصوات الحروف' => 8,
            'الكتابة' => 4,
        ];

        // Start building the HTML table
        $table = '<h2 style="color:#27703b; text-align:center; font-size:24px; margin-bottom:20px;">نتيجة امتحان العربي للروضة والصف الأول</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse; font-family: Arial, sans-serif; font-size:16px;">';
        $table .= '<thead>';
        $table .= '<tr style="background-color:#f4f4f4; color:#27703b;">';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">المهارة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">النتيجة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">التقييم</th>';
        $table .= '</tr>';
        $table .= '</thead><tbody>';

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);

            // Alternate row background based on performance
            $rowBackground = ($percentage >= 50) ? '#e6f4e6' : '#f9f9f9';

            $table .= "<tr style='background-color:{$rowBackground};'>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$skill}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$percentageFormatted}%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p style='text-align:center; font-size:18px; margin-top:20px; color:#27703b;'>النتيجة الإجمالية: <strong>" . number_format($percentageScore, 2) . "%</strong></p>";

        return $table;
    }

    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ============================= arabic sec =================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    /**
     * Generate and save the roadmap and HTML table based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return array|null ['roadmap' => string, 'html_table' => string] or null if score >= 80
     */
    public function generateRoadmapArabicSec(array $studentPerformance, float $percentageScore): ?array
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
        $prompt = $this->generateRoadmapPromptArabicSec($studentPerformance, $percentageScore);

        // Send the prompt to OpenAI and get the roadmap
        try {
            $roadmapResponse = $this->openAIService->generateResponse($prompt);
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            throw new \Exception('فشل الاتصال بخدمة توليد خطة التحسين.');
        }

        // Generate the HTML table
        $htmlTable = $this->generateHtmlTableArabicSec($studentPerformance, $percentageScore);

        // Save the roadmap and HTML table to the database
        Roadmap::create([
            'user_id' => Auth::id(),
            'generated_by' => 'OpenAI',
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ]);

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
    private function generateRoadmapPromptArabicSec(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'الوعي الصوتي'        => 1,
            'قراءة أصوات الحروف' => 7,
            'المفردات'           => 8,
            'الكتابة'            => 3,
            'الاستيعاب القرائي'  => 4,
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
    public function generateHtmlTableArabicSec(array $studentPerformance, float $percentageScore): string
    {
        // Define the skills and their question counts
        $skills = [
            'الوعي الصوتي'        => 1,
            'قراءة أصوات الحروف' => 7,
            'المفردات'           => 8,
            'الكتابة'            => 3,
            'الاستيعاب القرائي'  => 4,
        ];

        // Start building the HTML table
        $table = '<h2 style="color:#27703b; text-align:center; font-size:24px; margin-bottom:20px;">نتيجة امتحان العربي للصف الثاني والصف الثالث</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse; font-family: Arial, sans-serif; font-size:16px;">';
        $table .= '<thead>';
        $table .= '<tr style="background-color:#f4f4f4; color:#27703b;">';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">المهارة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">النتيجة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">التقييم</th>';
        $table .= '</tr>';
        $table .= '</thead><tbody>';

        foreach ($skills as $skill => $totalQuestions) {
            $totalScore = $studentPerformance[$skill]['total_score'] ?? 0;
            $totalPossible = $studentPerformance[$skill]['total_possible'] ?? $totalQuestions;
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);

            // Alternate row background based on performance
            $rowBackground = ($percentage >= 50) ? '#e6f4e6' : '#f9f9f9';

            $table .= "<tr style='background-color:{$rowBackground};'>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$skill}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$percentageFormatted}%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p style='text-align:center; font-size:18px; margin-top:20px; color:#27703b;'>النتيجة الإجمالية: <strong>" . number_format($percentageScore, 2) . "%</strong></p>";

        return $table;
    }

    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    // ============================= arabic Science =================================
    // ==========================================================================
    // ==========================================================================
    // ==========================================================================
    /**
     * Generate and save the roadmap and HTML table based on student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return array|null ['roadmap' => string, 'html_table' => string] or null if score >= 80
     */
    public function generateRoadmapScience(array $studentPerformance, float $percentageScore): ?array
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
        $prompt = $this->generateRoadmapPromptScience($studentPerformance, $percentageScore);

        // Send the prompt to OpenAI and get the roadmap
        try {
            $roadmapResponse = $this->openAIService->generateResponse($prompt);
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            throw new \Exception('فشل الاتصال بخدمة توليد خطة التحسين.');
        }

        // Generate the HTML table
        $htmlTable = $this->generateHtmlTableScience($studentPerformance, $percentageScore);

        // Save the roadmap and HTML table to the database
        Roadmap::create([
            'user_id' => Auth::id(),
            'generated_by' => 'OpenAI',
            'response' => $roadmapResponse,
            'result' => $htmlTable,
        ]);

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
    private function generateRoadmapPromptScience(array $studentPerformance, float $percentageScore): string
    {
        // Start building the performance summary
        $summary = "الطالب حصل على نتيجة إجمالية: " . number_format($percentageScore, 2) . "%.\n";
        $summary .= "تفاصيل الأداء:\n";

        foreach ($studentPerformance as $key => $performance) {
            $totalScore = $performance['total_score'] ?? 0;
            $totalPossible = $performance['total_possible'] ?? 1; // Assuming 1 point per question
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);
            $summary .= "السؤال " . (intval($key) + 1) . ": $totalScore / $totalPossible ($percentageFormatted%)\n";
        }

        // Construct the final prompt
        $prompt = "الطالب يحتاج إلى تحسين في بعض الجوانب بناءً على أدائه:\n$summary\nيرجى تقديم خطة تحسين بالخطوات باللغة العربية تركز على تعزيز نقاط القوة ومعالجة نقاط الضعف.";

        return $prompt;
    }


    /**
     * Generate an HTML table summarizing student performance.
     *
     * @param array $studentPerformance
     * @param float $percentageScore
     * @return string
     */
    public function generateHtmlTableScience(array $studentPerformance, float $percentageScore): string
    {
        // Start building the HTML table
        $table = '<h2 style="color:#27703b; text-align:center; font-size:24px; margin-bottom:20px;">نتيجة امتحان العلوم لجميع الصفوف</h2>';
        $table .= '<table border="1" style="width:100%; text-align:center; border-collapse: collapse; font-family: Arial, sans-serif; font-size:16px;">';
        $table .= '<thead>';
        $table .= '<tr style="background-color:#f4f4f4; color:#27703b;">';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">النتيجة</th>';
        $table .= '<th style="padding:10px; border:1px solid #27703b;">التقييم</th>';
        $table .= '</tr>';
        $table .= '</thead><tbody>';

        foreach ($studentPerformance as $performance) {
            $totalScore = $performance['total_score'] ?? 0;
            $totalPossible = $performance['total_possible'] ?? 1; // Assuming 1 point per question
            $percentage = $totalPossible > 0 ? ($totalScore / $totalPossible) * 100 : 0;
            $percentageFormatted = number_format($percentage, 2);

            // Alternate row background for better readability
            $rowBackground = ($percentage >= 50) ? '#e6f4e6' : '#f9f9f9';

            $table .= "<tr style='background-color:{$rowBackground};'>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$totalScore} / {$totalPossible}</td>";
            $table .= "<td style='padding:10px; border:1px solid #ddd;'>{$percentageFormatted}%</td>";
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        $table .= "<p style='text-align:center; font-size:18px; margin-top:20px; color:#27703b;'>النتيجة الإجمالية: <strong>" . number_format($percentageScore, 2) . "%</strong></p>";

        return $table;
    }
}
