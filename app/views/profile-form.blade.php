@extends('manage.layout')
@section('title')
    โปรไฟล์นักศึกษา
@stop
@section('cdn')
    <style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
        content: "";
        font-family: "Font Awesome 5 Free";
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    </style>





@stop
@section('content')
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{url('/profile')}}">
                @if($user->type == 'student')
                    โปรไฟล์นักศึกษา
                @else
                    ข้อมูลส่วนตัว

                @endif
            </a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @if($user->type == 'student')
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
                                    <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$user->{$user->type}->getAvatar()}}" alt="x3" width="130" height="130" >

                                </a>
                            </p>

                            <div class="col-xs-9 text-left"  style="padding-left:20px">

                                <div><h2>
                                    @if($user->type == 'student')
                                        โปรไฟล์นักศึกษา
                                    @else
                                        ข้อมูลส่วนตัว

                                    @endif
                                </h2></div>
                                <div>ชื่อ-นามสกุล : {{ $user->{$user->type}->firstname }} {{ $user->{$user->type}->lastname }}</div>
                                @if($user->type == 'student')
                                    <div>รหัสนักศึกษา : {{ $user->{$user->type}->id }}</div>
                                @else
                                    <div>ห้อง : {{ $user->{$user->type}->room_num }}</div>

                                @endif
                                <div>เบอร์โทร    : {{ $user->{$user->type}->tel }}</div>
                                <div>อีเมล       : {{ $user->{$user->type}->email }}</div>


                                <div class="col-xs-3">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @if($user->type == 'student')
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
            <div class="col-md-6" style="">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <h3>เปลี่ยนรูปโปรไฟล์</h3>
                <div>

                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-edit" style="font-family:'Font Awesome 5 Free'">
                                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"><i style="padding:10px" class="fa fa-search"></i></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ !empty(Auth::user()->image) ? Auth::user()->getAvatar() :  asset('image/x3.jpg')}});">
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
            <div class="col-md-6">
                <h3>
                    @if($user->type == 'student')
                        แก้ไขโปรไฟล์นักศึกษา
                    @else
                        แก้ไขข้อมูลส่วนตัว

                    @endif
                </h3>
                <div class="main-login main-center">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                                    <label for="name" class="cols-sm-1 control-label">ชื่อ</label>
                                    <div class="cols-sm-5">
                                        <div class="input-group">

                                            <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="ชื่อ" value="{{Request::old('firstname', $user->{$user->type}->firstname)}}" />
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

                                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="นามสกุล" value="{{Request::old('lastname', $user->{$user->type}->lastname)}}" />
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
                        @if($user->type == 'student')
                            <div class="form-group  {{$errors->has('code') ? 'has-error' : ''}}">
                                <label for="name" class="cols-sm-2 control-label">รหัสนักศึกษา</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">

                                        <input readonly type="text" class="form-control" name="code" id="code"  placeholder="รหัสนักศึกษา" value="{{Request::old('code', $user->{$user->type}->id)}}" />
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

                                        <input  type="text" class="form-control" name="room_num" id="room_num"  placeholder="ห้อง" value="{{Request::old('room_num', $user->{$user->type}->room_num)}}" />
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

                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Email"  value="{{Request::old('email',$user->{$user->type}->email)}}" />

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

                                    <input type="text" class="form-control" name="tel" id="tel"  placeholder="เบอร์ติดต่อ"   value="{{Request::old('tel', $user->{$user->type}->tel)}}"/>
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

                </div>
            </div>

            </form>
        </div>

        <script>
        $(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').show(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        })
        </script>
    @stop
