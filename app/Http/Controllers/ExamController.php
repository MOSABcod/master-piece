<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScienceAnswer;
use App\Models\AnswersMathFirstKg;
use App\Models\ArabicAnswerFirstKg;
use Illuminate\Support\Facades\Auth;
use App\Models\MathAnswerSecondThird;
use App\Models\ArabicAnswerSecondThird;

class ExamController extends Controller
{
    
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

        if (MathAnswerSecondThird::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.math.mathQuizSecAndThird');
    }


    public function checkApplyArabicFirst(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (ArabicAnswerFirstKg::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.arabic.first');
    }


    public function checkApplyArabicSec(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (ArabicAnswerSecondThird::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.arabic.secondAndThird');
    }


    public function checkApplyScience(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول للتقديم.');
        }

        if (ScienceAnswer::with('question')->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->back()->with('error', 'لا يمكنك التقديم مرة أخرى.');
        }

        return view('user.pages.science.science');
    }



    

}
