<?php

class ManageUserController extends BaseController {

	
	public function showUserStudent()
	{
		return View::make('manage.user_student');
	}
	
	public function showUserTeacher()
	{
		return View::make('manage.user_teacher');
    }
    
    public function showUserStudentAdd()
	{
		return View::make('manage.user_student_add');
	}

	public function actionUserStudentAdd()
	{
		$user = new User;
		$user->username = Input::get("student_id");
		$user->password = Hash::make(Input::get("password"));
		$reuslt = $user->save();
		return ($reuslt) ? 'true' : 'false';
	}

	public function showUserTeacherAdd()
	{
		return View::make('manage.user_teacher_add');
	}

}
