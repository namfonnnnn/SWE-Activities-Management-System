<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		return View::make('login');
	}

	public function logout()
	{
			Auth::logout();
			return Redirect::to('/');
	}

	public function actionLogin()
	{
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){

			// if (Auth::user()->isTeacher()) {
			// 	return Redirect::to('welcome-teacher');
			// } else {
			// 	return Redirect::to('profile');
			// }
			return Redirect::to('profile');
		}else{
			return Redirect::to('login')->with('error','username หรือ password ไม่ถูกต้อง');
		}
	}

}
