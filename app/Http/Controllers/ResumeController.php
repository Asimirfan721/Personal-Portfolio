<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        
        $files = Storage::disk('public')->files('resume');
        $descriptions = json_decode(Storage::get('public/resume/descriptions.json') ?? '[]', true);

        return view('resume', compact('files', 'descriptions'));
    } 

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'required|string|max:255',
        ]);

         
        $path = $request->file('file')->store('resume', 'public');

        $descriptions = json_decode(Storage::get('public/resume/descriptions.json') ?? '[]', true);
        $descriptions[$path] = $request->description;
        Storage::put('public/resume/descriptions.json', json_encode($descriptions));

        return back()->with('success', 'File uploaded successfully.');
    }
}
