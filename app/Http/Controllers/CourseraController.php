<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Category;

class CourseraController extends Controller
{
    // Show the upload form with all categories and uploaded files
    public function uploadform()
    {
        $categories = Category::all();
        $uploads = Upload::with('category')->latest()->get(); // eager load category relation

        return view('AI', compact('categories', 'uploads'));
    }

    // Handle file upload
    public function upload(Request $request)
    {

    
        $request->validate([
            'description' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('uploads', $fileName, 'public');

            Upload::create([
                'description' => $request->description,
                'image_path' => 'uploads/' . $fileName,
                'category_id' => $request->category_id,
            ]);

            return redirect()->back()->with('success', 'File uploaded successfully!');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

    // Optional: Category button view
    public function showButtons()
    {
        return view('buttons');
    }

    // Optional: Show uploads by category id dynamically (for filtered category views)
    public function showCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $uploads = Upload::with('category')
                         ->where('category_id', $category->id)
                         ->latest()
                         ->get();

        return view('category', compact('uploads', 'category'));
    }
}
