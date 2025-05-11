<x-layout title="Todo - Criar tarefa">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="section">
        <h1>Criar Tarefa</h1>
        <form class="form-area" method="POST" action="{{ route('task.create_action') }}">
            @csrf
            <x-form.input type="text" name="title" label="Titulo da Task" placeholder="Digite o titulo da tarefa" />

            <x-form.date-input name="due_date" label="Data da realização" />

            <x-form.select-input name="category_id" label="Categoria">
                @foreach ($categories as $category)
                    <option id="{{ $category->id }}" value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.textarea name="description" type="textarea" label="Descrição da tarefa"
                placeholder="Digite uma descrição para sua tarefa" />

            <x-form.button-input resetTxt="Resetar Tarefa" submitTxt="Criar Tarefa" />

        </form>
    </section>
</x-layout>
