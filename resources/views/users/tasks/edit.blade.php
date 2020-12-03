@extends('layouts.app')

@section('content')

    <form action="{{ route('user.task.update', $task) }}" class="container bg-dark p-2 text-white mt-5" method="post">
        @csrf
        <div class="form-group">
            <input type="text" placeholder="{{ __('users/tasks.create.title') }}"
                   name="title" class="form-control @if($errors->taskUpdate->first('title')) is-invalid @endif"
                   value="{{ old('title') ?? $task->title }}">
        </div>
        @if($errors->taskUpdate->first('title'))
            <div class="text-danger">
                {{ $errors->taskUpdate->first('title') }}
            </div>
        @endif
        <br>
        <div class="form-group">
            <select class="form-control" name="status">
                <option value="0" @if($task->status == 0) selected @endif>{{ __('users/tasks.index.doing') }}</option>
                <option value="1" @if($task->status == 1) selected @endif>{{ __('users/tasks.index.done') }}</option>
            </select>
        </div>

        @if($errors->taskUpdate->first('status'))
            <div class="text-danger">
                {{ $errors->taskUpdate->first('status') }}
            </div>
        @endif

        <button class="btn btn-success" type="submit" onclick="return confirm('{{ __('users/tasks.index.confirm_update') }}');">
            {{ __('users/tasks.create.submit') }}
        </button>

        <a href="{{ route('user.task.index') }}"
           class="btn btn-danger float-right">{{ __('users/tasks.create.back') }}</a>

    </form>
    <br>
@endsection
