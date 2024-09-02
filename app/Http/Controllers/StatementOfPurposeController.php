<?php

// app/Http/Controllers/StatementOfPurposeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatementOfPurpose;
use Illuminate\Support\Facades\Auth;

class StatementOfPurposeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $statement = StatementOfPurpose::where('user_id', $userId)->first();
        return view('statement-of-purpose', ['statement' => $statement]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $userId = Auth::id();
        $statement = StatementOfPurpose::where('user_id', $userId)->first();

        if (!$statement) {
            $statement = new StatementOfPurpose();
            $statement->user_id = $userId;
        }

        $statement->content = $request->input('content');
        $statement->save();

        return redirect()->route('statement-of-purpose')->with('success', 'Statement of Purpose updated successfully!');
    }
}
