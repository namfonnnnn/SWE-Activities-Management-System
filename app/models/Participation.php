<?php
class Participation extends Eloquent {
  public function student()
  {
    return $this->belongsTo('Student')->withTrashed();
  }
  public function rankChecks()
  {
    return $this->hasMany('RankCheck');
  }
  public function rankChecksByDateAndTime($date,$time)
  {
    $date = Tool::formatDateToDatepicker($date);
    return $this->rankChecks()->where('date_check', $date)->where('time',$time)->first();
  }
  public function dateList()
  {
    $rankCheck = RankCheck::where('participation_id',$this->id)->groupBy('date_check')->lists('date_check');
    return $rankCheck;
  }
}
