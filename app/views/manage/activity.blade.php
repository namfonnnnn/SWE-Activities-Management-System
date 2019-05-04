@extends('manage.layout')
@section('title')
เพิ่มกิจกรรม
@stop
@section('subtitle')
จัดการกิจกรรม
@stop
@section('content')

<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">

        <a class="btn btn-outline-success btn-sg" href="{{url('manage/activity/add')}}">
          <i class="fa fa-plus"></i> เพิ่มกิจกรรม
        </a>

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
              <th scope="col" class="border-0">จำนวนครั้งที่จัด</th>
              <th scope="col" class="border-0">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($activities as $activity)
              <tr>
                <td class="text-left">{{$activity->name}}</td>
                <td>{{$activity->details->count()}}</td>
                <td>
                  <a href="{{url('/manage/activity/'.$activity->id.'/term')}}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="รายการกิจกรรม"><i class="far fa-calendar-alt"></i></a>  
                  <a href="{{url('/manage/activity/edit/'.$activity->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="แก้ไข"> <i class="far fa-edit"></i></a>  
                  <a href="{{url('/manage/activity/delete/'.$activity->id)}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a> 
                </td>
              </tr>
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

@stop