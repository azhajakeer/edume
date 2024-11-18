<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Method to display the product creation form
    public function create()
    {
        // Define categories for the dropdown
        $categories = ['Electronics', 'Books', 'Clothing', 'Furniture', 'Toys'];

        // Fetch approved products for the specific user
        $approvedProducts = Product::where('user_id', Auth::id())
                                   ->where('is_approved', true)
                                   ->get();

        // Pass categories and approved products to the view
        return view('seller', compact('categories', 'approvedProducts'));
    }

    // Store the new product
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Create new product with user_id field
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $imagePath ?? null,
            'category' => $request->category,
            'status' => 'pending', // Default status before approval
            'user_id' => Auth::id(), // Set user_id from authenticated user
        ]);

        return redirect()->route('seller')->with('success', 'Product added successfully');
    }

    // Method to display all products in the admin dashboard
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Return the admin dashboard view with the products data
        return view('admin.dashboard', compact('products'));
    }

    // Approve a product
    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->is_approved = true;
        $product->save();

        return redirect()->back()->with('success', 'Product approved successfully.');
    }

    // Reject a product
    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->is_approved = false;
        $product->save();

        return redirect()->back()->with('success', 'Product rejected successfully.');
    }

    // Show all approved products for the logged-in user
    public function showApprovedProducts()
    {
        // Fetch products that are approved and belong to the logged-in user
        $approvedProducts = Product::where('user_id', Auth::id())
                                   ->where('is_approved', true)
                                   ->get();

        // Return the view with the approved products for the user
        return view('productlisting', compact('approvedProducts'));
    }

    // Edit product
    public function edit($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Pass the product data to the edit view
        return view('product.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category = $request->input('category');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image_path = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
    }

    // List approved products and filter by category
    public function listApprovedProducts(Request $request)
    {
        // Define categories for the dropdown
        $categories = ['Electronics', 'Books', 'Clothing', 'Furniture', 'Toys'];
        
        // Get the selected category from the request
        $selectedCategory = $request->input('category');
        
        // Fetch approved products and apply filtering if a category is selected
        $approvedProducts = Product::where('is_approved', true)
            ->when($selectedCategory, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->get();

        // Pass approved products, categories, and selected category to the view
        return view('productlisting', compact('approvedProducts', 'categories', 'selectedCategory'));
    }

    public function filterApprovedProducts(Request $request)
    {
        // Define categories for the dropdown
        $categories = ['Electronics', 'Books', 'Clothing', 'Furniture', 'Toys'];
        
        // Get the selected category from the request
        $selectedCategory = $request->input('category');
        
        // Fetch approved products filtered by the selected category, if any
        $approvedProducts = Product::where('is_approved', true)
            ->when($selectedCategory, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->get();

        // Pass the categories, selected category, and products to the view
        return view('productlisting', compact('approvedProducts', 'categories', 'selectedCategory'));
    }


    public function destroy($id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Delete the product
    $product->delete();

    // Flash a success message to the session
    return redirect()->route('seller')->with('success', 'Product deleted successfully');
}

// In ProductController.php
public function show($id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Return the 'product.show' view with the product data
    return view('product.show', compact('product'));
}


}


