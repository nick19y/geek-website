<x-layout title="Livros">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($books as $book)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$book->name}}
            <span class="d-flex">
                <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary btn-sm">E</a>
                <form action="{{route('books.destroy', $book->id)}}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
    <a href="/books/create/" class="btn btn-dark my-4">Adicionar um novo livro</a>
</x-layout>