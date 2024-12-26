<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/budget/{budget}', [ProfileController::class, 'budget'])->name('profile.budget');

    Route::resource('budget', BudgetController::class);
    Route::patch('/budget/{budget}', [BudgetController::class, 'update'])->name('budget.update');

    Route::resource('category', CategoryController::class);
    Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
});

require __DIR__.'/auth.php';
