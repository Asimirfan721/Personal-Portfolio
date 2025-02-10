<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatementOfPurpose;
use Illuminate\Support\Facades\Auth;

class StatementOfPurposeController extends Controller
{
    // Show all SOPs and form for create/update
    public function index()
    {
        $userId = Auth::id();
        $statements = StatementOfPurpose::where('user_id', $userId)->get();
        return view('statement-of-purpose', compact('statements'));
    }

    // Show create SOP form
    public function create()
    {
        return view('statement-of-purpose', ['create' => true, 'statements' => StatementOfPurpose::where('user_id', Auth::id())->get()]);
    }

    // Show edit SOP form
    public function edit($id)
    {
        $sop = StatementOfPurpose::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('statement-of-purpose', ['edit' => $sop, 'statements' => StatementOfPurpose::where('user_id', Auth::id())->get()]);
    }

    // Store new SOP
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        StatementOfPurpose::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

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

        return redirect()->route('statement-of-purpose.index')->with('success', 'Statement of Purpose deleted successfully!');
    }
}
