@extends('layouts.app')



@section('content')
<div class="flex justify-center items-center h-screen">
    <form method="POST"
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
        class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @isset($task)
        @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title" class="block text-gray-600">Title</label>
            <input type="text" name="title" id="title"
                class="w-full border rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-500"
                value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="error-message text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-600">Description</label>
            <textarea name="description" id="description" cols="30" rows="5"
                class="w-full border rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-500 bg-gray-100">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="error-message text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description" class="block text-gray-600">Long Description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="5"
                class="w-full border rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-500 bg-gray-100">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="error-message text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            @isset($task)
            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-500 w-full">
                Edit Task
            </button>
            @else
            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-500 w-full">
                Add Task
            </button>
            @endisset
        </div>
    </form>
</div>
@endsection
