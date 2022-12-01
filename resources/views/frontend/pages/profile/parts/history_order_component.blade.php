@foreach($ordersHistory as $orderHistory)
    <div class="order mb-2">
        <div class="row align-items-center">
            <div class="col-sm-4 p-2">
                <div class="swiper workerCvSlider ">
                    <div class="swiper-wrapper">
                        <!-- cv image -->
                    @foreach($orderHistory->biography->images as $image)
                        <!-- cv image -->
                            <div class="swiper-slide ">
                                <a data-fancybox="user{{$image->id}}-CV-{{$image->id}}" href="{{get_file($image->image)}}">
                                    <img src="{{get_file($image->image)}}" alt="">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-sm-8 p-2">
                <ul class="info">
                    <li>
                        <h6> {{__('frontend.Nationality')}} : </h6>
                        <p>{{$orderHistory->biography->nationalitie?$orderHistory->biography->nationalitie->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.Occupation')}} : </h6>
                        <p> {{$orderHistory->biography->job?$orderHistory->biography->job->title:""}} </p>
                    </li>
                    <li>
                        <h6> {{__('frontend.orderCode')}} : </h6>
                        <p> {{$orderHistory->order_code}} </p>
                    </li>
                </ul>
                @if ($orderHistory->type == "canceled")
                    <h5 class="orderStatus cancel"> {{__('frontend.orderCanceled')}} </h5>
                @else
                    <h5 class="orderStatus done"> {{__('frontend.orderDone')}} </h5>
                @endif

            </div>
        </div>
    </div>
@endforeach
