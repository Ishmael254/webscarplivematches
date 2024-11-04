<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ScraperController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/match', [App\Http\Controllers\ScraperController::class, 'index'])->name('match');
Route::get('/match/{id}', [App\Http\Controllers\ScraperController::class, 'show'])->name('matches.show');

Route::get('/watch/{id}', [App\Http\Controllers\WatchController::class, 'watch'])->name('watch.show');


Route::get('/tables/epl', [App\Http\Controllers\ScraperController::class, 'eplTable'])->name('tables.epl');
Route::get('/watchgame', [App\Http\Controllers\ScraperController::class, 'watchgame'])->name('watchgame');

Route::get('/livescore', [App\Http\Controllers\ScraperController::class, 'livescore'])->name('livescore');

