<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public function student()
    {
        return $this->belongsTo('Student');
	}

	public function teacher()
    {
        return $this->belongsTo('Teacher');
	}

	public function getAvatar() {
			return asset($this->image);
	}

	public function isTeacher()
	{
		$teacher = Teacher::where('user_id',$this->id)->first();
		if(isset($teacher))
		{
			return true;
		}
		return false;
	}

	public function isHeadTeacher()
	{
		$teacher = Teacher::where('user_id',$this->id)->first();
		if(isset($teacher) && $teacher->role->isHeadTeacher == 1)
		{
			return true;
		}
		return false;
	}

	public function isAdmin()
	{
		$teacher = Teacher::where('user_id',$this->id)->first();
		if(isset($teacher) && $teacher->role->isAdmin== 1)
		{
			return true;
		}

		return false;
	}
	
	public function getFullName()
	{
		$result = '';

		$student = Student::where('user_id',$this->id)->first();
		if(isset($student))
		{
			$result = $student->getFullName();
		}
		$teacher = Teacher::where('user_id',$this->id)->first();
		if(isset($teacher))
		{
			$result = $teacher->getFullName();
		}
		return $result;
	}
}
