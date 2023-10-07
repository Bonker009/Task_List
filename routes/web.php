<?php

use App\Http\Controllers\TaskController;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Contracts\Cache\Store;

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
Route::post("/tasks", [TaskController::class, "store"])->name("tasks.store");
Route::get("/tasks/{task}/edit", [TaskController::class, "edit"])->name("tasks.edit");
Route::put("/tasks/{task}", [TaskController::class, "update"])->name("tasks.update");
Route::get("/tasks/{task}", [TaskController::class, 'show'])->name("tasks.show");
Route::delete("/tasks/{task}", [TaskController::class, "destroy"])->name("tasks.destroy");
Route::put("/tasks/{task}/toggle-complete", [TaskController::class, 'toggleComplete'])->name("tasks.toggleComplete");
Route::fallback(function () {
    return redirect()->route("tasks.index");
});
