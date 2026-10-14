<x-layout title="Episódios da Temporada {{$season->number}}">
    @isset($successMessage)
        <div class="alert alert-success">
            {{$successMessage}}
        </div>
    @endisset
    <form method="post">
        @csrf
        @method('PUT')
        <ul class="list-group mt-5 mb-20">
            @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{$episode->number}}
                <input type="checkbox" name="episodes[]" value="{{$episode->id}}"
                @if ($episode->watched) checked @endif>
            </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>