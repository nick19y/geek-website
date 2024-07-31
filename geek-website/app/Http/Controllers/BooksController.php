<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query()->orderBy('name')->get();
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('screens.books.index')->with('books', $books)->with('successMessage', $successMessage);
    }
    public function create()
    {
        return view('screens.books.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'min:3']
        ]);
        $book = Book::create($request->all());
        return to_route('books.index')->with('mensagem.sucesso', "Livro {$book->name} adicionado com sucesso");
    }
    public function destroy(Book $books)
    {
        $books->delete();
        return to_route('books.index')->with('mensagem.sucesso', "Livro {$books->name} removido com sucesso");
    }

    public function edit(Book $book)
    {
        return view('screens.books.edit')->with('book', $book);
    }

    public function update(Book $book, Request $request)
    {
        $book->update($request->all());
        return to_route('books.index')->with('mensagem.sucesso', "Livro {$book->name} atualizado com sucesso");
    }
}
