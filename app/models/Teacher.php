<?php

class Teacher extends Eloquent {

    public function position()
    {
        return $this->belongsTo('Position');
    }
    public function role()
    {
        return $this->belongsTo('Role');
    }

    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }

	public function getAvatar() {
			return asset($this->image);
	}
}
