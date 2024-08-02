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
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('series.index')}}">Home</a>
            @auth
            <a href="{{route('logout')}}">Sair</a>
            <!-- se envolver o item com essa diretiva do blade, o componente só é mostrado se o usuário estiver logado -->
            @endauth
            @guest
            <a class="navbar-brand" href="{{route('login')}}">Entrar</a>
            <!-- se envolver o item com essa diretiva do blade, o componente só é mostrado se o usuário não estiver logado -->
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