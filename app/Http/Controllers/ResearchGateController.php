<?php

// app/Http/Controllers/Researc hGateController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchGateController extends Controller
{
    public function index()
    {
        
        $researchGateUrl = 'https://www.researchgate.net/profile/Asim-Irfan';
 
        return redirect()->away($researchGateUrl);
    }
}