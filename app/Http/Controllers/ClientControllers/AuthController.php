<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    // Show Sign up Page
    public function signupPage(){
        return view('auth.signup');
    }

    // Show Sign in Page
    public function signinPage(){
        return view('auth.signin');
    }

    // Sign up
    public function signup(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20|unique:users,phone_number',
            'gender' => 'required|in:male,female,prefer_not_to_say',
            'home_address' => 'required|string',
            'birth_date' => 'required|date|before:today',
            'experience' => 'required|in:yes,no',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('client.pets');


    }

    // Sign in
    public function signin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('client.pets');
        }

        throw ValidationException::withMessages([
            'email' => 'Sorry, incorrect credentials',
        ]);

    }


    // Log out
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.home');

    }
}
