<?php
class Tool 
{
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
	public function formatDateToDatepicker($day)
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
}
