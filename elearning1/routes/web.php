<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin/login', function () {
    return view('admin.pages.login');
});


// Route::get('/admin/create', function () {
//     return view('admin.pages.admins.create');
// })->name('admin.create');

// // Route::get('/admin/index', function () {
// //     return view('admin.pages.admins.index');
// // })->name('admin.index');
// Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
// // Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
// Route::post('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.update');



// Route::resource('admins', AdminController::class);
Route::get('admin/admins', [AdminController::class, 'index'])->name('admin.admins.index');

require __DIR__ . '/auth.php';
