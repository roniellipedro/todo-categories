<x-layout>

    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>


    <section id="task-section">

        <h1>Editar Tarefa</h1>
        <form class="form-area" method="POST" action="{{ route('task.edit_action') }}">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">

            <x-form.text-input name="title" label="Titulo da Task" placeholder="Digite o titulo da tarefa"
                value="{{ $task->title }}" />

            <x-form.date-input name="due_date" label="Data da realização" value="{{ $task->due_date }}" />


            <x-form.select-input name="category_id" label="Categoria">
                @foreach ($categories as $category)
                    <option id="{{ $category->id }}" value="{{ $category->id }}"
                        @if ($category->id == $task->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.textarea name="description" type="textarea" label="Descrição da tarefa"
                placeholder="Digite uma descrição para sua tarefa" value="{{ $task->description }}" />

            <x-form.button-input resetTxt="Resetar Tarefa" submitTxt="Atualizar Tarefa" />

        </form>
    </section>
</x-layout>
