<x-layout title="Editar série '{!!$serie->name!!}'">
    <!-- essa sintaxe insegura permite o uso de aspas na serie para grey's anatomy por exemplo -->
    <form action="{{route('series.store')}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" value="{{old('nome')}}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>