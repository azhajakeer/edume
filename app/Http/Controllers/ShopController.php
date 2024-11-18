<?php

// app/Http/Controllers/ShopController.php
namespace App\Http\Controllers;

use App\Models\Bundle; // Import your Bundle model
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showBundles()
    {
        // Retrieve bundles from the database
        $bundles = Bundle::all(); // Or use other query methods as needed

        // Pass the bundles variable to the view
        return view('shop.bundles', compact('bundles'));
    }
}
