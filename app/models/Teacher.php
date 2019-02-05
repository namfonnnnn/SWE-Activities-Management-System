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
        return $this->prefix.' '.$this->firstname.' '.$this->lastname;
    }
    
    public function scopeWhereNotAdmin($querry)
	{
        $role = Role::where('isTeacher','1')->orWhere('isHeadTeacher','1')->lists('id');
		return $querry->whereIn('role_id',$role);
	}

	public function getAvatar() {
			return asset($this->image);
	}
}
