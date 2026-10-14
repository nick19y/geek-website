<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-around px-5">
            <a class="navbar-brand" href="{{route('home.index')}}">Home</a>
            @auth
            <a href="{{route('logout')}}">Sair</a>
            @endauth
            @guest
                <a class="navbar-brand" href="{{route('login')}}">Entrar</a>
            @endguest
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-4">{{$title}}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{$slot}}
    </div>
</body>
</html>