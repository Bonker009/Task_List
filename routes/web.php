<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return view("index", ['tasks' => Task::latest()->paginate(10)]);
})->name("tasks.index");

Route::view("/tasks/create", 'create')->name("tasks.create");

Route::post("/tasks", function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route("tasks.show", ['task' => $task->id])->with("success", "Task created successfully");
})->name("tasks.store");
Route::get("/tasks/{task}/edit", function (Task $task) {;
    return view("edit", ['task' => $task]);
})->name("tasks.edit");
Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route("tasks.show", ['task' => $task->id])->with("success", "Task updated successfully");
})->name("tasks.update");

Route::get("/tasks/{task}", function (Task $task) {;
    return view("show", ['task' => $task]);
})->name("tasks.show");

Route::fallback(function () {
    return redirect()->route("tasks.index");
});

Route::delete("/tasks/{task}", function (Task $task) {
    $task->delete();
    return redirect()->route("tasks.index")->with("success", "Task deleted successfully!!");
})->name("tasks.destroy");
Route::put("/tasks/{task}/toggle-complete", function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with("success", "Task updated successfully ");
})->name("tasks.toggleComplete");
