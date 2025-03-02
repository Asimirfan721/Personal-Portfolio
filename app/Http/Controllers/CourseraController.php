<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
 
class CourseraController extends Controller
{
    
    public function showButtons()
    {
        return view('buttons');
    }
 
public function upload(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'description' => 'required|string|max:255',
        'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
        'category' => 'required|string|in:AI,CS,General', // Validate the category
    ]);

    // Check if file is uploaded
    if ($request->hasFile('file')) {
        // Generate a unique file name
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();

        // Store the file in the 'uploads' directory in public storage
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        // Save the upload information in the database
        $upload = new Upload();
        $upload->description = $request->input('description');
        $upload->image_path = '/storage/uploads/' . $fileName; // Correct path for public storage
        $upload->category = $request->input('category');
        $upload->save();

        // Redirect to the correct category view  
        $category = $request->input('category');

        if ($category === 'AI') {
            return redirect()->route('coursera.ai')->with('success', 'File uploaded successfully!');
        } else if ($category === 'CS') {
            return redirect()->route('coursera.cs')->with('success', 'File uploaded successfully!');
        } else {
            return redirect()->route('coursera.general')->with('success', 'File uploaded successfully!');
        }
    }

    // Return an error message if file upload fails
    return redirect()->back()->with('error', 'File upload failed.');
}

     /**
     * Show uploads for   the 'AI' category.
     *
     * @return \Illuminate\View\View
     */
    public function uploadform()
    {
        $uploads = Upload::where('category', 'AI')->get();
        return view('AI', compact('uploads'));
    }

    /**
     * Show uploads for the 'CS' category.
     *
     * @return \Illuminate\View\View
     */
    public function CS()
    {
        $uploads = Upload::where('category', 'CS')->get();
        return view('CS', compact('uploads'));
    }

    /**
     * Show uploads for the 'General' category.
     *
     * @return \Illuminate\View\View
     */
    public function General()
    {
        $uploads = Upload::where('category', 'General')->get();
        return view('General', compact('uploads'));
    }
    public function showCategory($category)
{
    // Validate category to prevent invalid input
    if (!in_array($category, ['AI', 'CS', 'General'])) {
        abort(404); // Return 404 if category is not valid
    }

    // Fetch uploads for the given category
    $uploads = Upload::where('category', $category)->get();
    
    // Return the correct view with the uploads
    return view('category', compact('uploads', 'category'));
} 
}
