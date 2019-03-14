@extends('manage.layout')
@section('title')
ข้อมูลอาจารย์
@stop

   @section('content')
   @include('error')
<style media="screen">

</style>
 <hr>
<div class="row">

    @foreach ($teachers as $teacher)
    <div class="col-md-4">
        <div class="card" style="margin-bottom:15px;">
          <div class="card-body">
            <h5 class="card-title text-center"><input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$teacher->getAvatar()}}" alt="x3" width="130" height="130" ></h5>
            <p class="card-text text-center">
                    ชื่อ - สกุล : {{ $teacher->getFullName() }} <br>
                    อีเมล : {{ $teacher->email }} <br>
                    เบอร์โทรศัพท์ : {{ $teacher->tel }} <br>
                    ห้องทำงาน : {{ $teacher->room }}
            </p>
          </div>
        </div>
    </div><!-- .col-md-4 -->
        @endforeach <!--end loog $teachger-->
</div> <!-- .row -->


  

@stop
