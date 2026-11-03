<x-layout>
    <div class="">
        <section class="text-center mt-5">
            <h1 class="display-5 fw-bolder fs-5xl">Tudo que você viu, leu e jogou, num só lugar.</h1>
            <p class="fs-5 text-muted">Registre, avalie e descubra o que a comunidade está curtindo.</p>
            <input class="w-25 px-4 py-2 rounded-pill border border-secondary text-white shadow-none" type="search" placeholder="Buscar filmes, séries, jogos ou livros…">
        </section>
        <div class="d-flex justify-content-center mt-5 gap-4">
            <a href="" class="text-decoration-none text-black">
                <div class="border rounded-4 p-4 text-center fs-5 shadow-lg border-top m-1 d-flex flex-column gap-2">
                    <div class="fs-1">🎬</div>
                    <div>Filmes</div>
                    <button class="list-button">Ver lista</button>
                </div>
            </a>
            <a href="{{route('series.index')}}" class="text-decoration-none text-black">
                <div class="border rounded-4 p-4 text-center fs-5 shadow-lg border-top m-1 d-flex flex-column gap-2">
                    <div class="fs-1">📺</div>
                    <div>Séries</div>
                    <button class="list-button">Ver lista</button>
                </div>
            </a>
            <a href="{{route('books.index')}}" class="text-decoration-none text-black">
                <div class="border rounded-4 p-4 text-center fs-5 shadow-lg border-top m-1 d-flex flex-column gap-2">
                    <div class="fs-1">📚</div>
                    <div>Livros</div>
                    <button class="list-button">Ver lista</button>
                </div>
            </a>
            <a href="{{route('games.index')}}" class="text-decoration-none text-black">
                <div class="border rounded-4 p-4 text-center fs-5 shadow-lg border-top m-1 d-flex flex-column gap-2">
                    <div class="fs-1">🎮</div>
                    <div>Jogos</div>
                    <button class="list-button">Ver lista</button>
                </div>
            </a>
        </div>
    </div>
</x-layout>