@extends('manage.layout')
@section('title')
  @if(isset($onlyTrashed))
    อาจารย์ <small class="text-danger">(ลาออก)</small>
  @else
    ข้อมูลอาจารย์
  @endif
@stop

@section('subtitle')
จัดการผู้ใช้งาน
@stop

@section('content')


<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">

        @if(!isset($onlyTrashed))
          <a class="btn btn-outline-success btn-sg" href="{{url('/manage/user/teacher/add')}}">
            <i class="fa fa-plus"></i> เพิ่มข้อมูลอาจารย์
          </a>
          <a class="btn btn-outline-success btn-sg" href="{{url('manage')}}">
            <i class="fa fa-plus"></i> เพิ่มไฟล์
          </a>
          <a class="btn btn-outline-danger btn-sg" href="{{url('/manage/user/teacher-suspended')}}">
            ลาออก
          </a>
        @else
          <a class="btn btn-outline-primary btn-sg" href="{{url('/manage/user/teacher')}}">
          อาจารย์
          </a>
        @endif

        <form class="input-group input-group-sg col-md-5 float-right">
            <input class="form-control py-2" type="search" value="{{$q}}" placeholder="ค้นหาจากชื่อหรือนามสกุล" name="q">
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
              <th class="text-center table-tr-max-260">ชื่อ-สกุล</th>
              <th class="text-center">อีเมล</th>
              <th class="text-center">เบอร์โทรศัพท์</th>
              <th class="text-center">ห้องทำงาน</th>
              <th class="text-center">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $teacher)
              <tr>
                <td class="text-left table-tr-max-260">{{ $teacher->getFullName() }}</td>
                <td class="text-left">{{ $teacher->email }}</td>
                <td class="text-center">{{ $teacher->tel }}</td>
                <td class="text-center">{{ $teacher->room }}</td>
                <td class="text-center">  
                  @if(isset($onlyTrashed))
                    <a href="{{url('/manage/user/teacher-unsuspended/'.$teacher->id)}}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="กู้คืนอาจารย์"><i class="fas fa-trash-restore-alt"></i></a>                      
                  @else
                    <a href="{{url('/manage/user/teacher/edit/'.$teacher->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="แก้ไข"><i class="far fa-edit"></i></a>  
                    <a href="{{url('/manage/user/teacher/delete/'.$teacher->id)}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a>
                  @endif

                </td>
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-light border-top text-muted">
        <?php echo $teachers->links('partials.pagination'); ?>
      </div>

      <style>
        .table-tr-max-40{
          max-width:40px
        }
        .table-tr-max-260{
          max-width:260px
        }
      </style>
    </div>
  </div>
</div>


@stop