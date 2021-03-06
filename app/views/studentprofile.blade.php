@extends('manage.layout')

@section('title')

@stop

@section('content')

   <h2>ข้อมูลนักศึกษา</h2>

   <hr>
     <div class="card card-small mb-4">
      <div class="card-header border-bottom">

        

        <form class="input-group input-group-lg col-md-5 float-right">
            <input class="form-control py-2" type="search" value="{{$q}}" placeholder="ค้นหาจากชื่อนักศึกษา" name="q">
            <span class="input-group-append">
              <select style="height:48px !important" class="custom-select" name="year">
                <option value="all">ชั้นปีทั้งหมด</option>
                <option value="1" <?=($year == '1')?'selected':''?>>ชั้นปีที่ 1</option>
                <option value="2" <?=($year == '2')?'selected':''?>>ชั้นปีที่ 2</option>
                <option value="3" <?=($year == '3')?'selected':''?>>ชั้นปีที่ 3</option>
                <option value="4" <?=($year == '4')?'selected':''?>>ชั้นปีที่ 4</option>
                <option value="5" <?=($year == '5')?'selected':''?>>ชั้นปีที่อื่นๆ</option>
              </select>
              <button class="btn btn-outline-secondary" type="submit">
                  <i class="fa fa-search"></i>
              </button>
            </span>
        </form>
      </div>


   <!-- <span class="input-group">
      <select id="years" name="years"  placeholder ="ภาคการศึกษา" class="form-control {{$errors->has('term') ? 'is-invalid' : ''}}">
         <option value="">- เลือกชั้นปี -</option>
         <option value="1">ชั้นปีที่ 1</option>
         <option value="2">ชั้นปีที่ 2</option>
         <option value="3">ชั้นปีที่ 3</option>
         <option value="4">ชั้นปีที่ 4</option>
         <option value="5">ชั้นปีที่อื่นๆ</option>
      </select>
   </span>

      <span class="input-group-btn">
      <a href="{{url('/manage/user/student/add')}}"style="right"class="btn btn-outline-secondary btn-secondary" >เพิ่มนักศึกษา</a>
      </span>
      <span class="input-group-btn">
         <input type="submit" value="เพิ่มไฟล์" class="btn btn-outline-secondary btn-secondary">
      </span> -->
    <div class="card-body p-0 text-center">
      <table class="table mb-0 ">
        <thead class="bg-light">
          <tr>
            <th class="text-center">รหัสนักศึกษา</th>
            <th class="text-center table-tr-max-100">ชื่อ-สกุล</th>
       
            <th class="text-center">ข้อมูลโปรไฟล์</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr>
              <td class="text-center">{{ $student->id }}</td>
              <td class="text-left table-tr-max-100">{{ $student->getFullName() }}</td>
         
              <td class="text-center">  	             
                <a class="btn btn-sm btn-default" href="{{url('profile')}}?id={{$student->id}}">โปรไฟล์</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="card-body p-0 text-center">
   <?php echo $students->links('partials.pagination'); ?>

   <script type="text/javascript">
      $(function () {
         $('[data-toggle="tooltip"]').tooltip()
      });
   </script>
   <style>
      .table-tr-max-40{
         max-width:40px
      }
      .table-tr-max-80{
         max-width:80px
      }
   </style>
  </div>
@stop
