@extends('manage.layout')

@section('title')
@if(isset($student))
  แก้ไขข้อมูลนักศึกษา
@else
  เพิ่มข้อมูลนักศึกษา
@endif
@stop

@section('subtitle')
จัดการข้อมูลนักศึกษา
@stop

@section('js')
<script>
  $(document).ready(function () {
    $('#firstname').on("keydown", onPressOnlyThaiAndEng);
    $('#lastname').on("keydown", onPressOnlyThaiAndEng);
    $('#id').on("keydown", onPressOnlyNumber);
    $('#id').on("keydown", (e)=>{
      onPressLimit(e,$('#id').val().length,8)
    });
    $('#password').on("keydown", (e)=>{
      onPressLimit(e,$('#password').val().length,16)
    });
  })
</script>
@stop

@section('content')
<form class="add-new-post" method="post" autocomplete="off" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <!-- Add New Post Form -->
      <div class="card card-small mb-3">
        <div class="card-body">
          <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="post">

            <div class="row">
              <div class="col-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">คำนำหน้า</label>
                    <select class="form-control {{$errors->has('prefix') ? 'is-invalid' : ''}}" id="prefix" name="prefix" >
                      <option value="">คำนำหน้า</option>
                      <option value="นาย" <?=($select_prefix=="นาย")?'selected':''?>>นาย</option>
                      <option value="นางสาว" <?=($select_prefix=="นางสาว")?'selected':''?>>นางสาว</option>
                    </select>
                    <small class="form-text text-danger">{{$errors->first('prefix')}}</small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label for="name">ชื่อ</label>
                    <input type="text" class="form-control  {{$errors->has('firstname') ? 'is-invalid' : ''}}" id="firstname" name="firstname" value="{{$text_firstname}}" placeholder ="ชื่อ" >
                    <small class="form-text text-danger">{{$errors->first('firstname')}}</small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label for="name">นามสกุล</label>
                    <input type="text" class="form-control  {{$errors->has('lastname') ? 'is-invalid' : ''}}" id="lastname" name="lastname" value="{{$text_lastname}}" placeholder ="นามสกุล" >
                    <small class="form-text text-danger">{{$errors->first('lastname')}}</small>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <div class="form-groups">
                    <label for="name">รหัสนักศึกษา</label>
                    <input type="text" class="form-control  {{$errors->has('id') ? 'is-invalid' : ''}}" id="id" name="id" value="{{$text_id}}" placeholder ="รหัสนักศึกษา" {{isset($id) ? 'disabled' : ''}}>
                    <small class="form-text text-danger">{{$errors->first('id')}}</small>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="name">รหัสผ่าน</label>
                    <input type="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" value="{{$text_password}}" placeholder ="รหัสผ่าน" >
                    <small class="form-text text-danger">{{$errors->first('password')}}</small>
                </div>
              </div>
            </div>
           
          <button class="btn btn-outline-success ml-auto float-right">
            <i class="material-icons">save</i> บันทึก
          </button>
      
          </form>
        </div>
      </div>
      <!-- / Add New Post Form -->
    </div>
  </div>
</form>
@stop

