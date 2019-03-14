<?php

class UsersController extends BaseController {


	public function showUserStudentprofile()
	{
		$q = '';
		$year = '';
		$students = new Student;
		$isQ = Input::get('q') != NULL && Input::get('q') != "";
		$isYear = Input::get('year') != NULL && Input::get('year') != "";

		if($isYear){
			$year = Input::get('year');
			$students = $students->searchYear(Input::get('year'));
		}

		if($isQ){
			$q = Input::get('q');
			$students = $students->where(function ($query) use ($q)
			{
				$query->orWhere('id','like','%'.$q.'%')
				->orWhere('firstname','like','%'.$q.'%')
				->orWhere('lastname','like','%'.$q.'%');
			});
		}


		$students = $students->join('users', 'users.username', '=', 'students.id')->select('students.*')->paginate(10);

		if($isQ){
			$students->appends(['q'=>$q]);
		}
		if($isYear){
			$students->appends(['year'=>Input::get('year')]);
		}

		return View::make('studentprofile',['students'=>$students,'q'=>$q,'year'=>$year]);
	}

	public function showUsersTeacher()
	{
		if(Input::get('q') != NULL && Input::get('q') != ""){
			$q = Input::get('q');
			$teachers = Teacher::Where('firstname','like','%'.$q.'%')
			->orWhere('lastname','like','%'.$q.'%');
		}
		else {
			$q = '';
			$teachers = new Teacher;
		}
		$teachers = $teachers->paginate(10);
		$teachers->appends(['q'=>$q]);
		return View::make('teacher',['teachers' => $teachers,'q'=>$q]);
    }

	public function showUsersTeacherAdd()
	{
		$tool = new Tool;

		$roles = Role::get();
		$positions = Position::get();

		$text_firstname = $tool->validData(Input::old('firstname'), null,'');
		$text_lastname = $tool->validData(Input::old('lastname'), null,'');
		$text_email = $tool->validData(Input::old('email'), null,'');
		$text_tel = $tool->validData(Input::old('tel'), null,'');
		$text_room = $tool->validData(Input::old('room'), null,'');
		$text_password = $tool->validData(Input::old('password'), null,'');
		$select_role = $tool->validData(Input::old('role'), null,'');
		$select_position = $tool->validData(Input::old('position'), null,'');
		$select_prefix = $tool->validData(Input::old('prefix'), null,'');

		$data = [
			'text_firstname'=>$text_firstname,
			'text_lastname'=>$text_lastname,
			'text_email'=>$text_email,
			'text_tel'=>$text_tel,
			'text_room'=>$text_room,
			'text_password'=>$text_password,
			'roles'=>$roles,
			'positions'=>$positions,
			'select_role'=>$select_role,
			'select_position'=>$select_position,
			'select_prefix'=>$select_prefix
		];
		return View::make('manage.user_teacher_add',$data);
	}

	public function showUsersTeacherEdit($id)
	{
		$tool = new Tool;

		$roles = Role::get();
		$positions = Position::get();

		$teacher = Teacher::find($id);
		if(is_null($teacher)){
			return Redirect::to('manage/user/teacher')->with('error', 'ไม่พบข้อมูลอาจารย์');
		}

		$text_firstname = $tool->validData(Input::old('firstname'), $teacher->firstname,'');
		$text_lastname = $tool->validData(Input::old('lastname'), $teacher->lastname,'');
		$text_email = $tool->validData(Input::old('email'), $teacher->email,'');
		$text_tel = $tool->validData(Input::old('tel'), $teacher->tel,'');
		$text_room = $tool->validData(Input::old('room'), $teacher->room,'');
		$text_password = $tool->validData(Input::old('password'), null,'');
		$select_role = $tool->validData(Input::old('role'), $teacher->role_id,'');
		$select_position = $tool->validData(Input::old('position'), $teacher->position_id,'');
		$select_prefix = $tool->validData(Input::old('prefix'), $teacher->prefix,'');

		$data = [
			'teacher'=>$teacher,
			'text_firstname'=>$text_firstname,
			'text_lastname'=>$text_lastname,
			'text_email'=>$text_email,
			'text_tel'=>$text_tel,
			'text_room'=>$text_room,
			'text_password'=>$text_password,
			'roles'=>$roles,
			'positions'=>$positions,
			'select_role'=>$select_role,
			'select_position'=>$select_position,
			'select_prefix'=>$select_prefix
		];
		return View::make('manage.user_teacher_add',$data);
	}

    public function showUserStudentAdd()
	{
		$tool = new Tool;
		$text_year = $tool->validData(Input::old('year'), null,'');
		$text_id = $tool->validData(Input::old('id'), null,'');
		$text_firstname = $tool->validData(Input::old('firstname'), null,'');
		$text_lastname = $tool->validData(Input::old('lastname'), null,'');
		$text_password = $tool->validData(Input::old('password'), null,'');
		$select_prefix = $tool->validData(Input::old('prefix'), null,'');
		$data = [
			'text_year'=>$text_year,
			'text_id'=>$text_id,
			'text_firstname'=>$text_firstname,
			'text_lastname'=>$text_lastname,
			'text_password'=>$text_password,
			'select_prefix'=>$select_prefix
		];
		return View::make('manage.user_student_add',$data);
	}
	public function showUserStudentEdit($id)
	{
		$student = Student::find($id);
		if(is_null($student)){
			return Redirect::to('manage/user/student')->with('error', 'ไม่พบข้อมูลนักศึกษา');
		}

		$tool = new Tool;
		$text_year = $tool->validData(Input::old('year'), $student->year,'');
		$text_id = $tool->validData(Input::old('id'), $student->id,'');
		$text_firstname = $tool->validData(Input::old('firstname'), $student->firstname,'');
		$text_lastname = $tool->validData(Input::old('lastname'), $student->lastname,'');
		$text_password = $tool->validData(Input::old('password'), null,'');
		$select_prefix = $tool->validData(Input::old('prefix'), $student->prefix,'');
		$data = [
			'student'=>$student,
			'id'=>$id,
			'text_year'=>$text_year,
			'text_id'=>$text_id,
			'text_firstname'=>$text_firstname,
			'text_lastname'=>$text_lastname,
			'text_password'=>$text_password,
			'select_prefix'=>$select_prefix
		];
		return View::make('manage.user_student_add',$data);
	}

	public function actionUserTeacherAdd($id = null)
	{
		$isID = isset($id);
		if($isID){
			$redirect_to = 'manage/user/teacher/edit/'.$id;
			$success_redirect_to = 'manage/user/teacher';
			$success_message = 'แก้ไขสำเร็จ';
			$rules = array(
				'role' => 'required',
				'position' => 'required',
				'prefix' => 'required',
				'firstname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'lastname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'email' => 'required|email',
				'tel' => 'digits:10',
				'room' => 'required',
				'password' => 'min:8'
			);
		}
		else{
			$redirect_to = 'manage/user/teacher/add';
			$success_redirect_to = 'manage/user/teacher';
			$success_message = 'บันทึกสำเร็จ';
			$rules = array(
				'role' => 'required',
				'position' => 'required',
				'prefix' => 'required',
				'firstname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'lastname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'email' => 'required|email',
				'tel' => 'digits:10',
				'room' => 'required',
				'password' => 'required|min:8'
			);

		}



		$validator = Validator::make(
			Input::all(),
			$rules,
			[
				'regex'=>'ภาษาไทยเท่านั้น'
			]

		);
		if($validator->fails()){
			return Redirect::to($redirect_to)->withInput()->withErrors($validator);
		}

		$isExistsUsername= User::where('username',Input::get("email"))->first() != NULL;
		if(!$isID && $isExistsUsername){
			return Redirect::to($redirect_to)->withInput()->with('error',"ไม่สามารถเพิ่มอาจารย์ได้เนื่องจากมี email อยู่เเล้ว");
		}

		if($isID){
			$teacher = Teacher::find($id);
			$user = User::find($teacher->user_id);

		}else{
			$user = new User;
			$teacher = new teacher;
		}

		$user->username = Input::get("email");
		if(Input::get("password") != ''){
			$user->password = Hash::make(Input::get("password"));
		}
		try {
			$reuslt = $user->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($redirect_to)->withInput()->with('error', $e->getMessage());
		}

		$teacher->user_id = $user->id;
		$teacher->role_id = Input::get("role");
		$teacher->position_id = Input::get("position");
		$teacher->prefix = Input::get("prefix");
		$teacher->firstname = Input::get("firstname");
		$teacher->lastname = Input::get("lastname");
		$teacher->tel = Input::get("tel");
		$teacher->room = Input::get("room");
		$teacher->email = Input::get("email");

		try {
			$reuslt = $teacher->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($redirect_to)->withInput()->with('error', $e->getMessage());
		}

		return Redirect::to($success_redirect_to)->withInput()->with('message',$success_message);


	}

	public function actionUserStudentAdd($id = null)
	{
		// dd(Input::get("firstname"));
		$isID = isset($id);
		if($isID){
			$redirect_to = 'manage/user/student/edit/'.$id;
			$success_redirect_to = 'manage/user/student';
			$success_message = 'แก้ไขสำเร็จ';
			$rules = array(
				'year' => 'required|integer|min:2558',
				'prefix' => 'required',
				'firstname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'lastname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'password' => 'min:8'
			);
		}
		else{
			$redirect_to = 'manage/user/student/add';
			$success_redirect_to = 'manage/user/student';
			$success_message = 'บันทึกสำเร็จ';
			$rules = array(
				'year' => 'required|integer|min:2558',
				'id' => 'required|digits:8',
				'prefix' => 'required',
				'firstname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'lastname' => 'required|regex:/^[A-Za-zก-เ]+$/',
				'password' => 'required|min:8'
			);
		}


		$validator = Validator::make(Input::all(),$rules,['regex'=>'ภาษาไทยเท่านั้น']);
		if($validator->fails()){
			return Redirect::to($redirect_to)->withInput()->withErrors($validator);
		}

		$isExistsStudent = Student::find(Input::get("id")) != NULL;
		if(!$isID && $isExistsStudent){
			return Redirect::to($redirect_to)->withInput()->with('error',"ไม่สามารถสร้างนักศึกได้เนื่องจากมีรหัสนักศึกษาอยู่เเล้ว");
		}

		$isExistsUsername= User::where('username',Input::get("id"))->first() != NULL;
		if(!$isID && $isExistsUsername){
			return Redirect::to($redirect_to)->withInput()->with('error',"ไม่สามารถสร้างนักศึกได้เนื่องจากมี username อยู่เเล้ว");
		}

		if($isID){
			$student = Student::find($id);
			$user = User::find($student->user_id);
			$user->username = $student->id;

		}else{
			$user = new User;
			$student = new Student;
			$student->id = Input::get("id");
			$user->username = Input::get("id");
		}


		if(Input::get("password") != ''){
			$user->password = Hash::make(Input::get("password"));
		}
		try {
			$reuslt = $user->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($redirect_to)->withInput()->with('error', $e->getMessage());
		}


		$student->user_id = $user->id;
		$student->prefix = Input::get("prefix");
		$student->firstname = Input::get("firstname");
		$student->lastname = Input::get("lastname");
		$student->year = Input::get("year");
		try {
			$reuslt = $student->save();
		}
		catch ( \Exception $e ) {
			return Redirect::to($redirect_to)->withInput()->with('error', $e->getMessage());
		}

		return Redirect::to($success_redirect_to)->withInput()->with('message',$success_message);
	}

	public function actionUserStudentDelete($id)
	{
		$student = Student::find($id);
		if(is_null($student)){
			return Redirect::to('manage/user/student')->with('error', 'ไม่พบข้อมูลนักศึกษา');
		}
		$user = User::find($student->user_id);
		try {
			$student->delete();
			$user->delete();
		}
		catch ( \Exception $e ) {
			return Redirect::to('manage/user/student')->withInput()->with('error', $e->getMessage());
		}

		return Redirect::to('manage/user/student')->withInput()->with('message','ลบข้อมูลนักศึกษาสำเร็จ');

	}

	public function actionUserTeacherDelete($id)
	{
		$teacher = Teacher::find($id);
		if(is_null($teacher)){
			return Redirect::to('manage/user/teacher')->with('error', 'ไม่พบข้อมูลอาจารย์');
		}
		$user = User::find($teacher->user_id);
		try {
			$teacher->delete();
			$user->delete();
		}
		catch ( \Exception $e ) {
			return Redirect::to('manage/user/teacher')->withInput()->with('error', $e->getMessage());
		}

		return Redirect::to('manage/user/teacher')->withInput()->with('message','ลบข้อมูลอาจารย์สำเร็จ');
	}


}
