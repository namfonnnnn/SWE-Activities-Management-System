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
    try {
      if(!empty(Request::get('id')))
      {
          $userID = Request::get('id');
          $user = User::where("username", Request::get('id'))->first();
      } else {
          $userID = Auth::user()->id;
          $user = Auth::user();
      }
      if ( Teacher::where('user_id', $user->id)->first() != null) {
          $user->type = 'teacher';
          $user->teacher = Teacher::where('user_id', $user->id)->first();
      } else {
          $user->type = 'student';
          $user->student = Student::where('user_id', $user->id)->first();
      }
    } catch (\Exception $e) {
        return Redirect::to('login');
    }
    

    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }
    $activity = Activity::where('day_end', '>', Carbon\Carbon::now()->format('Y-m-d'))->orderBy('day_start');

    if(!empty(Request::get('year'))) {
        $year = Request::get('year');
        $activity = $activity->where('student', 'LIKE', "%{$year}%");
    }

    $grapYearActivityReg = \DB::table('rank_checks')->select('id')->where('id', $user->id)->get();

    $setIdReg = [];
    foreach ($grapYearActivityReg as $key => $value) {
        $setIdReg[] = $value->activityID;
    }

    $grapYearActivityReg = Activity::select('term_sector', \DB::raw('count(term_sector) as count'), 'term_year')->groupBy('term_sector', 'term_year')->whereIn('id', $setIdReg)->get()->toArray();
    $grapYearActivityRec = Activity::select('term_sector', \DB::raw('count(term_sector) as count'), 'term_year')->groupBy('term_sector', 'term_year')->get()->toArray();


    $setActivityRec = [];
    foreach ($grapYearActivityRec as $key => $value) {
        $setActivityRec[] = ['label'=> $value['term_sector'].'/'. $value['term_year'], 'y'=>$value['count']];

    }
    $setActivityReg = [];
    foreach ($grapYearActivityReg as $key => $value) {
        $setActivityReg[] = ['label'=> $value['term_sector'].'/'. $value['term_year'], 'y'=>$value['count']];

    }

    $history = Activity::whereIn('id', $setIdReg);

    // if(!empty(Request::get('year'))) {
    //     $activity = $activity->where('student', 'LIKE', "%{$year}%");
    // }
    if (@$_GET['type'] === "2") {
        $history = $history->where('activity_name', 'LIKE', "%{$_GET['activity']}%");
    } elseif (@$_GET['type'] == '1') {
        $activity = $activity->where('activity_name', 'LIKE', "%{$_GET['activity']}%");
    }
    $history = $history->orderBy("day_end",'asc')->get();
    $activity = $activity->orderBy("day_end",'asc')->get();


    if (empty(Request::get('userID'))) {
        if (Auth::user()->teacher !=  null && empty($_GET['id'])) {
            $activities = Activity::where('day_end', '>', Carbon\Carbon::now()->format('Y-m-d'))->orderBy('day_start')->get();
            return View::make('welcome-teacher', ['activities' => $activities]);
        }
    }

    return View::make('profile', array('users'=>$user,'activity'=>$activity, 'setActivityRec'=>$setActivityRec, 'setActivityReg'=>$setActivityReg, 'history'=>$history));

}

public function checkStudentActivity($uid, $aid)
{
    $a = \DB::table('checking')->where('UserID', $uid)->where('activityID', $aid)->update(array('status'=> 0));
    return Redirect::back();
}
  public function getProfileUpdate() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }
    if(!empty(Request::get('userID')))
    {
        $userID = Request::get('userID');
        $user = User::find(Request::get('userID'));
    } else {
        $userID = Auth::user()->id;
        $user = Auth::user();
    }

    if (Teacher::where('user_id', $user->id)->first() != null) {
        $user->type = 'teacher';
        $user->teacher = Teacher::where('user_id', $user->id)->first();
    } else {
        $user->type = 'student';
        $user->student = Student::where('user_id', $user->id)->first();
    }


    return View::make('profile-form', array('user' => $user));
  }


  public function postProfileUpdate() {
    if (!Auth::check()) {
      return Redirect::to('/login')->with('status', false)->with('message', 'ท่านยังไม่ได้เข้าสู่ระบบ')->withInput();
    }

    $validator = Validator::make(
      Input::all(),
      array(
        'firstname' => 'required|regex:/^[A-Za-zก-เ]+$/',
        'lastname' => 'required|regex:/^[A-Za-zก-เ]+$/',
        'email' => 'required|email|min:5',
        'tel' => 'required|digits:10',
        'image' =>  'mimes:jpeg,jpg,png|max:3072',
      ),
      array(
        'required' => 'กรุณากรอกข้อมูล :attribute',
        'digits' => 'กรุณากรอกเบอร์โทร 10 ตัว'
      ),
      array(
        'firstname' => 'ให้ครบถ้วน',
        'lastname' => 'ให้ครบถ้วน',
        'email' => 'ให้ครบถ้วน',
        'code' => 'ให้ครบถ้วน',
        'tel' => 'ให้ครบถ้วน',
        'image' => 'ให้ครบถ้วน',
      )

    );

    if ($validator->fails())
    {
      return Redirect::to('/profile/edit')->withInput()->withErrors($validator);
    }

    if ( Teacher::where('user_id', Auth::user()->id)->first() != null) {
        $user = Teacher::where('user_id', Auth::user()->id)->first();
        $user->room = Input::get('room');
    } else {
        $user = Student::where('user_id', Auth::user()->id)->first();
    }


    $user->firstname = Input::get('firstname');
    $user->lastname = Input::get('lastname');
    $user->email = Input::get('email');
    $user->tel = Input::get('tel');
    if (Input::hasFile('image')) {
        if (Input::file('image')->isValid())
        {
          $destinationPath = 'avatar/'.Auth::user()->id.'/';

          $fileName = date('YmdHis').Input::file('image')->getClientOriginalName();

          Input::file('image')->move($destinationPath, $fileName);

          $user->image = $destinationPath.$fileName;


        }
    }




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
