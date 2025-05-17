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
            <canvas id="myChart"></canvas>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script>
    let doneTasksCount = parseInt(document.querySelector('.done-tasks-count').innerHTML);
    let undoneTasksCount = parseInt(document.querySelector('.undone-tasks-count').innerHTML);
    let tasksCount = parseInt(document.querySelector('.tasks-count').innerHTML);

    window.percentageTask = ((doneTasksCount / tasksCount) * 100) ? ((doneTasksCount / tasksCount) * 100).toFixed(0) :
        0;

    if (window.percentageTask == 100) {
        window.borderRadius = 0;
    } else {
        window.borderRadius = 50;
    }

    const data = {
        datasets: [{
            data: [doneTasksCount, undoneTasksCount],
            backgroundColor: [
                '#6143FF',
                'rgba(0, 0, 0, 0)'
            ],
            borderColor: [
                '#6143FF',

                'rgba(0, 0, 0, 0)'
            ],
            borderWidth: 1,

            borderRadius: window.borderRadius,

            cutout: '80%'
        }]
    };

    const doughnutPointer = {
        id: 'doughnutPointer',
        afterDatasetsDraw(chart, args, plugins) {
            const {
                ctx,
                data
            } = chart;

            ctx.save();

            const xCenter = chart.getDatasetMeta(0).data[0].x;
            const yCenter = chart.getDatasetMeta(0).data[0].y;

            ctx.font = ' 65px Rubik';
            ctx.fillStyle = '#6143FF';
            ctx.textAlign = 'center';
            ctx.baseline = 'middle';
            ctx.fillText(window.percentageTask + '%', xCenter, yCenter + 15);
            ctx.font = ' 25px Rubik';
            ctx.fillText('Completo', xCenter, yCenter + 45);

        }
    }

    const config = {
        type: 'doughnut',
        data,
        options: {
            layout: {
                padding: 20
            },
            scales: {
                //         y: {
                //             beginAtZero: true
                //         }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        },
        plugins: [doughnutPointer]
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
</script>


<script>
    async function taskUpdate(element) {
        let status = element.checked;
        let taskId = element.dataset.id;
        let url = "{{ route('task.update') }}";
        let doneTasksCount = parseInt(document.querySelector('.done-tasks-count').innerHTML);
        let undoneTasksCount = parseInt(document.querySelector('.undone-tasks-count').innerHTML);

        let listHeaderSelect = document.querySelector('.list-header-select').value;

        const task = element.closest('.task');

        if (status) {
            document.querySelector('.done-tasks-count').innerHTML = (doneTasksCount + 1);
            document.querySelector('.undone-tasks-count').innerHTML = (undoneTasksCount - 1);

            if (listHeaderSelect == 'task_pending') {
                task.classList.replace('task_pending', 'task_done');
                task.style.display = 'none';
            }

            if (listHeaderSelect == 'task_all') {
                task.classList.replace('task_pending', 'task_done');
            }

            doneTasksCount = parseInt(document.querySelector('.done-tasks-count').innerHTML);
            undoneTasksCount = parseInt(document.querySelector('.undone-tasks-count').innerHTML);

            myChart.data.datasets[0].data = [doneTasksCount, undoneTasksCount];
            window.percentageTask = ((doneTasksCount / tasksCount) * 100) ? ((doneTasksCount / tasksCount) * 100)
                .toFixed(0) :
                0;

            if (window.percentageTask == 100) {
                myChart.data.datasets[0].borderRadius = 0;
            }

            myChart.update();
        } else {

            if (listHeaderSelect == 'task_done') {
                task.classList.replace('task_done', 'task_pending');
                task.style.display = 'none';
            }

            if (listHeaderSelect == 'task_all') {
                task.classList.replace('task_done', 'task_pending');
            }

            document.querySelector('.done-tasks-count').innerHTML = (doneTasksCount - 1);
            document.querySelector('.undone-tasks-count').innerHTML = (undoneTasksCount + 1);

            doneTasksCount = parseInt(document.querySelector('.done-tasks-count').innerHTML);
            undoneTasksCount = parseInt(document.querySelector('.undone-tasks-count').innerHTML);

            myChart.data.datasets[0].data = [doneTasksCount, undoneTasksCount];
            window.percentageTask = ((doneTasksCount / tasksCount) * 100) ? ((doneTasksCount / tasksCount) * 100)
                .toFixed(0) :
                0;

            if (window.percentageTask != 100) {
                myChart.data.datasets[0].borderRadius = 50;
            }


            myChart.update();
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
