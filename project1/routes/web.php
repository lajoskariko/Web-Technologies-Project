<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'homeView'])->name('home');
Route::get('/library', [App\Http\Controllers\LibraryController::class, 'libraryView'])->name('library');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'searchView'])->name('search');
Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');
Route::get('/admin', [AdminController::class, 'adminView'])->name('admin')->middleware('auth');
Route::get('/create', [AdminController::class, 'createView'])->name('create')->middleware('auth');
Route::get('/update', [AdminController::class, 'updateView'])->name('update')->middleware('auth');
Route::get('/delete', [AdminController::class, 'deleteView'])->name('delete')->middleware('auth');

Route::redirect('/', '/home')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#testing push
