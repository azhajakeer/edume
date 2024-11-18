<?php
namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'bundleName' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'bundleImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'required|string',
            'categoryImages' => 'required|array',
            'categoryImages.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle Bundle Image upload
        $bundleImagePath = $request->file('bundleImage')->store('bundles', 'public');

        // Create a new bundle entry
        $bundle = Bundle::create([
            'bundle_name' => $request->bundleName,
            'description' => $request->description,
            'price' => $request->price,
            'bundle_image' => $bundleImagePath,
            'approval_status' => 'pending', // Set to 'pending' by default
        ]);

        // Handle Category Images
        foreach ($request->categories as $index => $categoryName) {
            $categoryImagePath = $request->file('categoryImages')[$index]->store('categories', 'public');

            // Create category for each bundle
            $bundle->categories()->create([
                'category' => $categoryName,
                'category_image' => $categoryImagePath,
            ]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Bundle created successfully!');
    }

    public function index()
{
    // Fetch only approved bundles
    $bundles = Bundle::where('approval_status', 'approved')->get();
    
    // Return the view with the fetched bundles
    return view('shop.bundles', compact('bundles'));

}


    // Display Approved Bundles
    public function approved()
    {
        // Fetch only approved bundles
        $approvedBundles = Bundle::where('approval_status', 'approved')->get();

        // Return a view with the approved bundles
        return view('admin.bundles.approved', compact('approvedBundles'));
    }

    // Method to show individual bundle details
    public function show($id)
    {
        // Find the bundle by its ID
        $bundle = Bundle::findOrFail($id);
    
        // Return a view with the bundle details
        return view('bundles.show', compact('bundle'));
    }

    // Update the approval status (Approve/Reject)
    public function updateStatus(Request $request, $id)
    {
        // Find the bundle by ID
        $bundle = Bundle::findOrFail($id);

        // Update the approval status
        if ($request->status == 'approved') {
            $bundle->approval_status = 'approved';
        } else {
            $bundle->approval_status = 'rejected';
        }

        // Save the updated status
        $bundle->save();

        // Redirect to the approved bundles page if approved, or back otherwise
        if ($bundle->approval_status == 'approved') {
            return redirect()->route('admin.bundles.approved')->with('success', 'Bundle approved successfully');
        }

        return redirect()->back()->with('success', 'Bundle status updated');
    }

    public function create()
{
    return view('sell-bundle'); // Replace 'bundles.create' with your actual view path
}

}
