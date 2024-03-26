@if (count($cvs)>0 || count($cvs) != 0 )

    @foreach($cvs as $cv)
        <div class="col-md-6 col-lg-4 p-2" data-aos="fade-down">
            <!-- cv -->
            @include('frontend.pages.all-workers.worker.worker_component')
            <!-- end cv -->
        </div>
    @endforeach
{{--    <div class="pagination-outer">--}}
{{--        {{ $cvs->links() }}--}}
{{--        <div class="pagination-style1">--}}

{{--            --}}{{--          <ul class="clearfix">--}}
{{--            --}}{{--              <li class="prev"><a href="javascript:;"><span> <i class="fa fa-angle-right"></i> </span></a></li>--}}
{{--            --}}{{--              <li><a href="javascript:;">1</a></li>--}}
{{--            --}}{{--              <li class="active"><a href="javascript:;">2</a></li>--}}
{{--            --}}{{--              <li><a href="javascript:;">3</a></li>--}}
{{--            --}}{{--              <li><a class="javascript:;" href="javascript:;"><i class="fa fa-ellipsis-h"></i></a></li>--}}
{{--            --}}{{--              <li><a href="javascript:;">5</a></li>--}}
{{--            --}}{{--              <li class="next"><a href="javascript:;"><span> <i class="fa fa-angle-left"></i> </span></a></li>--}}
{{--            --}}{{--          </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

@else
    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 100%;padding: 20px; height: 300px ; object-fit: contain;" src="{{asset('frontend/img/no_data.png')}}" alt="no data for current orders">
    </div>


    <div class="text-center mt-2 mb-4">
        <h2> {{__('frontend.no result for search')}}</h2>
    </div>

@endif
