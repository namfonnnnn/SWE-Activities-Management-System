  @extends('manage.layout')
@section('title')
   ประธานหลักสูตร
@stop
@section('cdn')






@stop
@section('content')
  <br>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">หน้าแรก</a></li>
    <li class="breadcrumb-item active" aria-current="page">ประธานหลักสูตร</li>
  </ol>
  </nav>
<br>

  @include('layouts.alert')
<h3>ประธานหลักสูตรทั้งหมด <small class="pull-right">

    @if(Auth::user()->roleID == 2)
    <a href="{{ url($route.'create') }}" class="btn btn-sm btn-default">เพิ่มประธานหลักสูตร +</a></small>
    @endif
</h3>
<form>
      <div class="input-group">
         <input value="{{ Request::get('s') }}" type="text" id="s" name="s" class="form-control" placeholder="ค้นหา">
         <span class="input-group-btn">
         <input type="submit" value="ค้นหา" class="btn btn-outline-secondary btn-secondary">
         </span>
      </div>
   </form>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ชื่อ สกุล</th>
                    <th>อีเมล</th>
                    <th>เลขห้อง</th>
                    <th>สร้างเมื่อ</th>
                    @if(Auth::user()->roleID == 2)
                    <th>จัดการ</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @if(count($items) == 0)
                    <tr>
                        @if(Auth::user()->roleID == 2)
                            <td colspan="5">ไม่พบรายการ</td>
                        @else
                            <td colspan="4">ไม่พบรายการ</td>
                        @endif
                    </tr>
                @endif
                @foreach ($items as $key => $value)
                    <tr>
                        <td>{{ $value->firstname }} {{$value->lastname}}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->room_num }}</td>
                        <td>{{ $value->created_at->addYears('543')->format('d/m/Y H:i:s') }}</td>
                        @if(Auth::user()->roleID == 2)
                        <td>
                            <a href="{{ url($route. $value->id."/edit") }}" class="btn btn-sm btn-default">แก้ไข</a>
                            <form style="display:inline-block" class="" action="{{ url($route. $value->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button onclick="if(!confirm('ยืนยันการลบข้อมูล')) return false" href="{{ url($route. $value->id) }}" class="btn btn-sm btn-danger">ลบ</button>
                            </form>

                        </td>
                    @endif
                    </tr>
                @endforeach

            </tbody>
        </table>

                {{ $items->links() }}
    </div>
</div>
@section('page_heading','Dashboard')
@endsection



@stop
