<x-layout title="Editar filme '{{$movie->name}}'">
    <x-movies.form :action="route('movies.update', $movie->id)" :name="$movie->name" :update="true"/>
</x-layout>