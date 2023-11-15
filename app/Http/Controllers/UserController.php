<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required_with:pswd-repeat',
        ]);
       
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user= User::create($incomingFields);
        auth()->login($user);
        return redirect('/dashboard');
       
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($incomingFields)) {
            return redirect('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    
}
