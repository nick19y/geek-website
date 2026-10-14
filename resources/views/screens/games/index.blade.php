<x-layout title="Jogos">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($games as $game)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$game->name}}
            <span class="d-flex">
                <a href="{{route('games.edit', $game->id)}}" class="btn btn-primary btn-sm">E</a>
                <form action="{{route('games.destroy', $game->id)}}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
    <a href="/games/create/" class="btn btn-dark my-4">Adicionar um novo jogo</a>
</x-layout>