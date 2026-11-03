<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>MyLib</title>
</head>
<body>
    @auth
    <header class="d-flex justify-content-between align-items-lg-center py-3 px-5 text-white bg-black">
        <a class="text-decoration-none text-white" href="{{ url('/') }}">
            <div class="brand">My<span class="text-purple-custom">Lib</span></div>
        </a>
        <div class="d-flex gap-5 fw-bolder fs-5">
            <a class="text-white" href="{{route('users.index')}}">Usuários</a>
            @auth
            <a class="text-white" href="{{route('logout')}}">Sair</a>
            @endauth
        </div>
    </header>
    @endauth
    <div class="">
        @isset($title)
        <h1 class="mt-4">{{$title}}</h1>
        @endisset
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