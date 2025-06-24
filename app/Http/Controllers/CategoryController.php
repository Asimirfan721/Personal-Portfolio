<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name|max:100',
        ]);

        Category::create([
            'name' => ucfirst(strtolower($request->name)),
        ]);

        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }
}