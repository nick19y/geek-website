<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // criar validações para o login
    public function index()
    {
        return view('screens.login.index');
    }
    public function store(Request $request)
    {
        // $data = $request->except(['_token']);
        // _token is part of Laravels csrf protection.
        // o attempt faz várias verificações incluindo hashs etc, se tiver tudo certo, o usuário será armazenado em sessão
        // if(!Auth::attempt($data))
        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }
        return view('index');
    }
    public function destroy()
    {
        Auth::logout();
        return to_route('login');
    }
}
