<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatementOfPurpose;
use Illuminate\Support\Facades\Auth;

class StatementOfPurposeController extends Controller
{
    // Show the Statement of Purpose form
    public function index()
{
    $userId = Auth::id();
    $statements = StatementOfPurpose::where('user_id', $userId)->get(); // Fetch all records

    return view('statement-of-purpose', compact('statements'));
}


    

    // Save or Update the Statement of Purpose
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $userId = Auth::id();
        $statement = StatementOfPurpose::updateOrCreate(
            ['user_id' => $userId], 
            ['content' => $request->input('content')]
        );

        return redirect(url('/statement-of-purpose'))->with('success', 'Statement of Purpose updated successfully!');
    }
}
