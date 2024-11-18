<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class ShopBundleController extends Controller
{
    public function index()
    {
        // Fetch only approved bundles
        $approvedBundles = Bundle::where('status', 'approved')->get();

        // Return the view and pass the approved bundles
        return view('shopbundle', compact('approvedBundles'));
    }
}

