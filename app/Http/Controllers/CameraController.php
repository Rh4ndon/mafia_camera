<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $user = User::where('id', auth()->id())->get();
        $cameras = Camera::orderBy('brand')->get();
        return view('userhome', compact('cameras'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cameras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'brand' => 'required',
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            //'image' => 'required|mimes:jpeg,jpeg,png,jpg,gif,svg|max:40960',
        ]);
        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $incomingFields['image'] = $filename;
        }
    
        
        $incomingFields['user_id'] = auth()->id();
        

        Camera::create($incomingFields);
    
        return redirect('/dashboard')->with('success','Camera added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $cameras = Camera::orderBy('brand')->get();
        return view('home', ['cameras' => $cameras]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $camera = Camera::findOrFail($id);
        return view('edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCamera(Request $request, string $id)
    {
        $camera = Camera::findOrFail($id);

        $incomingFields = $request->validate([
            'brand' => 'required',
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $incomingFields['image'] = $filename;
        }

        $camera->update($incomingFields);
        return redirect('/dashboard')->with('success','Camera updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $camera = Camera::findOrFail($id);
        $camera->delete();
        
        return redirect('/dashboard')->with('success','Camera deleted successfully.');
        
    }


    /**
     * Add items to cart.
     */
    public function add(Request $request)
    {
        $incomingFields = $request->validate([
            'cam_id' => 'required',
            'brand' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'user_name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
           
        
        $incomingFields['user_id'] = auth()->id();
        

        Cart::create($incomingFields);
    
        return redirect('/userdashboard')->with('success','Camera added successfully.');
    }


    /**
     * Display a cart.
     */
    public function showCart()
    {
        $user = User::where('id', auth()->id())->get();
        $carts = Cart::where('user_id', auth()->id())->get();
        return view('usercart', ['carts' => $carts], ['user' => $user]);
    }

     /**
     * Buy the specified resource in storage.
     */
    public function buyCamera(Request $request, string $id)
    {
        $cart = Cart::findOrFail($id);
       
        $incomingFields = $request->validate([
            'cam_id' => 'required',
            'brand' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'user_name' => 'required',
            'image' => 'required',
            'status' => 'required',
            
        ]);
        $cam_id = $incomingFields['cam_id'];
        $less = $incomingFields['quantity'];

        $quantity = Camera::where('id', $cam_id)->value('quantity');
        $new_quantity = $quantity - $less;

        Camera::where('id', $cam_id)->update(['quantity' => $new_quantity]);

        $cart->update($incomingFields);
        
        return redirect('/userdashboard')->with('success','Camera bought successfully.');
    }


    /**
     * Sold Items.
     */
    public function soldCam()
    {
        $user = User::where('id', auth()->id())->get();
        $carts = Cart::orderBy('updated_at')->get();
        return view('adminsold', ['carts' => $carts], ['user' => $user]);
    }


}

?>