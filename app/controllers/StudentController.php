<?php

class StudentController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $route = 'manage/user/student/';

	protected $view = 'student.';


	public function index()
	{
		$items = User::where('type', 'student');

		$getYear = User::select('year')->groupBy('year')->get()->toArray();

		$setYear = [];

		foreach ($getYear as $key => $value) {
			foreach ($value as $key => $value1) {
				if(!empty($value1)) $setYear[] = $value1;
			}
		}

		if (!empty(Request::get('s'))) {
			$s = Request::get('s');
			$items = $items->where(function($q) use($s) {
				$q = $q->where(\DB::raw('CONCAT(firstname, " ", lastname)'), 'LIKE', "%{$s}%");
				$q = $q->orWhere('code', 'LIKE', "%{$s}%");
			});
		}

		if (!empty(Request::get('year'))) {
			$items = $items->where('year', Request::get('year'));
		}

		$items = $items->paginate();
		return View::make($this->view. 'index', array('items'=>$items, 'route'=>$this->route, 'year'=> $setYear));
	}

  public function create()
	{
		return View::make($this->view. 'form', array('route'=>$this->route));
	}

  public function store()
	{
		$validator = Validator::make(
      Input::all(),
      array(
        'firstname' => 'required|min:3',
        'lastname' => 'required|min:3',
				'username' => 'required|min:3',
        'email' => 'required|email|min:5',
        'code' => 'required',
        'tel' => 'required',
				'password' => 'required'
      ),
      array(
        'required' => 'กรุณากรอกข้อมูล :attribute',
				'unique'=> 'ข้อมูลนี้มีอยู่ในระบบแล้ว	'
      ),
      array(
				'username' => 'Username',
        'firstname' => 'ชื่อ',
        'lastname' => 'นามสกุล',
        'email' => 'Email',
        'code' => 'รหัสนักศึกษา',
        'tel' => 'เบอร์ติดต่อ',
        'password' => 'Password',
      )
    );

    if ($validator->fails())
    {
      return Redirect::to($this->route.'create')->withInput()->withErrors($validator);
    }

		$user = new User;
		$user->username = Input::get('username');
		$user->firstname = Input::get('firstname');

		$user->lastname = Input::get('lastname');

		$user->email = Input::get('email');

		$user->code = Input::get('code');

		$user->year = Input::get('year');

		$user->tel = Input::get('tel');
		$user->type = 'student';

		$user->password = Hash::make(Input::get('password'));


		$user->save();

    return Redirect::to($this->route)->with('status', true)->with('message', 'บันทึกรายการเรียบร้อย')->withInput();

	}


  public function edit($id)
	{
			$item = User::find($id);


			return View::make($this->view. 'form', array('item'=> $item, 'route'=>$this->route));
	}

  public function update($id)
	{
		$validator = Validator::make(
			Input::all(),
			array(
				'username' => 'required|min:3',
				'firstname' => 'required|min:3',
				'lastname' => 'required|min:3',
				'email' => 'required|email|min:5',
				'code' => 'required',
				'tel' => 'required',
				// 'password' => 'required'
			),
			array(
				'required' => 'กรุณากรอกข้อมูล :attribute',
				'unique'=> 'ข้อมูลนี้มีอยู่ในระบบแล้ว	'
			),
			array(
				'username'=> 'Username',
				'firstname' => 'ชื่อ',
				'lastname' => 'นามสกุล',
				'email' => 'Email',
				'code' => 'รหัสนักศึกษา',
				'tel' => 'เบอร์ติดต่อ',
				// 'password' => 'Password',
			)
		);

		if ($validator->fails())
		{
			return Redirect::to($this->route.$id.'/edit')->withInput()->withErrors($validator);
		}
		$user =  User::find($id);

		$user->username = Input::get('username');
		$user->firstname = Input::get('firstname');

		$user->lastname = Input::get('lastname');

		$user->email = Input::get('email');

		$user->year = Input::get('year');

		$user->code = Input::get('code');

		$user->tel = Input::get('tel');

		$user->type = 'student';
		if (!empty(Input::get('password')))
		{

					$user->password = Hash::make(Input::get('password'));
		}

		$user->save();

		return Redirect::to($this->route)->with('status', true)->with('message', 'บันทึกรายการเรียบร้อย')->withInput();
	}

  public function destroy($id)
	{
		User::find($id)->delete();
		    return Redirect::to($this->route)->with('status', true)->with('message', 'ทำรายการเรียบร้อย')->withInput();
	}

}
