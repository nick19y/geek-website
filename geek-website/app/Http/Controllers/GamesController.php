<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $games = Game::query()->orderBy('name')->get();
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('games.index')->with('games', $games)->with('successMessage', $successMessage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $game = Game::create($request->all());

        $request->session()->flash('mensagem.sucesso', "Jogo {$game->name} adicionado com sucesso");
        return to_route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Game::destroy($request->id);
        $request->session()->flash('mensagem.sucesso', 'Jogo removido com sucesso');
        return to_route('games.index');
    }
}
