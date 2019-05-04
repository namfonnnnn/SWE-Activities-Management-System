@extends('manage.layout')
@section('title')
สรุปการเข้าร่วมกิจกรรม
@stop
@section('subtitle')
จัดการกิจรรม
@stop
@section('js')
<script>
   $(document).ready(function () {
      $('#showStudent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var students = button.data('students')
        $("#student-table tbody tr").remove();
        students.forEach( student => {
          $('#student-table tbody').append(`<tr>
            <td>${student.id}</td>
            <td>${student.fullName}</td>
          </tr>`)
        });
        // id="student-table"
      })
   })
</script>
@stop
@section('content')

<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <form class="input-group input-group-sg col-md-5 float-right">
          <input class="form-control py-2" type="search" value="{{$q}}" placeholder="ค้นหาจากชื่อกิจกรรม" name="q">
          <span class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </form>
      </div>

      <div class="card-body p-0 text-center">
        <table class="table mb-0 ">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">ชื่อกิจกรรม</th>
              <th scope="col" class="border-0">ภาคการศึกษา/ปี</th>
              <th scope="col" class="border-0">นักศึกษาที่ต้องเข้าร่วมกิจกรรม</th>
              <th scope="col" class="border-0">นักศึกษาเข้าร่วม</th>
              <th scope="col" class="border-0">นักศึกษาไม่เข้าร่วม</th>
            </tr>
          </thead>
          <tbody>
            @foreach($activities as $activity)
              @foreach($activity->details as $detail)
                <tr>
                  <td class="text-left">{{$activity->name}}</td>
                  <td>{{$detail->term_sector}}/{{$detail->term_year}}</td>
                  <td> 
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#showStudent" data-students='{{$detail->studentAllJoin()}}'>
                      {{$detail->studentAllJoinCount()}} คน
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#showStudent" data-students='{{$detail->studentJoin()}}'>
                      {{$detail->studentJoinCount()}} คน
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#showStudent" data-students='{{$detail->studentNotJoin()}}'>
                      {{$detail->studentNotJoinCount()}} คน
                    </button>
                  </td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="card-footer bg-light border-top text-muted">
        <?php echo $activities->links('partials.pagination'); ?>
      </div>
    
    </div>
  </div>
</div>

<div class="modal" id="showStudent" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายชื่อนักศึกษา</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0" style="max-height: 500px !important; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
        <table id="student-table" class="table mb-0 ">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">รหัสนักศึกษา</th>
              <th scope="col" class="border-0">ชื่อ-นามสกุล</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
