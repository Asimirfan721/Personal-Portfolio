<?php

namespace App\Http\Controllers; // namespace is defined

use Illuminate\Http\Request; // Request is imported
use App\Models\Upload;       // model is imported 
 
class CourseraController extends Controller // courseraController is defined extends controller
{
    
    public function showButtons()   // showButtons function is defined
    {
        return view('buttons');  // view is called with the name of buttons
    }
 
public function upload(Request $request)   // upload function is defined with request parameter
{
    // Validate the incoming request data
    $request->validate([
        'description' => 'required|string|max:255',
        'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
        'category' => 'required|string|in:AI,CS,General', // Validate the category
    ]);

    // Check if file is uploaded
    if ($request->hasFile('file')) { // Check if the file is uploaded
        // Generate a unique file name
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();// generate a unique file name, time() is used to get the current time, '_' is used to concatenate the time with the original file name, getOriginalClientName() is used to get the original name of the file

        // Store the file in the 'uploads' directory in public storage
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public'); //$filepath is used to store the file in the uploads directory in public storage, storeAs() is used to store the file with the given name, 'public' is used to specify the disk

        // Save the upload information in the database
        $upload = new Upload(); // Create a new Upload instance
        $upload->description = $request->input('description'); // Set the description field of the upload instance to the description input from the request object 
        $upload->image_path = '/storage/uploads/' . $fileName; // Correct path for public storage
        $upload->category = $request->input('category'); // Set the category field of the upload instance to the category input from the request object
        $upload->save(); // Save the upload instance to the database

        // Redirect to the correct category view  with success message
        $category = $request->input('category'); // Get the category from the request object

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
