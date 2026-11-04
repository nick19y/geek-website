<x-layout title="Novo usuário">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="name" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        @auth
            @if (auth()->user()->is_admin)
                <div class="form-check mt-3">
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" class="form-check-input">
                    <label for="is_admin" class="form-check-label">Administrador</label>
                </div>
            @endif
        @endauth
        <button class="btn btn-primary mt-3">Registrar</button>
    </form>
</x-layout>