@extends('manage.layout')
@section('title')
    โปรไฟล์นักศึกษา
@stop
@section('cdn')






@stop
@section('content')
    <br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{url('manage/user/student')}}">นักศึกษา</a></li>
      <li class="breadcrumb-item active" aria-current="page">เพิ่ม & แก้ไขข้อมูลนักศึกษา</li>
    </ol>
    </nav>
  <br>


    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">


            {{--  FORM --}}
            <div class="col-md-12">
                <h3>เพิ่ม & แก้ไขข้อมูลนักศึกษา</h3>
                <div class="main-login main-center">
                  @if (!empty($item))
                    <form class="form-horizontal" method="post" action="{{url($route. $item->id)}}">
                      <input type="hidden" name="_method" value="PUT">
                    @else
                      <form class="form-horizontal" action="{{url($route)}}" method="post">

                    @endif
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                                  <label for="name" class="cols-sm-1 control-label">ชื่อ</label>
                                  <div class="cols-sm-5">
                                      <div class="input-group">

                                          <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="ชื่อ" value="{{Request::old('firstname', @$item->firstname)}}" />
                                      </div>
                                      @if($errors->has('firstname'))
                                          <div class="alert-danger" role="alert">
                                              {{$errors->first('firstname')}}
                                          </div>
                                      @endif
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group  {{$errors->has('lastname') ? 'has-error' : ''}}">
                                  <label for="name" class="cols-sm-1 control-label">นามสกุล</label>
                                  <div class="cols-sm-5">
                                      <div class="input-group">

                                          <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="นามสกุล" value="{{Request::old('lastname', @$item->lastname)}}" />
                                      </div>
                                      @if($errors->has('lastname'))
                                          <div class="alert-danger" role="alert">
                                              {{$errors->first('lastname')}}
                                          </div>
                                      @endif
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group  {{$errors->has('code') ? 'has-error' : ''}}">
                            <label for="name" class="cols-sm-2 control-label">รหัสนักศึกษา</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input  type="text" class="form-control" name="code" id="code"  placeholder="รหัสนักศึกษา" value="{{Request::old('code', @$item->code)}}" />
                                </div>
                                @if($errors->has('code'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('code')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('year') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">ปีการศึกษา</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input  type="text" class="form-control" name="year" id="email"  placeholder="Email"  value="{{Request::old('year', @$item->year)}}" />

                                </div>
                                @if($errors->has('year'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('year')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input  type="text" class="form-control" name="email" id="email"  placeholder="Email"  value="{{Request::old('email', @$item->email)}}" />

                                </div>
                                @if($errors->has('email'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input  type="text" class="form-control" name="username" id="username"  placeholder="Username"  value="{{Request::old('username', @$item->username)}}" />

                                </div>
                                @if($errors->has('username'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('username')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">รหัสผ่าน</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input  type="password" class="form-control" name="password" id="password"  placeholder="Password"  value="{{Request::old('password')}}" />

                                </div>
                                @if($errors->has('password'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group  {{$errors->has('tel') ? 'has-error' : ''}}">
                            <label for="username" class="cols-sm-2 control-label">เบอร์ติดต่อ</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="tel" id="tel"  placeholder="เบอร์ติดต่อ"   value="{{Request::old('tel', @$item->tel)}}"/>
                                </div>
                                @if($errors->has('tel'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('tel')}}
                                    </div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-block login-button">บันทึก</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    @stop
