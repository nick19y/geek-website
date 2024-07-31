<x-layout title="Editar jogo '{{$game->name}}'">
    <x-games.form :action="route('games.update', $game->id)" :name="$game->name" :update="true"/>
</x-layout>