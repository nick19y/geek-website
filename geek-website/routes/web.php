<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', function () {
    return redirect('/games');
});

Route::controller(GamesController::class)->group(function(){
    Route::get('/games','index')->name('games.index');
    Route::get('/games/create','create')->name('games.create');
    Route::post('/games/save','store')->name('games.store');
    Route::delete('/games/destroy/{id}', 'destroy')->name('games.destroy');
});
