@extends('manage.layout')
@section('title')
@if(isset($activity))
   เพิ่มข้อมูลนักศึกษา
@else
   แก้ไขข้อมูลนักศึกษา
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
      @if(isset($student))
         <h2 style="margin-top:30px">แก้ไขข้อมูลนักศึกษา</h2>
      @else
         <h2 style="margin-top:30px">เพิ่มข้อมูลนักศึกษา</h2>
      @endif
      
      <hr>
      @include('error')
      <div class="row justify-content-md-center">
         <div class="col-sm-4">
            <div class="form-group">
               <label for="name">ปีการศึกษาที่เข้าศึกษา</label>
               <input type="text" class="form-control {{$errors->has('year') ? 'is-invalid' : ''}}" id="year" name="year" value="{{$text_year}}" placeholder ="ปีการศึกษา" >
               <small class="form-text text-danger">{{$errors->first('year')}}</small>
            </div>
            <div class="form-group">
               <label for="exampleFormControlSelect1">คำนำหน้า</label>
               <select class="form-control" id="prefix" name="prefix" >
                  <option value="">- คำนำหน้า -</option>
                  <option value="นาย">นาย</option>
                  <option value="นางสาว">นางสาว</option>
               </select>
            </div>
            <div class="form-groups">
               <label for="name">รหัสนักศึกษา</label>
               <input type="text" class="form-control  {{$errors->has('id') ? 'is-invalid' : ''}}" id="id" name="id" value="{{$text_id}}" placeholder ="รหัสนักศึกษา" {{isset($id) ? 'disabled' : ''}}>
               <small class="form-text text-danger">{{$errors->first('id')}}</small>
            </div>
            <div class="form-group">
               <label for="name">ชื่อ</label>
               <input type="text" class="form-control  {{$errors->has('firstname') ? 'is-invalid' : ''}}" id="firstname" name="firstname" value="{{$text_firstname}}" placeholder ="ชื่อ" >
               <small class="form-text text-danger">{{$errors->first('firstname')}}</small>
            </div>
            <div class="form-group">
               <label for="name">นามสกุล</label>
               <input type="text" class="form-control  {{$errors->has('lastname') ? 'is-invalid' : ''}}" id="lastname" name="lastname" value="{{$text_lastname}}" placeholder ="นามสกุล" >
               <small class="form-text text-danger">{{$errors->first('lastname')}}</small>
            </div>
            <div class="form-group">
               <label for="name">รหัสผ่าน</label>
               <input type="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" value="{{$text_password}}" placeholder ="รหัสผ่าน" >
               <small class="form-text text-danger">{{$errors->first('password')}}</small>
            </div>
            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
         </div>
      </div>
   </div>
</form>
@stop

