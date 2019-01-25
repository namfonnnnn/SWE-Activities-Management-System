@extends('manage.layout')
@section('title')
    อาจารย์
@stop

   @section('content')
   @include('error')

   <h2>
      อาจารย์
      <div class="float-right">
         <a href="{{url('/manage/user/teacher/add')}}" class="btn btn-outline-success btn-success" >เพิ่มอาจารย์</a>
         <input type="submit" value="เพิ่มไฟล์" class="btn btn-outline-info btn-info">  
      </div>
   </h2>
   <hr>


   <form>
      <div class="input-group">
         <input type="text" id="q" name="q" class="form-control" placeholder="ค้นหาด้วยชื่อ-นามสกุล" value="{{$q}}">  
         <div class="input-group-append">
            <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
         </div>
      </div>
   </form>
      
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">ชื่อ-สกุล</th>
            <th class="text-center">อีเมล</th>
            <th class="text-center">เบอร์โทรศัพท์</th>
            <th class="text-center">ห้องทำงาน</th>
            <th class="text-center">จัดการ</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($teachers as $teacher)
            <tr>
               
               <td class="text-center">{{ $teacher->position->name }} {{ $teacher->getFullName() }}</td>
               <td class="text-center">{{ $teacher->email }}</td>
               <td class="text-center">{{ $teacher->tel }}</td>
               <td class="text-center">{{ $teacher->room }}</td>
               <td class="text-center">  
                  <a href="{{url('/manage/user/teacher/edit/'.$teacher->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="แก้ไข"><i class="far fa-edit"></i></a>  
                  <a href="{{url('/manage/user/teacher/delete/'.$teacher->id)}}" class="btn btn-danger btn-sm delete-confirm" data-toggle="tooltip" title="ลบ"><i class="fas fa-trash-alt"></i></a>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   <?php echo $teachers->links('partials.pagination'); ?>
   <script type="text/javascript">
      $(function () {
         $('[data-toggle="tooltip"]').tooltip()
      });
   </script>
@stop