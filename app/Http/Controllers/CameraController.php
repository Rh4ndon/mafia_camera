<?php

namespace App\Http\Controllers;

use App\Models\Camera;
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
        $cameras = Camera::all();
        return view('userhome', compact('cameras'));
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
        $cameras = Camera::all();
        return view('home', ['cameras' => $cameras]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $camera = Camera::findOrFail($id);
        return view('cameras.edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $camera = Camera::findOrFail($id);

        $incomingFields = $request->validate([
            'brand' => 'required',
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $incomingFields['image'] = Storage::putFile('public/images', $image);
        }

        $camera->update($incomingFields);
    
        return redirect()->route('cameras.home')->with('success','Camera updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $camera = Camera::findOrFail($id);
        $camera->delete();
    
        return redirect()->route('cameras.home')->with('success','Camera deleted successfully.');
    }
}

?>