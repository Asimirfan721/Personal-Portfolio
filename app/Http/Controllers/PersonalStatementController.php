<?php
// app/Http/Controllers/PersonalStatementController.php

namespace App\Http\Controllers;

use App\Models\PersonalStatement;
use App\Models\PersonalStatementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PersonalStatementController extends Controller
{
    public function __construct()
    {
        // Ensure only authenticated users can access these methods
        // $this->middleware('auth');
    }

    // Display categories and existing statements (if any)
    public function index()
    {
        $userId = Auth::id();
        $categories = PersonalStatementCategory::all();  // Retrieve all categories
        $statement = PersonalStatement::where('user_id', $userId)->first();  // Retrieve user's first statement (if any)

        return view('personal-statement', compact('categories', 'statement'));
    }

    // Store or update the personal statement
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

        return redirect()->route('personal-statement')->with('success', 'Personal Statement updated successfully!');
    }

    
public function createCategory(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:personal_statement_categories,name',
    ]);

    $name = $request->input('name');

    // Debugging: Log the name to ensure it's being retrieved correctly
    Log::info('Category name: ' . $name);

    PersonalStatementCategory::create([
        'name' => $name,
    ]);

    return redirect()->route('personal-statement')->with('success', 'New category created!');
}

}