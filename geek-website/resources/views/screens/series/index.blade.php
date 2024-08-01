<x-layout title="Séries">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->name}}
            <span class="d-flex">
                <a href="{{route('series.edit', $serie->id)}}" class="btn btn-primary btn-sm">E</a>
                <form action="{{route('series.destroy', $serie->id)}}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
    <a href="/series/create/" class="btn btn-dark my-4">Adicionar uma série</a>
</x-layout>