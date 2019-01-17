<?php

class UserController extends Controller {

  public function getLogin() {
    return View::make('login');
  }


  public function postLogin() {

    $students = Student::where('username', Input::get('username'))->first();

    if (empty($students)) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ไม่พบข้อมูลผู้ใช้งานระบบ')->withInput();
    }


    if (!Hash::check(Input::get('password'), $students->password)) {
      return Redirect::to('/login')->with('status', false)->with('message', 'รหัสผ่านผู้ใช้งานระบบไม่ถูกต้อง')->withInput();
    }

    Auth::login($students);
    return Redirect::to('/login')->with('status', true)->with('message', 'เข้าสู่ระบบเรียบร้อยแล้ว')->withInput();

  }

  public function getProfile () {
    if(!empty(Request::get('userID')))
    {
        $userID = Request::get('userID');
        $user = User::find(Request::get('userID'));
    } else {
        $userID = Auth::user()->id;
        $user = Auth::user();

    }
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }
    $activity = Activity::where('day_end', '>', Carbon\Carbon::now()->format('Y-m-d'))->orderBy('day_start');

    if(!empty(Request::get('year'))) {
        $year = Request::get('year');
        $activity = $activity->where('student', 'LIKE', "%{$year}%");
    }

    $grapYearActivityReg = \DB::table('checking')->select('activityID')->where('UserID', $userID)->get();
    $setIdReg = [];
    foreach ($grapYearActivityReg as $key => $value) {
        $setIdReg[] = $value->activityID;
    }
    $grapYearActivityReg = Activity::select('sector', \DB::raw('count(sector) as count'))->groupBy('sector')->whereIn('id', $setIdReg)->get()->toArray();
    $grapYearActivityRec = Activity::select('sector', \DB::raw('count(sector) as count'))->groupBy('sector')->get()->toArray();


    $setActivityRec = [];
    foreach ($grapYearActivityRec as $key => $value) {
        $setActivityRec[] = ['label'=> $value['sector'], 'y'=>$value['count']];

    }
    $setActivityReg = [];
    foreach ($grapYearActivityReg as $key => $value) {
        $setActivityReg[] = ['label'=> $value['sector'], 'y'=>$value['count']];

    }

    $history = Activity::whereIn('id', $setIdReg);

    // if(!empty(Request::get('year'))) {
    //     $activity = $activity->where('student', 'LIKE', "%{$year}%");
    // }
    $history = $history->get();
    $activity = $activity->get();

    if (empty(Request::get('userID'))) {
        if (Auth::user()->type != 'student') {
            $activities = Activity::where('day_end', '>', Carbon\Carbon::now()->format('Y-m-d'))->orderBy('day_start')->get();
            return View::make('welcome-teacher', ['activities' => $activities]);
        }
    }


    return View::make('profile', array('user'=>$user,'activity'=>$activity, 'setActivityRec'=>$setActivityRec, 'setActivityReg'=>$setActivityReg, 'history'=>$history));

}

public function checkStudentActivity($uid, $aid)
{
    $a = \DB::table('checking')->where('userID', $uid)->where('activityID', $aid)->update(array('status'=> 2));
    return Redirect::back();
}
  public function getProfileUpdate() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }

    return View::make('profile-form');
  }


  public function postProfileUpdate() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }

    $validator = Validator::make(
      Input::all(),
      array(
        'firstname' => 'required|min:3',
        'lastname' => 'required|min:3',
        'email' => 'required|email|min:5',
        'tel' => 'required',
      ),
      array(
        'required' => 'กรุณากรอกข้อมูล :attribute',
      ),
      array(
        'firstname' => 'ชื่อ',
        'lastname' => 'นามสกุล',
        'email' => 'Email',
        'code' => 'รหัสนักศึกษา',
        'tel' => 'เบอร์ติดต่อ',
      )
    );

    if ($validator->fails())
    {
      return Redirect::to('/profile/edit')->withInput()->withErrors($validator);
    }

    $user = Student::find(Auth::user()->id);

    $user->firstname = Input::get('firstname');
    $user->lastname = Input::get('lastname');
    $user->email = Input::get('email');
    $user->code = Input::get('code');
    $user->tel = Input::get('tel');

    $user->save();


    return Redirect::to('/profile')->with('status', true)->with('message', 'บันทึกข้อมูลโปรไฟล์เรียบร้อย')->withInput();

  }

  public function getUploadAvatar () {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }

    return View::make('profile-avatar');
  }

  public function postUploadAvatar() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }


    if (Input::file('image')->isValid())
    {
      $destinationPath = 'avatar/'.Auth::user()->id.'/';

      $fileName = date('YmdHis').Input::file('image')->getClientOriginalName();

      Input::file('image')->move($destinationPath, $fileName);

      $user = Student::find(Auth::user()->id);

      $user->image = $destinationPath.$fileName;

      $user->save();

    }
    return Redirect::to('/profile')->with('status', true)->with('message', 'บันทึกข้อมูลโปรไฟล์เรียบร้อย')->withInput();
  }

  public function getLogout() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }

    Auth::logout();
    return Redirect::to('/login')->with('status', true)->with('message', 'ออกจากระบบเรียบร้อย')->withInput();
  }
}
