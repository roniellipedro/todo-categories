<x-layout title="Todo - Criar tarefa">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="create-task-section">
        <h1>Criar Tarefa</h1>
        <form>

            <x-form.input name="title" type="text" label="Titulo da Task" placeholder="Digite o titulo da tarefa" />

            <x-form.input name="due_date" type="date" label="Data da realização" />

            <x-form.input name="category" type="select" label="Categoria">
                <option value="">EXEMPLO</option>
            </x-form.input>

            <x-form.input name="description" type="textarea" label="Descrição da tarefa"
                placeholder="Digite uma descrição para sua tarefa" />

            <div class="input-area">
                <x-form.reset-input value="Resetar Tarefa" />
                <x-form.submit-input value="Criar Tarefa" />
            </div>

        </form>
    </section>
</x-layout>
