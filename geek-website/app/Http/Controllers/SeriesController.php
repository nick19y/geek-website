<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Controllers\Controller;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }
    public function index(Request $request)
    {
        // $series = Serie::query()->orderBy('name')->get(); a ordenação foi feita na classe de Serie
        $series = Serie::all();
        // $series = Serie::with(['seasons'])->get(); pesquisar todas as series com as respectivas temporadas, sem lazy loading, isso foi feito na model com a variável $with
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('screens.series.index')->with('series', $series)->with('successMessage', $successMessage);
    }
    public function create()
    {
        return view('screens.series.create');
    }
    public function store(Request $request, SeriesRepository $repository)
    {
        $serie = $repository->add($request);

        // $serie = $this->repository->add($request); sintaxe do php, se for usar em vários lugares, compensa usar essa e nãoi passar o repostório como parametro

        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->name} adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->name} removida com sucesso");
    }

    public function edit(Serie $serie)
    {
        return view('screens.series.edit')->with('serie', $serie);
    }

    public function update(Serie $serie, Request $request)
    {
        $serie->update($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->name} atualizada com sucesso");
    }
}