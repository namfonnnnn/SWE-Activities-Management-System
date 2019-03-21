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
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [

                {
                type: "column",
                name: "กิจกรรมที่เข้าร่วมแล้ว",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: <?php echo json_encode($setActivityReg, JSON_NUMERIC_CHECK); ?>
            },

            {
                type: "column",
                name: "กิจกรรมที่ต้องเข้าร่วม",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
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
                @if($user->type == 'student')
                    โปรไฟล์นักศึกษา
                @else
                    ข้อมูลส่วนตัว

                @endif

            </li>
        </ol>
    </nav> --}}

    @include('layouts.alert')
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
                                    <input class="rounded-circle" type="image" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcMQ6ob11JlE6Q83Akzz4X-8QYnuwuyZnkeA8xdhgH1jM3QJ9'" src="{{$user->{$user->type}->getAvatar()}}" alt="x3" width="130" height="130" >
                                </a>
                            </p>
                            <div class="col-xs-9 text-left" style="padding-left:20px">

                                <div><h2>
                                    @if($user->type == 'student')

                                    @else

                                    @endif
                                    {{-- <small><a class="btn" href="{{url('profile/edit')}}">แก้ไข</a></small> --}}
                                </h2></div>
                                    <div>ชื่อ :{{ $user->{$user->type}->prefix }} {{ $user->{$user->type}->firstname }} {{ $user->{$user->type}->lastname }}</div>
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
                    <div class="card card-small mb-4 pt-3">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                </div>

                @if($user->type == 'student')
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
                                            <div class="col-md-12 text-center" style="padding-top:35px">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                      <li class="page-item"><a class="page-link" href="?year=1&s={{Request::get('s')}}&id={{Request::get('id')}}">1</a></li>
                                                      <li class="page-item"><a class="page-link" href="?year=2&s={{Request::get('s')}}&id={{Request::get('id')}}">2</a></li>
                                                      <li class="page-item"><a class="page-link" href="?year=3&s={{Request::get('s')}}&id={{Request::get('id')}}">3</a></li>
                                                      <li class="page-item"><a class="page-link" href="?year=4&s={{Request::get('s')}}&id={{Request::get('id')}}">4</a></li>

                                                      <li class="page-item"><a class="page-link" href="{{url('/profile')}}?s={{Request::get('s')}}&id={{Request::get('id')}}">ทั้งหมด</a></li>
                                                    </ul>
                                                  </nav>
                                            </div>
                                        </div>

                                    </div>
                @endif

            </div>
            <!-- /.row -->
            @if($user->type == 'student')


            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
            </div>

                    <!-- /.col-lg-8 -->
                @else

                @endif
              
              
                   
                <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Users</h6>
                      </div>
                      <div class="card-body pt-0">
                        <div class="row border-bottom py-2 bg-light">
                          <div class="col-12 col-sm-6">
                            <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                              <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                              <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                              <span class="input-group-append">
                                <span class="input-group-text">
                                  <i class="material-icons"></i>
                                </span>
                              </span>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                            <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
                          </div>
                        </div>
                        <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                      </div>
                    </div>
                  </div>  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
            @stop
