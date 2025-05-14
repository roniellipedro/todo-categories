<x-layout>

    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary">
            Criar Tarefa
        </a>

        <a href="{{ route('logout') }}" class="btn">
            Sair
        </a>
    </x-slot:btn>



    <section class="graph">
        <div class="graph-header">

            <h2>Progresso do Dia {{ $AuthUser->name ?? '' }}</h2>
            <div class="hr-graph"></div>
            <div class="graph-header-date">

                <a href="{{ route('home', ['date' => $date_prev_button]) }}">
                    <img src="assets/images/icon-prev.png">
                </a>
                {{ $date_as_string }}
                <a href="{{ route('home', ['date' => $date_next_button]) }}">
                    <img src="assets/images/icon-next.png">
                </a>
            </div>
        </div>
        <div class="graph-header-subtitle">
            Tarefas: <b>{{ $tasks_count - $undone_tasks_count }}/{{ $tasks_count }}</b>
        </div>
        <div class="graph-placeholder">
        </div>

        <div class="tasks-left-footer">
            <img src="/assets/images/icon-info.png">
            Restam {{ $undone_tasks_count }} tarefas para serem realizadas
        </div>
    </section>

    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">

            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach

        </div>
    </section>
</x-layout>

<script>
    async function taskUpdate(element) {
        let status = element.checked;
        let taskId = element.dataset.id;
        let url = "{{ route('task.update') }}";

        let rawResult = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'accept': 'application/json'
            },
            body: JSON.stringify({
                status,
                taskId,
                _token: '{{ csrf_token() }}'
            })
        });

        result = await rawResult.json();
        if (!result.success) {
            element.checked = !status
        }


    }
</script>
