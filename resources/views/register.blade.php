<x-layout title="Todo - Registrar-se">
    <x-slot:btn>
        <a href="{{ route('login') }}" class="btn btn-primary">
            Acessar conta
        </a>
    </x-slot:btn>
    <section id="section">
        <h1>Registrar-se</h1>
        <form class="form-area" method="POST" action="{{ route('register_action') }}">
            @csrf
            <x-form.input type="text" name="name" label="Seu nome" placeholder="Seu nome" />

            <x-form.input type="email" name="email" label="Seu email" placeholder="Seu email" />

            <x-form.input type="password" name="password" label="Sua senha" placeholder="Sua senha" />

            <x-form.input type="password" name="password_confirmation" label="Confirme sua senha"
                placeholder="Confirme sua senha" />

            <x-form.button-input resetTxt="Limpar" submitTxt="Registrar-se" />

            <a href="{{ route('login') }}">Possui conta ? Logar</a>

        </form>
    </section>
</x-layout>
