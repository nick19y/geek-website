<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
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
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return to_route('home.index');
    }
    public function destroy(User $user)
    {
        if ($user->is(Auth::user())) {
            return to_route('users.index')->withErrors(['users' => 'Você não pode excluir a si mesmo.']);
        }

        $user->delete();
        return to_route('users.index')->with('mensagem.sucesso', "Usuário {$user->name} removido com sucesso");
    }
    public function toggleAdmin(User $user)
    {
        if ($user->is(Auth::user())) {
            return to_route('users.index')->withErrors(['users' => 'Você não pode alterar o seu próprio perfil.']);
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return to_route('users.index')->with('mensagem.sucesso', "Perfil de {$user->name} atualizado");
    }
    public function edit(User $user)
    {
        return view('screens.users.edit')->with('user', $user);
    }

    public function update(User $user, UsersFormRequest $request)
    {
        abort_unless($request->user()->is_admin || $user->is($request->user()), 403);

        $data = $request->validated();

        if (filled($data['password'] ?? null)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->user()->is_admin) {
            $data['is_admin'] = $request->boolean('is_admin');
        } else {
            unset($data['is_admin']);
        }

        $user->update($data);

        return to_route('users.index')
            ->with('mensagem.sucesso', "Usuário {$user->name} atualizado com sucesso");
    }
    
}
