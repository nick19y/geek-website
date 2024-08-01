<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'min:3']
        ]);
        $serie = Serie::create($request->all());
        $seasons=[];
        for($i=1;$i<=$request->amount_seasons;$i++){
            $seasons[]=[
                'series_id'=>$serie->id,
                'number'=>$i,
            ];
        }
        Season::insert($seasons);
        $episodes=[];
        foreach($serie->seasons as $season){
            for($j=1;$j<=$request->episodesPerSeason;$j++){
                $episodes[]=[
                    'season_id'=>$season->id,
                    'number'=>$j,
                ];
            }
        }
        Episode::insert($episodes);

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