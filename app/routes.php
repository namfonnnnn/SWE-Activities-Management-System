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

Route::get('/show-activity/{id}', 'HomeController@showActivity');
Route::get('/activity-register/{id}', 'HomeController@registerActivity');
Route::get('/activity-un-register/{id}', 'HomeController@unRegisterActivity');
Route::get('/welcome-teacher', 'HomeController@welcomeTeach');



//guest
Route::get('/', function()
{
	return Redirect::to('/home');
});
Route::get('/manage', function(){
	return View::make('manage.index');
});
Route::get('/home', 'HomeController@showHome');

Route::get('/login', 'AuthController@showLogin');
Route::post('/login', 'AuthController@actionLogin');
Route::get('/logout', 'AuthController@logout');

//student

//teacher
Route::group(array('before' => 'teacher') , function () {
	Route::get('/manage/activity/add', 'ManageActivityController@showActivityAdd');
	Route::post('/manage/activity/add', 'ManageActivityController@actionActivityAdd');
	Route::get('/manage/activity/edit/{id}', 'ManageActivityController@showActivityEdit');
	Route::post('/manage/activity/edit/{id}', 'ManageActivityController@actionActivityAdd');
	Route::get('/manage/activity/delete/{id}', 'ManageActivityController@actionActivityDelete');

	Route::get('/manage/activity/summary', 'ManageActivityController@showActivitySummary');

	Route::get('/manage/activity/summary/useradd', 'ManageActivityController@showActivitySummaryUseradd');

	Route::get('/manage/activity/detail', 'ManageActivityController@showActivityDetail');

	Route::get('/manage/activity/check/status/{id}', 'ManageActivityController@showActivityStatus');
});

//headteacher
Route::group(array('before' => 'headteacher') , function () {
	Route::get('/manage/activity/conclude', 'ManageActivityController@showActivityConclude');
});

//admin
Route::group(array('before' => 'admin') , function () {
	Route::get('/manage/user/student', 'ManageUserController@showUserStudent');
	Route::get('/manage/user/student/add', 'ManageUserController@showUserStudentAdd');
	Route::post('/manage/user/student/add', 'ManageUserController@actionUserStudentAdd');
	Route::get('/manage/user/student/edit/{id}', 'ManageUserController@showUserStudentEdit');
	Route::post('/manage/user/student/edit/{id}', 'ManageUserController@actionUserStudentAdd');
	Route::get('/manage/user/student/delete/{id}', 'ManageUserController@actionUserStudentDelete');

	Route::get('/manage/user/teacher', 'ManageUserController@showUserTeacher');
	Route::get('/manage/user/teacher/add', 'ManageUserController@showUserTeacherAdd');
	Route::post('/manage/user/teacher/add', 'ManageUserController@actionUserTeacherAdd');
	Route::get('/manage/user/teacher/edit/{id}', 'ManageUserController@showUserTeacherEdit');
	Route::post('/manage/user/teacher/edit/{id}', 'ManageUserController@actionUserTeacherAdd');
	Route::get('/manage/user/teacher/delete/{id}', 'ManageUserController@actionUserTeacherDelete');
});



Route::get('/student_profile', 'StudentProfileController@studentProfile');
Route::post('/student_profile','StudentProfileController@showStudentEdit');

Route::get('/student_form','StudentFormController@studentForm');
Route::post('/student_form','StudentFormController@showStudentEdit');

Route::get('/student_upload', 'StudentUploadController@studentUpload');
Route::post('/student_upload','StudentUploadController@actionStudentUpload');


// Saharat Rakdam

// Route::get('/login', 'UserController@getLogin');
// Route::get('/logout', 'UserController@getLogout');
// Route::post('/login', 'UserController@postLogin');

Route::get('/profile', 'UserController@getProfile');
Route::get('/profile/edit', 'UserController@getProfileUpdate');
Route::post('/profile/edit', 'UserController@postProfileUpdate');
Route::get('/profile/upload-avatar', 'UserController@getUploadAvatar');
Route::post('/profile/upload-avatar', 'UserController@postUploadAvatar');
// Route::get('manage/activity/check/status-student/{userid}/{acid}', 'UserController@checkStudentActivity');
// Route::group(array('prefix'=>'students'), function () {
// 	Route::get('/index', 'StudentController@index');
// });

// Route::group(array('prefix'=>'manage') , function () {


// 	Route::resource('activity', 'ActivityController');
// 	Route::resource('user/student', 'StudentController');
// 	Route::resource('user/teach', 'TeachController');
// 	Route::resource('user/president', 'PresidentController');
// 	Route::resource('user/admin', 'AdminController');
// 	Route::resource('activity-type', 'ActivityTypeController');
// 	Route::group(array('prefix' => 'user'), function () {

// 	});

// });


