<?php
// app/Http/Controllers/PersonalStatementController.php

namespace App\Http\Controllers;

use App\Models\PersonalStatement;
use App\Models\PersonalStatementCategory;  // Import the Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalStatementController extends Controller
{
    // Display the categories and the existing statement (if any)
    public function index() 
    {
        $userId = Auth::id();
        $categories = PersonalStatementCategory::all();  // Get all categories
        $statement = PersonalStatement::where('user_id', $userId)->first();

        return view('personal-statement', compact('categories', 'statement'));
    }

    // Store or update personal statement
    public function update(Request $request)
{
    $request->validate([
        'content' => 'required|string',
        'category_id' => 'required|exists:personal_statement_categories,id',
    ]);

    $userId = Auth::id();
    $categoryId = $request->input('category_id');

    $statement = PersonalStatement::where('user_id', $userId)
                                  ->where('category_id', $categoryId)
                                  ->first();

    if (!$statement) {
        $statement = new PersonalStatement();
        $statement->user_id = $userId;
        $statement->category_id = $categoryId;
    }

    $statement->content = $request->input('content');
    $statement->save();

    return redirect()->route('personalStatement.show', $categoryId)->with('success', 'Personal Statement updated successfully!');
}

    // Create a new category
    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PersonalStatementCategory::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('personal-statement')->with('success', 'New category created!');
    }
    public function show($categoryId)
{
    // Get the selected category
    $category = PersonalStatementCategory::findOrFail($categoryId);
    
    // Get the current user's personal statement
    $userId = Auth::id();
    $statement = PersonalStatement::where('user_id', $userId)
                ->where('category_id', $categoryId)
                ->first();

    return view('personal-statement', [
        'statement' => $statement,
        'category' => $category
    ]);
}

}
