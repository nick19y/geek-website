<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', function () {
    return redirect('/games');
});

// usar o método destroy da minha seriescontroller
Route::post('/games/destroy/{id}', [GamesController::class], 'destroy')->name('games.destroy');
Route::resource('/games', GamesController::class)->only(['index', 'create', 'store']);
// o resource usa os métodos de crud do laravel e evita toda a implementação abaixo, o only indica os métodos que poderão ser usados nas rotas

// Route::controller(GamesController::class)->group(function(){
//     Route::get('/games','index')->name('games.index');
//     Route::get('/games/create','create')->name('games.create');
//     Route::post('/games/save','store')->name('games.store');
// });

// o ->name define o nome de uma rota nomeada, ao invés de usar uma url, da para usar o games.store por exemplo
// Route::get('/games', [GamesController::class, 'index']);
// Route::get('/games/create', [GamesController::class, 'create']);
// Route::post('/games/save', [GamesController::class, 'store']);

// O html só funciona com o verbo get e post, por isso não é possível usar o delete em uma aplicação que não sja uma api e sim tenha o html que nem essa


