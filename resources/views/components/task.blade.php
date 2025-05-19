<div class="task {{ $data['is_done'] ? 'task_done' : 'task_pending ' }}">
    <div class="title">
        <input class="checkbox" type="checkbox" @if ($data['is_done']) checked @endif
            onchange="taskUpdate(this)" data-id="{{ $data['id'] }}">
        <div class="task-title">{{ $data['title'] ?? null }} </div>
    </div>
    <div class="priority">
        <div class="sphere" style="background-color: {{ $data['category']['color'] ?? rgb(266, 266, 266) }};"></div>
        <div>{{ $data['category']['title'] ?? null }}</div>
    </div>
    <div class="actions">
        <a href="{{ route('task.edit', ['id' => $data['id']]) }}">
            <img src="/assets/images/icon-edit.png">
        </a>
        <a href="{{ route('task.delete', ['id' => $data['id']]) }}">
            <img src="/assets/images/icon-delete.png">
        </a>
    </div>
</div>
