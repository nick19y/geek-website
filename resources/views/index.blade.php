<x-layout>
    <section class="text-center mt-5">
        <h1 class="display-5 fw-bolder fs-5xl">Tudo que você viu, leu e jogou, num só lugar.</h1>
        <p class="fs-5 text-muted">Registre, avalie e descubra o que a comunidade está curtindo.</p>
        <input class="w-25 px-4 py-2 rounded-pill border border-secondary text-white shadow-none" type="search" placeholder="Buscar filmes, séries, jogos ou livros…">
    </section>
    <div class="container">
        <div class="container-item">
            <div class="fs-1">🎬</div>
            <div>Filmes</div>
            <a href="">
                <button class="list-button">Ver lista</button>
            </a>
        </div>
        <div class="container-item">
            <div class="fs-1">📺</div>
            <div>Séries</div>
            <a href="{{route('series.index')}}">
                <button class="list-button">Ver lista</button>
            </a>
        </div>
        <div class="container-item">
            <div class="fs-1">📚</div>
            <div>Livros</div>
            <a href="{{route('books.index')}}">
                <button class="list-button">Ver lista</button>
            </a>
        </div>
        <div class="container-item">
            <div class="fs-1">🎮</div>
            <div>Jogos</div>
            <a href="{{route('games.index')}}">
                <button class="list-button">Ver lista</button>
            </a>
        </div>
    </div>
</x-layout>