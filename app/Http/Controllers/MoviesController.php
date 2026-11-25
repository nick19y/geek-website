<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoviesFormRequest;

class MoviesController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::query()->orderBy('name')->get();
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('screens.movies.index')->with('movies', $movies)->with('successMessage', $successMessage);
    }
    public function create()
    {
        return view('screens.movies.create');
    }
    public function store(MoviesFormRequest $request)
    {
        $request->validate([
            'name'=>['required', 'min:3']
        ]);
        $movie = Movie::create($request->all());
        return to_route('movies.index')->with('mensagem.sucesso', "Filme {$movie->name} adicionado com sucesso");
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return to_route('movies.index')->with('mensagem.sucesso', "Filme {$movie->name} removido com sucesso");
    }

    public function edit(Movie $movie)
    {
        return view('screens.movies.edit')->with('movie', $movie);
    }

    public function update(Movie $movie, MoviesFormRequest $request)
    {
        $movie->update($request->all());
        return to_route('movies.index')->with('mensagem.sucesso', "Filme {$movie->name} atualizado com sucesso");
    }
}
