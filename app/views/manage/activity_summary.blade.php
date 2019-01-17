@extends('manage.layout')
@section('title')
    test
@stop

@section('content')
<div class="container">
  <div class="page-header" style="margin-top:40px">
    <h2 class="mb-4 mr-sm-4 mb-sm-0">ประวัติกิจกรรมทั้งหมด</h2>
  </div>
  <br>
  <form>
    <div class="input-group">  
      <input type="text" id="s" name="s" class="form-control" placeholder="ค้นหาจากชื่อกิจกรรม">  
        <span class="input-group-btn">      
            <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
        </span> 
    </div>
  </form>
  <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr>
            <th class="text-center" style="padding-right:40px">ชื่อกิจกรรม</th>
            <th class="text-center" style="padding-right:40px">ประเภทกิจกรรม</th>
            <th class="text-center" style="padding-right:50px">อาจารย์ที่ปรึกษา</th>
            <th class="text-center" style="padding-right:40px">ปีการศึกษาที่เข้าร่วม</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="text-left">ค่ายScrum</td>
            <td class="text-left">กิจกรรมเสริมหลักสูตร</td>
            <td class="text-left">ผู้ช่วยศาสตราจารย์ ฐิมาพร เพชรแก้ว </td>
         </tr>
         <tr>
            <td class="text-left">รับน้องทะเล</td>
            <td class="text-left">กิจกรรมนักศึกษา</td>
            <td class="text-left">อาจารย์ ดร. พุทธิพร ธนธรรมเมธี </td>
         </tr>
         <tr>     
      </tbody>
   </table>
</div>

@stop
