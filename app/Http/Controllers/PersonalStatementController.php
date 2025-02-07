<?php
// app/Http/Controllers/PersonalStatementController.php

namespace App\Http\Controllers;

use App\Models\PersonalStatement;
use App\Models\PersonalStatementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalStatementController extends Controller
{
    public function __construct()
    {
        // Ensure only aut henticated users can access these methods
      //  $this->middleware('auth');
    }

    // Display categories and existing statements (if any)
    public function index()
    {
        $userId = Auth::id();
        $categories = PersonalStatementCategory::all();  // Retrieve all categories
        $statement = PersonalStatement::where('user_id', $userId)->first();  // Retrieve user's first statement (if any)

        return view('personal-statement', compact('categories', 'statement'));
    }

    // Show the personal statement for a specific category
    public function show($categoryId)
    {
        $category = PersonalStatementCategory::findOrFail($categoryId);  // Fetch the category
        $userId = Auth::id();
        $statement = PersonalStatement::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->first();  // Fetch the user' 

        return view('personal-statement', [
            'statement' => $statement,
            'category' => $category,
        ]);
    }

    // Store or 
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'category_id' => 'required|exists:personal_statement_categories,id',
        ]);

        $userId = Auth::id();
        $categoryId = $request->input('category_id');

        // Use updateOrCreate to simplify the logic
        PersonalStatement::updateOrCreate(
            [
                'user_id' => $userId,
                'category_id' => $categoryId,
            ],
            [
                'content' => $request->input('content'),
            ]
        );

        return redirect()->route('personalStatement.show', $categoryId)->with('success', 'Personal Statement updated successfully!');
    }

    // Create a new category
    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:personal_statement_categories,name',
        ]);

        PersonalStatementCategory::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('personal-statement')->with('success', 'New category created!');
    }
}
