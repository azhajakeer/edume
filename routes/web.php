<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

// Basic view routes
Route::get('/', function () {
    return view('home');
});



Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/doner', function () {
    return view('doner');
})->name('doner');

// Authenticated routes (only accessible to authenticated users)


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        // Check if the authenticated user has the admin role
        if (Auth::user()->role !== 'admin') {
            // If not an admin, redirect to the unauthorized page
            return redirect()->route('home');
        }

        return view('admin.dashboard'); // Only accessible for admins
    })->name('admin.dashboard');
});

// Unauthorized Route - Custom page for non-admin users
Route::get('/home', function () {
    return view('home'); // Show an "Unauthorized" message
})->name('home');

// Customer Dashboard Route - Accessible by all authenticated users (customers and admins)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard1'); // Accessible by any authenticated user (customer or admin)
    })->name('dashboard');

    
   

// Admin routes protected by middleware
Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');
});

// // Customer routes
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard1'); // Customer dashboard view
//     })->name('dashboard');


Route::get('/admin/dashboard', function () {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        // Redirect non-admin users
        return redirect()->route('home');
    }
    // Call the ProductController's index method or load the admin dashboard
    return app(\App\Http\Controllers\ProductController::class)->index();
})->name('admin.dashboard');

// Route for approving a product
Route::post('/admin/product/approve/{id}', function ($id) {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        // Redirect non-admin users
        return redirect()->route('home');
    }
    // Call the ProductController's approve method
    return app(\App\Http\Controllers\ProductController::class)->approve($id);
})->name('product.approve');

// Route for rejecting a product
Route::post('/admin/product/reject/{id}', function ($id) {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        // Redirect non-admin users
        return redirect()->route('home');
    }
    // Call the ProductController's reject method
    return app(\App\Http\Controllers\ProductController::class)->reject($id);
})->name('product.reject');

// Unauthorized route
Route::get('/home', function () {
    return response()->view('home', [], 403); // Custom unauthorized page
})->name('home');


    // Seller routes for creating and storing products
    Route::get('/seller', [ProductController::class, 'create'])->name('seller');
    Route::post('/seller', [ProductController::class, 'store'])->name('seller.store');

    // Show approved products for the logged-in user
    Route::get('/approved-products', [ProductController::class, 'showApprovedProducts'])->name('approved.products');
    
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // Admin routes for managing products
// Route::middleware(['auth'])->group(function () {
//     // Display all products in the admin dashboard
//     Route::get('/admin/dashboard', [ProductController::class, 'index'])->name('admin.dashboard');

//     // Routes for approving and rejecting products in the admin dashboard
//     Route::post('/admin/product/approve/{id}', [ProductController::class, 'approve'])->name('product.approve');
//     Route::post('/admin/product/reject/{id}', [ProductController::class, 'reject'])->name('product.reject');
// });

// View route for the product listing page (can be used by both admin and users)
Route::get('/productlisting', function () {
    return view('productlisting');
})->name('productlisting');

// Additional routes for product approval/rejection
Route::post('/products/{id}/approve', [ProductController::class, 'approve'])->name('product.approve');
Route::post('/products/{id}/reject', [ProductController::class, 'reject'])->name('product.reject');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
// routes/web.php
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');


// routes/web.php

// In routes/web.php

Route::get('/productlisting', [ProductController::class, 'listApprovedProducts'])->name('productlisting');


// In routes/web.php

// Route::get('/products/approved', [ProductController::class, 'listApprovedProducts'])->name('products.approved');
Route::get('/approved-products/filter', [ProductController::class, 'filterApprovedProducts'])->name('approved.products.filter');
Route::get('/products/filter', [ProductController::class, 'filterApprovedProducts'])->name('products.filter');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');



use App\Http\Controllers\BundleController;

Route::get('/sell-bundle', function () {
    return view('sell-bundle');
});
// Route::get('/sell-bundle', [BundleController::class, 'create'])->name('bundle.create');

Route::post('/bundle/store', [BundleController::class, 'store'])->name('bundle.store');



Route::get('/bundle/create', function () {
    return view('bundle.create');
})->name('bundle.create');

Route::post('/bundle/store', [BundleController::class, 'store'])->name('bundle.store');

Route::get('/shopbundle', [BundleController::class, 'index'])->name('shopbundle.index');



use App\Http\Controllers\AdminBundleController;
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/bundles', [AdminBundleController::class, 'index'])->name('admin.bundles.index');
    Route::post('/bundles/{id}/update-status', [AdminBundleController::class, 'updateStatus'])->name('admin.bundles.updateStatus');
});

Route::resource('admin/bundles', AdminBundleController::class);
Route::resource('bundles', BundleController::class);

Route::get('admin/bundles', [AdminBundleController::class, 'index'])->name('admin.bundles.index');

// In routes/web.php
Route::get('/bundle/{id}', [BundleController::class, 'show'])->name('bundle.show');
// In routes/web.php
Route::put('/admin/bundles/{id}/update-status', [AdminBundleController::class, 'updateStatus'])->name('admin.bundles.updateStatus');

// In routes/web.php





// Shop Routes
Route::get('/shop/bundles', [BundleController::class, 'shopBundles'])->name('shop.bundles');





Route::get('/shop/bundles', [BundleController::class, 'index'])->name('bundles.index');
Route::get('/shop/bundles/{id}', [BundleController::class, 'show'])->name('bundles.show');


Route::get('/bundles/manage', [AdminBundleController::class, 'index'])->name('bundles.index');
Route::put('/bundles/{id}/update-status', [AdminBundleController::class, 'updateStatus'])->name('bundles.updateStatus');


use App\Http\Controllers\ShopBundleController;

Route::get('/shopbundle', [ShopBundleController::class, 'index'])->name('shopbundle.index');
// Route::get('/bundles/{id}', [BundleController::class, 'show'])->name('bundles.show');


/// Route to view approved bundles
Route::get('/admin/bundles/approved', [BundleController::class, 'approved'])->name('admin.bundles.approved');

// Route for updating the status (Approve/Reject)
Route::post('/admin/bundles/{id}/update-status', [BundleController::class, 'updateStatus'])->name('admin.bundles.updateStatus');
// In routes/web.php
Route::get('/admin/approved-bundles', [AdminBundleController::class, 'approvedBundles'])->name('admin.approved.bundles');

Route::get('/admin/bundles/approved', [AdminBundleController::class, 'approvedBundles'])->name('admin.bundles.approved');

Route::get('/shop/bundles', [BundleController::class, 'index'])->name('shop.bundles');
Route::get('/shop/bundles', [AdminBundleController::class, 'index'])->name('shop.bundles.index');
Route::get('/shop/bundles', [AdminBundleController::class, 'index'])->name('shop.bundles.index');
Route::get('shop/bundles', [AdminBundleController::class, 'showApprovedBundles'])->name('shop.bundles.index');
// routes/web.php
use App\Http\Controllers\ShopController;

Route::get('/shop/bundles', [ShopController::class, 'showBundles'])->name('shop.bundles');


// Define the product.store route
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


Route::get('/sell-bundle', [BundleController::class, 'create'])->name('sell-bundle');



Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');



// Other routes...

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/admin/bundles/{id}/updateStatus', [BundleController::class, 'updateStatus']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard'); // Redirect non-admin users
        }
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');
});



// Role-Based Redirection
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Admin users are redirected to the admin dashboard
        }
        return view('dashboard1'); // Customer users see the customer dashboard
    })->name('dashboard');

    // Admin-specific dashboard route
    Route::get('admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard'); // Non-admin users are redirected to the customer dashboard
        }
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');


});

Route::get('/admin/dashboard', function () {
    // Ensure the user is authenticated and has an admin role
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        abort(403, 'Unauthorized access');
    }

    // Fetch all products for the admin dashboard
    $products = \App\Models\Product::all();
    
    // Pass the products to the view
    return view('admin.dashboard', ['products' => $products]);
})->middleware('auth')->name('admin.dashboard');

require __DIR__.'/auth.php';




