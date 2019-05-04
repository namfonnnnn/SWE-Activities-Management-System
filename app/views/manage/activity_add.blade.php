@extends('manage.layout')
@section('title')
@if(isset($activity))
   แก้ไขข้อมูลกิจกรรม
@else
   เพิ่มข้อมูลกิจกรรม
@endif
@stop
@section('subtitle')
จัดการกิจรรม
@stop
@section('cdn')
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> </head>
  
@stop
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
  <script src="{{asset('assets/shards-dashboard/scripts/app/app-blog-new-post.1.1.0.js')}}"></script>
  <script>

  var quill = new Quill('#editor', {
    placeholder: 'รายละเอียดกิจกรรม...',
    theme: 'snow'
  });
  $(document).ready(function(){
    $("form").on("submit", function (e) {
      $("#hiddenArea").text($('.ql-editor').html());
    });
    $('#name').on("keydown", (e)=>{
      onPressLimit(e,$('#name').val().length,100)
    });
  });
  </script>
@stop

@section('content')
<form class="add-new-post" method="post" autocomplete="off" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-lg-8 col-md-12">
      <!-- Add New Post Form -->
      <div class="card card-small mb-3">
        <div class="card-body">
          
            <div class="form-group">
              <input class="form-control form-control-lg mb-3 {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" id="name" name="name" value="{{$text_name}}" placeholder="ชื่อกิจกรรม" >
              <div class="invalid-feedback">{{$errors->first('name')}}</div>
            </div>
            <textarea name="detail" style="display:none" id="hiddenArea"></textarea>
            <div id="editor" style="height:300px">
              {{$text_detail}}
            </div>    
        </div>
      </div>
      <!-- / Add New Post Form -->
    </div>
    <div class="col-lg-4 col-md-12">
      <!-- Post Overview -->
      <div class='card card-small mb-3'>
        @if(isset($activity))
          <div class="card-post__image" style="background-image: url('{{asset($picture)}}');">
          </div>
        @endif

        
        <div class='card-body'>
          <h6 class="m-0 mb-2">รูปภาพ</h6>
          <input type="file" class="form-control-file" name="photo">
        </div>
        <div class="card-footer bg-light border-top p-3 text-muted">
          <button class="btn btn-outline-success ml-auto">
            <i class="material-icons">save</i> บันทึก
          </button>
        </div>
        
      </div>
      <!-- / Post Overview -->
    </div>
  </div>
</form>
@stop

