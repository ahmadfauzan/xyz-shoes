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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/men', [HomeController::class, 'men'])->name('men');
Route::get('/women', [HomeController::class, 'women'])->name('women');

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth');

Route::get('/cart/{cart}', [CartController::class, 'destroy'])
    ->middleware('auth');

Route::get('/save2bag/{product_id}', [CartController::class, 'save2bag'])
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
