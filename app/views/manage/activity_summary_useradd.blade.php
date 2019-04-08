@extends('manage.layout')
@section('title')

@stop
@section('content')
@include('error')
<h2 class="mb-4 mr-sm-4 mb-sm-0">กิจกรรมที่รับผิดชอบ</h2>

<br>
<div class="card card-small mb-4">
<div class="card-header border-bottom">  
    <form class="input-group input-group-lg col-md-5 float-right">
        <div class="input-group">  
         <input class="form-control py-2" type="search" type="text" id="q" name="q" class="form-control" placeholder="ค้นหาจากชื่อกิจกรรม" value="{{$q}}">  
         <span class="input-group-append"> 
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa fa-search"></i>
         </span> 
        </div>
    </form>
</div>

    <div class="card-body p-0 text-center">
        <table class="table mb-0 ">
            <thead class="bg-light">
                <tr>
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
    </div>
</div>

   <?php echo $activities->links('partials.pagination'); ?>

<script type="text/javascript">
   $(function () {
      $('[data-toggle="tooltip"]').tooltip()
   });
</script>
@stop