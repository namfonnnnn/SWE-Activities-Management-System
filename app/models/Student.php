<?php

class Student extends Eloquent {

	protected $table = 'students';

	public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
 
}
