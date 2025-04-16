<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input (this will automatically redirect back with errors if validation fails)
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'national_id' => ['required', 'digits:10', 'unique:users', 'max:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:student,teacher,manager'],
            'age' => ['nullable', 'integer'],
            'class_id' => ['nullable', 'exists:classes,id'],
        ]);
    
        try {
            // Create and save the user
            $user = User::create([
                'name' => $validated['name'],
                'national_id' => $validated['national_id'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
                'age' => $validated['age'] ?? null,
                'class_id' => $validated['class_id'] ?? null,
            ]);
    
            // Trigger the registered event
            event(new Registered($user));
    
            // Log the user in after creation
            Auth::login($user);
    
            // Redirect to dashboard
            return redirect()->route('dashboard');
    
        } catch (\Exception $e) {
            // Only unexpected errors will be caught here
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
}
