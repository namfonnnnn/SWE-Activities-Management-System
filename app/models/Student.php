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
        return $this->prefix.' '.$this->firstname.' '.$this->lastname;
    }

	public function getAvatar() {
		return empty($this->image) ? "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9": asset($this->image);
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
