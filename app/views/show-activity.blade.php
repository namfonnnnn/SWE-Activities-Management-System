@extends('manage.layout')
@section('title')
    โปรไฟล์นักศึกษา
@stop
@section('cdn')


    <style media="screen">
    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
        height: 196px;
        object-fit: contain;
    }
</style>



@stop
@section('content')
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                กิจกรรม : {{$activity->activity_name}}

            </li>
        </ol>
    </nav>

    @include('layouts.alert')
    @section('page_heading','Dashboard')

    <div class="row">
        <div class="col-md-12">
          <h2>กิจกรรม : {{$activity->activity_name}}</h2>
        </div>
        <div class="col-md-12">
            <img src="{{$activity->image}}" alt="">
            <br>
            <small>วันที่เริ่ม : {{ Carbon\Carbon::parse($activity->day_start)->addYears('543')->format('d/m/Y') }} {{$activity->time_start}} ถึง {{ Carbon\Carbon::parse($activity->day_end)->addYears('543')->format('d/m/Y') }} {{$activity->time_end}} </small>
            <br>
            <small>เทอม : {{$activity->term_year}} ปีการศึกษา : {{ $activity->sector }}</small>
            <p>

                {{ $activity->description }}
            </p>
            {{-- @if(Carbon\Carbon::now() >= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->day_start. " " .$activity->time_start) ) --}}
                @if(Auth::user()->type == 'student')
                @if(Carbon\Carbon::now() < Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $activity->day_end. " " .$activity->time_end) )
                    @if(empty($register))
                    <a href="{{url('activity-register/'. $activity->id)}}" class="btn btn-info">เข้าร่วมกิจกรรม</a>
                    @else
                    <a onclick="if(!confirm('ยืนยันการยกเลิกข้อมูล')) return false" href="{{url('activity-un-register/'. $activity->id)}}" class="btn  btn-danger">ยกเลิกการลงทะเบียน</a>
                    @endif
                @else
                    <a href="#" class="btn btn-warning disableed">เลยระยะเวลากิจกรรม</a>
                @endif
                @endif
            {{-- @else
                <a href="#" class="btn btn-warning disableed">ยังไม่เปิดให้ลงทะเบียน</a>
            @endif --}}
            <a href="{{url('profile')}}" class="btn btn-default">ย้อนกลับ</a>
        </div>
    </div>



@stop
