@if (count($cvs)>0)

  @foreach($cvs as $cv)
      <div class="col-md-6 col-lg-4 p-2">
          <!-- cv -->
          @include('frontend.pages.all-workers.worker.worker_component')
          <!-- end cv -->
      </div>
  @endforeach


@else

    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 100%;height: 300px ; object-fit: contain;" src="{{asset('frontend/img/no_data.png')}}" alt="no data for current orders">
    </div>


    <div class="text-center my-2">
      <h1> {{__('frontend.no result for search')}}</h1>
    </div>

@endif
