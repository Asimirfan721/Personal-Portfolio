<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\CourseraFile;

class CourseraController extends Controller
{
    public function showButtons()
    {
        return view('buttons');
    }

    // public function showCategory($category)
    // {
    //     // Ensure the category is valid
    //     $validCategories = ['ai', 'cybersecurity', 'certifications'];
    //     if (!in_array($category, $validCategories)) {
    //         abort(404, 'Category not found');
    //     }

    //     return view('category', compact('category'));
    // }

//     public function showUploadForm($category)
// {
//     // Ensure the category is valid
//     $validCategories = ['ai', 'cs', 'certifications'];
//     if (!in_array($category, $validCategories)) {
//         abort(404, 'Category not found');
//     }

//     // Fetch all uploaded files for this category
//     $files = CourseraFile::where('category', $category)->get();

//     // Pass the category and files to the view
//     return view('upload', compact('category', 'files'));
// }

    // public function uploadFile(Request $request, $category)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
    //         'description' => 'nullable|string|max:500',
    //         'category' => 'required|string'
    //     ]);

    //     if ($request->hasFile('file')) {
    //         // Store the file
    //         $filePath = $request->file('file')->store('uploads/' . $category, 'public');
    //         $categoryRecord = \App\Models\Category::where('category', $category)->first();

    //         // If the category doesn't exist, create a new record
    //         if (!$categoryRecord) {
    //             $categoryRecord = new \App\Models\Category();
    //             $categoryRecord->category = $category;
    //         }
    
    //         // Update the category record with the file information
    //         $categoryRecord->file_path = $filePath;
    //         $categoryRecord->description = $request->input('description');
    //         $categoryRecord->save();  // Save the updated record
            
    //         return redirect()->back()->with('success', 'File uploaded successfully!');
    //     }

    //     return redirect()->route('coursera.uploadForm', ['category' => $category])->with('error', 'Failed to upload file.');
    // }

//    public function uploadBlade()
// {

//     // Logic for the uploadBlade method
//     return view('upload');
// }
public function upload(Request $request)
{
    //return view('home');
    // Validate the incoming request data
    $request->validate([
        'description' => 'required|string|max:255',
        'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048', // Update mimes as per file types allowed
    ]);

    // Handle file upload
    if ($request->hasFile('file')) {
        // Generate a unique file name
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();

        // Store file in the 'uploads' directory in public storage
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $upload = new Upload();
        $upload->description = $request->input('description');
        $upload->image_path =  '/storage/' . $filePath; // Save file path
        $upload->category = $request->input('category'); // Save the category
        $upload->save();
       
        $upload = Upload::where('category', $request->input('category'))->get();

        return back()->with('success', 'File uploaded successfully!');
    }

    // Return an error message if file upload fails
    return back()->with('error', 'File upload failed.');
}
public function uploadform(){
    $uploads = Upload::where('category', 'AI')->get(); 
    
    // Pass the uploads to the view
    return view('AI', compact('uploads'));
}

public function CS(){
    $uploads = Upload::where('category', 'CS')->get(); 

    return view('CS', compact('uploads'));
}
public function General(){
    $uploads = Upload::where('category', 'General')->get(); 

    return view('General', compact('uploads'));
}

}
