<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class AdminBundleController extends Controller
{
    public function index()
    {
        $bundles = Bundle::all(); // Fetch all bundles
        return view('admin.bundles.index', compact('bundles'));
    }

    public function show($id)
    {
        $bundle = Bundle::findOrFail($id); // Fetch bundle by ID
        return view('shop.bundles.show', compact('bundle'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request status
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Find the bundle and update its approval status
        $bundle = Bundle::findOrFail($id);
        $bundle->update(['approval_status' => $request->status]);

        // Redirect to the bundles index page with a success message
        return redirect()->route('admin.bundles.index')
                         ->with('success', 'Bundle status updated successfully!');
    }

    public function showApprovedBundles()
    {
        // Retrieve only bundles with approval status as 'approved'
        $approvedBundles = Bundle::where('approval_status', 'approved')->get();

        // Return the view for displaying approved bundles in the shop
        return view('shop.bundles', compact('approvedBundles'));
    }
}
