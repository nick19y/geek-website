<x-layout title="Filmes">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($movies as $movie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$movie->name}}
            <span class="d-flex">
                <a href="{{route('movies.edit', $movie->id)}}" class="btn btn-primary btn-sm">E</a>
                <form action="{{route('movies.destroy', $movie->id)}}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
    <a href="/movies/create/" class="btn btn-dark my-4">Adicionar um novo filme</a>
</x-layout>