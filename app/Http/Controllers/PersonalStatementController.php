<?php

namespace App\Http\Controllers; // define name space 

use Illuminate\Http\Request;
use App\Models\PersonalStatement;

class PersonalStatementController extends Controller
{
    public function index()
{
    $statements = PersonalStatement::all(); // Using the PersonalStatement model to fetch all personal statements from the database
    return view('personal-statement', compact('statements'));

    }

    public function create()
    {
        return view('personal-statement');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        PersonalStatement::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('personal-statement.index')->with('success', 'Personal Statement created successfully.');
    }

    public function show(PersonalStatement $personalStatement)
    {
        return view('personal-statement.show', compact('personalStatement'));
    }

    public function edit(PersonalStatement $personalStatement)
    {
        return view('personal-statement.edit', compact('personalStatement'));
    }

    public function update(Request $request, PersonalStatement $personalStatement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $personalStatement->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('personal-statement.index')->with('success', 'Personal Statement updated successfully.');
    }

    public function destroy(PersonalStatement $personalStatement)
    {
        $personalStatement->delete();
        return redirect()->route('personal-statement.index')->with('success', 'Personal Statement deleted successfully.');
    }
}