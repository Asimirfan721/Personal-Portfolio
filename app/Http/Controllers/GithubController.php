<?php

// app/Http/Controllers/GitHubController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    public function index()
    {
        // Replace the URL below with your actual GitHub profile URL
        $githubUrl = 'https://github.com/your-profile';

        return redirect()->away($githubUrl);
    }
}