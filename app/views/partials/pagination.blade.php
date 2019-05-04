
@if ($paginator->getLastPage() > 1)
  <nav aria-label="Page navigation example" style="margin-top:20px;">
      <ul class="pagination float-right">
          <li class="page-item {{($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->getUrl(1) }}" class="page-link">ก่อนหน้า</a></li>
          @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
              <li class="page-item {{($paginator->getCurrentPage() == $i) ? ' active' : '' }}"><a href="{{ $paginator->getUrl($i) }}" class="page-link" href="#">{{ $i }}</a></li>
          @endfor
          <li class="page-item {{($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}">ถัดไป</a></li>
      </ul>
      <p class="text-sm-left">ข้อมูทั้งหมด {{$paginator->getTotal()}} จำนวน</p>
  </nav>

@endif