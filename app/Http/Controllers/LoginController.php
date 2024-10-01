<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.registration");
    }


    public function registerUser(Request $request)
    {
     // Validate the request
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10000'
    ]);

    // Handle file upload
    $profilePhotoPath = null;
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $profilePhotoPath = $file->store('profile_photos', 'public');
    }

    // Create a new user
    $user = User::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'profile_photo' => $profilePhotoPath
    ]);

    // Redirect or return a response
    return redirect()->route('home')->with('success', 'Registration successful!');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        try {
            $loggedInUser = User::where('email', $request->email)->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => 'Email not registered.']);
        }

        if (!Hash::check($request->password, $loggedInUser->password)) {
            return redirect()->back()->withErrors(['password' => 'Password does not match.']);
        }

        $request->session()->put('loginId', $loggedInUser->id);

        if ($loggedInUser->type == 'user') {
            return view('users.home', ['user' => $loggedInUser]);  // Pass the logged-in user to the view
        } elseif ($loggedInUser->type == 'admin') {
            return redirect()->route('admin.adminhomepage');
        }
            }

    public function dashboard()
    {
        $data = null;
        if (Session::has('loginId')) {
            $data = User::find(Session::get('loginId'));
        }

        return view("users.home", compact('data'));
    }

    public function logout()
    {
        Session::forget('loginId');

        return redirect('login');
    }
}
