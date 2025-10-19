@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>
        <div class="mb-4">
            <a class="link" href="{{ route('tasks.index') }}">Back</a>
        </div>
        <p class="mb-2 text-slate-800">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="mb-2 text-slate-800">{{ $task->long_description }}</p>
        @endif

        <p class="mb-4 text-sm text-slate-600">Created {{ $task->created_at->diffForHumans() }} | Updated {{ $task->updated_at->diffForHumans() }}</p>

        <p>
            @if ($task->completed)
                <span class="font-medium text-green-500">Completed</span>
            @else
                <span class="font-medium text-red-500">Not completed</span>
            @endif
        </p>
    </div>

    <div class="flex gap-2">
        <div class="mb-2 btn">
            <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
        </div>

        <div class="mb-2 btn">
            <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
            </form>
        </div>

        <div class="mb-2 btn">
            <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
