<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/nouveautés', 'NewArrival') ;
    Route::get('/Offre', 'OffreDuJour') ;
    Route::get('/', 'index');
    Route::get('/collections', 'categories') ;
    Route::get('/collections/{category_slug}', 'products') ;
    Route::get('/collections/{category_slug}/{product_slug}', 'productView') ;
    Route::get('search', 'searchProd');

});


Route::middleware(['auth'])->group(function () {
    Route::get('Wishlist', [App\Http\Controllers\Frontend\WishlistController::class,'index']) ;
    Route::get('Cart', [App\Http\Controllers\Frontend\CartController::class,'index']) ;
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class,'index']) ;
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class,'index']) ;
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class,'show']) ;



});
Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class,'index']);

    Route::controller(App\Http\Controllers\admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });
    Route::controller(App\Http\Controllers\admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');

        Route::get('product-color/{prod_color_id}/delete', 'DeleteProdColorbtn');


    });


    Route::get('/brands', App\Http\Livewire\Admin\Brands\index::class);

    Route::controller(App\Http\Controllers\admin\SizeController::class)->group(function () {
        Route::get('/sizes', 'index');
        Route::get('/sizes/create', 'create');
        Route::post('/sizes/create', 'store');
        Route::get('/sizes/{size}/edit', 'edit');
        Route::put('/sizes/{size_id}', 'update');
        Route::get('sizes/{size_id}/delete', 'destroy');
    });


    Route::controller(App\Http\Controllers\admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('colors/{color_id}/delete', 'destroy');
    });
    Route::controller(App\Http\Controllers\admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');

    });
    Route::controller(App\Http\Controllers\admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{userId}/edit', 'edit');
        Route::put('/users/{userId}', 'update');
        Route::get('/users/{userId}/delete', 'destroy');

    });


});
