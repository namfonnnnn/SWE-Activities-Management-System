@extends('manage.layout')
@section('title')
รายละเอียดกิจกรรม
@stop
@section('subtitle')
จัดการกิจรรม
@stop
@section('content')
<div class="row">
  <div class="col">
    <div class="card card-small mb-3">
      <div class="card-header border-bottom">
            <div class="card mb-1"  style="margin-top:10px; width: 50rem; height:20rem; ">
                <img class="card-img-top" src="{{asset($activityDetail->activity->getPicture())}}" width="250" height="330"  alt="Card image cap">
            </div>
            <div class="card-body">
                <h3 class="card-title">{{$activityDetail->activity->name}}</h3>
                <p class="card-text">{{$activityDetail->activity->description}}</p>
                <p class="card-text">วันที่เริ่มกิจกรรม {{$activityDetail->day_start}} วันที่สิ้นสุดกิจกรรม {{$activityDetail->day_end}}</p>
                <p class="card-text">เวลาที่เริ่มกิจกรรม {{$activityDetail->time_start}} เวลาที่สิ้นสุดกิจกรรม {{$activityDetail->time_end}}</p>
                <p class="card-text">สถานที่จัดกิจกรรม {{$activityDetail->location}} </p>
                <h5 class="card-title">อาจารย์ที่รับผิดชอบ</h5>
                <div class="row">
                  @foreach($activityDetail->teachers as $t)
                    <div class="col-4">{{$t->getFullName()}}</div>
                  @endforeach
                </div>
                
                <p class="card-text">นักศึกษาที่เข้าร่วม {{$activityDetail->studentAllJoinCount()}} คน</p>
            </div>
       </div>
    </div>
  </div>
</div>
@stop