<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatementOfPurpose; 
use Illuminate\Support\Facades\Auth;

class StatementOfPurposeController extends Controller
{
     
    public function index()     // index funciton is created
    {
        $userId = Auth::id();
        $statements = StatementOfPurpose::where('user_id', $userId)->get();
        return view('statement-of-purpose', compact('statements'));
    }

    // Show create SOP form
    public function create()
    {
        return view('statement-of-purpos', ['create' => true, 'statements' => StatementOfPurpose::where('user_id', Auth::id())->get()]);
    }

    // Show edit SOP form
    public function edit($id)
    {
        $sop = StatementOfPurpose::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('statement-of-purpos', ['edit' => $sop, 'statements' => StatementOfPurpose::where('user_id', Auth::id())->get()]);
    }

    // Store new SOP
    public function store(Request $request)
{
    // Validate the inputs
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Create a new statement of purpose and store it in the database ok
    $statement = new StatementOfPurpose();
    $statement->title = $request->input('title'); // Ensure title is saved   
    $statement->content = $request->input('content');
    $statement->user_id = Auth::id(); // Associate the user with the SOP
    $statement->save();

    return redirect()->route('statement-of-purpose.index')->with('success', 'Statement of Purpose created successfully!');
}



    // Update SOP
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $statement = StatementOfPurpose::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $statement->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('statement-of-purpose.index')->with('success', 'Statement of Purpose updated successfully!');
    }

    // Delete SOP
    public function destroy($id)
    {
        $statement = StatementOfPurpose::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $statement->delete();

        return redirect()->route('statement-of-purpose.destroy')->with('success', 'Statement of Purpose deleted successfully!');
    }
}
