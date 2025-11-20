<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show profile edit form
    public function editProfile()
    {
        return view('profile_edit');
    }

    // Handle profile update
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    // Register endpoint
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Do not log in automatically; redirect to login page
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // Login endpoint
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Invalid username or password'])->withInput();
    }

    // Logout endpoint
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
    // User profile endpoint
    public function profile(Request $request)
    {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }

    // Book listing endpoint (stub)
    public function listBooks(Request $request)
    {
        // Example: check user type and return books
        $user = Auth::user();
        // Replace with actual book model/query
        $books = [];
        if ($user->is_premium ?? false) {
            $books = [
                ['title' => 'Premium Book 1'],
                ['title' => 'Premium Book 2'],
                ['title' => 'Free Book 1'],
            ];
        } else {
            $books = [
                ['title' => 'Free Book 1'],
            ];
        }
        return response()->json(['books' => $books], 200);
    }
}
