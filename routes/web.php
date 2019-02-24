<?php

use App\Events\OrderStatusUpdated;


class order{
	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}
}


Route::get('/', function () {

	return view('welcome');
});


Route::get('update',function(){
	OrderStatusUpdated::dispatch(new order(5));
});