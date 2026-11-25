<x-layout title="Novo filme">    
    <x-movies.form :action="route('movies.store')" :name="old('name')" :update="false"/>
</x-layout>