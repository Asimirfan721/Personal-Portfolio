<?php
// app/Http/Controllers/Web/AuthController.php

namespace App\Http\Controllers;

use App\Models\User; //model with name user is imported
use Illuminate\Http\Request; //request class is imported
use Illuminate\Support\Facades\Auth;//auth class is imported
use Illuminate\Support\Facades\Hash; //hash class is imported
use Illuminate\Support\Facades\Validator;//validator class is imported

class AuthController extends Controller //class AuthController is created which extends Controller class
{
     
    public function showRegisterForm() //showRegisterForm function is created
    {
        return view('auth.register'); // This is the view that will be returned when the showRegisterForm function is called
    }

    /**
     * Handle user registration.  
     *
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request) // register function is created, where request variable is used as a parameter 
    {
        $this->validateRegistration($request); // validateRegistration function is called with request varibale as a parameter

        // Create the user
        $user = User::create([ //user is created with the following fields
            'name' => $request->name, //name field is created with the value of name field from the request
            'email' => $request->email,//email field is created with the value of email field from the request
            'password' => Hash::make($request->password), //password field is created with the value of password field from the request
        ]);

        // Automatically log the user in after registration (optional)
        Auth::login($user); //user is logged in

        return redirect()->route('login')->with('success', 'Registration successful! Welcome aboard.'); //redirect to route login page with success message
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm() //showLoginForm function is created
    {
        return view('auth.login');   // This is the view that will be returned when the showLoginForm function is called
    }

    /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) //login function is created, where request variable is used as a parameter  
    {
        $this->validateLogin($request); // validateLogin function is called with request varibale as a parameter

        $credentials = $request->only('email', 'password');   //credentials is created with email and password fields from the request
 
        if (Auth::attempt($credentials)) {                   //if the credentials are correct
            // Regenerate session ID to prevent session fixation
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'You are now logged in!'); // redirect to home page with success message
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials provided.'])->withInput(); //if the credentials are incorrect return back with error message
    }

    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) // logout function is created, where request variable is used as a parameter
    {
        Auth::logout(); //user is logged out

        $request->session()->invalidate(); //session is invalidated
        $request->session()->regenerateToken(); //token is regenerated

        return redirect('/login')->with('success', 'You have successfully logged out.'); // redirect to login page with success message
    }

    /**
     * Validate the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateRegistration(Request $request) //validateRegistration function is created, where request variable is used as a parameter
    {
        $request->validate([ //request is validated with the following fields
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Validate  the   request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request) //validateLogin function is created, where request variable is used as a parameter
    {
        $request->validate([ //request is validated with the following fields
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
    }
}
