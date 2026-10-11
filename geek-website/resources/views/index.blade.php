<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body>
    <header class="d-flex justify-content-evenly">
        <div class=""></div>
        <div class="title">MyLib</div>
        <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle bg-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Menu item</a></li>
                <li><a class="dropdown-item" href="{{route('users.index')}}">Usuários</a></li>
                <li>
                    @auth
                    <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
                    @endauth
                </li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="container-item">
                <img src="img/television.png" alt="">
                <div class="container-title">Séries</div>
                <a href="{{route('series.index')}}">
                    <button class="list-button">Ver lista</button>
                </a>
            </div>
            <div class="container-item">
                <img src="img/books.png" alt="">
                <div class="container-title">Livros</div>
                <a href="{{route('books.index')}}">
                    <button class="list-button">Ver lista</button>
                </a>
            </div>
            <div class="container-item">
                <img src="img/control.png" alt="">
                <div class="container-title">Jogos</div>
                <a href="{{route('games.index')}}">
                    <button class="list-button">Ver lista</button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>