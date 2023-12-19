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
            'address' => 'required',
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

        return back()->withErrors(['failed' => 'Invalid login credentials!']);
    }

    public function logout(){
        
        auth()->logout();
        // Destroy the session
        session()->flush();
        return redirect('/');
    }


    
    /**
     * Show the form for editing the specified resource.
     */
    public function editUser()
    {
        $user = auth()->id();

        // Start a new session or resume an existing one
        session()->start();
    
        // Store data in the session
        session()->put('user_id', $user);
    
        // Retrieve data from the session
        $userId = session()->get('user_id');
    
        // Check if a value exists in the session
        if (session()->has('user_id')) {

        
            $user = User::where('id', $userId)->get();
          
            return view('useredit', ['user' => $user]);

        }else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
       

        $user->update($incomingFields);
        return redirect('/userdashboard')->with('success','User updated successfully.');
    }

 

    
}
