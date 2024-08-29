<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProductFrontendController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Providers\RouteServiceProvider;


/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Frontend
Route::get('/', function () {
    return view('frontend.master');
});

// Route::get('/product', function () {
//     return view('frontend.product');
// });

Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});

// Route untuk halaman produk frontend : by yazid
Route::get('/products', [ProductFrontendController::class, 'index'])->name('frontend.products.index');

// Route untuk halaman produk berdasarkan kategori : by yazid
Route::get('frontend/products/category/{id}', [ProductFrontendController::class, 'category'])->name('frontend.products.category');

// Route untuk mendapatkan produk berdasarkan kategori dalam format JSON
Route::get('/frontend/products/get-by-category/{id}', [ProductFrontendController::class, 'getProductsByCategory']);

Route::get('/frontend/products/custom-spill-kit-products', [ProductFrontendController::class, 'getCustomSpillKitProducts']);

Route::get('/frontend/products/all', [ProductFrontendController::class, 'getAllProducts']);

// Route Backend
Route::middleware(['auth', 'admin'])->prefix('backend')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('products', ProductController::class);

    Route::get('/backend/products/export/pdf', [ProductController::class, 'exportPDF'])->name('products.export.pdf');

    Route::get('/users', [UserController::class, 'index'])->name('backend.users.index');
    // Rute untuk edit user
    Route::get('/backend/users/{user}/edit', [UserController::class, 'edit'])->name('backend.users.edit');
    // Rute untuk update user
    Route::patch('/backend/users/{user}', [UserController::class, 'update'])->name('backend.users.update');
    Route::get('/backend/about', [KategoriController::class, 'index'])->name('backend.about.index');
    // Rute untuk Kategori Produk
    Route::resource('kategori_produks', KategoriController::class);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



// verifikasi email
Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(RouteServiceProvider::HOME)->with('verified', true);
})->middleware(['auth', 'signed'])->name('verification.verify');


// Redirect setelah login
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->usertype === 'admin') {
        return redirect()->route('backend.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login Google
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google','redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback','handleGoogleCallback');
});

require __DIR__.'/auth.php';
