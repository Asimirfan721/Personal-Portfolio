<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index() // index is defined
    {
        return view('home'); // view
    }
}
   