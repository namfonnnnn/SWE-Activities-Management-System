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
         <tr class="table-success">
            <th class="text-center">ชื่อกิจกรรม</th>
            <th class="text-center">อาจารย์ที่รับผิดชอบ</th>
            <th class="text-center">นักศึกษาที่เข้าร่วมทั้งหมด</th>
            <th class="text-center">นักศึกษาที่เข้าร่วม</th>
            <th class="text-center">นักศึกษาที่ไม่เข้าร่วม</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="text-center">ค่ายScrum</td>
            <td class="text-center">ผู้ช่วยศาสตราจารย์ ฐิมาพร เพชรแก้ว</td>
            <td class="text-center">27</td>
            <td class="text-center">22</td>
            <td class="text-center">5</td>
         </tr>
         <tr>
            <td class="text-center">รับน้องทะเล</td>
            <td class="text-center">ผู้ช่วยศาสตราจารย์ ฐิมาพร เพชรแก้ว</td>
            <td class="text-center">23</td>
            <td class="text-center">20</td>
            <td class="text-center">3</td>
         </tr>
         <tr>     
      </tbody>
   </table>
</div>

@stop
