<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.register');
    }

    // create new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required| confirmed | min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);
        // Login User
        auth()->login($user);
      return  redirect('/')->with('message', 'User created & Logged in');
    }
    
      // logout
      public function logout(Request $request)
    
      {
          
          auth()->logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();
          return redirect('/')->with('message', 'Logout successfully');
      }

      // login
        public function login(Request $request)
        {
            return view('users.login');
        }

    // Log in user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            return redirect('/')->with('message', 'Login successfully');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

}