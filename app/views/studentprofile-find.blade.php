@extends('manage.layout')

@section('title')

@stop

@section('content')
   @include('error')

   <h2>ข้อมูลนักศึกษา</h2>

   <hr>
   <form>
      <div class="input-group">
         <div class="input-group-append" style="margin:auto">
            <select class="custom-select form-control" name="year">
               <option value="">- เลือกชั้นปี -</option>
               <option value="1" <?=(@$_GET['year'] == '1')?'selected':''?>>ชั้นปีที่ 1</option>
               <option value="2" <?=(@$_GET['year'] == '2')?'selected':''?>>ชั้นปีที่ 2</option>
               <option value="3" <?=(@$_GET['year'] == '3')?'selected':''?>>ชั้นปีที่ 3</option>
               <option value="4" <?=(@$_GET['year'] == '4')?'selected':''?>>ชั้นปีที่ 4</option>
               <option value="5" <?=(@$_GET['year'] == '5')?'selected':''?>>ชั้นปีที่อื่นๆ</option>
            </select>
            <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">
         </div>
      </div>
   </form>

@stop
