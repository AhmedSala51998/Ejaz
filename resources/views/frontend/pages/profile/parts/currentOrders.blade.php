<a href="{{route('all-workers')}}" class="newOrder">
    <i class="fa-duotone fa-file-plus"></i>
    <p>{{__('frontend.New Recruitment Request')}} </p>
</a>

@if (isset($currentOrders) && count($currentOrders) > 0)
<input type="hidden" value="{{$current_page}}" id="current_page_orders">

<div class="row" id="current_orders_section_to_append">
    @include('frontend.pages.profile.parts.current_order_component')
</div>

<div style="{{$currentOrders->currentPage() == $currentOrders->lastPage() ?"display:none!important":""}}" class="d-flex align-items-center justify-content-center py-5 row">

    <button id="load_more_current_orders_button" class="animatedLink">
        {{__('frontend.load more')}}
        <i class="fa-regular fa-left-long ms-2"><span></span></i>
    </button>

</div>



@else
<div class="d-flex align-items-center justify-content-center row">
    <img style="width: 500px;height: 500px ; object-fit: contain;" src="{{asset('frontend/img/money.png')}}" alt="no data for current orders">
</div>

@endif
