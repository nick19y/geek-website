<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;


Route::middleware(Authenticator::class)->group(function(){
    Route::get('/series/{serie}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::put('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

    Route::get('/', function () {
        return view('index');
    })->middleware(Authenticator::class)->name('home.index');

    Route::resource('games', GamesController::class);
    Route::resource('books', BooksController::class);
    Route::resource('series', SeriesController::class);
    Route::resource('users', UsersController::class);

});


Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('singin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

// Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index')->middleware(Authenticator::class);