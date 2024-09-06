<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{

    public function index()
    {
        
        return view('profile');
    }

    
    public function edit()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        return view('edit-profile', ['user' => $user]);
    }

    /**
     * Update the profile of the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            // Add more validation rules if necessary
        ]);
 
        // Get the currently authenticated user
        $userId = Auth::id();
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('profile')->withErrors('User not found.');
        }

        // Update the user's profile information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as necessary
        $user->save();

        // Redirect back to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    public function showProfile()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        if (!$user) {
            return redirect()->route('login')->withErrors('You need to be logged in to access this page.');
        }
        return view('profile', ['user' => $user]);
    }
    
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $userId = Auth::user()->id;

        // Generate a unique file name and move the uploaded file
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        $user = User::find($userId); // Ensure this is correct
        $user->profile_image = $fileName;
        $user->save();

        return back()->with('success', 'Profile image uploaded successfully.');
    }
} 