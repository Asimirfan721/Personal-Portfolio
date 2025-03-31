<?php

// app/Http/Controllers/HomeControl ler

namespace App\Http\Controllers; // namespace is defined
    
use Illuminate\Http\Request; // Request class is imported 
use App\Http\Controllers\Controller; // Controller class is imported

class HomeController extends Controller // HomeController class is defined and extends Controller class
{   
    public function index() // index method is defined
    {// Return the home view
        return view('home'); // view is called with name home  // this code is working fine
    }  
}    // complete
   