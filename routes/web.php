<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// partea de editare
Route::middleware('auth')->group(function () {
    Route::get('/setari-profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login & register
Route::get('/login', [ProfileController::class, 'login'])->name('profile.login');
Route::get('/register', [ProfileController::class, 'register'])->name('profile.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// parsarea logo-urilor
Route::get('/', [LogoController::class, 'index'])->name('home.index');

// calculator parcare
Route::get('/parcare', function () {return view('parking');});

// parsarea categoriilor
Route::get('/shop', [CategoriesController::class, 'index'])->name('shop.index')->middleware(['auth', 'verified']);

// // accesarea categoriei
Route::get('/shop/{category}', [ProductsController::class, 'indexx'])->name('show-products');

// cos cumparaturi
Route::get('/add-to-cart/{id}', [CartController::class, 'store']);

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/delete-from-cart/{id}', [CartController::class, 'destroy']);

Route::get('/increase-quantity-from-cart/{productId}', [CartController::class, 'increaseQuantity']);

Route::get('/decrease-quantity-from-cart/{productId}', [CartController::class, 'decreaseQuantity']);

// profile
Route::get('/profil', function() {return view('profile');});
Route::post('/profil', [CustomerController::class, 'store'])->name('customer');

// checkout
Route::get('/cart/checkout', function() {return view('checkout');});
// Route::get('/cart/checkout', [CustomerController::class, 'index'])->name('checkout');
Route::post('/cart/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// plasarea comenzii
Route::get('/create-order', [OrderController::class, 'store']);

// modele
Route::get('/{brand_id}', [ModelsController::class, 'indexx'])->name('models.indexx');



require __DIR__.'/auth.php';
