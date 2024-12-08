<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $credentials = $request->only('national_id', 'password'); // Use national_id instead of email

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $request->session()->regenerate();

            // Check user role and redirect accordingly
            $user = Auth::user();

            if ($user->role === 'student') {
                // Redirect student to home page
                return redirect()->route('homepage'); // Change this to the route name for the home page
            }

            // Redirect teacher or manager to dashboard
            return redirect()->intended(route('dashboard'));
        }

        // If authentication fails
        throw ValidationException::withMessages([
            'national_id' => [trans('auth.failed')], // Add custom error message if needed
        ]);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
