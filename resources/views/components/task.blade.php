<div class="task">
    <div class="title">
        <input type="checkbox" {{ $done ?? null}}>
        <div class="task-title">{{ $title ?? null }} </div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div>{{ $priority ?? null }}</div>
    </div>
    <div class="actions">
        <a href="#">
            <img src="/assets/images/icon-edit.png">
        </a>
        <a href="#">
            <img src="/assets/images/icon-delete.png">
        </a>
    </div>
</div>
