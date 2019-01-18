@extends('manage.layout')
@section('title')
@if(isset($student))
   โปรไฟล์นักศึกษา
@else
    x
@endif
@stop
@section('cdn')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>







@stop
@section('content')


@section('page_heading','Dashboard')





            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">

                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                        <p>
                            <a href="{{url('/student_upload')}}">
                                <input type="image" src="/SWE-Activities-Management-System/app/views/x3.jpg" alt="x3" width="130" height="130" >
                            </a>
                        </p>

                                <div class="col-xs-9 text-left">

                                <div><h2>ข้อมูลนักศึกษา</h2></div>
                                <div>ชื่อ-นามสกุล :</div>
                                <div>รหัสนักศึกษา :</div>
                                <div>เบอร์โทร    :</div>
                                <div>อีเมล       :</div>


                                <div class="col-xs-3">

                                </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-right">
                        <div class="wrap">
                                <div class="search">
                                   <input type="text" class="searchTerm" placeholder="Search">
                                   <button type="submit" class="searchButton">
                                     <i class="fa fa-search"></i>
                                  </button>
                                </div>
                             </div>
                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            <div class="row">


                                <div class="col-xs-18 text-right">

                                    <div>กิจกรรมที่ต้องเข้าร่วม</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">

                                <span class="pull-right">กิจกรรมที่ต้องเข้าร่วมทั้งหมด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
            <!-- /.row -->
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
                   window.onload = function () {

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
                       data: [{
                           type: "column",
                           name: "กิจกรรมที่เข้าร่วมแล้ว",
                           indexLabel: "{y}",
                           yValueFormatString: "#0.##กิจกรรม",
                           showInLegend: true,
                           dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                       },{
                           type: "column",
                           name: "กิจกรรมที่ต้องเข้าร่วม",
                           indexLabel: "{y}",
                           yValueFormatString: "#0.##กิจกรรม",
                           showInLegend: true,
                           dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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

                    @section ('pane2_panel_title', 'ประวัติการเข้าร่วมกิจกรรม')
                    @section ('pane2_panel_body')
                    <table class="table">
                        <thead>
                          <tr>
                            <th>ชื่อกิจกรรม</th>
                            <th>วันที่</th>
                            <th>รายละเอียด</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Default</td>
                            <td>1/3/2561</td>
                            <td>def@somemail.com</td>
                          </tr>
                          <tr class="table-primary">
                            <td>Primary</td>
                            <td>1/4/2561</td>
                            <td>joe@example.com</td>
                          </tr>
                          <tr class="table-success">
                            <td>Success</td>
                            <td>1/5/2561</td>
                            <td>john@example.com</td>
                          </tr>
                          <tr class="table-danger">
                            <td>Danger</td>
                            <td>1/6/2561</td>
                            <td>mary@example.com</td>
                          </tr>
                          <tr class="table-info">
                            <td>Info</td>
                            <td>1/7/2561</td>
                            <td>july@example.com</td>
                          </tr>
                          <tr class="table-warning">
                            <td>Warning</td>
                            <td>1/8/2561</td>
                            <td>bo@example.com</td>
                          </tr>
                          <tr class="table-active">
                            <td>Active</td>
                            <td>1/9/2561</td>
                            <td>act@example.com</td>
                          </tr>
                          <tr class="table-secondary">
                            <td>Secondary</td>
                            <td>1/12/2561</td>
                            <td>sec@example.com</td>
                          </tr>
                          <tr class="table-light">
                            <td>Light</td>
                            <td>1/11/2561</td>
                            <td>angie@example.com</td>
                          </tr>
                          <tr class="table-dark text-dark">
                            <td>Dark</td>
                            <td>1/10/2561</td>
                            <td>bo@example.com</td>
                          </tr>
                        </tbody>
                      </table>
                    @endsection
                    </div>
                <!-- /.col-lg-8 -->


@stop
