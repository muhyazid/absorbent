<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Webbb Route
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::resource('products', ProductController::class);
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('backend.testimonials.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


