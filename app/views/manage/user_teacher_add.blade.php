@extends('manage.layout')
@section('title')
@if(isset($activity))
   เพิ่มข้อมูลอาจารย์
@else
   แก้ไขข้อมูลอาจารย์
@endif
@stop
@section('cdn')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@stop
@section('content')

<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="post">
   <div class="container">
      @if(isset($activity))
         <h2 style="margin-top:30px">แก้ไขข้อมูลอาจารย์</h2>
      @else
         <h2 style="margin-top:30px">เพิ่มข้อมูลอาจารย์</h2>
      @endif
      
      <hr>
      @include('error')
      
      <div class="row justify-content-md-center">
         <div class="col-sm-6">
            <div class="form-group">
               <label for="name">บทบาทในระบบ</label>
               <select id="role" name="role" class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}">
                  <option value="">- เลือกบทบาท -</option>
                  @foreach ($roles as $role)
                     <option value="{{$role->id}}" <?=($select_role==$role->id)?'selected':''?> >{{$role->name}}</option>
                  @endforeach
               </select>
               <small class="form-text text-danger">{{$errors->first('role')}}</small>
            </div>
            <div class="form-group">
               <label for="name">ตำแหน่ง</label>
               <select id="position" name="position" class="form-control {{$errors->has('position') ? 'is-invalid' : ''}}">
                  <option value="">- เลือกตำแหน่ง -</option>
                  @foreach ($positions as $position)
                     <option value="{{$position->id}}" <?=($select_position==$position->id)?'selected':''?> >{{$position->name}}</option>
                  @endforeach
               </select>
               <small class="form-text text-danger">{{$errors->first('position')}}</small>
            </div>
            <div class="form-group">
               <label for="name">ชื่อ</label>
               <input type="text" class="form-control {{$errors->has('firstname') ? 'is-invalid' : ''}}" id="firstname" name="firstname" value="{{$text_firstname}}" placeholder ="ชื่อ" >
               <small class="form-text text-danger">{{$errors->first('firstname')}}</small>
            </div>
            <div class="form-group">
               <label for="name">นามสกุล</label>
               <input type="text" class="form-control {{$errors->has('lastname') ? 'is-invalid' : ''}}" id="lastname" name="lastname" value="{{$text_lastname}}" placeholder ="นามสกุล" >
               <small class="form-text text-danger">{{$errors->first('lastname')}}</small>
            </div>
            <div class="form-group">
               <label for="name">อีเมล</label>
               <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{$text_email}}" placeholder ="อีเมล" >
               <small class="form-text text-danger">{{$errors->first('email')}}</small>
            </div>
            <div class="form-group">
               <label for="name">เบอร์โทรศัพท์</label>
               <input type="text" class="form-control {{$errors->has('tel') ? 'is-invalid' : ''}}" id="tel" name="tel" value="{{$text_tel}}" placeholder ="เบอร์โทรศัพท์" >
               <small class="form-text text-danger">{{$errors->first('tel')}}</small>
            </div>
            <div class="form-group">
               <label for="name">ห้องทำงาน</label>
               <input type="text" class="form-control {{$errors->has('room') ? 'is-invalid' : ''}}" id="room" name="room" value="{{$text_room}}" placeholder ="ห้องทำงาน" >
               <small class="form-text text-danger">{{$errors->first('room')}}</small>
            </div>
            <div class="form-group">
               <label for="name">รหัสผ่าน</label>
               <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" value="{{$text_password}}" placeholder ="รหัสผ่าน" >
               <small class="form-text text-danger">{{$errors->first('password')}}</small>
            </div>
            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
         </div>
      </div>
   </div>
</form>
@stop

