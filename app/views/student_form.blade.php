@extends('manage.layout')
@section('title')
@if(isset($student))
   แก้ไขข้อมูลนักศึกษา
@else
   z
@endif
@stop
@section('cdn')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@stop
@section('content')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
            
            
            <div><h2>แก้ไขโปรไฟล์นักศึกษา</h2></div>

        <form action="phpUploadResize.php" method="post" enctype="multipart/form-data" name="frmMain">
            <table width="343" border="1">
            
            
                
                <label>ชื่อ</label>
                <input class="form-control">
                <label>นามสกุล</label>
                <input class="form-control">
                    <label>เบอร์โทร</label>
                    <input class="form-control">
                    <label>อีเมล</label>
                    <input class="form-control">
                    <label>รูปภาพ</label></br>
                    <input name="fileUpload" type="file"></br>
           
         
                <input type="submit" name="Submit" value="Submit"></td>
        </form>
 
@stop