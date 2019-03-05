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
            <th class="text-center">ชื่อ-สกุล</th>
            <th class="text-center">อีเมล</th>
            <th class="text-center">เบอร์โทรศัพท์</th>
            <th class="text-center">ห้องทำงาน</th>
          
         </tr>
      </thead>
      <tbody>
         @foreach ($teachers as $teacher)
            <tr>
                  
               <td class="text-center">{{ $teacher->getFullName() }}</td>
               <td class="text-center">{{ $teacher->email }}</td>
               <td class="text-center">{{ $teacher->tel }}</td>
               <td class="text-center">{{ $teacher->room }}</td>
               
            </tr>
         @endforeach
      </tbody>
   </table>
  
@stop