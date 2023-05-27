<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registerForm(){
        return view('user.registration');
    }
    public function saveRegistration(Request $request)
    {
        $regField = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:attendee,organizer' // Add validation for the role field
        ]);

        $regField['password'] = bcrypt($regField['password']);
        $regField['role'] = $request->input('role'); // Assign the role from the request to the regField array
        //dd($regField);
        $user = User::create($regField);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in successfully!');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','you have been logged out');
    }

    public function showLoginPage(){
        return view('user.loginPage');
    }
    public function userLogin(Request $request){
        $loginField=$request->validate([
            'email'=>['required','email'],
            'password'=>'required',
        ]);
        if(auth()->attempt($loginField)){
            $request->session()->regenerate();
            return redirect('/')->with('message','you are logged in');
        }
        return back()->withErrors(['email'=>'Invalid Credential']);
    }
}
