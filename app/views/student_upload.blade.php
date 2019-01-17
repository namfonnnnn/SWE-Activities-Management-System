@extends('manage.layout')
@section('title')
@if(isset($activity))
   รูปนักศึกษา
@else
   y
@endif
@stop
@section('cdn')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@stop
@section('content')

<div class="container">
  <h2>เปลี่ยนรูปโปรไฟล์นักศึกษา</h2>


  <form action="" enctype="multipart/form-data" method="POST">


  	<div class="" style="">
        <ul></ul>
    </div>


    <input type="hidden" name="_token" value="">


    <div class="form-group">
     
    </div>


	<div class="form-group">
      <label>รูปภาพ:</label>
      <input type="file" name="image" class="form-control">
    </div>


    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">อัพโหลด</button>
    </div>


  </form>


</div>


<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });
  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='title']").val('');
    		alert('Image Upload Successfully.');
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };
  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>
		
@stop