<?php
set_time_limit(0);
class ManageActivityController extends BaseController {

	public function validData($input=null, $activity=null, $default='')
	{
		if(!is_null($input)){
			$reuslt = $input;
		 }else if(isset($activity)){
			$reuslt = $activity;
		 }else{
			$reuslt = $default;
		 }
		 return $reuslt;
  }

  public function showActivity()
	{
    $q = '';
    $activities = Activity::orderBy('id','DESC');
    if(Input::get('q') != NULL && Input::get('q') != ""){
			$q = Input::get('q');
			$activities = $activities->Where('name','like','%'.$q.'%');
		}
		$activities = $activities->paginate(10);
		$activities->appends(['q'=>$q]);
		return View::make('manage.activity',['activities' => $activities,'q'=>$q]);
  }

  public function showActivityTerm($id)
  {
    $q = '';
    $activity = Activity::find($id);
    $activityDetails = ActivityDetail::where('activity_id',$id)->orderBy('day_start','DESC');
    if(Input::get('q') != NULL && Input::get('q') != ""){
			$q = Input::get('q');
			$activityDetails = $activityDetails->Where('year','like','%'.$q.'%')->orWhere('sector','like','%'.$q.'%');
		}
		$activityDetails = $activityDetails->paginate(10);
    $activityDetails->appends(['q'=>$q]);
    return View::make('manage.activity_term',['activity' => $activity ,'activityDetails' => $activityDetails,'q'=>$q]);
  }

  public function showActivityTermAdd($id)
	{
    $text_daystart = $this->validData(Input::old('daystart'), null,'');
    $text_dayend = $this->validData(Input::old('dayend'), null,'');
    $text_timestart = $this->validData(Input::old('timestart'), null,'');
    $text_timeend = $this->validData(Input::old('timeend'), null,'');
    $selectbox_sector = $this->validData(Input::old('sector'), null,'');
    $check_teachers =  $this->validData(Input::old('teachers'), null,[]);
    $check_students =  $this->validData(Input::old('students'), null,[]);
    $text_location = $this->validData(Input::old('location'), null,'');

    $text_daystart = Tool::formatDateToDatepicker($text_daystart);
    $text_dayend = Tool::formatDateToDatepicker($text_dayend);
    $text_timestart = Tool::formatTimeToDatepicker($text_timestart);
    $text_timeend = Tool::formatTimeToDatepicker($text_timeend);

    $isPastDayStart = false;
		$isPastDayEnd = false;

    $teachers = Teacher::whereNotAdmin()->get();
    $students = Student::get();

    $term_years = Term::groupBy('year')->orderBy('year','desc')->limit(1)->lists('year');
    $term_sectors = Term::where('year',$term_years[0])->lists('sector');

		$data = [
      'term_years'=>$term_years,
      'term_sectors'=>$term_sectors,
      'text_daystart'=>$text_daystart,
			'text_dayend'=>$text_dayend,
			'text_timestart'=>$text_timestart,
      'text_timeend'=>$text_timeend,
      'selectbox_sector'=>$selectbox_sector,
      'check_teachers'=>$check_teachers,
      'check_students'=>$check_students,
      'text_location'=>$text_location,
      'isPastDayStart'=>$isPastDayStart,
			'isPastDayEnd'=>$isPastDayEnd,
      'teachers'=>$teachers,
      'students'=>$students,
      
		];
		return View::make('manage.activity_term_add',$data);
  }

  public function showActivityTermEdit($activity_id,$id)
	{
    $activityDetail = ActivityDetail::find($id);
		if(is_null($activityDetail)){
			return Redirect::to('manage/activity/'.$activity_id.'/term/')->with('error', 'ไม่พบปีและเทอมของกิจรรม');
    }
    
    $text_daystart = $this->validData(Input::old('daystart'), $activityDetail->day_start,'');
    $text_dayend = $this->validData(Input::old('dayend'), $activityDetail->day_end,'');
    $text_timestart = $this->validData(Input::old('timestart'), $activityDetail->time_start,'');
    $text_timeend = $this->validData(Input::old('timeend'), $activityDetail->time_end,'');
    $selectbox_sector = $this->validData(Input::old('sector'), $activityDetail->term_sector,'');
    $check_teachers =  $this->validData(Input::old('teachers'), $activityDetail->responsibilities()->lists('teacher_id'),[]);
    $check_students =  $this->validData(Input::old('students'), $activityDetail->participations()->lists('student_id'),[]);
    $text_location = $this->validData(Input::old('location'), $activityDetail->location,'');

    $text_daystart = Tool::formatDateToDatepicker($text_daystart);
    $text_dayend = Tool::formatDateToDatepicker($text_dayend);
    $text_timestart = Tool::formatTimeToDatepicker($text_timestart);
    $text_timeend = Tool::formatTimeToDatepicker($text_timeend);

    $isPastDayStart = false;
		$isPastDayEnd = false;

    $teachers = Teacher::whereNotAdmin()->get();
    $students = Student::get();

    $term_years = [$activityDetail->term_year];
    $term_sectors = Term::where('year',$term_years[0])->lists('sector');

		$data = [
      'term_years'=>$term_years,
      'term_sectors'=>$term_sectors,
      'text_daystart'=>$text_daystart,
			'text_dayend'=>$text_dayend,
			'text_timestart'=>$text_timestart,
      'text_timeend'=>$text_timeend,
      'selectbox_sector'=>$selectbox_sector,
      'check_teachers'=>$check_teachers,
      'check_students'=>$check_students,
      'text_location'=>$text_location,
      'isPastDayStart'=>$isPastDayStart,
			'isPastDayEnd'=>$isPastDayEnd,
      'teachers'=>$teachers,
      'students'=>$students,
      
		];
		return View::make('manage.activity_term_add',$data);
  }

  public function actionActivityTermAdd($activity_id,$id=null)
	{
		$rules = array(
			'timestart' => 'required|date_format:H:m',
			'timeend' => 'required|date_format:H:m|after:timestart',
			'location' => 'required',
			'teachers' => 'required_without_all',
			'students' => 'required_without_all'
    );

		if(isset($id)){
			$fail_redirect_to = 'manage/activity/'.$activity_id.'/term/'.$id.'/edit';
			$success_redirect_to = 'manage/activity/'.$activity_id.'/term';
			$success_message ='แก้ไขสำเร็จ';
			$rules['daystart'] = 'required|date_format:d/m/Y|before_or_equal:daystart|exist_bettewn_in_db:activity_details,day_start,day_end,'.$id;
			$rules['dayend'] =  'required|date_format:d/m/Y|before_or_equal:daystart|exist_bettewn_in_db:activity_details,day_start,day_end,'.$id;
      $rules['sector'] = 'required|exist_term_and_sector_in_db:'.$activity_id.',year,'.$id;
    }
		else{
			$fail_redirect_to = 'manage/activity/'.$activity_id.'/term/add';
			$success_redirect_to = 'manage/activity/'.$activity_id.'/term';
			$success_message ='บันทึกสำเร็จ';
			$rules['daystart'] = 'required|date_format:d/m/Y|before_or_equal:daystart|exist_bettewn_in_db:activity_details,day_start,day_end';
			$rules['dayend'] =  'required|date_format:d/m/Y|before_or_equal:daystart|exist_bettewn_in_db:activity_details,day_start,day_end';
      $rules['sector'] = 'required|exist_term_and_sector_in_db:'.$activity_id.',year';
    }
		$message = [
			'before_or_equal'=>'วันที่ก่อน วันที่เริ่มกิจกรรม',
			'timeend.after'=> 'ไม่สามารถกรอกเวลาสิ้นสุดก่อนเวลาเริ่มต้นได้',
      'exist_bettewn_in_db' => 'วันที่นี้ถูกจัดกิจรรมไปเเล้ว',
      'sector.exist_term_and_sector_in_db' => 'กิจกรรมนี้ถูกสร้างไปเเล้วในเทอมนี้'
		];
		$validator = Validator::make(Input::all(),$rules,$message);
		if($validator->fails()){
			return Redirect::to($fail_redirect_to)->withInput()->withErrors($validator);
    }
		if(isset($id)){
      $activityDetail = ActivityDetail::find($id);
      $activityDetail->updated_by = Auth::user()->id;
		}else{
      $activityDetail = new ActivityDetail;
      $activityDetail->created_by = Auth::user()->id;
      $activityDetail->updated_by = Auth::user()->id;
    }
    $activityDetail->activity_id = $activity_id;
		$activityDetail->day_start = Tool::coverTime(Input::get("daystart"));
		$activityDetail->day_end = Tool::coverTime(Input::get("dayend"));
		$activityDetail->time_start = Input::get("timestart");
		$activityDetail->time_end = Input::get("timeend");
		$activityDetail->term_year = Term::getLastYear();
		$activityDetail->term_sector = Input::get("sector");
    $activityDetail->location = Input::get("location");
		try {
      $reuslt = $activityDetail->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($fail_redirect_to)->withInput()->with('error', $e->getMessage());
    }

    try {
      $activityDetail->teachers()->sync(Input::get("teachers"));
      $activityDetail->students()->sync(Input::get("students"));

      $listOfDate = Tool::listOfTwoDate($activityDetail->day_start,$activityDetail->day_end);
      
      $activityDetail->rankChecks()->delete();
      $participations = $activityDetail->participations()->get();
      foreach ($participations as $participation) {
        foreach ($listOfDate as $day) {
          $rankCheck = new RankCheck;
          $rankCheck->activity_details_id = $activityDetail->id;
          $rankCheck->participation_id = $participation->id;
          $rankCheck->date_check = $day;
          $rankCheck->time ='เช้า';
          $rankCheck->save();

          $rankCheck = new RankCheck;
          $rankCheck->activity_details_id = $activityDetail->id;
          $rankCheck->participation_id = $participation->id;
          $rankCheck->date_check = $day;
          $rankCheck->time ='บ่าย';
          $rankCheck->save();
        }
      }
		}
		catch ( \Exception $e ) {
      $activityDetail->delete();
			return Redirect::to($fail_redirect_to)->withInput()->with('error', $e->getMessage());
    }
		
		return Redirect::to($success_redirect_to)->withInput()->with('message', $success_message);
  }

  public function actionActivityTermDelete($activity_id,$id)
	{
		$activityDetail = ActivityDetail::find($id);
		if(is_null($activityDetail)){
			return Redirect::back()->with('error', 'ไม่พบข้อมูลกิจกรรม');
		}

		try {
			$activityDetail->delete();
		}
		catch ( \Exception $e ) {
			return Redirect::back()->with('error', $e->getMessage());
		}

		return Redirect::back()->with('message','ลบข้อมูลกิจกรรมสำเร็จ');
  }
  
  public function showActivityAdd()
	{
		$text_name = $this->validData(Input::old('name'), null,'');
    $text_detail = $this->validData(Input::old('detail'), null,'');

		$data = [
			'text_name'=>$text_name,
      'text_detail'=>$text_detail,
		];
		return View::make('manage.activity_add',$data);
  }
  
	public function showActivityEdit($id) 
	{
		$activity = Activity::find($id);
		if(is_null($activity)){
			return Redirect::to('manage/activity/summary/useradd')->with('error', 'ไม่พบกิจรรม');
    }
    $text_name = $this->validData(Input::old('name'), $activity->name,'');
    $text_detail = $this->validData(Input::old('detail'), $activity->description,'');
    $picture = $this->validData(null, $activity->getPicture(),null);


		$data = [
			'activity'=>$activity,
			'text_name'=>$text_name,
      'text_detail'=>$text_detail,
      'picture'=>$picture
		];
		return View::make('manage.activity_add',$data);
  }
  
	public function actionActivityAdd($id = null)
	{
		$rules = array(
			'name' => 'required'
    );
    $success_redirect_to = 'manage/activity/';
		if(isset($id)){
			$fail_redirect_to = 'manage/activity/edit/'.$id;
			$success_message ='แก้ไขสำเร็จ';
		}
		else{
			$fail_redirect_to = 'manage/activity/add';
			$success_message ='บันทึกสำเร็จ';
		}
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to($fail_redirect_to)->withInput()->withErrors($validator);
		}

		if(isset($id)){
      $activity = Activity::find($id);
      $activity->updated_by = Auth::user()->id;
		}else{
      $activity = new Activity;
      $activity->created_by = Auth::user()->id;
      $activity->updated_by = Auth::user()->id;
		}

		$save_image_path = 'assets/upload/image';

		if (!is_null(Input::file('photo'))){

			$file = Input::file('photo');
			$file_name = $file->getClientOriginalName();
			$file->move($save_image_path, $file_name);
			$path = $file->getRealPath();
			$activity->image = $save_image_path.'/'.$file_name;
		}

		$activity->name = Input::get("name");
    $activity->description = Input::get("detail");

		try {
			$reuslt = $activity->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($fail_redirect_to)->withInput()->with('error', $e->getMessage());
    }
    if(!isset($id)){
			$success_redirect_to = 'manage/activity/'.$activity->id.'/term/add';
		}
		return Redirect::to($success_redirect_to)->withInput()->with('message', $success_message);
  }
  
	public function actionActivityDelete($id)
	{
		$activity = Activity::find($id);
		if(is_null($activity)){
			return Redirect::back()->with('error', 'ไม่พบข้อมูลกิจกรรม');
		}

		try {
			$activity->delete();
		}
		catch ( \Exception $e ) {
			return Redirect::back()->with('error', $e->getMessage());
		}

		return Redirect::back()->with('message','ลบข้อมูลกิจกรรมสำเร็จ');
  }

	public function showActivitySummary()
	{
    $q = '';
    $activities = Activity::orderBy('id','DESC');
    if(Input::get('q') != NULL && Input::get('q') != ""){
			$q = Input::get('q');
			$activities = $activities->Where('name','like','%'.$q.'%');
		}
		$activities = $activities->paginate(10);
		$activities->appends(['q'=>$q]);
		return View::make('manage.activity_summary',['activities' => $activities,'q'=>$q]);
  }
  
	public function showActivitySummaryUseradd()
	{
    $q = Input::get('q');
    $activityDetails = ActivityDetail::responsibilityByUserIDAndSearch(Auth::user()->teacher->id,$q);
		$activityDetails = $activityDetails->paginate(10);
		$activityDetails->appends(['q'=>$q]);
		return View::make('manage.activity_summary_useradd',['activityDetails' => $activityDetails,'q'=>$q]);
  }
  
	public function showActivityConclude()
	{
    $q = '';
    $activities = Activity::orderBy('id','DESC');
    if(Input::get('q') != NULL && Input::get('q') != ""){
			$q = Input::get('q');
			$activities = $activities->Where('name','like','%'.$q.'%');
		}
		$activities = $activities->paginate(10);
		$activities->appends(['q'=>$q]);
		return View::make('manage.activity_conclude',['activities' => $activities,'q'=>$q]);
  }
  
	public function showActivityDetail()
	{
		return View::make('manage.activity_detail');
  }
  
  public function showParticipation($activity_detail_id)
  {

    $q = '';
    $participations = Participation::where('activity_detail_id',$activity_detail_id)->orderBy('student_id','DESC');
    if(Input::get('q') != NULL && Input::get('q') != ""){
      $q = Input::get('q');
      $student_list = Student::withTrashed()->where('firstname','like','%'.$q.'%')->orWhere('lastname','like','%'.$q.'%')->lists('id');
			$participations = $participations->whereIn('student_id',$student_list);
		}
		$participations = $participations->paginate(20);
    $participations->appends(['q'=>$q,'day'=>Input::get('day')]);
    
    $daylist = [];
    $nowDay = null;
    if($participations->count() > 0){
      $daylist = $participations[0]->dateList();
      $nowDay = Tool::formatDateForsave($daylist[0]);
      if(Input::get('day') != NULL && Input::get('day') != ""){
        $nowDay = Input::get('day');
        $participations->appends(['day'=>Input::get('day')]);
      }
    }
    
		return View::make(
      'manage.participation',
      [
        'participations' => $participations,
        'q'=>$q,
        'dayList'=>$daylist,
        'nowDay'=>$nowDay,
        'activity_detail_id'=>$activity_detail_id
      ]
    );
  }

  public function actionParticipation($activity_detail_id,$id)
  {
    try {
      $rankCheck = RankCheck::find($id);
      if(Input::get('status') == 'true'){
        $rankCheck->status = 1;
      }
      else{
        $rankCheck->status = 0;
      }
      $rankCheck->save();
      return 'true';
    } catch (\Throwable $th) {
      return 'false';
    }
    
  }
  public function actionParticipationAll($activity_detail_id)
  {
    try {
      $date_check = Tool::formatDateToDatepicker(Input::get('date'));
    //   $activityDetail = ActivityDetail::find($activity_detail_id);
    //   foreach($activityDetail->participations as $p){
    //     $p->with(["rankChecks" => function($q) use($date_check) {
    //       $q->where('date_check', '=',$date_check );
    //     }])->get();
    //     foreach($p->rankChecks as $c){
    //       $c->status = 1;
    //       $c->save();
    //     }
    //   }
        $rankCheck = RankCheck::where('date_check',$date_check)
                                ->where('activity_details_id',$activity_detail_id)
                                ->update(array('status' => 1));
      return 'true';
    } catch (\Throwable $th) {
      return 'false';
    }
    
  }

	public function showActivityStatus($id)
	{
		$activity = Activity::find($id);
		$register = \DB::table('checking')->where('activityID', $id)->get();
		return View::make('manage.activity_check_status', ['activity' => $activity, 'register'=>$register]);
  }
  
  public function showActivityDecription($activity_detail_id)
  {
    $activityDetail = ActivityDetail::find($activity_detail_id);
    return View::make('manage.activity_decription',['activityDetail' => $activityDetail]);
  }

}
