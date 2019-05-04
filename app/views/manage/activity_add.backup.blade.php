@extends('manage.layout')
@section('title')
@if(isset($activity))
   แก้ไขข้อมูลกิจกรรม
@else
   สร้างข้อมูลกิจกรรม
@endif
@stop
@section('subtitle')
จัดการกิจรรม
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
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('daystart') ? 'is-invalid' : ''}}" id="daystart" <?=(!$isPastDayStart)?'name="daystart"':''?> data-toggle="datetimepicker" data-target="#daystart" placeholder ="00/00/0000">
                     @if($isPastDayStart)
                        <input type="hidden" name="daystart" value="{{Tool::formatDateForsave($text_daystart)}}">
                     @endif
                     <small class="form-text text-danger">{{$errors->first('daystart')}}</small>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label for="name">วันที่สิ้นสุดกิจกรรม</label>
                     <input type="text" class="form-control datetimepicker-input {{$errors->has('dayend') ? 'is-invalid' : ''}}" id="dayend" <?=(!$isPastDayEnd)?'name="dayend"':''?> data-toggle="datetimepicker" data-target="#dayend" placeholder ="00/00/0000">
                     @if($isPastDayEnd)
                        <input type="hidden" name="dayend" value="{{Tool::formatDateForsave($text_dayend)}}">
                     @endif
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
               @foreach($teachers as $teacher)
                  <div class="col-6">
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="teacher[]" id="teacher-{{$teacher->id}}" value="{{$teacher->id}}" {{(in_array($teacher->id,$check_teacher))?'checked':''}}>
                        <label class="form-check-label" for="teacher-{{$teacher->id}}">                                                                            
                           {{$teacher->getFullName()}}
                        </label>
                     </div>
                  </div>
               @endforeach
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
               <div class="col-2">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year1" value="1"  {{(in_array("1",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year1">
                        ชั้นปีที่ 1
                     </label>
                  </div>
               </div>
               <div class="col-2">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year2" value="2" {{(in_array("2",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year2">
                        ชั้นปีที่ 2
                     </label>
                  </div>
               </div>
               <div class="col-2">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year3" value="3" {{(in_array("3",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year3">
                        ชั้นปีที่ 3
                     </label>
                  </div>
               </div>
               <div class="col-2">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox"  name="years[]" id="year4" value="4" {{(in_array("4",$check_years))?'checked':''}}>
                     <label class="form-check-label" for="year4">
                        ชั้นปีที่ 4
                     </label>
                  </div>
               </div>
               <div class="col-2">
                  <button type="button" id="showStudentSelector" class="btn btn-sm btn-secondary">เพิ่มเติม</button>
               </div> 
            </div>
            <small class="form-text text-danger">{{$errors->first('years')}}</small>

            <br>
            <div id="studentSelector" style="display: none;">
               <div class="input-group">
                  <input type="text" id="search-student" class="form-control" placeholder="ค้นหาจาก รหัสนักศึกษา ชื่อ นามสกุล">
                  <div class="input-group-append">
                     <select class="custom-select" id="year">
                        <option value="0">ทั้งหมด</option>
                        <option value="1" <?=($year == '1')?'selected':''?>>ชั้นปีที่ 1</option>
                        <option value="2" <?=($year == '2')?'selected':''?>>ชั้นปีที่ 2</option>
                        <option value="3" <?=($year == '3')?'selected':''?>>ชั้นปีที่ 3</option>
                        <option value="4" <?=($year == '4')?'selected':''?>>ชั้นปีที่ 4</option>
                        <option value="5" <?=($year == '5')?'selected':''?>>ชั้นปีที่อื่นๆ</option>
                     </select>
                  </div>
               </div>
               <table class="table student-list">
                  <thead>
                     <tr>
                        <th scope="col" width="20%">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">เลือก</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($students as $student)
                     <tr class="row-year-{{($student->getNowYear()<=4)?$student->getNowYear():'other'}}" data-year="{{($student->getNowYear()<=4)?$student->getNowYear():'other'}}" style="display: none;">
                        <td>{{$student->id}}</td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>
                           <div class="form-check">
                              <input class="form-check-input checkbox-year-{{$student->getNowYear()}}" type="checkbox"  name="paticipations[]" id="student-checkbox-{{$student->lastname}}" value="{{$student->id}}">
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            

            <div class="form-group">
               <label for="exampleFormControlFile1">รูปภาพกิจกรรม</label>
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
      var isStudentSelector = false

      function searchStudent() {
         var search = $("#search-student").val();
         var searchYear = $("#year").val()

         $(".student-list tr").each(function(index) {
            if (index != 0) {
               $row = $(this);
               var id = $row.find("td:nth-child(1)").text()
               var firstname = $row.find("td:nth-child(2)").text()
               var lastname = $row.find("td:nth-child(3)").text()
               var isMatch = id.indexOf(search) === 0 || firstname.indexOf(search) === 0 || lastname.indexOf(search) === 0 
               var isYear = $row.data('year') == searchYear
               if(searchYear == '0')
                  isYear = true
               
               if (isYear && isMatch) {
                  $(this).show();
               }
               else {
                  $(this).hide();
               }
            }
         })
      }



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

      $("#showStudentSelector").click( () => {
         isStudentSelector = !isStudentSelector
         if(isStudentSelector){
            $("#studentSelector").show();
         }else{
            $("#studentSelector").hide();
         }
      })

      $("#year1").change(function() {
         if(this.checked) {
            console.log("checked")
            $('.checkbox-year-1').prop('checked', true);
         }else{
            $('.checkbox-year-1').prop('checked', false);
         }
      });
      $("#year2").change(function() {
         if(this.checked) {
            console.log("checked")
            $('.checkbox-year-2').prop('checked', true);
         }else{
            $('.checkbox-year-2').prop('checked', false);
         }
      });
      $("#year3").change(function() {
         if(this.checked) {
            console.log("checked")
            $('.checkbox-year-3').prop('checked', true);
         }else{
            $('.checkbox-year-3').prop('checked', false);
         }
      });
      $("#year4").change(function() {
         if(this.checked) {
            console.log("checked")
            $('.checkbox-year-4').prop('checked', true);
         }else{
            $('.checkbox-year-4').prop('checked', false);
         }
      });

      $("#year").on('change', function() {
         searchStudent()
      });
   
      $("#search-student").on("keyup", () => {
         searchStudent()
      })


   });
</script>

@stop

