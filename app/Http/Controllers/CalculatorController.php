<?php

// app/Http/Controllers/CalculatorController.php

namespace App\Http\Controllers; // Define the namespace

use Illuminate\Http\Request; // Import the Request class

class CalculatorController extends Controller // Define the class  CalculatorController and extend it from Controller
{
    /**   
     * Display the calculator form.   
     * 
     * @return \Illuminate\View\View
     */
    public function show() // Define the show method
    {
        return view('calculation'); // Return the calculation view
    }

    /**
     * Perform the requested calculation and return the result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function calculate(Request $request) // Define the calculate method with request as a variable parameter
    {
        // Validate input fields
        $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|string|in:add,subtract,multiply,divide',
        ]);

        // Extract validated input
        $number1 = $request->input('number1'); // Extract the number1 input
        $number2 = $request->input('number2'); // Extract the number2 input
        $operation = $request->input('operation'); // Extract the operation input

        // Perform calculation
        $result = $this->performCalculation($number1, $number2, $operation); // Call the performCalculation method and store it in the result variable

        // If division by zero occurs, redirect with error
        if ($result === null) {
            return redirect()
                ->back()
                ->withErrors(['number2' => 'Division by zero is not allowed.'])
                ->withInput();
        }

        // Return  the result to the view
        return view('calculation', compact('result', 'number1', 'number2', 'operation')); // Return the calculation view with the result, number1, number2, and operation
    }

    /**
     * Perform the calculation based on the operation. very 
     *
     * @param  float|int  $number1
     * @param  float|int  $number2
     * @param  string     $operation
     * @return float|int|null
     */
    private function performCalculation($number1, $number2, $operation) // Define the performCalculation method
    {
        switch ($operation) {
            case 'add':
                return $number1 + $number2;
            case 'subtract':
                return $number1 - $number2;
            case 'multiply':
                return $number1 * $number2;
            case 'divide':
                return $number2 != 0 ? $number1 / $number2 : null; // Check if number2 is not equal to zero and perform the division
            default:
                return null;
        }
    }
}
