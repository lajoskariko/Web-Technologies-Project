<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


Route::post('login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $token = $user->createToken('MusicLibraryToken')->plainTextToken();
        return response()->json(['token' => $token]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('songs', [SongController::class, 'index']);  
    Route::get('songs/{id}', [SongController::class, 'show']); 
    Route::post('songs', [SongController::class, 'store']);
    Route::put('songs/{id}', [SongController::class, 'update']); 
    Route::delete('songs/{id}', [SongController::class, 'destroy']); 
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'homeView'])->name('home');
Route::get('/library', [App\Http\Controllers\LibraryController::class, 'libraryView'])->name('library');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'searchView'])->name('search');
Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');
Route::get('/admin', [AdminController::class, 'adminView'])->name('admin')->middleware('auth');
Route::get('/create', [AdminController::class, 'createView'])->name('create')->middleware('auth');
Route::get('/update', [AdminController::class, 'updateView'])->name('update')->middleware('auth');
Route::get('/update/{id}', [AdminController::class, 'updateView'])->name('edit.song');
Route::put('/update/{id}', [AdminController::class, 'updateSong'])->name('update.song');
Route::get('/delete', [AdminController::class, 'deleteView'])->name('delete')->middleware('auth');
Route::get('/delete', [AdminController::class, 'deleteView'])->name('delete');
Route::post('/delete/{id}', [AdminController::class, 'deleteSong'])->name('deleteSong');

Route::redirect('/', '/home')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#testing push
