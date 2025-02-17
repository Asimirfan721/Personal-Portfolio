<?php namespace App\Http\Controllers;

use App\Models\PersonalStatement;
use App\Models\PersonalStatementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PersonalStatementController extends Controller
{   
    // Ensure only authenticated users can access these methods
    public function __construct()
    {
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

        return redirect()->route('personalStatement.index')->with('success', 'Personal Statement updated successfully!');
    }

    // Create new category
    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:personal_statement_categories,name',
        ]);

        $name = $request->input('name');

        // Log category creation for debugging
        Log::info('Category name: ' . $name);

        PersonalStatementCategory::create([
            'name' => $name,
        ]);

        return redirect()->route('personalStatement.index')->with('success', 'New category created!');
    }

    // Optional: Delete personal statement
    public function destroy($id)
    {
        $userId = Auth::id();
        $statement = PersonalStatement::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $statement->delete();

        return redirect()->route('personalStatement.index')->with('success', 'Personal Statement deleted successfully!');
    }
    // Show edit form for the selected personal statement based on category
public function edit($categoryId)
{
    $userId = Auth::id();
    $categories = PersonalStatementCategory::all();  // Retrieve all categories
    $statement = PersonalStatement::where('user_id', $userId)->where('category_id', $categoryId)->first();  // Retrieve statement for selected category

    if (!$statement) {
        return redirect()->route('personalStatement.index')->with('error', 'Personal Statement not found for this category!');
    }

    return view('personal-statement', compact('categories', 'statement', 'categoryId'));
}

}

