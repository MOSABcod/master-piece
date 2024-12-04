<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $response = $this->openAIService->generateResponse($prompt);

        return response()->json(['response' => $response]);
    }
}
