<?php

class Student extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

	public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }

	public function getAvatar() {
		return asset($this->image);
	}
	
	public function scopeSearchYear($querry,$year)
	{
		$now_year = 2561;
		if($year >= 1 && $year <= 4){
			$search_year = $now_year - ( $year - 1 );
			return $querry->where('year',$search_year);
		}
		else{
			$search_year = $now_year - $year;
			return $querry->where('year','<',$search_year);
		}
		
	}

}
