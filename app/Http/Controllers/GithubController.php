<?php

// app/Http/Controllers/GitHubController.
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    public function index()
    {
        // Fetch GitHu b URLfrom the environment file
        $githubUrl = config('services.github.url', 'https://github.com/Asimirfan721');

        return redirect()->away($githubUrl);
    }
}
