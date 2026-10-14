<x-layout title="Temporadas de {!! $series->name !!}">
    <ul class="list-group mt-5">
        @foreach ($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{route('episodes.index', $season->id)}}">
            Temporada {{$season->number}}
        </a>    
            <span class="badge bg-secondary">
                <!-- contando a quantidade de episódios assistidos muitas queries executadas, foi feito um filtro -->
                <!-- {{$season->episodes()->watched()->count()}} / {{$season->episodes->count()}} -->
                {{$season->numberOfWatchedEpisodes()}} / {{$season->episodes->count()}}
            </span>
        </li>
        @endforeach
    </ul>
    <a href="/seasons/create/" class="btn btn-dark my-4">Adicionar uma série</a>
</x-layout>