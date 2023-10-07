@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold">{{ $task->title }}</h1>
        <p class="text-gray-600">
            {{ $task->description }}
        </p>

        @if ($task->long_description)
        <p class="text-gray-600">
            {{ $task->long_description }}
        </p>
        @endif

        <p class="text-gray-600">Created at: {{ $task->created_at }}</p>
        <p class="text-gray-600">Last updated at: {{ $task->updated_at }}</p>

        <div class="mt-4 flex items-center">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
                Edit
            </a>

            <form action="{{ route('tasks.toggleComplete', ['task' => $task]) }}" method="POST" class="ml-4">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>

            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="ml-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-300 ease-in-out">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
