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
         <input type="text" id="q" name="q" class="form-control" placeholder="ค้นหาจากชื่อกิจกรรม" value="{{$q}}">  
         <span class="input-group-btn">      
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
         </span> 
      </div>
   </form>
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">ชื่อกิจกรรม</th>
            <th class="text-center">วันที่เริ่ม - วันที่สิ้นสุด</th>
            <th class="text-center">สถานที่</th>
            <th class="text-center">ปีการศึกษา</th>
            <th class="text-center">จัดการ</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($activities as $activity)
            <tr>
               <td class="text-center">{{ $activity->activity_name }}</td>
               <td class="text-center">{{ $activity->day_start }} ถึง {{ $activity->day_end }}</td>
               <td class="text-center">{{ $activity->location }}</td>
               <td class="text-center ">{{ $activity->sector }}</td>
               <td class="text-center">  
                  <a href="{{url('/manage/activity/edit/'.$activity->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="แก้ไข"> <i class="far fa-edit"></i></a>  
                  <a href="{{url('/manage/activity/delete/'.$activity->id)}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a>
                  <a href="{{url('/manage/activity/check/status')}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="บันทึกการเข้าร่วมกิจกรรม"><i class="far fa-calendar-check"></i></a>   
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   <?php echo $activities->links('partials.pagination'); ?>
</div>
<script type="text/javascript">
   $(function () {
      $('[data-toggle="tooltip"]').tooltip()
   });
</script>
@stop