@extends('manage.layout')
@section('title')
    
@stop
@section('cdn')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
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
    .has-error input{
            border-color: red
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


<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="post">
<!-- /.row -->
<div class="card card-small mb-4 pt-3">
    <div class="col-sm-10">
        <div class="row">



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
                    </br>
                    <h6>รูปภาพต้องมีขนาดไม่เกิน 3 MB และเป็นไฟล์รูปภาพ jpg,jpeg,png</h6>


                    </div>
                 </form>
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
                            @if($user->type == 'student') 
                                <div class="col-md-4">
                                    <div class="form-group {{$errors->has('prefix') ? 'has-error' : ''}}">
                                        <label for="name" class="cols-sm-1 control-label">คำนำหน้าชื่อ</label>
                                        <div class="cols-sm-5">
                                            <div class="input-group">
                                                <input readonly type="text" class="form-control" name="prefix" id="prefix"  placeholder="คำนำหน้า" value="{{Request::old('prefix', $user->{$user->type}->prefix)}}" />
                                            </div>
                                            @if($errors->has('prefix'))
                                                <div class="alert-danger" role="alert">
                                                    {{$errors->first('prefix')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            @else
                            <div class="col-md-4">
                                <div class="form-group {{$errors->has('prefix') ? 'has-error' : ''}}">
                                    <label for="name" class="cols-sm-1 control-label">คำนำหน้าชื่อ</label>
                                    <div class="cols-sm-5">
                                        <div class="input-group">

                                            <input readonly type="text" class="form-control" name="prefix" id="prefix"  placeholder="คำนำหน้า" value="{{Request::old('prefix', $user->{$user->type}->prefix)}}" />
                                        </div>
                                        @if($errors->has('prefix'))
                                            <div class="alert-danger" role="alert">
                                                {{$errors->first('prefix')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        
                            <div class="col-md-4">
                                <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}}">
                                    <label for="name" class="cols-sm-1 control-label">ชื่อ</label>
                                    <div class="cols-sm-5">
                                        <div class="input-group">

                                            <input readonly type="text" class="form-control" name="firstname" id="firstname"  placeholder="ชื่อ" value="{{Request::old('firstname', $user->{$user->type}->firstname)}}" />
                                        </div>
                                        @if($errors->has('firstname'))
                                            <div class="alert-danger" role="alert">
                                                {{$errors->first('firstname')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  {{$errors->has('lastname') ? 'has-error' : ''}}">
                                    <label for="name" class="cols-sm-1 control-label">นามสกุล</label>
                                    <div class="cols-sm-5">
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control" name="lastname" id="lastname"  placeholder="นามสกุล" value="{{Request::old('lastname', $user->{$user->type}->lastname)}}" />
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
                                        <input  type="text" class="form-control" name="room" id="room"  placeholder="ห้อง" value="{{Request::old('room', $user->{$user->type}->room)}}" />
                                    </div>
                                    @if($errors->has('room'))
                                        <div class="alert-danger" role="alert">
                                            {{$errors->first('room')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endif

                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-5">
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
                            <div class="cols-sm-5">
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
                <button type="submit" class="btn btn-primary btn-block login-button">บันทึก</button>
            </div>
        </div>
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
