<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkedInController extends Controller
{
    public function index() 
    { 
        // Replace the URL below actual LinkedIn profile URL
        $linkedinUrl = 'https://www.linkedin.com/in/asim-irfan-aa49a31a1/';

        return redirect()->away($linkedinUrl); 
    }
}