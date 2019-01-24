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

}
