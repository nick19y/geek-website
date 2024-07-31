<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\GamesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::query()->orderBy('name')->get();
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('screens.games.index')->with('games', $games)->with('successMessage', $successMessage);
    }
    public function create()
    {
        return view('screens.games.create');
    }
    public function store(GamesFormRequest $request)
    {
        $request->validate([
            'name'=>['required', 'min:3']
        ]);
        $game = Game::create($request->all());
        return to_route('screens.games.index')->with('mensagem.sucesso', "Jogo {$game->name} adicionado com sucesso");
    }

    public function destroy(Game $games)
    {
        $games->delete();
        return to_route('screens.games.index')->with('mensagem.sucesso', "Jogo {$games->name} removido com sucesso");
    }

    public function edit(Game $game)
    {
        return view('screens.games.edit')->with('game', $game);
    }

    public function update(Game $game, GamesFormRequest $request)
    {
        $game->update($request->all());
        return to_route('screens.games.index')->with('mensagem.sucesso', "Jogo {$game->name} atualizado com sucesso");
    }
}