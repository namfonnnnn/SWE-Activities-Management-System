<?php

class TeachController extends BaseController {

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
	protected $route = 'manage/user/teach/';

	protected $view = 'teacher.';


	public function index()
	{
		$items = User::where('type', 'teach')->where('positionID', 1);


		if (!empty(Request::get('s'))) {
			$s = Request::get('s');
			$items = $items->where(function($q) use($s) {
				$q = $q->where(\DB::raw('CONCAT(firstname, " ", lastname)'), 'LIKE', "%{$s}%");
				$q = $q->orWhere('room_num', 'LIKE', "%{$s}%");
			});
		}

		$items = $items->paginate();

		return View::make($this->view. 'index', array('items'=>$items, 'route'=>$this->route));
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
        'room_num' => 'required',
        'tel' => 'required',
		'image' => 'mimes:jpeg,bmp,png|max:4068',
		'password' => 'required'
      ),
      array(
        'required' => 'กรุณากรอกข้อมูล :attribute',
		'unique'=> 'ข้อมูลนี้มีอยู่ในระบบแล้ว	',
		'mimes' => ':attribute นามสกุลไฟล์ต้องเป็น - :values เท่านั้น',
		'max' => ':attribute ต้องมีขนาดไม่เกิน :max กิโลไบค์'
      ),
      array(
		'username' => 'Username',
        'firstname' => 'ชื่อ',
        'lastname' => 'นามสกุล',
        'email' => 'Email',
        'room_num' => 'เลขห้อง',
        'tel' => 'เบอร์ติดต่อ',
		'image' => 'รูปภาพ',
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

		$user->room_num = Input::get('room_num');
		$user->type = 'teach';
		$user->roleID = 1;
		$user->positionID = 1;

		$user->tel = Input::get('tel');

		$user->password = Hash::make(Input::get('password'));


		$user->save();

		if (Input::file('image')->isValid())
		{
			$destinationPath = 'avatar/'. $user->id .'/';

			$fileName = date('YmdHis').Input::file('image')->getClientOriginalName();

			Input::file('image')->move($destinationPath, $fileName);


			$user->image = $destinationPath.$fileName;

			$user->save();

		}

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
				'room_num' => 'required',
				'image' => 'mimes:jpeg,bmp,png|max:4068',
				'tel' => 'required',
				// 'password' => 'required'
			),
			array(
				'required' => 'กรุณากรอกข้อมูล :attribute',
				'unique'=> 'ข้อมูลนี้มีอยู่ในระบบแล้ว	',
				'mimes' => ':attribute นามสกุลไฟล์ต้องเป็น - :values เท่านั้น',
				'max' => ':attribute ต้องมีขนาดไม่เกิน :max กิโลไบค์'
			),
			array(
				'username'=> 'Username',
				'firstname' => 'ชื่อ',
				'lastname' => 'นามสกุล',
				'email' => 'Email',
				'room_num' => 'รหัสนักศึกษา',
				'tel' => 'เบอร์ติดต่อ',
				'image' => 'รูปภาพ'
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

		$user->room_num = Input::get('room_num');
		$user->type = 'teach';

		$user->roleID = 1;
		$user->positionID = 1;

		$user->tel = Input::get('tel');

		if (!empty(Input::get('password')))
		{

					$user->password = Hash::make(Input::get('password'));
		}

		$user->save();
		if (Input::file('image')->isValid())
		{
			$destinationPath = 'avatar/'.$user->id.'/';

			$fileName = date('YmdHis').Input::file('image')->getClientOriginalName();

			Input::file('image')->move($destinationPath, $fileName);


			$user->image = $destinationPath.$fileName;

			$user->save();

		}

		return Redirect::to($this->route)->with('status', true)->with('message', 'บันทึกรายการเรียบร้อย')->withInput();
	}

  public function destroy($id)
	{
		User::find($id)->delete();
		    return Redirect::to($this->route)->with('status', true)->with('message', 'ทำรายการเรียบร้อย')->withInput();
	}

}
