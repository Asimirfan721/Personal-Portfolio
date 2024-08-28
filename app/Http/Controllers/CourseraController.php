<?php

namespace App\Http\Controllers;
// app/Http/Controllers/CourseraController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseraController extends Controller
{
    public function index()
    {
        // Replace the URL below with your actual Coursera profile or course URL
        $courseraUrl = 'https://www.coursera.org/instructor/your-profile';

        return redirect()->away($courseraUrl);
    }
}
