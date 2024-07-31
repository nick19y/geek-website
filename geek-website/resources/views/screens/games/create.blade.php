<x-layout title="Novo jogo">    
    <x-games.form :action="route('games.store')" :name="old('name')" :update="false"/>
</x-layout>