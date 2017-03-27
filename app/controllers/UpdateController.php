<?php

class UpdateController extends   MusicController{



	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	// show all  records with id and name




	public function toForm($id) {
   

   var_dump($this->validateUser());	
   	return 'nice';
   	//return View::make('add');

}

}
