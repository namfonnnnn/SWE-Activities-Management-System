<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';


// validate
Validator::extend('before_or_equal', function($attribute, $value, $parameters) {
	$day_end = strtotime(strtr($value, '/', '-'));
	$day_start = strtotime(strtr(Input::get($parameters[0]), '/', '-'));
    return $day_end >= $day_start;
});
Validator::extend('exist_bettewn_in_db', function($attribute, $value, $parameters)
{
	$value = Tool::formatDateToDatepicker($value);
	// 0=table , 1=field1 , 2=field2
	$db = DB::table($parameters[0])
	->where($parameters[1], '<=', $value)
	->where($parameters[2], '>=', $value);
	if(isset($parameters[3]))
		$db = $db->where('id', '!=', $parameters[3]);
	return $db->count() < 1;
});
Validator::extend('exist_term_and_sector_in_db', function($attribute, $value, $parameters)
{
  $activityDetail = ActivityDetail::where('activity_id',$parameters[0])
                    ->where('term_year',Input::get($parameters[1]))
                    ->where('term_sector',$value);
  if(isset($parameters[2]))
    $activityDetail = $activityDetail->where('id','!=',$parameters[2]);
  return $activityDetail->count() < 1;
});