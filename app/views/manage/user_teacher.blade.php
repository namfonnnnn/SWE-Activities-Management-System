@extends('manage.layout')
@section('title')
    อาจารย์
@stop

@section('content')

<style>
.topping{
   text-align: right;
}
.year{
  
}
</style>

<form method="post" class="form-horizontal" autocomplete="off">
    <div class="container">
        <ul class="errorMessages"></ul>
        <div class="row">
           
           <div class="col-md-6" style="margin-top:50px">
              <h2>อาจารย์</h2>
              <hr>
           </div>
        </div>
        
   </div>
   <form>
      <div class="input-group">  
         <input type="text" id="s" name="s" class="form-control" placeholder="ค้นหาจากรหัสนักศึกษา ชื่อ">  
         <span class="input-group-btn">      
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">  
         </span> 
      </div>
   </form>
   
    <span class="input-group-btn">      
        <a href="{{url('/manage/user/teacher/add')}}" class="btn btn-outline-secondary btn-secondary" >เพิ่มอาจารย์</a>
    </span>
    <span class="input-group-btn">      
        <input type="submit" value="เพิ่มไฟล์" class="btn btn-outline-secondary btn-secondary">  
    </span>
   <table class="table table-striped" style="margin-top:20px">
      <thead>
         <tr class="table-success">
            <th class="text-center">ชื่อ</th>
            <th class="text-center">สกุล</th>
            <th class="text-center">จัดการ</th>
         </tr>
      </thead>
      
   </table>
</div>
@stop