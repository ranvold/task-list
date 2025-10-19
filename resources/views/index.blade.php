@extends('layouts.app')

@section('content')
    <h1>
        The list of tasks
    </h1>

    <div>
        @forelse ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task'=>$task->id]) }}">{{ $task->title }}</a></li>
        @empty
            <p>No tasks</p>
        @endforelse
    </div>
@endsection
