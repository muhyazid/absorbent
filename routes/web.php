<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductFrontendController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;



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
    return view('frontend.master');
});
Route::get('/product', function () {
    return view('frontend.product');
});
Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});

// Route untuk frontend produk
Route::get('/frontend/products', [ProductFrontendController::class, 'index'])->name('frontend.products.index');


Route::get('/backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard')->middleware('auth','admin');
Route::get('/backend/products', [ProductController::class, 'index'])->name('products');
Route::resource('products', ProductController::class);
Route::get('product/export-pdf', [ProductController::class, 'exportPdf'])->name('products.export-pdf');
Route::get('/backend/about', [AboutController::class, 'index'])->name('backend.about.index');
Route::get('backend/testimonials', [TestimonialController::class, 'index'])->name('backend.testimonials.index');
Route::get('/backend/users', [UserController::class, 'index'])->name('backend.users.index');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


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