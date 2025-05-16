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

            <h2>Progresso do Dia</h2>
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
            Tarefas: <span class="done-tasks-count">{{ $tasks_count - $undone_tasks_count }}</span>/<span
                class="tasks-count">{{ $tasks_count }}</span>
        </div>
        <div class="graph-placeholder">
        </div>

        <div class="tasks-left-footer">
            <img src="/assets/images/icon-info.png">
            Restam <span class="undone-tasks-count"> {{ $undone_tasks_count }} </span>
            tarefas para serem realizadas
        </div>

    </section>

    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select" onchange="changeTaskStatusFilter(this)">
                <option value="task_all">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
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
    function changeTaskStatusFilter(element) {

        let value = element.value;

        if (value == 'task_all') {
            taskAll();
        }

        if (value == 'task_pending') {
            taskAll();

            document.querySelectorAll('.task_done').forEach(function(element) {
                element.style.display = 'none';
            });

        }

        if (value == 'task_done') {
            taskAll();

            document.querySelectorAll('.task_pending').forEach(function(element) {
                element.style.display = 'none';
            });

        }

        function taskAll() {
            document.querySelectorAll('.task').forEach(function(element) {
                element.style.display = 'flex';
            });
        }

    }
</script>

<script>
    async function taskUpdate(element) {
        let status = element.checked;
        let taskId = element.dataset.id;
        let url = "{{ route('task.update') }}";
        let undoneTasksCount = parseInt(document.querySelector('.undone-tasks-count').innerHTML);
        let doneTasksCount = parseInt(document.querySelector('.done-tasks-count').innerHTML);

        let listHeaderSelect = document.querySelector('.list-header-select').value;


        if (status) {
            // if (listHeaderSelect == 'task_pending') {
            //     document.querySelectorAll('.task_done').forEach(function(element) {
            //         element.style.backgroundColor = 'red';
            //     });
            // }




            // document.querySelector('#checkbox').addEventListener('change', function() {

            //     const pai = this.closest('.task');

            //     pai.classList.add('ativo');

            //     alert('opa');
            // });

            document.querySelector('.done-tasks-count').innerHTML = (doneTasksCount + 1);
            document.querySelector('.undone-tasks-count').innerHTML = (undoneTasksCount - 1);

        } else {
            document.querySelector('.done-tasks-count').innerHTML = (doneTasksCount - 1);
            document.querySelector('.undone-tasks-count').innerHTML = (undoneTasksCount + 1);
        }

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
