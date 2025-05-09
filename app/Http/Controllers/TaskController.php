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
        return 'ok';
    }

    public function delete()
    {
        return redirect(route('home'));
    }
}
