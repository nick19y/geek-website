<x-layout title="Nova série">
    <form action="{{route('series.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="mb-3 col-8">
                <label for="name" class="form-label">Nome</label>
                <input autofocus type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="mb-3 col-2">
                <label for="amount_seasons" class="form-label">Nº Temporadas</label>
                <input type="text" id="amount_seasons" name="amount_seasons" class="form-control" value="{{old('name')}}">
            </div>
            <div class="mb-3 col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada</label>
                <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{old('name')}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>