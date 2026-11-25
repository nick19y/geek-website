<x-layout title="Novo usuário">
    <x-users.form :action="route('users.store')" :name="old('name')" :update="false"/>
</x-layout>