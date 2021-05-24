<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks',function(){
    $data=App\Models\Task::all();
    return view('task')->with('accessTask',$data);
});

Route::post('/saveTask','App\Http\Controllers\TaskController@store');

Route::get('/markascompleted/{id}','App\Http\Controllers\TaskController@UpdateTaskAsCompleted');

Route::get('/markasnotcompleted/{id}','App\Http\Controllers\TaskController@UpdateTaskAsNotCompleted');

Route::get('/deleteTask/{id}','App\Http\Controllers\TaskController@deletetask');

Route::get('/updateTask/{id}','App\Http\Controllers\TaskController@updatetask');

Route::post('/updateTaskView','App\Http\Controllers\TaskController@updatetaskview');
