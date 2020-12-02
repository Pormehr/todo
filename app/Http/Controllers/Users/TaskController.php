<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        #TODO Change 1 to Auth::user()->id
        $tasks = Task::where('user_id', 1)->get();

        return view('users.tasks.index')->withTasks($tasks);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}
