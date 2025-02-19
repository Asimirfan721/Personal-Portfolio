<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalStatement;

class PersonalStatementController extends Controller
{
    public function index()
    {
        $statements = PersonalStatement::all();
        return view('personal_statements.index', compact('statements'));
    }

    public function create()
    {
        return view('personal_statements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        PersonalStatement::create($request->all());

        return redirect()->route('personal_statements.index')->with('success', 'Personal Statement created successfully.');
    }

    public function show(PersonalStatement $personalStatement)
    {
        return view('personal_statements.show', compact('personalStatement'));
    }

    public function edit(PersonalStatement $personalStatement)
    {
        return view('personal_statements.edit', compact('personalStatement'));
    }

    public function update(Request $request, PersonalStatement $personalStatement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $personalStatement->update($request->all());

        return redirect()->route('personal_statements.index')->with('success', 'Personal Statement updated successfully.');
    }

    public function destroy(PersonalStatement $personalStatement)
    {
        $personalStatement->delete();
        return redirect()->route('personal_statements.index')->with('success', 'Personal Statement deleted successfully.');
    }
}