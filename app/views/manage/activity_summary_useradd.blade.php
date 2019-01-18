@extends('manage.layout')
@section('title')
test
@stop
@section('content')
<div class="container">
   <div class="page-header" style="margin-top:40px">
   @include('error')
      <h2 class="mb-4 mr-sm-4 mb-sm-0">กิจกรรมที่รับผิดชอบ</h2>
   </div>
   <br>
   <form>
      <div class="input-group">  
         <input type="text" id="s" name="s" class="form-control" placeholder="ค้นหาจากชื่อกิจกรรม">  
         <span class="input-group-btn">      
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
         </span> 
      </div>
   </form>
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">ชื่อกิจกรรม</th>
            <th class="text-center">วันที่จัดกิจกรรม</th>
            <th class="text-center">วันที่สิ้นสุดกิจกรรม</th>
            <th class="text-center">อาจารย์ที่รับผิดชอบ</th>
            <th class="text-center">จัดการ</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($activities as $activity)
            <tr>
               <td class="text-center">{{ $activity->activity_name }}</td>
               <td class="text-center">{{ $activity->day_start }}</td>
               <td class="text-center">{{ $activity->day_end }}</td>
               <td class="text-left ">{{ $activity->getTeacherName() }}</td>
               <td class="text-center">  
                  <a href="{{url('/manage/activity/edit/'.$activity->id)}}" class="btn btn-info btn-sm">แก้ไข</a>  
                  <a href="{{url('/manage/activity/delete/'.$activity->id)}}" class="btn btn-danger btn-sm">ลบ</a>
                  <a href="{{url('/manage/activity/check/status')}}" class="btn btn-warning btn-sm">บันทึกการเข้าร่วมกิจกรรม</a>   
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
</div>
@stop