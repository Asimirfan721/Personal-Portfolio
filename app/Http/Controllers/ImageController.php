<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Show upload form
    public function uploadForm()
    {
        return view('images.upload');
    }

    // Handle image upload by category
    public function upload(Request $request, $category)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('image');
        $path = $file->store('images', 'public');

        $image = new Image();
        $image->path = $path;
        $image->category = $category;
        $image->save();

        return back()->with('success', 'Image uploaded successfully.');
    }

    // Display images by category
   public function showAIPage($category)
{
    $images = Image::where('category', $category)->get();
    return view('AI', compact('category', 'images'));
}

}
