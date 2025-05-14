<x-layout title="Todo - Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Registrar-se
        </a>
    </x-slot:btn>

    <section id="section">
        <h1>Login</h1>
        <form class="form-area" method="POST" action="{{ route('login_action') }}">
            @csrf

            <x-form.input type="email" name="email" label="Seu email" placeholder="Seu email" value="{{ session('email') ?? ''}}"/>

            <x-form.input type="password" name="password" label="Sua senha" placeholder="Sua senha" />

            <x-form.button-input resetTxt="Limpar" submitTxt="Entrar" />

            <a href="{{ route('register') }}">Não possui conta ? Registrar-se</a>
        </form>
    </section>

</x-layout>
