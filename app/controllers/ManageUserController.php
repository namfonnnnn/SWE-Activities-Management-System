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
	
	public function showUserTeacherAdd()
	{
		return View::make('manage.user_teacher_add');
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
		
		$student = new Student;
		$student->id = Input::get("id");
		$student->user_id = $user->id;
		$student->firstname = Input::get("firstname");
		$student->lastname = Input::get("lastname");
		$student->year = Input::get("year");

		return ($reuslt) ? 'true' : 'false';
	}

	
}
