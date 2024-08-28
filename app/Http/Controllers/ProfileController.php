<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the profile of the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $userId = Auth::id();
        $user = User::find($userId);

        
        return view('profile', ['user' => $user]);
    }
 
    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Get the currently authenticated user
        $userId = Auth::id();
        $user = User::find($userId);

        // Pass the user object to the edit view
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
    public function uploadFile(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048', // Adjust validation 
    ]);

    $fileName = time().'.'.$request->file->extension();
    $request->file->move(public_path('uploads'), $fileName);

    return back()->with('success', 'File uploaded successfully.');
}
}
 