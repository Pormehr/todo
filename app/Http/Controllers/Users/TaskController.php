<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        #TODO Change 1 to Auth::user()->id
        $tasks = Task::where('user_id', 1)->paginate(10);

        return view('users.tasks.index')->withTasks($tasks);
    }

    public function create()
    {
        return view('users.tasks.create');
    }

    public function store(TaskCreateRequest $request)
    {
        #TODO Change 1 to Auth::user()->id
        $request = $request->toArray();
        $request['user_id'] = 1;
        Task::create($request);

        return redirect()->route('user.task.index')->withResult([
            'message' => 'New Task Created Successfully',
            'alert' => 'success',
        ]);
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        dd($task);
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('user.task.index')->withResult([
            'message' => 'Task Deleted Successfully',
            'alert' => 'danger',
        ]);
    }
}
