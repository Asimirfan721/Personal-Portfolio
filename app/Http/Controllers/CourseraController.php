<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseraFile;

class CourseraController extends Controller
{
    public function showButtons()
    {
        return view('buttons');
    }

    public function showCategory($category)
    {
        // Ensure the category is valid
        $validCategories = ['ai', 'cybersecurity', 'certifications'];
        if (!in_array($category, $validCategories)) {
            abort(404, 'Category not found');
        }

        return view('category', compact('category'));
    }

    public function showUploadForm($category)
    {
        // Ensure the category is valid
        $validCategories = ['ai', 'cs', 'certifications'];
        if (!in_array($category, $validCategories)) {
            abort(404, 'Category not found');
        }

        // Fetch all uploaded files for this category
        $files = CourseraFile::where('category', $category)->get();

        // Pass the category and files to the view
        return view('upload', compact('category', 'files'));
    }

    public function uploadFile(Request $request, $category)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('file')) {
            // Store the file
            $filePath = $request->file('file')->store('uploads/' . $category, 'public');

            // Save the file info to the database
            $courseraFile = new CourseraFile();
            $courseraFile->category = $category; // Use the category from the URL
            $courseraFile->file_path = $filePath;
            $courseraFile->description = $request->input('description');
            $courseraFile->save();

            return redirect()->back()->with('success', 'File uploaded successfully!');
        }

        return redirect()->route('coursera.uploadForm', ['category' => $category])->with('error', 'Failed to upload file.');
    }
    public function uploadBlade()
{
    // Logic for the uploadBlade method
    return view('upload');
}
}
