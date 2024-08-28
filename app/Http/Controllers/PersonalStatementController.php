<?php
// app/Http/Controllers/PersonalStatementController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalStatement;
use Illuminate\Support\Facades\Auth;

class PersonalStatementController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $statement = PersonalStatement::where('user_id', $userId)->first();
        return view('Personal-Statement', ['statement' => $statement]);
    }
    

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $userId = Auth::id();
        $statement= PersonalStatement::where('user_id', $userId)->first();


        //$statement = PersonalStatement::first();
        if (!$statement) {
            $statement = new PersonalStatement();
            $statement->user_id = $userId;
        }
        $statement->content = $request->input('content');
        $statement->save();

        return redirect()->route('personal-statement')->with('success', 'Personal Statement updated successfully!');
    }
}
