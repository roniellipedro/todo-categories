<x-layout title="Todo - Criar tarefa">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="create-task-section">
        <h1>Criar Tarefa</h1>
        <form class="form-area">

            <x-form.text-input name="title" label="Titulo da Task" placeholder="Digite o titulo da tarefa" />

            <x-form.date-input name="due_date" label="Data da realização" />

            <x-form.select-input name="category" label="Categoria">
                <option value="">EXEMPLO</option>
            </x-form.select-input>

            <x-form.textarea name="description" type="textarea" label="Descrição da tarefa"
                placeholder="Digite uma descrição para sua tarefa" />

            <x-form.button-input resetTxt="Resetar Tarefa" submitTxt="Criar Tarefa" />

        </form>
    </section>
</x-layout>
