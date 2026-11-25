<form method="post" @isset($action) action="{{ $action }}" @endisset>
    @csrf
    @if($update)
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" @isset($name) value="{{$name}}" @endisset>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" @isset($email) value="{{$email}}" @endisset>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
        @if($update)
            <small class="form-text text-muted">
                Deixe em branco para manter a senha atual.
            </small>
        @endif
    </div>

    @auth
        @if (auth()->user()->is_admin)
            <div class="form-check mt-3">
                <input
                    type="checkbox"
                    name="is_admin"
                    id="is_admin"
                    value="1"
                    class="form-check-input"
                    @checked(old('is_admin', $isAdmin ?? false))
                >
                <label for="is_admin" class="form-check-label">Administrador</label>
            </div>
        @endif
    @endauth

    <button class="btn btn-primary mt-3">
        {{ $update ? 'Salvar alterações' : 'Registrar' }}
    </button>
</form>