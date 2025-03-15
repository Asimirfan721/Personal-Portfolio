<?php

// app/Http/Controllers/GitHubController.
namespace App\Http\Controllers; // namespace is defined 

use Illuminate\Http\Request; // Request class is imported
use App\Http\Controllers\Controller; // Controller class is imported

class GitHubController extends Controller // GitHubController class is defined and extends Controller class 
{
    public function index() // index method is defined
    {  
        // Fetch GitHu  b   URLfrom the environment file direct connects to the GitHub URL
        $githubUrl = config('services.github.url', 'https://github.com/Asimirfan721');

        return redirect()->away($githubUrl); // Redirects to the GitHub URL
    }
}
// app/Http/Controllers/GitHubController.php  