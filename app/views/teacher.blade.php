@extends('manage.layout')
@section('title')
    
@stop

   @section('content')
   @include('error')
   <h2>
      ข้อมูลอาจารย์
   </h2>
 <hr>
@foreach ($teachers as $teacher)
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card card-small card-post card-post--1">
      
        <a href="#" class="card-post__category badge badge-pill badge-dark"></a>
        <div class="text-center">
          <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$teacher->getAvatar()}}" alt="x3" width="130" height="130" >  
        </div>
        <h6 class="text-center">ชื่อ-สกุล {{ $teacher->getFullName() }}</h6>
        <h6 class="text-center">อีเมล {{ $teacher->email }}</h6>
        <h6 class="text-center">เบอร์โทรศัพท์ {{ $teacher->tel }}</h6>
        <h6 class="text-center">ห้องทำงาน {{ $teacher->room }}</h6>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card card-small card-post card-post--1">
    
          <a href="#" class="card-post__category badge badge-pill badge-dark"></a>
          <div class="text-center">
            <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$teacher->getAvatar()}}" alt="x3" width="130" height="130" >  
          </div>
          <h6 class="text-center">ชื่อ-สกุล {{ $teacher->getFullName() }}</h6>
          <h6 class="text-center">อีเมล {{ $teacher->email }}</h6>
          <h6 class="text-center">เบอร์โทรศัพท์ {{ $teacher->tel }}</h6>
          <h6 class="text-center">ห้องทำงาน {{ $teacher->room }}</h6>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card card-small card-post card-post--1">

            <div class="text-center">
              <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$teacher->getAvatar()}}" alt="x3" width="130" height="130" >  
            </div>
            <h6 class="text-center">ชื่อ-สกุล {{ $teacher->getFullName() }}</h6>
            <h6 class="text-center">อีเมล {{ $teacher->email }}</h6>
            <h6 class="text-center">เบอร์โทรศัพท์ {{ $teacher->tel }}</h6>
            <h6 class="text-center">ห้องทำงาน {{ $teacher->room }}</h6>
        </div>
      </div>
</div>
@endforeach   


      

    
      



@stop