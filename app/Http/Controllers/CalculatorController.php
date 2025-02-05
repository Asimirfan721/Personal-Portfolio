<?php

// app/Http/Controllers/CalculatorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display the calculator form.
     * 
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('calculation');
    }

    /**
     * Perform the requested calculation and return the result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function calculate(Request $request)
    {
        // Validate input fields
        $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|string|in:add,subtract,multiply,divide',
        ]);

        // Extract validated input
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');

        // Perform calculation
        $result = $this->performCalculation($number1, $number2, $operation);

        // If division by zero occurs, redirect with error
        if ($result === null) {
            return redirect()
                ->back()
                ->withErrors(['number2' => 'Division by zero is not allowed.'])
                ->withInput();
        }

        // Return the result to the view
        return view('calculation', compact('result', 'number1', 'number2', 'operation'));
    }

    /**
     * Perform the calculation based on the operation.
     *
     * @param  float|int  $number1
     * @param  float|int  $number2
     * @param  string     $operation
     * @return float|int|null
     */
    private function performCalculation($number1, $number2, $operation)
    {
        switch ($operation) {
            case 'add':
                return $number1 + $number2;
            case 'subtract':
                return $number1 - $number2;
            case 'multiply':
                return $number1 * $number2;
            case 'divide':
                return $number2 != 0 ? $number1 / $number2 : null;
            default:
                return null;
        }
    }
}
