<x-layout title="Jogos">
    <a href="/games/create/" class="btn btn-dark mb-2">Adicionar um novo jogo</a>
    <ul class="list-group">
        @foreach ($games as $game)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$game->name}}
            <form action="{{route('games.destroy', $game->id)}}" method="post">
                @csrf
                <button class="btn btn-danger btn-sm">X</button>
            </form>
        </li>
        @endforeach
        <!-- @{{nome}} -->
    </ul>
</x-layout>