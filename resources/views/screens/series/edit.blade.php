<x-layout title="Editar série '{!! $serie->name !!}'">
    <x-series.form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true" />
</x-layout>
