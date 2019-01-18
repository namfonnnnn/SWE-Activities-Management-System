@extends('manage.layout')
@section('title')
   นักศึกษา
@stop
@section('cdn')






@stop
@section('content')
  <br>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">หน้าแรก</a></li>
    <li class="breadcrumb-item active" aria-current="page">นักศึกษา</li>
  </ol>
  </nav>
<br>

  @include('layouts.alert')
<h3>นักศึกษาทั้งหมด <small class="pull-right">
    <a href="{{ url('manage/user/student/create') }}" class="btn btn-sm btn-default">เพิ่มนักศึกษา +</a></small>
</h3>
<form>
      <div class="input-group">
         <input type="text" id="s" name="s" class="form-control" placeholder="ค้นหาจากชื่อกิจกรรม">
         <span class="input-group-btn">
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">
         </span>
      </div>
   </form>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ชื่อ สกุล</th>
                    <th>อีเมล</th>
                    <th>รหัสนักศึกษา</th>
                    <th>สร้างเมื่อ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $value)
                    <tr>
                        <td>{{ $value->firstname }} {{$value->lastname}}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->created_at->addYears('543')->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="#">ดูโปรไฟล์</a>
                            <a href="{{ url($route. $value->id."/edit") }}" class="btn btn-sm btn-default">แก้ไข</a>
                            <form style="display:inline-block" class="" action="{{ url($route. $value->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button onclick="if(!confirm('ยืนยันการลบข้อมูล')) return false" href="{{ url($route. $value->id) }}" class="btn btn-sm btn-danger">ลบ</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@section('page_heading','Dashboard')
@endsection



@stop
