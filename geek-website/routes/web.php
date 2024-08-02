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

Route::get('/', function () {
    return view('index');
})->middleware(Authenticator::class);

Route::controller(GamesController::class)->group(function(){
    Route::get('/games','index')->name('games.index');
    Route::get('/games/create','create')->name('games.create');
    Route::post('/games/save','store')->name('games.store');
    Route::delete('/games/destroy/{games}', 'destroy')->name('games.destroy');
    Route::get('/games/edit/{game}', 'edit')->name('games.edit');
    Route::put('/games/update/{game}', 'update')->name('games.update');
});

Route::controller(BooksController::class)->group(function(){
    Route::get('/books', 'index')->name('books.index');
    Route::get('/books/create','create')->name('books.create');
    Route::post('/books/save','store')->name('books.store');
    Route::delete('/books/destroy/{books}', 'destroy')->name('books.destroy');
    Route::get('/books/edit/{book}', 'edit')->name('books.edit');
    Route::put('/books/update/{book}', 'update')->name('books.update');
});

Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create','create')->name('series.create');
    Route::post('/series/save','store')->name('series.store');
    Route::delete('/series/destroy/{series}', 'destroy')->name('series.destroy');
    Route::get('/series/edit/{serie}', 'edit')->name('series.edit');
    Route::put('/series/update/{serie}', 'update')->name('series.update');
});

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');


Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::put('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('singin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');