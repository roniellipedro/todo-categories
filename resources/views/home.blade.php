<x-layout>

    <x-slot:btn>
        <a href="#" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do Dia</h2>
            <div class="hr-graph"></div>
            <div class="graph-header-date">
                <img src="assets/images/icon-prev.png">
                13 de Dez
                <img src="assets/images/icon-next.png">
            </div>
        </div>
        <div class="graph-header-subtitle">
            Tarefas: <b>3/6</b>
        </div>
        <div class="graph-placeholder">
        </div>

        <div class="tasks-left-footer">
            <img src="/assets/images/icon-info.png">
            Restam 3 tarefas para serem realizadas
        </div>
    </section>

    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">


            <x-task done="checked" title="Titulo 1" priority="Prioridade 1" />
            <x-task title="Titulo 2" priority="Prioridade 2" />
            <x-task done="checked" title="Titulo 3" priority="Prioridade 3" />
            <x-task title="Titulo 4" priority="Prioridade 4" />




        </div>
    </section>
</x-layout>
