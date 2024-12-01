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
        try {
            // Validate the input
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'national_id' => ['required', 'digits:10', 'unique:users', 'max:10'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'in:student,teacher,manager'],
                'age' => ['nullable', 'integer'],
                'class_id' => ['nullable', 'exists:classes,id'],
            ]);

            // Debugging: Check the validated data
            // dd($request->all());

            // Create the user
            $user = new User();
            $user->name = $request->name;
            $user->national_id = $request->national_id;
            $user->password = Hash::make($request->password); // Hash the password
            $user->role = $request->role;
            $user->age = $request->age;
            $user->class_id = $request->class_id;
            // dd($user);
            // Save the user to the database
            // $user->save();
            if ($user->save())
                return redirect()->route('login')->with('success', "registered");
            else
                return redirect()->route('register')->with('error', "wrong");

            // $user = User::create([
            //     'name' => $request->name,
            //     'national_id' => $request->national_id,
            //     'password' => Hash::make($request->password), // Hash the password
            //     'role' => $request->role,
            //     'age' => $request->age,
            //     'class_id' => $request->class_id,
            // ]);

            // Trigger the registered event
            event(new Registered($user));

            // Log the user in after creation
            Auth::login($user);

            // Redirect to dashboard
            return redirect(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            // Catch any unexpected error and return a response with the error message
            return back()->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
}
