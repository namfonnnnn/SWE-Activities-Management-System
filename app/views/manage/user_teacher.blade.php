@extends('manage.layout')
@section('title')
    
@stop

   @section('content')
   @include('error')

   <h2>
      อาจารย์
   </h2>
   <hr>
   <div class="card card-small mb-4">
    <div class="card-header border-bottom">

    

      <form class="input-group input-group-lg col-md-5 float-right">
          <input class="form-control py-2" type="search" value="{{$q}}" placeholder="ค้นหาจากชื่ออาจารย์" name="q">
          <span class="input-group-append">
            
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa fa-search"></i>
            </button>
          </span>
      </form>
    </div>


 <!-- <span class="input-group">
    <select id="years" name="years"  placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('term') ? 'is-invalid' : ''}}">
       <option value="">- เลือกชั้นปี -</option>
       <option value="1">ชั้นปีที่ 1</option>
       <option value="2">ชั้นปีที่ 2</option>
       <option value="3">ชั้นปีที่ 3</option>
       <option value="4">ชั้นปีที่ 4</option>
       <option value="5">ชั้นปีที่อื่นๆ</option>
    </select>
 </span>

    <span class="input-group-btn">
    <a href="{{url('/manage/user/student/add')}}"style="right"class="btn btn-outline-secondary btn-secondary" >เพิ่มนักศึกษา</a>
    </span>
    <span class="input-group-btn">
       <input type="submit" value="เพิ่มไฟล์" class="btn btn-outline-secondary btn-secondary">
    </span> -->
  <div class="card-body p-0 text-center">
    <table class="table mb-0 ">
      <thead class="bg-light">
         <tr>
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
                  
               <td class="text-center">{{ $teacher->getFullName() }}</td>
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
</div>
   <?php echo $teachers->links('partials.pagination'); ?>
   <script type="text/javascript">
      $(function () {
         $('[data-toggle="tooltip"]').tooltip()
      });
   </script>
@stop