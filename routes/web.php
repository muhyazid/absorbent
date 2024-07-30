<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\AboutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProductFrontendController;

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

// Route Backend
Route::middleware(['auth', 'admin'])->prefix('backend')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('products', ProductController::class);
    Route::get('products/export-pdf', [ProductController::class, 'exportPdf'])->name('products.export-pdf');
    Route::get('/users', [UserController::class, 'index'])->name('backend.users.index');
    // Rute untuk edit user
    Route::get('/backend/users/{user}/edit', [UserController::class, 'edit'])->name('backend.users.edit');
    // Rute untuk update user
    Route::patch('/backend/users/{user}', [UserController::class, 'update'])->name('backend.users.update');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

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

require __DIR__.'/auth.php';
