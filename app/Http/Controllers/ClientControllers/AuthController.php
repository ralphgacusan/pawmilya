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

        if ($validated['email'] === 'admin@pawmilya.site' && $validated['password'] === 'admin123') {
            // Set admin session
            $request->session()->put('is_admin', true);

            // Redirect to admin dashboard
            return redirect()->route('admin.pet')->with('success', 'Welcome, Admin!');
        }
        elseif (Auth::attempt($validated)) {
            // Regenerate session
            $request->session()->regenerate();
        
            // Create success message
            $successMessage = 'Sign-in successful, welcome back ' . Auth::user()->first_name . '!';
            Log::info('User Success Message: ' . $successMessage);
        
            // Redirect to client area
            return redirect()->intended(route('client.pets'))->with('success', $successMessage);
        } 
        else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    
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


public function adminLogOut(Request $request)
{
    // Remove the 'is_admin' session data to log out the admin
    $request->session()->forget('is_admin');
    
    // Optionally, you can also flush the entire session if needed
    // $request->session()->flush();

    // Redirect to the login page with a success message
    return redirect()->route('auth.signin')->with('success', 'Logged out successfully.');
}


public function showAdminUserPage(Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    $query = User::query();

    // Filter by search (first name or last name)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', '%' . $search . '%')
              ->orWhere('last_name', 'like', '%' . $search . '%');
        });
    }

    // Sort by creation date
    if ($request->filled('date')) {
        $query->orderBy('created_at', $request->date === 'oldest' ? 'asc' : 'desc');
    } else {
        $query->orderBy('created_at', 'desc'); // Default to newest
    }

    // Get all applied filters
    $filters = $request->only(['date', 'search']);

    // Paginate with filters appended to links
    $users = $query->paginate(20)->appends($filters);

    return view('admin.user-management', compact('users', 'filters'));
}


// Delete User
public function destroyUser(User $user, Request $request)
{if (!$request->session()->get('is_admin')) {
        abort(403, 'Admins only.');
    }
    if ($user->image && Storage::exists('public/' . $user->image)) {
        Storage::delete('public/' . $user->image);
    }

    $user->delete();

    return redirect()->route('admin.user')->with('success', 'User record deleted.');
}

}
