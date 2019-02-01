@extends('manage.layout')
@section('title')
   โปรไฟล์นักศึกษา
@stop
@section('cdn')



<style media="screen">
    .welcome {
        padding: 15px 106px;
        border: 1px solid #ccc;
        border-radius: 15px;
    }
    .box-system {
        padding: 70px;
        border: 3px solid #5199b9;
    }

    .box-system span{
        font-size: 22px;
        color:#5199b9;
    }
</style>


@stop
@section('content')
  <br>
 

  @include('layouts.alert')
@section('page_heading','Dashboard')





            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">

                                <div class="col-md-12 text-center">
                                    <br>

                                    @if(Auth::user()->teacher != NULL)
                                    <span class="welcome">ยินดีต้องรับ <b><a href="{{url('profile/edit')}}">{{ Auth::user()->teacher->firstname}} {{ Auth::user()->teacher->lastname}}</a></b></span>
                                @else
                                    <span class="welcome">ยินดีต้องรับ <b><a href="{{url('profile/edit')}}">{{ Auth::user()->student->firstname}} {{ Auth::user()->student->lastname}}</a></b></span>
                                @endif
                                    <br>
<br><br><br>
                                    <div class="box-system">
                                        <h1>ระบบกิจกรรมหลังสูตร SWE</h1>
                                        <span>หลักสูตร วิศวกรรมซอฟต์แวร์ มหาวิทยาลัยวลัยลักษณ์</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" style="margin-top:20px">
                        <thead>
                          <tr class="table-success">
                           
                          </tr>
                        </thead>
                    
                    </table>
                </div>
            </div>
        </div>


@stop
