@extends('manage.layout')
@section('title')
    อาจารย์
@stop

   @section('content')
   @include('error')
   <h2>
      ข้อมูลอาจารย์
   </h2>
 <hr>

  
      
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">รูปภาพ</th>
            <th class="text-center">ชื่อ-สกุล</th>
            <th class="text-center">อีเมล</th>
            <th class="text-center">เบอร์โทรศัพท์</th>
            <th class="text-center">ห้องทำงาน</th>
          
         </tr>
      </thead>
      <tbody>
         @foreach ($teachers as $teacher)
            <tr>
               <td class="text-center">   
                  <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$teacher->getAvatar()}}" alt="x3" width="130" height="130" >  
               </td>
               <td class="text-center">{{ $teacher->getFullName() }}</td>
               <td class="text-center">{{ $teacher->email }}</td>
               <td class="text-center">{{ $teacher->tel }}</td>
               <td class="text-center">{{ $teacher->room }}</td>
               
            </tr>
         @endforeach
      </tbody>
   </table>
  
@stop