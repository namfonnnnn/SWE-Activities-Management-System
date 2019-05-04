<?php

class ActivityDetail extends Eloquent {

  public function activity()
  {
    return $this->belongsTo('Activity');
  }
  public function teachers()
  {
    return $this->belongsToMany('Teacher', 'responsibilities', 'activity_detail_id', 'teacher_id');
  }
  public function students()
  {
    return $this->belongsToMany('Student', 'participations', 'activity_detail_id', 'student_id');
  }
  public function participations()
  {
    return $this->hasMany('Participation');
  }
  public function responsibilities()
  {
    return $this->hasMany('Responsibility');
  }
  public function rankChecks()
  {
    return $this->hasManyThrough('RankCheck', 'Participation');
  }
  public function responsibilityByUserIDAndSearch($teacherId, $q)
  {
    $activities = new Activity;
    if($q != NULL && $q != ""){
      $activities = $activities->where('name',$q);
    }
    $activity_list = $activities->lists('id');

    $responsibility_list = Responsibility::where('teacher_id',$teacherId)->lists('activity_detail_id');

    $activityDetail = ActivityDetail::whereIn('activity_id',$activity_list)
                      ->whereIn('id',$responsibility_list)
                      ->orderBy('term_year','DESC')
                      ->orderBy('term_sector','DESC');
    
    return $activityDetail;
  }
  public function dayStartDayEnd()
  {
    return Tool::formatDateForsave($this->day_start).' - '.Tool::formatDateForsave($this->day_end);
  }
  public function timeStartTimeEnd()
  {
    return $this->time_start.' - '.$this->time_end;
  }
  public function isPassDayStart()
  {
    return strtotime($this->day_start) >= strtotime('now');
  }
  public function studentAllJoinCount()
  {
    return $this->participations()->count();
  }
  public function studentAllJoin()
  {
    $students = [];
    foreach($this->participations as $participation){
      $students[] = [
        "id" => $participation->student->id,
        "fullName" => $participation->student->getFullName()
      ];
    }
    
    $students_json = json_encode($students);
    return $students_json;
  }
  public function studentJoinCount()
  {
    $count = 0 ;
    foreach($this->participations as $participation){
      $join = true;
      foreach($participation->rankChecks as $rankCheck){
        $join = $join && $rankCheck->status;
      }
      if($join){
        $count++;
      }
    }
    return $count;
  }
  public function studentJoin()
  {
    $students = [];
    foreach($this->participations as $participation){
      $join = true;
      foreach($participation->rankChecks as $rankCheck){
        $join = $join && $rankCheck->status;
      }
      if($join){
        $students[] = [
          "id" => $participation->student->id,
          "fullName" => $participation->student->getFullName()
        ];
      }
    }
    $students_json = json_encode($students);
    return $students_json;
  }
  public function studentNotJoinCount()
  {
    $count = 0 ;
    foreach($this->participations as $participation){
      $join = true;
      foreach($participation->rankChecks as $rankCheck){
        $join = $join && $rankCheck->status;
      }
      if(!$join){
        $count++;
      }
    }
    return $count;
  }
  public function studentNotJoin()
  {
    $students = [];
    foreach($this->participations as $participation){
      $join = true;
      foreach($participation->rankChecks as $rankCheck){
        $join = $join && $rankCheck->status;
      }
      if(!$join){
        $students[] = [
          "id" => $participation->student->id,
          "fullName" => $participation->student->getFullName()
        ];
      }
    }
    $students_json = json_encode($students);
    return $students_json;
  }
  
}
