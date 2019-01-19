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
      @if(isset($activity))
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
               <input type="text" class="form-control" id="activityname" name="activityname" value="" placeholder ="ปีการศึกษา" >
            </div>
            <div class="form-group">
               <label for="name">รหัสนักศึกษา</label>
               <input type="text" class="form-control" id="activityname" name="activityname" value="" placeholder ="รหัสนักศึกษา" >
            </div>
            <div class="form-group">
               <label for="name">ชื่อ</label>
               <input type="text" class="form-control" id="activityname" name="activityname" value="" placeholder ="ชื่อ" >
            </div>
            <div class="form-group">
               <label for="name">นามสกุล</label>
               <input type="text" class="form-control" id="activityname" name="activityname" value="" placeholder ="นามสกุล" >
            </div>
            <div class="form-group">
               <label for="name">รหัสผ่าน</label>
               <input type="text" class="form-control" id="activityname" name="activityname" value="" placeholder ="รหัสผ่าน" >
            </div>
            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
         </div>
      </div>
   </div>
</form>
@stop

