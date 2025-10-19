@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">
        The list of tasks
    </h1>

    <div>
        <a class="link" href="{{ route('tasks.create') }}">Add New Task</a>
    </div>
    <br>
    <div class="mb-4">
        @forelse ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task'=>$task]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}</a></li>
        @empty
            <p>No tasks</p>
        @endforelse
    </div>
    @if ($tasks->count())
        <br/>
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
