<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


// test check controller if it returns the view without errors 



//  authenticate with auth filter  for all grouped uri's



Route::group(array('before' => 'auth'), function()
{
Route::get('api/composers/add', 'MusicController@useForm');

Route::post('/api/composers/add', 'MusicController@addComposer'); 

Route::get('api/composers/{country}','MusicController@showComposer_byCountry');

Route::get('api/composers','MusicController@index');

Route::get('api/composers/update/', 'UpdateController@toForm');

Route::get('api/composers/delete/{id}', 'MusicController@deleteComposer');

});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/logout', function()
{
	 Auth::logout();
	 Session::flush();
	 return 'you have successfully logged out';
});

Route::post('/login', function()
{
	 $credentials = Input::only('username','password');
	
	if(Auth::attempt($credentials, true)) {

	 	$name = Input::get('username');
		$uid = DB::table('users')->where('username', $name)->pluck('id');

	 		Session::put('se_id',$uid);
	 		return Redirect::to('/api/composers');
	 	}
	  else {

		return Redirect::to('/login');}
	
});


// check sessions 
Route::get('/sesi', function() {

$user_id= Session::get('se_id');
return $user_id;
});

Route::get('/rest', function() {

return Response::json(array('error'=>'no credentials', 'status'=>'404'));
});

 // create a new user to test the permission settings 
// Route::get('/insert', function() {


// 	 $user = new User ; 
// 	 $user->username = 'name';
// 	 $user->email = 'me@mail.com';
// 	 $user->password= Hash::make('fruits');
//      $user->remember_token= str_random(60); 
//      $user->privileges= 3;
// 	 $user->save();

// 	 if ($user->save()) {
// 	 	return 'user added';
// 	 }
// });

