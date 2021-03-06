@extends('manage.layout')
@section('title')

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

<?php
$newSetRec = array();
foreach($setActivityRec as $s) {
    $newSetRec[] = array('lable'=> $s['y'], 'y' => $s['label']);
}

?>

<script>
    $(function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: ""
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "bottom",
                horizontalAlign: "bottom",
                itemclick: toggleDataSeries
            },
            data: [

                {
                type: "line",
                name: "ประวัติการเข้าร่วมกิจกรรม",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: <?php echo json_encode($setActivityReg, JSON_NUMERIC_CHECK); ?>
            },

            {
                type: "line",
                name: "กิจกรรมที่ต้องเข้าร่วม",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: <?php echo json_encode($setActivityRec, JSON_NUMERIC_CHECK); ?>
            },
            
            {
                            type: "",
                            name: "หมายเหตุ : แกน x : ปีการศึกษา/ภาคการศึกษา ,                                     หมายเหตุ : แกน y : จำนวนกิจกรรม",
                            indexLabel: "",
                            yValueFormatString: "",
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






@stop
@section('content')
    <br>
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">
          
            </li>
        </ol>
    </nav> --}}

   
    @section('page_heading','Dashboard')



    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                        <div class="mb-3 mx-auto">
                            <p>
                                <a href="{{url('/profile/upload-avatar')}}">
                                    <input class="rounded-circle" type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$users->{$users->type}->getAvatar()}}" alt="x3" width="130" height="130" >
                                </a>
                            </p>
                            <div class="col-xs-9 text-left" style="padding-left:20px">

                                <div><h2>
                                    @if($users->type == 'student')

                                    @else

                                    @endif
                                    {{-- <small><a class="btn" href="{{url('profile/edit')}}">แก้ไข</a></small> --}}
                                </h2></div>
                                    <div>ชื่อ :{{ $users->{$users->type}->prefix }} {{ $users->{$users->type}->firstname }} {{ $users->{$users->type}->lastname }}</div>
                                    @if($users->type == 'student')
                                        <div>รหัสนักศึกษา : {{ $users->{$users->type}->id }}</div>
                                    @else
                                        <div>ห้อง : {{ $users->{$users->type}->room_num }}</div>

                                    @endif

                                    <div>เบอร์โทร    : {{ $users->{$users->type}->tel }}</div>
                                    <div>อีเมล       : {{ $users->{$users->type}->email }}</div>


                                    <div class="col-xs-3">


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card card-small mb-4 pt-3">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                </div>

                @if($users->type == 'student')
                <!-- /.col-lg-4 -->

                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="input-group">
                                                       <input type="text" id="activity" name="activity" class="form-control" placeholder="ค้นหา" value="{{@$_GET['activity']}}">
                                                       <div class="input-group-append">
                                                           <select class="form-control" name="type">
                                                               <option value="1" {{ @$_GET['type'] == 1 ? "selected" : '' }}>กิจกรรมที่ต้องเข้าร่วม</option>
                                                               <option value="2" {{ @$_GET['type'] == 2 ? "selected" : '' }}>ประวัติกิจกรรมที่เข้าร่วม</option>
                                                           </select>
                                                       </div>
                                                       <div class="input-group-append">

                                                          <input type="submit" value="ค้นหากิจกรรม" class="btn btn-outline-secondary btn-secondary">
                                                       </div>
                                                    </div>
                                                 </form>

                                                 @if(@$_GET['type'] == 1)
                           
                                                 <div class="card card-small mb-4 pt-3">
                                                    <div class="text-center">
                                                        <div class="mb-3 mx-auto">
                                                           <h5>กิจกรรมที่ต้องเข้าร่วม</h5>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                            @if(empty($activity->count()))
                                                ไม่พบข้อมูล
                                            @endif
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

                                            @elseif(@$_GET['type'] == 2)

                                            <div class="col-md-12">
                                                <div class="card card-small mb-4 pt-3">
                                                    <div class="text-center">
                                                        <h5>ประวัติกิจกรรมที่เข้าร่วม</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(empty($history->count()))
                                                ไม่พบข้อมูล
                                            @endif
                                            @foreach ($history as $key => $value)
                                            <div class="col-md-4">
                                                <div class="img-activity">
                                                    <a href="{{url('show-activity/'.$value->id)}}"><img title="{{ $value->activity_name }}" class="img-thumbnail" src="{{asset($value->image)}}" onerror="this.src='https://i0.wp.com/www.ginorthwest.org/wp-content/uploads/2016/03/activities-2.png?fit=558%2C336&ssl=1'" alt=""></a>
                                                    <div class="">
                                                            {{ $value->activity_name }}
                                                            <br>
                                                            <small>วันที่เริ่มกิจกรรม : {{ Carbon\Carbon::parse($value->day_start)->addYears('543')->format('d/m/Y') }}</small><br>
                                                            <small>วันที่สิ่นสุดกิจกรรม : {{ Carbon\Carbon::parse($value->day_end)->addYears('543')->format('d/m/Y') }}</small>
                                                    </div>
                                                    <div class="text-right">
                                                        <a style="font-size: 12px;" href="{{url('show-activity/'.$value->id)}}">อ่านเพิ่มเติม</a>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                            @else
                                            <div class="card card-small mb-4 pt-3">
                                                <div class="text-center">
                                                    <div class="mb-3 mx-auto">
                                                       <h5>กิจกรรมที่ต้องเข้าร่วม</h5>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                        @if(empty($activity->count()))
                                            ไม่พบข้อมูล
                                        @endif
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
                                            <div class="card card-small mb-4 pt-3">
                                                <div class="text-center">
                                                    <h5>ประวัติการเข้าร่วมกิจกรรม</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @if(empty($history->count()))
                                            ไม่พบข้อมูล
                                        @endif
                                        @foreach ($history as $key => $value)
                                        <div class="col-md-4">
                                            <div class="img-activity">
                                                <a href="{{url('show-activity/'.$value->id)}}"><img title="{{ $value->activity_name }}" class="img-thumbnail" src="{{asset($value->image)}}" onerror="this.src='https://i0.wp.com/www.ginorthwest.org/wp-content/uploads/2016/03/activities-2.png?fit=558%2C336&ssl=1'" alt=""></a>
                                                <div class="">
                                                        {{ $value->activity_name }}
                                                        <br>
                                                        <small>วันที่เริ่มกิจกรรม : {{ Carbon\Carbon::parse($value->day_start)->addYears('543')->format('d/m/Y') }}</small><br>
                                                        <small>วันที่สิ่นสุดกิจกรรม : {{ Carbon\Carbon::parse($value->day_end)->addYears('543')->format('d/m/Y') }}</small>
                                                </div>
                                                <div class="text-right">
                                                    <a style="font-size: 12px;" href="{{url('show-activity/'.$value->id)}}">อ่านเพิ่มเติม</a>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                        @endif
                                        
                                            <div class="col-md-12 text-center" style="padding-top:35px">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                      <li class="page-item"><a class="page-link" href="?s={{Request::get('s')}}&id={{Request::get('id')}}">2561/1</a></li>
                                                      <li class="page-item"><a class="page-link" href="?s={{Request::get('s')}}&id={{Request::get('id')}}">2561/2</a></li>
                                                      <li class="page-item"><a class="page-link" href="?s={{Request::get('s')}}&id={{Request::get('id')}}">2561/3</a></li>
                                                      <li class="page-item"><a class="page-link" href="?s={{Request::get('s')}}&id={{Request::get('id')}}">2562/1</a></li>
                                                      <li class="page-item"><a class="page-link" href="?s={{Request::get('s')}}&id={{Request::get('id')}}">2562/2</a></li>
                                                      <li class="page-item"><a class="page-link" href="{{url('/profile')}}?s={{Request::get('s')}}&id={{Request::get('id')}}">ทั้งหมด</a></li>
                                                    </ul>
                                                  </nav>
                                            </div>
                                        </div>

                                    </div>
                @endif

            </div>
            <!-- /.row -->
            @if($users->type == 'student')


            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
            </div>

                    <!-- /.col-lg-8 -->
                @else

                @endif



                
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
            @stop
