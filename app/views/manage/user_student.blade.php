@extends('manage.layout')
@section('title')
  @if(isset($onlyTrashed))
    ข้อมูลนักศึกษา <small class="text-danger">(นักศึกษาที่พ้นสภาพ)</small>
  @else
    ข้อมูลนักศึกษา
  @endif
@stop
@section('subtitle')
จัดการผู้ใช้งาน
@stop
@section('cdn')
  <style>
    .input-group-lg>.input-group-append>.custom-select{
      height: calc(2.875rem + 2px);
      font-size: .875rem;
      line-height: 1.5;
      border-radius: 0rem;
    }
  </style>
@stop
@section('content')

<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">

        @if(!isset($onlyTrashed))
          <a class="btn btn-outline-success btn-sg" href="{{url('/manage/user/student/add')}}">
            <i class="fa fa-plus"></i> เพิ่มข้อมูลนักศึกษา
          </a>
          <a class="btn btn-outline-success btn-sg" href="{{url('manage')}}">
            <i class="fa fa-plus"></i> เพิ่มไฟล์
          </a>
          <a class="btn btn-outline-danger btn-sg" href="{{url('/manage/user/student-suspended')}}">
            นักศึกษาที่พ้นสภาพ
          </a>
        @else
        <a class="btn btn-outline-primary btn-sg" href="{{url('/manage/user/student')}}">
          ข้อมูลนักศึกษา
          </a>
        @endif

        <form class="input-group input-group-lg col-md-5 float-right">
            <input class="form-control py-2" type="search" value="{{$q}}" placeholder="รหัสนักศึกษา ชื่อ หรือนามสกุล" name="q">
            <span class="input-group-append">
              <select class="custom-select" name="year">
                <option value="">ชั้นปีทั้งหมด</option>
                <option value="1" <?=($year == '1')?'selected':''?>>ชั้นปีที่ 1</option>
                <option value="2" <?=($year == '2')?'selected':''?>>ชั้นปีที่ 2</option>
                <option value="3" <?=($year == '3')?'selected':''?>>ชั้นปีที่ 3</option>
                <option value="4" <?=($year == '4')?'selected':''?>>ชั้นปีที่ 4</option>
                <option value="5" <?=($year == '5')?'selected':''?>>ชั้นปีที่อื่นๆ</option>
              </select>
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
                <th class="text-center">รหัสนักศึกษา</th>
                <th class="text-center table-tr-max-100">ชื่อ-สกุล</th>
                <th class="text-center">ปีการศึกษาที่เข้าศึกษา</th>
                <th class="text-center">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
              <tr>
                <td class="text-center">{{ $student->id }}</td>
                <td class="text-left table-tr-max-100">{{ $student->getFullName() }}</td>
                <td class="text-center">{{ $student->year }}</td>
                <td class="text-center">  
                  @if(isset($onlyTrashed))
                    <a href="{{url('/manage/user/student-unsuspended/'.$student->id)}}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="กู้คืนนักศึกษา"><i class="fas fa-trash-restore-alt"></i></a>                      
                  @else
                    <a href="{{url('/manage/user/student/edit/'.$student->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="แก้ไข"><i class="far fa-edit"></i></a>  
                    <a href="{{url('/manage/user/student/delete/'.$student->id)}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a>
                  @endif
                </td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-light border-top text-muted">
        <?php echo $students->links('partials.pagination'); ?>
      </div>
    </div>
  </div>
</div>

@stop