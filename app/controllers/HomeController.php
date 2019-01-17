<?php

class HomeController extends BaseController {

	public function showHome()
	{
		if (Auth::check()) {

			if (Auth::user()->type == "student") {
				return Redirect::to('profile');
			} else {
				return Redirect::to('welcome-teacher');
			}

		}
		return View::make('home');
	}
	public function showActivity($id)
	{
		if (!Auth::check()) {
			return Redirect::to('/login');
		}
		$activity = Activity::find($id);
		$register = \DB::table('checking')->where('activityID', $id)->where('userID', Auth::user()->id)->first();

		return View::make('show-activity', ['activity' => $activity, 'register'=>$register]);

	}
	public function registerActivity($id)
	{
		if (!Auth::check()) {
			return Redirect::to('/login');
		}
		$register = \DB::table('checking')->where('activityID', $id)->where('userID', Auth::user()->id)->first();

		if (empty($register)){
			\DB::table('checking')->insert(['activityID'=> $id, 'userID'=>Auth::user()->id, 'status'=> 1]);
		}


		return Redirect::back();
	}

	public function unRegisterActivity($id)
	{
		$register = \DB::table('checking')->where('activityID', $id)->where('userID', Auth::user()->id)->first();
		if (!empty($register)){
			\DB::table('checking')->where('activityID', $id)->where('userID', Auth::user()->id)->delete();
		}


		return Redirect::back();
	}

	public function welcomeTeach ()
	{
		$activities = Activity::where('day_end', '>', Carbon\Carbon::now()->format('Y-m-d'))->orderBy('day_start')->get();
		return View::make('welcome-teacher', ['activities' => $activities]);
	}


}
