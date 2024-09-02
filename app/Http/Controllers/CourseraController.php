<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CourseraController extends Controller
{
    public function index()
    {
        // This method shows the main page with AI, Cybersecurity, and Certification buttons
        return view('coursera.index');
    }

    public function showCategory($category)
    {
        // Ensure the category is valid
        $validCategories = ['ai', 'cybersecurity', 'certifications'];
        if (!in_array($category, $validCategories)) {
            abort(404, 'Category not found');
        }
    
        // Define paths for uploaded file and description
        $filePath = 'uploads/' . $category . '/file';
        $descriptionPath = 'uploads/' . $category . '/description.txt';
    
        // Check if the file exists and get the file path
        $uploadedFilePath = file_exists(public_path($filePath)) ? $filePath : null;
    
        // Read the description if it exists
        $description = file_exists(public_path($descriptionPath)) ? file_get_contents(public_path($descriptionPath)) : '';
    
        return view('coursera.category', [
            'category' => $category,
            'filePath' => $uploadedFilePath,
            'description' => $description
        ]);
    }
    
    public function upload(Request $request, $category)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        // Define upload path
        $path = 'uploads/' . $category;

        // Save the uploaded file
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path($path), $fileName);

        // Save the description to a file
        $description = $request->input('description');
        file_put_contents(public_path($path . '/description.txt'), $description);

        return redirect()->route('coursera.category', ['category' => $category])->with('success', 'File and description uploaded successfully.');
    }

    public function showUploadForm($category)
    {
     
        // Ensure the category is valid
        $validCategories = ['ai', 'cybersecurity', 'certifications'];
        if (!in_array($category, $validCategories)) {
            abort(404, 'Category not found');
        }

        // Define paths for the uploaded file and description
        $filePath = 'uploads/' . $category . '/file';
        $descriptionPath = 'uploads/' . $category . '/description.txt';

        // Read the description if it exists
        $description = file_exists(public_path($descriptionPath)) ? file_get_contents(public_path($descriptionPath)) : '';

        return view('upload', [
            'category' => $category,
            'filePath' => file_exists(public_path($filePath)) ? $filePath : null,
            'description' => $description
        ]);
    }

    public function uploadFile(Request $request, $category)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        $fileName = 'file.' . $request->file('file')->getClientOriginalExtension();

        // Move the uploaded file to the specified directory
        $request->file('file')->move(public_path('uploads/' . $category), $fileName);

        // Save description to a file
        $description = $request->input('description');
        file_put_contents(public_path('uploads/' . $category . '/description.txt'), $description);

        return redirect()->route('course.upload', ['category' => $category])->with('success', 'File and description uploaded successfully.');
    }

}
