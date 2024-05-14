<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function()  {

    return view('index', [
        'tasks' => \App\Models\Task::all()
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}', function(Task $task) {

    return(view('tasks', ['task' => $task]));

})->name('tasks.show');

// CREATING
Route::view('/create-tasks', 'create')->name('tasks.create');

Route::post('/create-task', function(TaskRequest $request){
//    $data = $request->validated(); 
   
//    $task = new Task;
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];

//    $task->save();

    $task = Task::create($request->validated());

   return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task created!");
})->name('tasks.store');


// EDITING 
Route::get('/tasks/{task}/edit', function(Task $task) {

    return(view('edit', ['task' => $task]));

})->name('tasks.edit');

Route::put('/edit-task/{task}', function(Task $task, TaskRequest $request){ 
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task edited!");
 })->name('tasks.edit-task');


 Route::delete('/delete-task/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success', "Task was deleted!");
 })->name('tasks.delete-task');

 