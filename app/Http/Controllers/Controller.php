<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index() // index is defined here 
    {
        return view('home'); // view is called here
    }
}     
     