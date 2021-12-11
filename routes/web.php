<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [DashboardController::class, 'login'])->name('login_admin');
Route::get('/auth', [HomeController::class, 'redirect'])->name('auth');
Route::get('/detail/{product_id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/men', [HomeController::class, 'men'])->name('men');
Route::get('/women', [HomeController::class, 'women'])->name('women');

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth');

Route::get('/cart/{cart}', [CartController::class, 'destroy'])
    ->middleware('auth');

Route::get('/save2bag/{product_id}', [CartController::class, 'save2bag'])
    ->middleware('auth');

Route::get('/buyNow/{product_id}', [OrderController::class, 'buyNow'])
    ->middleware('auth');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->middleware('auth');

Route::post('/checkout/create', [DetailOrderController::class, 'store'])
    ->middleware('auth');

Route::post('/order/create', [OrderController::class, 'store'])
    ->middleware('auth');

Route::post('/detail-order/create', [DetailOrderController::class, 'store'])
    ->middleware('auth');

Route::post('/transaction/create', [TransactionController::class, 'store'])
    ->middleware('auth');

Route::resource('/cart/create', CartController::class)
    ->middleware('auth');

Route::resource('/address/create', AddressController::class)
    ->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('type_size', 'App\Http\Controllers\Admin\TypeSizeController');
    Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('gallery', 'App\Http\Controllers\Admin\GalleryController');
    Route::resource('discount', 'App\Http\Controllers\Admin\DiscountController');
    Route::resource('flash_sale', 'App\Http\Controllers\Admin\FlashSaleController');
    Route::resource('transaction', 'App\Http\Controllers\Admin\TransactionController');
    Route::resource('donation', 'App\Http\Controllers\Admin\DonationController');
    Route::get('/size/delete/{id}/{product_id}', 'App\Http\Controllers\Admin\ProductController@size');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
