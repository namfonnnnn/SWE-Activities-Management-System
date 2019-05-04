@extends('manage.layout')
@section('title')
รายละเอียดกิจกรรม {{$activity->name}}
@stop
@section('subtitle')
จัดการกิจรรม
@stop
@section('content')

<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">

        <a class="btn btn-outline-success btn-sg" href="{{url('manage/activity/'.$activity->id.'/term/add')}}">
          <i class="fa fa-plus"></i> เพิ่มรายละเอียดกิจกรรม
        </a>

        <form class="input-group input-group-sg col-md-5 float-right">
            <input class="form-control py-2" type="search" value="{{$q}}" placeholder="ค้นหาจากภาคการศึกษา หรือปี" name="q">
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
              <th scope="col" class="border-0">ปีการศึกษา</th>
              <th scope="col" class="border-0">ภาคการศึกษา</th>
              <th scope="col" class="border-0">วันที่จัด</th>
              <th scope="col" class="border-0">เวลา</th>
              <th scope="col" class="border-0">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($activityDetails as $activityDetail)
              <tr>
                
                <td>{{$activityDetail->term_year}}</td>
                <td>{{$activityDetail->term_sector}}</td>
                <td>{{$activityDetail->dayStartDayEnd()}}</td>
                <td>{{$activityDetail->timeStartTimeEnd()}}</td>
                <td>
                  @if($activityDetail->isPassDayStart())
                    <a href="" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="" data-original-title="รายละเอียดกิจกรรมเพิ่มเติม"><i class="fas fa-link"></i></a>
                    <a href="{{url('/manage/activity/'.$activity->id.'/term/'.$activityDetail->id.'/edit'.'')}}" class="btn btn-info btn-sm " data-toggle="tooltip" title="แก้ไข"> <i class="far fa-edit"></i></a>  
                    <a href="{{url('/manage/activity/'.$activity->id.'/term/'.$activityDetail->id.'/delete')}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a>
                  @else
                    <small class="text-danger">เลยเวลาจัดกิจกรรม</small>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer bg-light border-top text-muted">
        <?php echo $activityDetails->links('partials.pagination'); ?>
      </div>
    </div>
  </div>
</div>

@stop