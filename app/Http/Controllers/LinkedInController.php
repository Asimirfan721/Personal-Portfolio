<?php

namespace App\Http\Controllers; // namespace is defined 

use Illuminate\Http\Request;    // Request class is imported
use App\Http\Controllers\Controller; // Controller class is imported

class LinkedInController extends Controller // LinkedInController class is defined and extends Controller class
{
    public function index() //index method is defined
    {     
        // Replace the URL   below act linkedIn profile URL url of linkedin
        $linkedinUrl = 'https://www.linkedin.com/in/asim-irfan-aa49a31a1/';

        return redirect()->away($linkedinUrl);  // Redirects to the LinkedIn URL
    }
}