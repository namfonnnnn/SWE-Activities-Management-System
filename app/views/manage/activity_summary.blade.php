@extends('manage.layout')
@section('title')
    test
@stop

@section('content')
<div class="card card-small mb-4">
    <div class="card-header border-bottom">
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
  <div class="card-body p-0 text-center">
      <table class="table mb-0 ">
          <thead class="bg-light">
              <tr>
            <th class="text-center">ชื่อกิจกรรม</th>
            <th class="text-center">วันที่จัดกิจกรรม</th>
            <th class="text-center">ผู้ร่วมโครงการ</th>
            <th class="text-center">นักศึกษาที่เข้าร่วม</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="text-center">ค่ายScrum</td>
            <td class="text-center">12/12/2561</td>
            <td class="text-center">ผู้ช่วยศาสตราจารย์ ฐิมาพร เพชรแก้ว </td>
            <td class="text-center">ชั้นปีที่ 4</td>
         </tr>
         <tr>
            <td class="text-center">รับน้องทะเล</td>
            <td class="text-center">19/12/2561</td>
            <td class="text-center">อาจารย์ ดร. พุทธิพร ธนธรรมเมธี </td>
            <td class="text-center">ชั้นปีที่ 2</td>
         </tr>
         <tr>     
      </tbody>
   </table>
  </div>
</div>

@stop
