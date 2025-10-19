@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">
        {{ isset($task) ? 'Edit Task' : 'Add Task' }}
    </h1>
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                    @class(['border-red-500' => $errors->has('title')])/>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"
                        @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"
                        @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <div>
                <button class="btn" type="submit">Submit</button>
            </div>
            <div>
                <a class="link" href="{{ route('tasks.index') }}">Cancel</a>
            </div>
        </div>
    </form>
@endsection
