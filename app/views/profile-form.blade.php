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
            <li class="breadcrumb-item"><a href="{{url('/home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{url('/profile')}}">
                @if(Auth::user()->type == 'student')
                    โปรไฟล์นักศึกษา
                @else
                    ข้อมูลส่วนตัว

                @endif
            </a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @if(Auth::user()->type == 'student')
                    แก้ไขโปรไฟล์นักศึกษา
                @else
                    แก้ไขข้อมูลส่วนตัว

                @endif
            </li>
        </ol>
    </nav>


    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <p>
                                <a href="{{url('/profile/upload-avatar')}}">
                                    <input type="image" onerror="this.src='{{asset('image/x3.jpg')}}'" src="{{Auth::user()->getAvatar()}}" alt="x3" width="130" height="130" >

                                </a>
                            </p>

                            <div class="col-xs-9 text-left"  style="padding-left:20px">

                                <div><h2>
                                    @if(Auth::user()->type == 'student')
                                        โปรไฟล์นักศึกษา
                                    @else
                                        ข้อมูลส่วนตัว

                                    @endif
                                </h2></div>
                                <div>ชื่อ-นามสกุล : {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                                @if(Auth::user()->type == 'student')
                                    <div>รหัสนักศึกษา : {{ Auth::user()->code }}</div>
                                @else
                                    <div>ห้อง : {{ Auth::user()->room_num }}</div>

                                @endif
                                <div>เบอร์โทร    : {{ Auth::user()->tel }}</div>
                                <div>อีเมล       : {{ Auth::user()->email }}</div>


                                <div class="col-xs-3">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @if(Auth::user()->type == 'student')
                <div class="col-lg-6 col-md-12">
                    <div class="wrap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Search">
                            <button  type="submit" class="searchButton btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            <div class="row">


                                <div class="col-xs-18 text-right">

                                    <div style="    padding-left: 15px;">กิจกรรมที่ต้องเข้าร่วม</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">

                                <span class="pull-left">กิจกรรมที่ต้องเข้าร่วมทั้งหมด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            @endif


            {{--  FORM --}}
            <div class="col-md-12">
                <h3>
                    @if(Auth::user()->type == 'student')
                        แก้ไขโปรไฟล์นักศึกษา
                    @else
                        แก้ไขข้อมูลส่วนตัว

                    @endif
                </h3>
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                                    <label for="name" class="cols-sm-1 control-label">ชื่อ</label>
                                    <div class="cols-sm-5">
                                        <div class="input-group">

                                            <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="ชื่อ" value="{{Request::old('firstname', Auth::user()->firstname)}}" />
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

                                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="นามสกุล" value="{{Request::old('lastname', Auth::user()->lastname)}}" />
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
                        @if(Auth::user()->type == 'student')
                            <div class="form-group  {{$errors->has('code') ? 'has-error' : ''}}">
                                <label for="name" class="cols-sm-2 control-label">รหัสนักศึกษา</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">

                                        <input readonly type="text" class="form-control" name="code" id="code"  placeholder="รหัสนักศึกษา" value="{{Request::old('code', Auth::user()->code)}}" />
                                    </div>
                                    @if($errors->has('code'))
                                        <div class="alert-danger" role="alert">
                                            {{$errors->first('code')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="form-group  {{$errors->has('code') ? 'has-error' : ''}}">
                                <label for="name" class="cols-sm-2 control-label">ห้อง</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">

                                        <input  type="text" class="form-control" name="room_num" id="room_num"  placeholder="รหัสนักศึกษา" value="{{Request::old('room_num', Auth::user()->room_num)}}" />
                                    </div>
                                    @if($errors->has('room_num'))
                                        <div class="alert-danger" role="alert">
                                            {{$errors->first('room_num')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endif

                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Email"  value="{{Request::old('email',Auth::user()->email)}}" />

                                </div>
                                @if($errors->has('email'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  {{$errors->has('tel') ? 'has-error' : ''}}">
                            <label for="username" class="cols-sm-2 control-label">เบอร์ติดต่อ</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="tel" id="tel"  placeholder="เบอร์ติดต่อ"   value="{{Request::old('tel', Auth::user()->tel)}}"/>
                                </div>
                                @if($errors->has('tel'))
                                    <div class="alert-danger" role="alert">
                                        {{$errors->first('tel')}}
                                    </div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-block login-button">แก้ไขข้อมูล</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    @stop
