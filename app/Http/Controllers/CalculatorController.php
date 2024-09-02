<?php

// app/Http/Controllers/CalculatorController.php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function show()
    {
        return view('calculation');
    }
 
    public function calculate(Request $request)        
    {
        $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|string|in:add,subtract,multiply,divide',
        ]);

        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');

        switch ($operation) {
            case 'add':
                $result = $number1 + $number2;
                break;
            case 'subtract':
                $result = $number1 - $number2;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                break;
            case 'divide':
                if ($number2 == 0) {
                    return redirect()->back()->withErrors(['number2' => 'Division by zero is not allowed.']);
                }
                $result = $number1 / $number2;
                break;
            default:
                $result = null;
        }
 
        return view('calculation', compact('result', 'number1', 'number2', 'operation'));
}}