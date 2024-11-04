<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\HomeController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/library', [App\Http\Controllers\LibraryController::class, 'index'])->name('library');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');
