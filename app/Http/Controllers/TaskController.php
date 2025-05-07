<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create');
    }

    public function edit()
    {
        return view('tasks.edit');
    }

    public function delete()
    {
        return redirect(route('home'));
    }
}
