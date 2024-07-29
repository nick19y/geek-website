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
        // execução de query para ordenação alfabética

        // $games = DB::select('SELECT name FROM games;');
        // a query de cima retorna um array, o all é uma collection e consegue funcionar com uma Model
        // $games = Game::all();
        
        // dd($games);
        // return view('game-list', [
        //     'games'=>$games
        // ]);
        // compact cria uma variavel 'games' e envia o conteudo $games para a view game-list
        // return view('game-list', compact('games')); with funciona da mesma forma
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        
    //     // dd($request->all());
    //     // request->all retorna os parametros da requisição, como por exemplo o name
    //     Game::create($request->all);
    // atribuição em massa exige um fillable para atribuição de dados em massa


    //     // $gameName = $request->input('name'); abaixo funciona do mesmo jeito com o parametro name do input
    //     // $gameName = $request->name;
    //     // $game = new Game();
    //     // $game->name = $gameName;
    //     // $game->save();
    //     // o save com a model configurada previne o sql injection
    //     // DB::insert('INSERT INTO games (name) VALUES (?)', [$gameName]);
    //     return redirect('/games');
    // }

    public function store(Request $request)
    {
        Game::create($request->all());

        // return redirect('/games');
        return to_route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        dd($request->game);
    }
}
