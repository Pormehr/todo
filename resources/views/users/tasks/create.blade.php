@extends('layouts.app')

@section('content')

        <form action="{{ route('user.task.store') }}" class="container bg-dark p-2 text-white mt-5" method="post">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="{{ __('users/tasks.create.title') }}" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <br>
            <div class="form-group">
                <select class="form-control" name="status">
                    <option value="0"  selected>{{ __('users/tasks.index.doing') }}</option>
                    <option value="1">{{ __('users/tasks.index.done') }}</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">
                {{ __('users/tasks.create.submit') }}
            </button>
        </form>
        <br>
@endsection
