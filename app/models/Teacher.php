<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Teacher extends Eloquent {

  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  public function position()
  {
    return $this->belongsTo('Position');
  }
  public function role()
  {
    return $this->belongsTo('Role');
  }

  public function activityDetails(){
    return $this->belongsToMany('ActivityDetail', 'responsibilities', 'teacher_id', 'activity_detail_id');
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
