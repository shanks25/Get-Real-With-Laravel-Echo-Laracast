<?php

use App\Events\TaskCreated;
use App\Task;
use Illuminate\Http\Request;
 use App\Events\OrderStatusUpdated;
 


Route::get('/', function () {
	return view('welcome');
});


Route::get('tasks',function(){
	return Task::latest()->pluck('body');
});


Route::post('tasks',function(Request $request){
$task = Task::Create([
		'body'=>$request->body
	]);
	event(new TaskCreated($task));
});

 