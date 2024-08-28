<?php

// app/Http/Controllers/ResearchGateController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchGateController extends Controller
{
    public function index()
    {
        // Replace the URL below with your actual ResearchGate profile URL
        $researchGateUrl = 'https://www.researchgate.net';

        return redirect()->away($researchGateUrl);
    }
}