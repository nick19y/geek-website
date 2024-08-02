<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
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
}
