@extends('manage.layout')
@section('title')
@if(isset($activity))
   แก้ไขรหัสผ่าน
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
      @if(isset($teacher))
         <h2 style="margin-top:30px">แก้ไขข้อมูลอาจารย์</h2>
      @else
         <h2 style="margin-top:30px">เพิ่มข้อมูลอาจารย์</h2>
      @endif
      
      <hr>
      @include('error')
      
      <div class="row justify-content-md-center">
         <div class="col-sm-6">

            

           
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

