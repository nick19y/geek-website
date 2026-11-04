<x-layout title="Usuários">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($users as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                {{ $user->name }}
                @if ($user->is_admin)
                    <span class="badge text-bg-dark ms-2">Admin</span>
                @endif
            </span>
            <span class="d-flex">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">E</a>
                @can('admin')
                    @if (! $user->is(auth()->user()))
                        <form action="{{ route('users.admin', $user->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-dark btn-sm">
                                {{ $user->is_admin ? 'Remover admin' : 'Tornar admin' }}
                            </button>
                        </form>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    @endif
                @endcan
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>