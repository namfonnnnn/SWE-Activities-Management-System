<?php
class Tool 
{
  public function coverTime($date)
	{
		$date = strtr($date, '/', '-');
		return date("Y-m-d",strtotime($date));
	}
  public function validData($input=null, $obj=null, $default='')
	{
		if(!is_null($input)){
			$reuslt = $input;
		 }else if(isset($obj)){
			$reuslt = $obj;
		 }else{
			$reuslt = $default;
		 }
		 return $reuslt;
	}
	public static function formatDateToDatepicker($day)
	{
		if($day != ''){
			$day = strtr($day, '/', '-');
			return date('Y-m-d',strtotime($day));
		}else{
			return '';
		}
	}
	public function formatTimeToDatepicker($time)
	{
		if($time != ''){
			$a      = preg_split('/[: ]/', $time);
			$time = $a[0].':'.$a[1];
			return $time;
		}else{
			return '';
		}
	}
	public function formatDateForsave($day)
	{
		if($day != ''){
			$day = strtr($day, '/', '-');
			return date('d/m/Y',strtotime($day));
		}else{
			return '';
		}
	}
	public function nowForDatepicker()
	{
		return date("Y-m-d",strtotime(Carbon\Carbon::now()));
	}
	public function isPastDay($date)
	{
		$today = Tool::nowForDatepicker();
		if (strtotime($date) < strtotime($today))
			return true;
		else
			return false;
  }
  public function listOfTwoDate($date1,$date2)
  {
    $listOfDate = [$date1];
    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $date1);
    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $date2);
    $day = $to->diffInDays($from);
    for ($i=0; $i < $day; $i++) {
      $listOfDate[] = $to->addDays(1)->toDateString();
    }
    return $listOfDate;
  }
}
