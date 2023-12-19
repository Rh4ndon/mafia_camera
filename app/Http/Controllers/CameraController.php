<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use id;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        

        // Start a new session or resume an existing one
        session()->start();
        
        $user = auth()->id();
        
        // Store data in the session
        session()->put('user_id', $user);
    
        // Retrieve data from the session
        $userId = session()->get('user_id');
    
        // Check if a value exists in the session
        if (session()->has('user_id')) {
        $user = User::where('id', auth()->id())->get();
        $cameras = Camera::orderBy('brand')->get();
        return view('userhome', compact('cameras'), ['user' => $user]);
    }
        else {
            return redirect('/');
        }
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
        $user = auth()->id();

        // Start a new session or resume an existing one
        session()->start();
    
        // Store data in the session
        session()->put('user_id', $user);
    
        // Retrieve data from the session
        $userId = session()->get('user_id');
    
        // Check if a value exists in the session
        if (session()->has('user_id')) {
            $cameras = Camera::orderBy('brand')->get();
            return view('home', ['cameras' => $cameras]);
        }else {
            return redirect('/');
        }
    
        

        
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
            'address' => 'required',
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
        $user = auth()->id();

        // Start a new session or resume an existing one
        session()->start();
    
        // Store data in the session
        session()->put('user_id', $user);
    
        // Retrieve data from the session
        $userId = session()->get('user_id');
    
        // Check if a value exists in the session
        if (session()->has('user_id')) {


            $total = Cart::where([['user_id', $userId],['status', 'added']])->sum(Cart::raw('quantity * price'));
            $user = User::where('id', $userId)->get();
            $carts = Cart::where('user_id', $userId)->get();
            return view('usercart', ['carts' => $carts, 'user' => $user, 'total' => $total]);








        }else {
            return redirect('/');
        }
        
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
        
        return redirect('/usercart')->with('success','Camera bought successfully.');
    }


    /**
     * Sold Items.
     */
    public function soldCam()
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
            $user = User::where('id', auth()->id())->get();
            $carts = Cart::orderBy('updated_at')->get();
            return view('adminsold', ['carts' => $carts], ['user' => $user]);
        }else {
            return redirect('/');
        }
        
    }


    /**
     * Display a order status.
     */
    public function orders()
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


            $total = Cart::where([['user_id', $userId],['status', 'sold']])->sum(Cart::raw('quantity * price'));
            $user = User::where('id', $userId)->get();

            $carts = Cart::where('user_id', $userId)
                ->where(function ($query) {
                    $query->where('status', 'sold')
                          ->orWhere('status', 'delivered');
                })
                ->get();
                
            return view('userorders', ['carts' => $carts, 'user' => $user, 'total' => $total]);








        }else {
            return redirect('/');
        }
        
    }

    public function deliverCamera(Request $request, string $id)
    {
        $cart = Cart::findOrFail($id);
       
        $incomingFields = $request->validate([
            'cart_id' => 'required',

            
        ]);

        $cart_id = $incomingFields['cart_id'];
  

        $new_stat = 'delivered';

        Cart::where('id', $cart_id)->update(['status' => $new_stat]);

        
        return redirect('/sold-camera')->with('success','Camera bought successfully.');
    }


    /**
     * Checkout all resource in storage.
     */
    public function checkoutCamera(Request $request)
    {
        
       
        $cart_ids = (array) $request->input('cart_id');
        $cam_ids = (array) $request->input('cam_id');
        $quantities = (array) $request->input('quantity');
        
        
        foreach ($cart_ids as $index => $cart_id) {
            Cart::where('id', $cart_id)->update(['status' => 'sold']);
            $total_quantity = Camera::where('id', $cam_ids[$index])->value('quantity');
            $new_quantity = $total_quantity - $quantities[$index];
            Camera::where('id', $cam_ids[$index])->update(['quantity' => $new_quantity]);
        }
        
        return redirect('/usercart')->with('success','Camera bought successfully.');
    

}


}

?>