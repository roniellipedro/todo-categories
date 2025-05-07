<x-layout title="Todo - Criar tarefa">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="create-task-section">
        <h1>Criar Tarefa</h1>
        <form>
            <div class="input-area">
                <label for="title">
                    Titulo da Task
                </label>
                <input name="title" id="title" type="text" placeholder="Digite o titulo da tarefa" required>
            </div>

            <div class="input-area">
                <label for="due_date">
                    Data da realização
                </label>
                <input name="due_date" id="due_date" type="date" required>
            </div>

            <div class="input-area">
                <label for="category">
                    Categoria
                </label>
                <select name="category" id="category" required>
                    <option selected disabled value="">Selecione a categoria</option>
                    <option value="">EXEMPLO</option>
                </select>
            </div>

            <div class="input-area">
                <label for="description">
                    Descrição da tarefa
                </label>
                <textarea name="description" id="description" placeholder="Digite uma descrição para sua tarefa"></textarea>
            </div>

        </form>
    </section>
</x-layout>
