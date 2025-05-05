<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

        return redirect()->route('client.pets')->with('success', 'Registration successful! Welcome, ' . $user->first_name . '!');

    }

    public function signin(Request $request)
{
    // Validate the login credentials
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    
    // Attempt to log the user in
    if (Auth::attempt($validated)) {
        // Regenerate the session to avoid session fixation attacks
        $request->session()->regenerate();

        // Redirect back to the intended page, or to a default page
        // Log the success message before redirecting
        $successMessage = 'Sign-in successful, welcome back ' . Auth::user()->first_name . '!';
        Log::info('Success Message: ' . $successMessage);

        return redirect()->intended(route('client.pets'))
            ->with('success', $successMessage); }

    // If authentication fails, throw a validation exception
    throw ValidationException::withMessages([
        'email' => 'Sorry, incorrect credentials',
    ]);
}


    // Log out
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.home')->with('success', 'You have successfully logged out!');
    }

    // Show user profile
    public function showUserProfile(){
        return view('client.user-account');
    }

    public function updateImage(Request $request) {
    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    $user = Auth::user();

    if ($user->image && Storage::exists('public/' . $user->image)) {
        Storage::delete('public/' . $user->image);
    }

    $path = $request->file('image')->store('profiles', 'public');
    $user->image = $path;
    $user->save();

    return back()->with('success', 'Profile picture updated.');

}

    // Delete Profile Picture
    public function removeImage()
{
    $user = Auth::user();

    if ($user->image && Storage::exists('public/' . $user->image)) {
        Storage::delete('public/' . $user->image);
    }

    $user->image = null;
    $user->save();

    return back()->with('success', 'Profile picture removed.');
}

// Edit Profile Page
public function editProfile()
{
    return view('client.edit-user-profile', ['user' => Auth::user()]);
}

public function updateProfile(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(), // keep this
        'phone_number' => 'nullable|string|max:20|unique:users,phone_number,' . Auth::id(),
        'gender' => 'required|in:male,female,prefer_not_to_say',
        'home_address' => 'required|string|max:255',
        'birth_date' => 'required|date|before:today',
        'experience' => 'required|in:yes,no',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'password' => 'nullable|string|min:8|confirmed',

        // Add more validations as needed
    ]);

    $validated = $request->validate([
        
    ]);

    Auth::user()->update($request->only('first_name', 'last_name', 'email', 'phone_number', 'gender', 'birth_date', 'home_address'));

    return redirect()->route('auth.user-profile')->with('success', 'Account updated.');
}

public function destroy()
{
    $user = Auth::user();

    if ($user->image && Storage::exists('public/' . $user->image)) {
        Storage::delete('public/' . $user->image);
    }

    Auth::logout();
    $user->delete();

    return redirect()->route('client.home')->with('success', 'Your account has been deleted.');
}

public function redirectToSignin(){
    return view('auth.signin');
}




}
