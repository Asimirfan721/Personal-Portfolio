<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkedInController extends Controller
{
    public function index()
    {
        // Replace the URL below with your actual LinkedIn profile URL
        $linkedinUrl = 'https://www.linkedin.com/in/your-profile';

        return redirect()->away($linkedinUrl);
    }
}