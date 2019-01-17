@extends('manage.layout')
@section('title')
    test
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
    <br>
    {{-- <p>- เช็คสถานะการเข้าร่วมกิจกรรม</p> --}}
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
            <table class="table table-striped" style="margin-top:20px">
               <thead>
                  <tr class="table-success">
                     <th class="text-center" >ชื่อผู้ลงชื่อเข้าร่วมกิจกรรม</th>
                     <th class="text-center" >จัดการ</th>
                  </tr>
               </thead>
               <tbody>
                   @if(count($register) == 0)
                       <tr>
                           <td colspan="2">ไม่มีผู้เข้าร่วม</td>
                       </tr>
                   @endif
                  @foreach ($register as $reg)
                     <tr>
                        <td class="text-center">
                            <?php
                            $user = DB::table('users')->where('id', $reg->userID)->first();
                            echo $user->firstname ." ". $user->lastname;
                             ?>
                        </td>

                        <td class="text-center">
                            @if($reg->status === 2)
                                เช็คชื่อเรียบร้อย
                            @else
                           <a href="{{url('/manage/activity/check/status-student')}}/{{$user->id}}/{{$activity->id}}" class="btn btn-warning btn-sm">เช็ค</a>
                            @endif
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
            <a href="{{url('profile')}}" class="btn btn-default">ย้อนกลับ</a>
        </div>
    </div>
@stop
