<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->orderBy('name')->get();
        $successMessage = $request->session()->get('mensagem.sucesso');
        return view('screens.users.index')->with('users', $users)->with('successMessage', $successMessage);
    }
    public function create()
    {
        return view('screens.users.create');
    }
    public function store(Request $request)
    {
        // criar um formRequest para validação depois
        $data = $request->except(['token']);
        // o hash::make e uma facade do php q traz o algoritmo de hash mais atualizado por padrão
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return to_route('series.index');
    }
        public function destroy(User $users)
    {
        $users->delete();
        return to_route('users.index')->with('mensagem.sucesso', "Usuário {$users->name} removido com sucesso");
    }

    public function edit(User $book)
    {
        return view('screens.users.edit')->with('book', $book);
    }

    public function update(User $book, Request $request)
    {
        $book->update($request->all());
        return to_route('users.index')->with('mensagem.sucesso', "Usuário {$book->name} atualizado com sucesso");
    }
}
