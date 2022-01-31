<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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


//cart routes
Route::get('/cart', [App\Http\Controllers\CartController::class,'index'])->name('cart.index');
Route::post('/add/cart/{livre}', [App\Http\Controllers\CartController::class,'addProductToCart'])->name('add.cart');
Route::delete('/remove/{livre}/cart', [App\Http\Controllers\CartController::class,'removeProductFromCart'])->name('remove.cart');
Route::put('/update/{livre}/cart', [App\Http\Controllers\CartController::class,'updateProductOnCart'])->name('update.cart');
//voir detaills
Route::get('/livre/{slug}',[App\Http\Controllers\HomeController::class,'show'])->name('livre.show');
//supprimer un livre
Route::delete('/delete/livre/{slug}',[App\Http\Controllers\HomeController::class,'delete'])->name('livre.delete');
// ajouter un livre
Route::post('/add/livre',[App\Http\Controllers\HomeController::class,'store'])->name('livre.store');
Route::get('/create/livre',[App\Http\Controllers\HomeController::class,'create'])->name('livre.create');
// Update Livre
Route::get('/edit/livre/{slug}',[App\Http\Controllers\HomeController::class,'edit'])->name('livre.edit');
Route::put('/update/livre/{slug}',[App\Http\Controllers\HomeController::class,'update'])->name('livre.update');
// search Livre
Route::get('/search',[App\Http\Controllers\HomeController::class,'search'])->name('livres.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// activation
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activate/{code}',[App\Http\Controllers\ActivationController::class,'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [App\Http\Controllers\ActivationController::class,'resendActivationCode'])->name('code.resend');
//payment routes
Route::get('/handle-payment', [App\Http\Controllers\PaypalPayementsController::class,'handlePayment'])->name('make.payment');
Route::get('/cancel-payment', [App\Http\Controllers\PaypalPayementsController::class,'paymentCancel'])->name('cancel.payment');
Route::get('/payment-success', [App\Http\Controllers\PaypalPayementsController::class,'paymentSuccess'])->name('success.payment');
//admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class,'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class,'adminLogout'])->name('admin.logout');
Route::get('/admin/livres', [App\Http\Controllers\AdminController::class,'getProducts'])->name('admin.livres');
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class,'getOrders'])->name('admin.orders');
//orders routes
Route::resource('orders', OrderController::class);
