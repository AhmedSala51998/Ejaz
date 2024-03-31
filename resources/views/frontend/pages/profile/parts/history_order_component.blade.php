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
            <div class="col-sm-6 p-2">
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
                @if ($orderHistory->status == "canceled")
                    <h5 class="orderStatus cancel"> {{__('frontend.orderCanceled')}} </h5>
                @elseif ($orderHistory->status == "tfeez")
                        <h5 class="orderStatus cancel">اصبح العقد الخاص بكم فى مرحلة التفييز بنجاح </h5>
                @elseif ($orderHistory->status == "musaned")
                    <h5 class="orderStatus cancel"> تم ربط العقد الخاص بكم في مساند بنجاح  </h5>
                @elseif ($orderHistory->status == "traning")
                    <h5 class="orderStatus cancel"> اصبح العفد الخاص بكم فى مرحلة الاجراءات بنجاح</h5>
                @elseif ($orderHistory->status == "contract")
                    <h5 class="orderStatus cancel"> تم قبول التعاقد الخاص بكم</h5>
                @elseif($orderHistory->status == "finished")
                    <h5 class="orderStatus done"> {{__('frontend.orderDone')}} </h5>
                @endif

            </div>

                <div class="col-sm-2 pt-4 p-2 text-center">
            <div >
                <a href="{{route('profile.getOrder',$orderHistory->id)}}" class="animatedLink btn-danger" target="_blank">
                    تفاصيل الطلب
                </a>
            </div>
            </div>
        </div>
    </div>
@endforeach
