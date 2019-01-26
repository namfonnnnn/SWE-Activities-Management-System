@extends('manage.layout')
@section('title')
    โปรไฟล์นักศึกษา
@stop
@section('cdn')


    <style media="screen">
    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
        height: 196px;
        object-fit: contain;
    }
</style>



@stop
@section('content')
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @if($user->{$user->type}->type == 'student')
                    โปรไฟล์นักศึกษา
                @else
                    ข้อมูลส่วนตัว

                @endif

            </li>
        </ol>
    </nav>

    @include('layouts.alert')
    @section('page_heading','Dashboard')





    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <p>
                                <a href="{{url('/profile/upload-avatar')}}">
                                    <input type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$user->{$user->type}->getAvatar()}}" alt="x3" width="130" height="130" >

                                </a>
                            </p>

                            <div class="col-xs-9 text-left" style="padding-left:20px">

                                <div><h2>
                                    @if($user->type == 'student')
                                        โปรไฟล์นักศึกษา
                                    @else
                                        ข้อมูลส่วนตัว

                                    @endif
                                    <small><a class="btn" href="{{url('profile/edit')}}">แก้ไข</a></small></h2></div>
                                    <div>ชื่อ-นามสกุล : {{ $user->{$user->type}->firstname }} {{ $user->{$user->type}->lastname }}</div>
                                    @if($user->type == 'student')
                                        <div>รหัสนักศึกษา : {{ $user->{$user->type}->id }}</div>
                                    @else
                                        <div>ห้อง : {{ $user->{$user->type}->room_num }}</div>

                                    @endif

                                    <div>เบอร์โทร    : {{ $user->{$user->type}->tel }}</div>
                                    <div>อีเมล       : {{ $user->{$user->type}->email }}</div>


                                    <div class="col-xs-3">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                @if($user->type == 'student')
                    <div class="col-lg-6 col-md-12">
                        

                        <br>
                        <div class="panel panel-primary">

                            <div class="panel-heading">

                                <div class="row">


                                    <div class="col-xs-18 text-right">

                                        <div style="    padding-left: 15px;"> กิจกรรมที่ต้องเข้าร่วม</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">

                                    <span class="pull-left"> กิจกรรมที่ต้องเข้าร่วมทั้งหมด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
            <!-- /.row -->
            @if($user->type == 'student')

                <div class="row">

                    <div class="col-lg-4">
                        <?php

                        $dataPoints1 = array(
                            array("label"=> "2010", "y"=> 3),
                            array("label"=> "2011", "y"=> 3),
                            array("label"=> "2012", "y"=> 4),
                            array("label"=> "2013", "y"=> 3)

                        );
                        $dataPoints2 = array(
                            array("label"=> "2010", "y"=> 6),
                            array("label"=> "2011", "y"=> 7),
                            array("label"=> "2012", "y"=> 7),
                            array("label"=> "2013", "y"=> 8)

                        );

                        ?>
                        <!DOCTYPE HTML>
                        <html>
                        <head>
                            <script>
                            $(function() {
                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    theme: "light2",
                                    title:{
                                        text: "กราฟการเข้าร่วมกิจกรรมของนักศึกษา"
                                    },
                                    legend:{
                                        cursor: "pointer",
                                        verticalAlign: "center",
                                        horizontalAlign: "right",
                                        itemclick: toggleDataSeries
                                    },
                                    data: [
                                        @if(!empty($setActivityReg))
                                        {
                                        type: "column",
                                        name: "กิจกรรมที่เข้าร่วมแล้ว",
                                        indexLabel: "{y}",
                                        yValueFormatString: "#0.##กิจกรรม",
                                        showInLegend: true,
                                        dataPoints: <?php echo json_encode($setActivityReg, JSON_NUMERIC_CHECK); ?>
                                    },
                                    @endif
                                    {
                                        type: "column",
                                        name: "กิจกรรมที่ต้องเข้าร่วม",
                                        indexLabel: "{y}",
                                        yValueFormatString: "#0.##กิจกรรม",
                                        showInLegend: true,
                                        dataPoints: <?php echo json_encode($setActivityRec, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart.render();

                                function toggleDataSeries(e){
                                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                        e.dataSeries.visible = false;
                                    }
                                    else{
                                        e.dataSeries.visible = true;
                                    }
                                    chart.render();
                                }
                            })
                            window.onload = function () {



                            }
                            </script>
                        </head>
                        <body>
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </body>
                        </html>
                    </div>

                    <!-- /.col-lg-4 -->

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>กิจกรรมที่ต้องเข้าร่วม</h3>
                            </div>
                            @foreach ($activity as $key => $value)
                            <div class="col-md-4">
                                <div class="img-activity">
                                    <a href="{{url('show-activity/'.$value->id)}}"><img title="{{ $value->activity_name }}" class="img-thumbnail" src="{{asset($value->image)}}" onerror="this.src='https://i0.wp.com/www.ginorthwest.org/wp-content/uploads/2016/03/activities-2.png?fit=558%2C336&ssl=1'" alt=""></a>
                                    <div class="">
                                            {{ $value->activity_name }}
                                            <br>
                                            <small>วันที่เริ่มกิจกรรม : {{ Carbon\Carbon::parse($value->day_start)->addYears('543')->format('d/m/Y') }}</small>
                                    </div>
                                    <div class="text-right">

                                        <a style="font-size: 12px;" href="{{url('show-activity/'.$value->id)}}">อ่านเพิ่มเติม</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="col-md-12">
                                <h3>ประวัติกิจกรรมที่เข้าร่วม</h3>
                            </div>
                            @foreach ($history as $key => $value)
                            <div class="col-md-4">
                                <div class="img-activity">
                                    <a href="{{url('show-activity/'.$value->id)}}"><img title="{{ $value->activity_name }}" class="img-thumbnail" src="{{asset($value->image)}}" onerror="this.src='https://i0.wp.com/www.ginorthwest.org/wp-content/uploads/2016/03/activities-2.png?fit=558%2C336&ssl=1'" alt=""></a>
                                    <div class="">
                                            {{ $value->activity_name }}
                                            <br>
                                            <small>วันที่เริ่มกิจกรรม : {{ Carbon\Carbon::parse($value->day_start)->addYears('543')->format('d/m/Y') }}</small>
                                    </div>
                                    <div class="text-right">

                                        <a style="font-size: 12px;" href="{{url('show-activity/'.$value->id)}}">อ่านเพิ่มเติม</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="col-md-12 text-center" style="padding-top:35px">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                      <li class="page-item"><a class="page-link" href="?year=1&s={{Request::get('s')}}&userID={{Request::get('userID')}}">ปี 1</a></li>
                                      <li class="page-item"><a class="page-link" href="?year=2&s={{Request::get('s')}}&userID={{Request::get('userID')}}">ปี 2</a></li>
                                      <li class="page-item"><a class="page-link" href="?year=3&s={{Request::get('s')}}&userID={{Request::get('userID')}}">ปี 3</a></li>
                                      <li class="page-item"><a class="page-link" href="?year=4&s={{Request::get('s')}}&userID={{Request::get('userID')}}">ปี 4</a></li>
                                      <li class="page-item"><a class="page-link" href="?year=5&s={{Request::get('s')}}&userID={{Request::get('userID')}}">อื่นๆ</a></li>
                                      <li class="page-item"><a class="page-link" href="{{url('/profile')}}?s={{Request::get('s')}}&userID={{Request::get('userID')}}">ทั้งหมด</a></li>
                                    </ul>
                                  </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-8 -->
                @else

                @endif

            @stop
