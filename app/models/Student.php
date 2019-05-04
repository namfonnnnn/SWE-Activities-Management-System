<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Student extends Eloquent{

  use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  protected $table = 'students';
  protected $dates = ['deleted_at'];

	public function getFullName()
  {
    return $this->prefix.' '.$this->firstname.' '.$this->lastname;
  }

  public function getAvatar() 
  {
		return empty($this->image) ? "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9": asset($this->image);
	}

	public function getNowYear()
	{
		return  Term::getLastYear() - $this->year + 1 ;
  }

  public function convertYear($id)
  {
    $id = (String) $id;
    return "25".$id[0].$id[1];
  }

	public function scopeSearchYear($querry,$year)
	{
		$now_year = Term::getLastYear();
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
