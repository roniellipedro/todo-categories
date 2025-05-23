<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $data["categories"] = $categories;

        return view('tasks.create', $data);
    }

    public function create_action(Request $request)
    {
        $task = $request->only('title', 'due_date', 'category_id', 'description');
        $task['user_id'] = 1;
        $dbTask = Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $request)
    {
        $categories = Category::all();
        $data["categories"] = $categories;

        $id = $request->id;

        $task = Task::find($id);

        if (!$task) {
            return redirect(route('home'));
        }

        $data['task'] = $task;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        // return $request->all();
        $request_data = $request->only('title', 'due date', 'category_id', 'description');

        $task = Task::find($request->task_id);

        $request_data['is_done'] = $request->is_done ? 1 : 0;

        if (!$task) {
            return 'Erro de task não existente';
        }

        $task->update($request_data);

        $task->save();

        return redirect(route('home'))->with('success_msg', 'Tarefa atualizada com sucesso!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }

    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        if (!$task) {
            return ['success' => false];
        }
        $task->is_done = $request->status;
        $task->save();

        return ['success' => true];
    }
}
