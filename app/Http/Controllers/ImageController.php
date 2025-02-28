<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function uploadForm()
{  
    $images = Image::all();
    return view('upload', compact('images'));
}
    public function upload(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('uploads', $imageName, 'public');

            // Save to Database
            Image::create(['image_path' => 'storage/uploads/' . $imageName]);

            return redirect()->back()->with('success', 'Image Uploaded Successfully!');
        }

        return redirect()->back()->with('error', 'Image Upload Failed.');
    }
}

        