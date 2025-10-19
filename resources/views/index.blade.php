@extends('layouts.app')

@section('content')
    <h1>
        The list of tasks
    </h1>

    <div>
        <a href="{{ route('tasks.create') }}">Add New Task</a>
    </div>
    <br>
    <div>
        @forelse ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task'=>$task]) }}">{{ $task->title }}</a></li>
        @empty
            <p>No tasks</p>
        @endforelse

        @if ($tasks->count())
            <br/>
            <div>
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection
