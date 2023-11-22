<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InrtiaTestController;
use App\Http\Controllers\ProdactController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;

Route::get('notices',[NoticeController::class,'index'])
->name('notices.index')->middleware(['auth', 'verified']);

Route::resource('managements', ManagementController::class) 
->middleware(['admin', 'verified']);

Route::resource('prodacts', ProdactController::class) 
->middleware(['auth', 'verified']);

Route::resource('customers',CustomerController::class)
->middleware(['admin','verified']);

Route::resource('items',ItemController::class)
->middleware(['admin','verified']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
