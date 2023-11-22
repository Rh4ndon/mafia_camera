<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'role_as' => 'required',
            'password' => 'required_with:pswd-repeat',
        ]);
       
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user= User::create($incomingFields);
        auth()->login($user);
        
        return redirect('/userdashboard')->with(['status',  'Successfully Registered']);

        
       
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($incomingFields)) {
            
            if (Auth::user()->role_as == '0'){
                return redirect('/dashboard');
            }elseif(Auth::user()->role_as == '1') {
                return redirect('/userdashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    
}
