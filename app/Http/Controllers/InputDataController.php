<?php

// app/Http/Controllers/InputDataController.php
namespace App\Http\Controllers;

use App\Models\InputDataModel; // Import the InputDataModel
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        // Handle the image upload
        $imageName = null; // Initialize imageName
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Create a new menu item
        InputDataModel::create([ // Use the InputDataModel to create the item
            'image' => $imageName,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/input-data')->with('success', 'Item has been added successfully.');
    }
}
