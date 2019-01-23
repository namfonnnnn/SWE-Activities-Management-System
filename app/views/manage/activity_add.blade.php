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
               <small class="form-text text-danger">{{$errors->first('activityname')}}</small>
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">รายละเอียดเพิ่มเติม (ระบุหรือไม่ระบุก็ได้)</label>
               <textarea type="email" class="form-control" placeholder ="รายละเอียดเพิ่มเติม" id="activitydetail" name="activitydetail">{{$text_activitydetail}}</textarea>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label for="name">วันที่เริ่มกิจกรรม</label>
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('daystart') ? 'is-invalid' : ''}}" id="daystart" <?=($isPastDayStart)?'name="daystart"':''?> data-toggle="datetimepicker" data-target="#daystart" placeholder ="00/00/0000">
                     @if($isPastDayStart)
                        <input type="hidden" name="daystart" value="{{$text_daystart}}">
                     @endif
                     <small class="form-text text-danger">{{$errors->first('daystart')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">วันที่สิ้นสุดกิจกรรม</label>
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('dayend') ? 'is-invalid' : ''}}" id="dayend" name="dayend" data-toggle="datetimepicker" data-target="#dayend" placeholder ="00/00/0000">
                     <small class="form-text text-danger">{{$errors->first('dayend')}}</small>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label for="name">เวลาที่เริ่มกิจกรรม</label>
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('timestart') ? 'is-invalid' : ''}}" id="timestart" name="timestart" data-toggle="datetimepicker"  data-target="#timestart" placeholder ="00:00">
                     <small class="form-text text-danger">{{$errors->first('timestart')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">เวลาที่สิ้นสุดกิจกรรม</label>
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('timeend') ? 'is-invalid' : ''}}" id="timeend" name="timeend" data-toggle="datetimepicker" data-target="#timeend"  placeholder ="00:00">
                     <small class="form-text text-danger">{{$errors->first('timeend')}}</small>
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
                     <small class="form-text text-danger">{{$errors->first('term')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">ปีการศึกษา</label>
                     <input type="number" class="form-control {{$errors->has('sector') ? 'is-invalid' : ''}}" id="sector" name="sector" value="{{$text_sector}}"  placeholder ="ปีการศึกษา">
                     <small class="form-text text-danger">{{$errors->first('sector')}}</small>
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
            <small class="form-text text-danger">{{$errors->first('teacher')}}</small>

            <br>
            <div class="form-group">
               <label for="name">สถานที่จัดกิจกรรม</label>
               <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" id="location" name="location" value="{{$text_location}}" placeholder ="สถานที่จัดกิจกรรม" >
               <small class="form-text text-danger">{{$errors->first('location')}}</small>
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
                        นักศึกษาชั้นปีที่ 2
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year3" value="3" {{(in_array("3",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year3">
                        นักศึกษาชั้นปีที่ 3
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year4" value="4" {{(in_array("4",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year4">
                     นักศึกษาชั้นปีที่ 4
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year5" value="5" {{(in_array("5",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year5">
                        นักศึกษาชั้นปีอื่นๆ
                     </label>
                  </div>
               </div>
            </div>

            <small class="form-text text-danger">{{$errors->first('years')}}</small>

            <br>

            <div class="form-group">
               <label for="exampleFormControlFile1">Example file input</label>
               <input type="file" class="form-control-file" name="photo">
            </div>
            @if($image!='')
               <img id="" src="{{asset($image)}}" style="max-height:200px;" />
            @endif
            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
         </div>
      </div>
   </div>
</form>
<script type="text/javascript">
   $(function () {
      $('#timestart').datetimepicker({
         defaultDate: "{{Tool::nowForDatepicker()}} <?=($text_timestart != '')?$text_timestart:'00:00'?>",
         format: 'HH:mm'
      });
      $('#timeend').datetimepicker({
         defaultDate: "{{Tool::nowForDatepicker()}} <?=($text_timeend != '')?$text_timeend:'00:00'?>",
         format: 'HH:mm'
      });
      $('#daystart').datetimepicker({
         defaultDate: "<?=($text_daystart != '')?$text_daystart:Tool::nowForDatepicker()?>",
         format: 'DD/MM/YYYY'
         @if(!$isPastDayStart)
         ,minDate: '<?=Tool::nowForDatepicker()?>'
         @else
         ,disable: true
         @endif
      });
      $('#dayend').datetimepicker({
         defaultDate: "<?=($text_dayend != '')?$text_dayend:Tool::nowForDatepicker()?>",
         format: 'DD/MM/YYYY'
         @if(!$isPastDayEnd)
         ,minDate: '<?=Tool::nowForDatepicker()?>'
         @else
         ,disable: true
         @endif
      });
   });
</script>

@stop

