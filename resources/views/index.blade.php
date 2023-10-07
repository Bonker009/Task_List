@extends('layouts.app')



@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="container mx-auto p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold uppercase">Task List</h1>
                <a href="{{ route('tasks.create') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-500">
                    Add Task
                </a>
            </div>

            <div>
                @forelse ($tasks as $task)
                    <div class="mb-2">
                        {{ $loop->iteration }} -
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                            class="text-blue-500 {{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</a>

                    </div>
                @empty
                    <div class="text-red-500">There are no tasks!</div>
                @endforelse
            </div>

            @if ($tasks->count())
                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
