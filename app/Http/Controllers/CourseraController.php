<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Category;

class CourseraController extends Controller
{
    public function showButtons()
    {
        return view('buttons');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $upload = new Upload();
            $upload->description = $request->input('description');
            $upload->image_path = '/storage/uploads/' . $fileName;
            $upload->category_id = $request->input('category_id');
            $upload->save();

            $category = $request->input('category');

            if ($category === 'AI') {
                return redirect()->route('coursera.ai')->with('success', 'File uploaded successfully!');
            } else if ($category === 'CS') {
                return redirect()->route('coursera.cs')->with('success', 'File uploaded successfully!');
            } else {
                return redirect()->route('coursera.general')->with('success', 'File uploaded successfully!');
            }
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

  public function uploadform()
{
   $uploads = Upload::whereHas('category', function ($query) {
    $query->where('name', 'AI');
})->get();
    $categories = Category::all(); // Fetch all categories
    return view('AI', compact('uploads', 'categories'));
}
    public function CS()
    {
        $uploads = Upload::where('category', 'CS')->get();
        return view('CS', compact('uploads'));
    }

    public function General()
    {
        $uploads = Upload::whereHas('category', function ($query) {
    $query->where('name', 'General');
})->get();
        return view('General', compact('uploads'));
    }

    public function showCategory($category)
    {
        if (!in_array($category, ['AI', 'CS', 'General'])) {
            abort(404);
        }

        $uploads = Upload::where('category', $category)->get();
        return view('category', compact('uploads', 'category'));
    }
}
