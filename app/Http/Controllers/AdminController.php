<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    // Fetch products that are pending approval
    $products = Product::where('status', 'pending')->get();
    return view('admin.dashboard', compact('products'));  // Pass products to the view
}
public function approve($id)
{
    $product = Product::findOrFail($id);
    $product->status = 'approved';  // Change status to 'approved'
    $product->save();

    return redirect()->route('admin.dashboard')->with('success', 'Product approved!');
}

    
}

