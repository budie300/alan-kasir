<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('/foods', App\Http\Controllers\FoodController::class);
Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
Route::resource('/fotos', App\Http\Controllers\FotoController::class);

Route::get('/api/foods',[App\Http\Controllers\FoodController::class, 'api']);
// Route::get('/api/transactions',[App\Http\Controllers\TransactionController::class, 'api']);

Route::get('/', [TransactionController::class, 'index']);
Route::get('cart', [TransactionController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [TransactionController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [TransactionController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [TransactionController::class, 'remove'])->name('remove_from_cart');