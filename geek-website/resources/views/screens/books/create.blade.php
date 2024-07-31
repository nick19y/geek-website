<x-layout title="Novo livro">    
    <x-books.form :action="route('books.store')" :name="old('name')" :update="false"/>
</x-layout>