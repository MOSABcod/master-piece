<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use App\Services\RoadmapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenAIController extends Controller
{
    protected $roadmapService;

    /**
     * Inject the RoadmapService into the controller.
     *
     * @param RoadmapService $roadmapService
     */
    public function __construct(RoadmapService $roadmapService)
    {
        $this->roadmapService = $roadmapService;
    }

    /**
     * Handle the request to generate a roadmap based on student performance.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ask(Request $request)
    {
        // Retrieve the necessary data from the request
        $studentAnswers = $request->input('answers', []);
        $percentageScore = $request->input('percentage_score', 0);
        $studentPerformance = $request->input('student_performance', []);

        try {
            // Use the RoadmapService to generate the roadmap
            $roadmap = $this->roadmapService->generateRoadmap($studentPerformance, $percentageScore);

            if ($roadmap) {
                // Return the generated roadmap as JSON
                return response()->json([
                    'roadmap' => $roadmap,
                ]);
            }

            // If no roadmap is needed (score >= 80)
            return response()->json([
                'message' => 'Student passed with good results',
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes

            // Return an error response
            return response()->json([
                'error' => 'حدث خطأ أثناء توليد خطة التحسين. يرجى المحاولة مرة أخرى.',
            ], 500);
        }
    }
}
