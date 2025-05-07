<x-layout title="Todo - Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    Login

    <a href="{{ route('home') }}">Voltar para home</a>
</x-layout>
