<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
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
            'message' => __('users/tasks.index.task_created'),
            'alert' => 'success',
        ]);
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('users.tasks.edit')->withTask($task);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('user.task.index')->withResult([
            'message' => __('users/tasks.index.task_updated'),
            'alert' => 'success',
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('user.task.index')->withResult([
            'message' => __('users/tasks.index.task_deleted'),
            'alert' => 'danger',
        ]);
    }
}
