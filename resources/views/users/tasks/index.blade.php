@extends('layouts.app')

@section('content')

    @if($result = session('result'))
        <div class="container alert alert-{{ $result['alert'] }}">
            {{ $result['message'] }}
        </div>
    @endif

    <div class="container my-3">
        <a href="{{ route('user.task.create') }}" class="btn btn-outline-dark">
            {{ __('users/tasks.index.create') }}
        </a>
    </div>

    @forelse($tasks as $task)
        <div class="container bg-dark p-2 text-white">
            <div>
                {{ $task->title }}
            </div>
            <div>
                {{ __('users/tasks.index.status') }} @if($task->status == 1) <span class="text-success">{{ __('users/tasks.index.done') }}</span> @else <span class="text-danger">{{ __('users/tasks.index.doing') }}</span>@endif
            </div>
            <div class="d-flex justify-content-between">
                @if($task->status == 0)
                    {{--#TODO create done button--}}
                    <a href="" class="btn btn-success mt-2">{{ __('users/tasks.index.done') }}</a>
                @endif
                <div>
                    <a href="{{ route('user.task.edit', $task) }}" class="btn btn-info mt-2">{{ __('users/tasks.index.edit') }}</a>
                    <a href="{{ route('user.task.destroy', $task) }}" class="btn btn-danger mt-2 ml-2">{{ __('users/tasks.index.delete') }}</a>
                </div>
            </div>
        </div>
        <br>
    @empty
        <div class="container alert alert-danger">{{ __('users/tasks.index.no_task') }}</div>
    @endforelse

    <div class="container">
        {{ $tasks->links() }}
    </div>

@endsection
