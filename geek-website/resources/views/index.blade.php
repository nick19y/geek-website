<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="title">MyLib</div>
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