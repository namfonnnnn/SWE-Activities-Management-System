@extends('manage.layout')
@section('title')
    นักศึกษา
@stop

@section('content')



<div class="container">
   <ul class="errorMessages"></ul>
   <div class="row">
      <div class="col-md-6" style="margin-top:50px">
         <h2>นักศึกษา</h2>
         <hr>
      </div>
   </div>
   </div>
   <form>
      <div class="input-group">  
         <input type="text" id="q" name="q" class="form-control" placeholder="ค้นหาจากรหัสนักศึกษา ชื่อ" value="{{$q}}">  
         <span class="input-group-btn">      
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
         </span> 
      </div>
   </form>

   <div class="input-group">
      <select id="years" name="years"  placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('term') ? 'is-invalid' : ''}}">
         <option value="">- เลือกชั้นปี -</option>
         <option value="1">ชั้นปีที่ 1</option>
         <option value="2">ชั้นปีที่ 2</option>
         <option value="3">ชั้นปีที่ 3</option>
         <option value="4">ชั้นปีที่ 4</option>
         <option value="5">ชั้นปีที่อื่นๆ</option>
      </select>
      <div class="input-group-append">
      <a href="{{url('/manage/user/student/add')}}"style="right"class="btn btn-outline-success btn-success" >เพิ่มนักศึกษา</a>
         <button class="btn btn-outline-info" type="submit" value="เพิ่มไฟล์" >เพิ่มไฟล์</button>
      </div>
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
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">รหัสนักศึกษา</th>
            <th class="text-center">ชื่อ</th>
            <th class="text-center">จัดการ</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($students as $student)
            <tr>
               <td class="text-center">{{ $student->id }}</td>
               <td class="text-center">{{ $student->firstname }} {{ $student->lastname }}</td>
               <td class="text-center">  
                  <a href="{{url('/manage/user/student/edit/'.$student->id)}}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>  
                  <a href="{{url('/manage/user/student/delete/'.$student->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   <?php echo $students->links('partials.pagination'); ?>
</div>
@stop