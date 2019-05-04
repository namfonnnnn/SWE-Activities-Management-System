@extends('manage.layout')

@section('title')
  @if(isset($activity))
    แก้ไขข้อมูลปีและเดือน
  @else
    เพิ่มรายละเอียดกิจกรรม
  @endif
@stop

@section('subtitle')
จัดการกิจรรม
@stop

@section('cdn')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
  $(document).ready(function(){

    $('#timestart').datetimepicker({
      defaultDate: "{{Tool::nowForDatepicker()}} <?=($text_timestart != '')?$text_timestart:'08:00'?>",
      format: 'HH:mm'
    });
    $('#timeend').datetimepicker({
      defaultDate: "{{Tool::nowForDatepicker()}} <?=($text_timeend != '')?$text_timeend:'16:00'?>",
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


    // student 
    var isStudentSelector = false
    countStudent()
    checkedHead(".checkbox-year-1","#year1")
    checkedHead(".checkbox-year-2","#year2")
    checkedHead(".checkbox-year-3","#year3")
    checkedHead(".checkbox-year-4","#year4")
    checkedHead(".checkbox-year-other","#yearOther")

    function checkAllCheckBox(isChecked,checkbox){
      if(isChecked) {
        checkbox.prop('checked', true);
      }else{
        checkbox.prop('checked', false);
      }
      countStudent()
    }

    function checkedHead(name,headName){
      let countChecked = $(name+':checked').length;
      let countNotChecked = $(name+':not(":checked")').length;
      if(countChecked !== 0 && countNotChecked === 0){
        $(headName).prop('checked', true);
      }else{
        $(headName).prop('checked', false);
      }
      // console.log(countChecked,countNotChecked)
    }

    function countStudent(){
      let count = $('.checkbox-students:checked').length;
      $('#count-student').html(count)
    }

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

    $("#showStudentSelector").click( () => {
      isStudentSelector = !isStudentSelector
      if(isStudentSelector){
        $("#studentSelector").show();
      }else{
        $("#studentSelector").hide();
      }
    })

    $("#year1").change(function() {
      checkAllCheckBox(this.checked,$('.checkbox-year-1'))
    });
    $("#year2").change(function() {
      checkAllCheckBox(this.checked,$('.checkbox-year-2'))
    });
    $("#year3").change(function() {
      checkAllCheckBox(this.checked,$('.checkbox-year-3'))
    });
    $("#year4").change(function() {
      checkAllCheckBox(this.checked,$('.checkbox-year-4'))
    });
    $("#yearOther").change(function() {
      checkAllCheckBox(this.checked,$('.checkbox-year-other'))
    });

    $(".checkbox-year-1").on('change', function() {
      checkedHead(".checkbox-year-1","#year1")
    });

    $(".checkbox-year-2").on('change', function() {
      checkedHead(".checkbox-year-2","#year2")
    });

    $(".checkbox-year-4").on('change', function() {
      checkedHead(".checkbox-year-3","#year3")
    });

    $(".checkbox-year-4").on('change', function() {
      checkedHead(".checkbox-year-4","#year4")
    });

    $(".checkbox-year-4").on('change', function() {
      checkedHead(".checkbox-year-other","#yearOther")
    });
    
    $("#year").on('change', function() {
      searchStudent()
    });
   
    $("#search-student").on("keyup", () => {
      searchStudent()
    })

    $(".checkbox-students").on('change', function() {
      countStudent()
    });

    
    // end student
  });
</script>
@stop

@section('content')
<form class="add-new-post" method="post">
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <!-- Add New Post Form -->
      <div class="card card-small mb-3">
        <div class="card-header border-bottom">
          <h6 class="m-0">รายละเอียดกิจกรรม</h6>
        </div>
        <div class="card-body">

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="term_year">ปีการศึกษา</label>
              <select id="term_year" placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('year') ? 'is-invalid' : ''}}" disabled>
                @foreach($term_years as $year)
                  <option value="{{$year}}" } >ปีการศึกษา {{$year}}</option>
                @endforeach
              </select>
              <input name="year" class="btn btn-primary" type="hidden" value="{{$term_years[0]}}">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="sector">ภาคการศึกษา</label>
              <select id="sector" name="sector"  placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('sector') ? 'is-invalid' : ''}}">
                @foreach($term_sectors as $sector)
                  <option value="{{$sector}}" {{($selectbox_sector==$sector)?'selected':''}} >ภาคการศึกษาที่ {{$sector}}</option>
                @endforeach
              </select>
              <small class="form-text text-danger">{{$errors->first('sector')}}</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="name">วันที่เริ่มกิจกรรม</label>
              <input type="text" class="form-control datetimepicker-input {{$errors->has('daystart') ? 'is-invalid' : ''}}" id="daystart" <?=(!$isPastDayStart)?'name="daystart"':''?> data-toggle="datetimepicker" data-target="#daystart" placeholder ="00/00/0000" autocomplete="off">
              @if($isPastDayStart)
                <input type="hidden" name="daystart" value="{{Tool::formatDateForsave($text_daystart)}}">
              @endif
              <small class="form-text text-danger">{{$errors->first('daystart')}}</small>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="name">วันที่สิ้นสุดกิจกรรม</label>
              <input type="text" class="form-control datetimepicker-input {{$errors->has('dayend') ? 'is-invalid' : ''}}" id="dayend" <?=(!$isPastDayEnd)?'name="dayend"':''?> data-toggle="datetimepicker" data-target="#dayend" placeholder ="00/00/0000" autocomplete="off">
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
              <input type="text" class="form-control datetimepicker-input {{$errors->has('timestart') ? 'is-invalid' : ''}}" id="timestart" name="timestart" data-toggle="datetimepicker"  data-target="#timestart" placeholder ="00:00" autocomplete="off">
              <small class="form-text text-danger">{{$errors->first('timestart')}}</small>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="name">เวลาที่สิ้นสุดกิจกรรม</label>
              <input type="text" class="form-control datetimepicker-input {{$errors->has('timeend') ? 'is-invalid' : ''}}" id="timeend" name="timeend" data-toggle="datetimepicker" data-target="#timeend"  placeholder ="00:00" autocomplete="off">
              <small class="form-text text-danger">{{$errors->first('timeend')}}</small>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="name">สถานที่จัดกิจกรรม</label>
          <input type="text" class="form-control {{$errors->has('location') ? 'is-invalid' : ''}}" id="location" name="location" value="{{$text_location}}" placeholder ="สถานที่จัดกิจกรรม" >
          <small class="form-text text-danger">{{$errors->first('location')}}</small>
        </div>
        <label for="name">อาจารย์ที่รับผิดชอบ</label>
          <div class="row">
            @foreach($teachers as $teacher)
              <div class="col-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="teachers[]" id="teacher-{{$teacher->id}}" value="{{$teacher->id}}" {{(in_array($teacher->id,$check_teachers))?'checked':''}}>
                  <label class="form-check-label" for="teacher-{{$teacher->id}}">                                                                            
                    {{$teacher->getFullName()}}
                  </label>
                </div>
              </div>
            @endforeach
          </div>
          <small class="form-text text-danger">{{$errors->first('teachers')}}</small>
        </div>
        <div class="card-footer bg-light border-top p-3 text-muted">
          
        </div>
      </div>
      <!-- / Add New Post Form -->
    </div>
    <div class="col-lg-6 col-md-12">
      <!-- Post Overview -->
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">นักศึกษาที่เข้าร่วม</h6>
        </div>
        <div class='card-body'>
          <div class="row mb-3">
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="years[]" id="year1" value="1" >
                <label class="form-check-label" for="year1">
                  ปี 1
                </label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="years[]" id="year2" value="2">
                <label class="form-check-label" for="year2">
                  ปี 2
                </label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="years[]" id="year3" value="3">
                <label class="form-check-label" for="year3">
                  ปี 3
                </label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="years[]" id="year4" value="4">
                <label class="form-check-label" for="year4">
                  ปี 4
                </label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="years[]" id="yearOther" value="other">
                <label class="form-check-label" for="yearOther">
                  ปีอื่นๆ
                </label>
              </div>
            </div>
            <div class="col-2">
              <button type="button" id="showStudentSelector" class="btn btn-sm btn-secondary">เพิ่มเติม</button>
            </div>
          </div>
          <div class="mb-2 mt-0">
            <small>นักศึกษาทั้งหมด <b id="count-student">0</b> คน</small>
          </div>
          <div id="studentSelector" style="display: none;">
            <div class="input-group">
              <input type="text" id="search-student" class="form-control" placeholder="ค้นหาจาก รหัสนักศึกษา ชื่อ นามสกุล">
              <div class="input-group-append">
                  <select class="custom-select" id="year">
                    <option value="0">ทั้งหมด</option>
                    <option value="1">ชั้นปีที่ 1</option>
                    <option value="2">ชั้นปีที่ 2</option>
                    <option value="3">ชั้นปีที่ 3</option>
                    <option value="4">ชั้นปีที่ 4</option>
                    <option value="other">ชั้นปีที่อื่นๆ</option>
                  </select>
              </div>
            </div>
            <div style="height: 273px !important; overflow: scroll;">
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
                  <tr class="row-year-{{($student->getNowYear()<=4)?$student->getNowYear():'other'}}" data-year="{{($student->getNowYear()<=4)?$student->getNowYear():'other'}}">
                    <td>{{$student->id}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>
                        <div class="form-check">
                          <input class="form-check-input checkbox-students checkbox-year-{{($student->getNowYear()<=4)?$student->getNowYear():'other'}}" type="checkbox"  name="students[]" id="student-checkbox-{{$student->id}}" value="{{$student->id}}" {{(in_array($student->id,$check_students))?'checked':''}}>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <small class="form-text text-danger">{{$errors->first('students')}}</small>
        </div>
        <div class="card-footer bg-light border-top p-3 text-muted">
          <button class="btn btn-outline-success ml-auto float-right">
            <i class="material-icons">save</i> บันทึก
          </button>
        </div>
        
      </div>
      <!-- / Post Overview -->
    </div>
  </div>
</form>
@stop

