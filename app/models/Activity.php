<?php
class Activity extends Eloquent {
	protected $table = 'activity';
  public function getPicture()
  {
    if(is_null($this->image))
      $this->image = 'assets/image/p-image.jpg';
    return $this->image;
  }
	public function getTeacherName()
	{
		$teacher_name = "";
		foreach (json_decode($this->teacher) as $t) {
			if($t == 1){
				$teacher_name .= "ผู้ช่วยศาสตราจารย์ ฐิมาพร  เพชรแก้ว";
			}else if($t == 2){
				$teacher_name .= " อาจารย์ ดร. กรัณรัตน์   ธรรมรักษ์";
			}else if($t == 3){
				$teacher_name .= "ผู้ช่วยศาสตราจารย์ อุหมาด  หมัดอาด้ำ";
			}else if($t == 4){
				$teacher_name .= "อาจารย์ ดร. พุทธิพร  ธนธรรมเมธี";
			}else if($t == 5){
				$teacher_name .= "ผู้ช่วยศาสตราจารย์ เยาวเรศ  ศิริสถิตย์กุล";
			}
			$teacher_name .= "<br>";
		}
		return $teacher_name;
	}
	public function teacherJson()
	{
		if($this->teacher)
			return json_decode($this->teacher);
		else
			return null;
	}
	public function studentJson()
	{
		if($this->student)
			return json_decode($this->student);
		else
			return null;
  }
  public function activityDetails()
  {
    return $this->hasMany('ActivityDetail');
  }
  public function details()
  {
    return $this->hasMany('ActivityDetail');
  }	
}
