<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('screens.episodes.index', [
            'episodes'=>$season->episodes,
            'season'=>$season,
            'successMessage'=>session('mensagem.sucesso')]);
    }
    public function update(Request $request, Season $season)
    {
        return DB::transaction(function() use($request, $season){
            $watchedEpisodes = $request->episodes ?? [];
            // para cada episodio da temporada, execute uma função anonima
            $season->episodes->each(function(Episode $episode) use ($watchedEpisodes){
                // para cada episódio de uma série, marcar como episódio assistido se o id do episódio estiver no array de watchedEpisodes
                $episode->watched=in_array($episode->id, $watchedEpisodes);
            });
            $season->push();
            // o push salva a model em questão e todos seus relacionamentos

            // sempre que for lidar com update, tentar executar o mínimo de queries possível, uma forma de fazer isso é usar um array para fazer apenas um update para todo a página
            return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos');
        }, 5);
    }
}
