<x-layout title="Editar livro '{{$book->name}}'">
    <x-books.form :action="route('books.update', $book->id)" :name="$book->name" :update="true"/>
</x-layout>