<?php

class AuthController extends BaseController {



	public function showLogin()
	{
		return View::make('login');
	}

	public function logout()
	{
			Auth::logout();

			return Redirect::to('login');
	}

	public function actionLogin()
	{
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){

			if (Auth::user()->type == "student") {
				return Redirect::to('profile');
			} else {
				return Redirect::to('welcome-teacher');
			}

		}else{
			return Redirect::to('login')->with('error','username หรือ password ไม่ถูกต้อง');
		}
	}

}
