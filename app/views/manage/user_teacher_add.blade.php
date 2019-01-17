@extends('manage.layout')
@section('title')
    test
@stop

@section('content')

<style>
.topping{
   text-align: right;
}
.year{
  
}
</style>

<form action="{{url('manage/user/add')}}" method="post" class="form-horizontal" autocomplete="off">
    <div class="container">
        <ul class="errorMessages"></ul>
        <div class="row">
           
           <div class="col-md-6" style="margin-top:50px">
              <h2>เพิ่มอาจารย์</h2>
              <hr>
           </div>
        </div>
        <div class="row">
           <div class="topping col-md-2 field-label-responsive" style="margin-top:3px">          
              <label for="name">ชื่อ</label>           
           </div>
           <div class="col-md-6">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                  </div>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="ชื่อ" required="" autofocus="">     
              </div>
          </div>
        </div>
           <div class="col-md-3">
              <div class="form-control-feedback">
                 <span class="text-danger align-middle">
                    <!-- Put name validation error messages here -->    
                 </span>
              </div>
           </div>
        <div class="row">
           <div class="topping col-md-2 field-label-responsive" style="margin-top:3px">          
              <label for="name">นามสกุล</label>           
           </div>
           <div class="col-md-6">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                  </div>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="นามสกุล" required="" autofocus="">     
              </div>
          </div>
          </div>
           <div class="col-md-3">
              <div class="form-control-feedback">
                 <span class="text-danger align-middle">
                    <!-- Put name validation error messages here -->    
                 </span>
              </div>
           </div>
           <div class="row">
              <div class="topping col-md-2 field-label-responsive" style="margin-top:3px">   
                 <label for="name">รหัสนักศึกษา</label> 
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                  </div>
                    <input type="text" id="student_id" name="student_id" class="form-control" placeholder="รหัสนักศึกษา" required="" autofocus="">  
                </div>
              </div>
           </div>
           <div class="col-md-3">
              <div class="form-control-feedback">
                 <span class="text-danger align-middle">
                    <!-- Put name validation error messages here -->    
                 </span>
              </div>
           </div>
           <div class="row">
              <div class="topping col-md-2 field-label-responsive" style="margin-top:3px">   
                 <label for="name">รหัสผ่านใหม่</label> 
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                  </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่านใหม่" required="" autofocus="">  
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-control-feedback">
                <span class="text-danger align-middle">
                    <!-- Put name validation error messages here -->    
                </span>
            </div>
          </div>
           <div class="row" style="margin-top:20px">
              <div class="col-md-3"></div>
              <div class="col-md-6">             
                 <input type="submit" value="บันทึก" class="btn btn-success">       
              </div>
           </div>
   </div>
</form>
@stop
