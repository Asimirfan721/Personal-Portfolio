<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Personalusercontroller extends Controller
{
    public function index()
    {
        return view('personaluser'); // view is called here
    }
}
