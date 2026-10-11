<x-layout title="Usuários">
    @isset($successMessage)
    <div class="alert alert-success">
        {{$successMessage}}
    </div>
    @endisset
    <ul class="list-group mt-5">
        @foreach ($users as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$user->name}}
            <span class="d-flex">
                <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">E</a>
                <form action="{{route('users.destroy', $user->id)}}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>