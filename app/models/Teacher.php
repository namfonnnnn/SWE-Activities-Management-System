<?php

class Teacher extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teachers';

	public function getAvatar() {
			return asset($this->image);
	}
}
