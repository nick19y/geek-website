<?php

namespace App\Repositories;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesRepository
{
    public function add(Request $request):Serie
    {
        return DB::transaction(function() use($request){
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
            return $serie;
        }, 5);
        // o parametro 5 é o número de vezes em que a transação pode ser executada em caso de falha
        // fazer nas outras controllers com begintransaction e commit para conseguir fazer o tratamento de erro
    }
}