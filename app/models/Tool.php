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
}
