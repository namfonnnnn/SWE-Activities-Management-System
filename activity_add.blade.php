@extends('manage.layout')
@section('title')
@if(isset($activity))
   แก้ไขข้อมูลกิจกรรม
@else
   สร้างข้อมูลกิจกรรม
@endif
@stop
@section('cdn')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@stop
@section('content')

<?php 


   // if(isset($activity))
   // {
   //    $text_activityname = Input::old('activityname') ?? $activity->activity_name ?? '';
   //    $text_activitydetail = Input::old('activitydetail') ?? $activity->description ?? '';
   //    $text_daystart = Input::old('daystart') ?? $activity->day_startNomalFormat() ?? '';
   //    $text_dayend = Input::old('dayend') ?? $activity->day_startNomalFormat() ?? '';
   //    $text_timestart = Input::old('timestart') ?? $activity->time_start ?? '';
   //    $text_timeend = Input::old('timeend') ?? $activity->time_end ?? '';
   //    $checkbox_term = Input::old('term') ?? $activity->term_year ?? '';
   //    $text_sector = Input::old('sector') ?? $activity->sector ?? '';
   //    $check_teacher =  Input::old('teacher') ?? $activity->teacherJson() ?? array();
   //    $text_location = Input::old('location') ?? $activity->location ?? '';
   //    $check_years =  Input::old('years') ?? $activity->studentJson() ?? array();
   // }else{
   //    $text_activityname = Input::old('activityname') ?? '';
   //    $text_activitydetail = Input::old('activitydetail') ?? '';
   //    $text_daystart = Input::old('daystart') ?? '';
   //    $text_dayend = Input::old('dayend') ?? '';
   //    $text_timestart = Input::old('timestart') ?? '';
   //    $text_timeend = Input::old('timeend') ?? '';
   //    $checkbox_term = Input::old('term') ?? '';
   //    $text_sector = Input::old('sector') ?? '';
   //    $check_teacher =  Input::old('teacher') ?? array();
   //    $text_location = Input::old('location') ?? '';
   //    $check_years =  Input::old('years') ?? array();
   // }
   

?>

<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="post">
   <div class="container">
      @if(isset($activity))
         <h2 style="margin-top:30px">แก้ไขข้อมูลกิจกรรม</h2>
      @else
         <h2 style="margin-top:30px">สร้างข้อมูลกิจกรรม</h2>
      @endif
      
      <hr>
      @include('error')
      <div class="row justify-content-md-center">
         <div class="col-sm-8">
            <div class="form-group">
               <label for="name">ชื่อกิจกรรม</label>
               <input type="text" class="form-control {{$errors->has('activityname') ? 'is-invalid' : ''}} " id="activityname" name="activityname" value="{{$text_activityname}}" placeholder ="ชื่อกิจกรรม" >
               <small id="emailHelp" class="form-text text-danger">{{$errors->first('activityname')}}</small>
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">รายละเอียดเพิ่มเติม (ระบุหรือไม่ระบุก็ได้)</label>
               <textarea type="email" class="form-control" placeholder ="รายละเอียดเพิ่มเติม" id="activitydetail" name="activitydetail">{{$text_activitydetail}}</textarea>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label for="name">วันที่เริ่มกิจกรรม</label>
                     <input type="text" class="form-control {{$errors->has('daystart') ? 'is-invalid' : ''}}" id="daystart" name="daystart" value="{{$text_daystart}}" data-toggle="datetimepicker" data-target="#daystart" placeholder ="00/00/0000">
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('daystart')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">วันที่สิ้นสุดกิจกรรม</label>
                     <input type="text" class="form-control {{$errors->has('dayend') ? 'is-invalid' : ''}}" id="dayend" name="dayend"  value="{{$text_dayend}}" data-toggle="datetimepicker" data-target="#dayend" placeholder ="00/00/0000">
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('dayend')}}</small>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label for="name">เวลาที่เริ่มกิจกรรม</label>
                     <input type="text" class="form-control {{$errors->has('timestart') ? 'is-invalid' : ''}}" id="timestart" name="timestart" value="{{$text_timestart}}" data-toggle="datetimepicker" data-target="#timestart" placeholder ="00:00">
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('timestart')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">เวลาที่สิ้นสุดกิจกรรม</label>
                     <input type="text" class="form-control {{$errors->has('timeend') ? 'is-invalid' : ''}}" id="timeend" name="timeend" value="{{$text_timeend}}" data-toggle="datetimepicker" data-target="#timeend"  placeholder ="00:00">
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('timeend')}}</small>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label for="term">ภาคการศึกษา</label>
                     <select id="term" name="term"  placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('term') ? 'is-invalid' : ''}}">
                        <option value="">- เลือกภาคการศึกษา -</option>
                        <option value="1" {{($checkbox_term==1)?'selected':''}} >ภาคการศึกษาที่ 1</option>
                        <option value="2" {{($checkbox_term==2)?'selected':''}} >ภาคการศึกษาที่ 2</option>
                        <option value="3" {{($checkbox_term==3)?'selected':''}} >ภาคการศึกษาที่ 3</option>
                     </select>
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('term')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">ปีการศึกษา</label>
                     <input type="text" class="form-control {{$errors->has('sector') ? 'is-invalid' : ''}}" id="sector" name="sector" value="{{$text_sector}}"  placeholder ="ปีการศึกษา" >
                     <small id="emailHelp" class="form-text text-danger">{{$errors->first('sector')}}</small>
                  </div>
               </div>
            </div>

         <!-- <table class="table-Default">
            <thead>
               <tr>
                  <td class="text-center" style="padding-right:40px">ชื่อ</td>
                  <td class="text-center" style="padding-right:40px">หัวหน้าโครงการ</td>
                  <td class="text-center" style="padding-right:40px">ผู้ร่วมโครงการ</td>
                  <td class="text-center" style="padding-right:40px">ผู้เข้าร่วม</td>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="text-left">ผู้ช่วยศาสตราจารย์ ฐิมาพร  เพชรแก้ว</td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
               </tr>
               <tr>
                  <td class="text-left">อาจารย์ ดร. กรัณรัตน์   ธรรมรักษ์</td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
               </tr>
               <tr>
                  <td class="text-left">ผู้ช่วยศาสตราจารย์ อุหมาด  หมัดอาด้ำ</td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
               </tr>
               <tr>
                  <td class="text-left">อาจารย์ ดร. พุทธิพร  ธนธรรมเมธี</td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
               </tr>
               <tr>
                  <td class="text-left">ผู้ช่วยศาสตราจารย์ เยาวเรศ  ศิริสถิตย์กุล</td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
                  <td class="text-center"><input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1"></td>
               </tr>
            </tbody>
         </table> -->

            <label for="name">อาจารย์ที่รับผิดชอบ</label>
            <div class="row">
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher1" value="1" {{(in_array("1",$check_teacher))?'checked':''}}>
                     <label class="form-check-label" for="teacher1">                                                                            
                        ผู้ช่วยศาสตราจารย์ ฐิมาพร  เพชรแก้ว
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"   name="teacher[]" id="teacher2" value="2" {{(in_array("2",$check_teacher))?'checked':''}}>
                     <label class="form-check-label" for="teacher2">
                        อาจารย์ ดร. กรัณรัตน์   ธรรมรักษ์ 
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"   name="teacher[]" id="teacher3" value="3" {{(in_array("3",$check_teacher))?'checked':''}}>
                     <label class="form-check-label" for="teacher3">
                        ผู้ช่วยศาสตราจารย์ อุหมาด  หมัดอาด้ำ 
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"   name="teacher[]" id="teacher4" value="4" {{(in_array("4",$check_teacher))?'checked':''}}>
                     <label class="form-check-label" for="teacher4">
                        อาจารย์ ดร. พุทธิพร  ธนธรรมเมธี
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"   name="teacher[]" id="teacher5" value="5" {{(in_array("5",$check_teacher))?'checked':''}}>
                     <label class="form-check-label" for="teacher5">
                        ผู้ช่วยศาสตราจารย์ เยาวเรศ  ศิริสถิตย์กุล 
                     </label>
                  </div>
               </div>
            </div>
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('teacher')}}</small>

            <br>
            <div class="form-group">
               <label for="name">สถานที่จัดกิจกรรม</label>
               <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" id="location" name="location" value="{{$text_location}}" placeholder ="สถานที่จัดกิจกรรม" >
               <small id="emailHelp" class="form-text text-danger">{{$errors->first('location')}}</small>
               <!-- <select id="location_id" name="location_id" class="form-control">
                  <option value="2">อาคารเรียนรวม7  ( บริเวณด้านหลังอาคารเรียนรวม7 )</option>
                  <option value="3">โรงอาหาร4  ( บริเวณด้านในโรงอาหาร4 )</option>
                  <option value="4">มหาวิทยาลัยสงขลานครินทร์  ( 15 ถนน กาญจนวนิช ซอย 7 ตำบล คอหงส์ อำเภอ หาดใหญ่ สงขลา 90110 )</option>
                  <option value="5">อาคารเครื่องมือวิทยาศาสตร์  ( ห้องปฏิบัติการคอมพิวเตอร์2  )</option>
               </select> -->
            </div>
            
            <label for="name">นักศึกษาที่เข้าร่วม</label>
            <div class="row">
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year1" value="1"  {{(in_array("1",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year1">
                        นักศึกษาชั้นปีที่ 1
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year2" value="2" {{(in_array("2",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year2">
                        นักศึกษาชั้นปีที่ 4
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year3" value="3" {{(in_array("3",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year3">
                        นักศึกษาชั้นปีที่ 2
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year4" value="4" {{(in_array("4",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year4">
                        นักศึกษาชั้นปีอื่นๆ 
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year5" value="5" {{(in_array("5",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year5">
                        นักศึกษาชั้นปีที่ 3
                     </label>
                  </div>
               </div>
            </div>
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('years')}}</small>

            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
         </div>
      </div>
   </div>
</form>
<script type="text/javascript">
   $(function () {
      $('#timestart').datetimepicker({
         format: 'HH:mm'
      });
      $('#timeend').datetimepicker({
         format: 'HH:mm'
      });
      $('#daystart').datetimepicker({
         format: 'DD/MM/YYYY'
      });
      $('#dayend').datetimepicker({
         format: 'DD/MM/YYYY'
      });
   });
</script>
@stop

