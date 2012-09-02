<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// GET Login - Login form
Route::get('login', function(){
	if( !Auth::guest() ) return Redirect::to('/');
	return View::make('login');
});



// POST to Login - Submit login form and redirect accordingly
Route::post('login', function(){
	
	$userdata = array(
		'username' => Input::get('username'),						// Get post data
		'password' => Input::get('password')
	);
	
	if( Auth::attempt($userdata) ) {
		return Redirect::to('/');									// Winning
	} else {
		return Redirect::to('login')->with('login_errors', true);	// Fail: send login errors
	}
});



// GET Logout - Logout and redirect to login form
Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('login');
});



// ALL Auth necessary stuff here
Route::group(array('before' => 'auth'), function()
{
	
	
	// GET List of stations
	Route::get('/', function(){
		return View::make('stationlist', array( 'stations' => Station::all() ));
	});
	
	
	
	// GET Form for adding new team to a station
	Route::get('(:any)/nyttlag', function($slug){
		
		$station = Station::where('slug','=',$slug)->first();
		$teams = Team::all();
		$stationRounds = Round::where('station_id','=',$station->id)->get();
		$teamsAdded = array();
		$teamslist = array();
		
		foreach($stationRounds as $sr){
			$teamsAdded[] = $sr->team->id;
		}
		foreach($teams as $team){
			if(!in_array($team->id, $teamsAdded)) $teamslist[$team->id] = $team->name;
		}
		
		if(empty($teamslist)) return Redirect::to($slug);

		return View::make('round.new', array( 'station' => $station, 'teams' => $teamslist ));
	});
	
	
	
	// POST Create round for a team and station
	Route::post('(:any)/nyttlag', function($slug){
		Round::create(Input::all());
		return Redirect::to($slug);
	});
	
	
	
	// GET Form for editing a round
	Route::get('(:any)/(:num)', function($slug, $team_id){
		
		$station_id = Station::where('slug', '=', $slug)->only('id');
		$round = Round::where_team_id_and_station_id($team_id, $station_id)->first();
		
		return View::make('round.edit', array('round' => $round, 'station' => $round->station, 'team' => $round->team));
		
	});
	
	// GET Form for editing a round
	Route::put('(:any)/(:num)', function($slug, $team_id){
		$id = Round::where_station_id_and_team_id(Input::get('station_id'), Input::get('team_id'))->only('id');
		Round::update($id, Input::all());
		
		return Redirect::to($slug);
	});
	
	
	
	// GET One station
	Route::get('(:any)', function($slug){
		
		$station = Station::where('slug','=',$slug)->first();
		if(empty($station))return Response::error('404');

		$teams = Team::all();
		$stationRounds = Round::where('station_id','=',$station->id)->get();
		$teamsAdded = array();
		$teamslist = array();
		
		foreach($stationRounds as $sr){
			$teamsAdded[] = $sr->team->id;
		}
		foreach($teams as $team){
			if(!in_array($team->id, $teamsAdded)) $teamslist[$team->id] = $team->name;
		}
		
		$rounds = Round::where('station_id','=',$station->id)->get();
		
		return View::make('station', array( 'station' => $station, 'rounds' => $rounds, 'teamslist' => $teamslist ));
	});
});


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});