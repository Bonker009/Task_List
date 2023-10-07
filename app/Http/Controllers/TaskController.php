<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->route("tasks.show", ['task' => $task->id])->with("success", "Task created successfully");
    }
    public function edit(Task $task)
    {
        return view("edit", ['task' => $task]);
    }
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());
        return redirect()->route("tasks.show", ['task' => $task->id])->with("success", "Task updated successfully");
    }
    public function show(Task $task)
    {
        return view("show", ['task' => $task]);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("tasks.index")->with("success", "Task deleted successfully!!");
    }
    public function toggleComplete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->back()->with("success", "Task updated successfully ");
    }
}
