<style>
.card-custom {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0,0,0,0.05);
    transition: 0.3s ease;

}
.card-custom:hover {
    transform: scale(1.01);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
}

/* ألوان مميزة */
.text-orange {
    color: #f4a835 !important;
}
.btn-orange {
    background-color: #f4a835;
    color: #fff;
    border-radius: 20px;
    transition: 0.3s ease;
}
.btn-orange:hover {
    background-color: #e69e24;
    color: #fff;
}

/* العداد */
.timer .time-box {
    min-width: 72px;
    padding: 8px;
    font-weight: bold;
    font-size: 16px;
    background: #ffffff;
    border-radius: 6px;
    color: #f4a835;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
}

/* صورة خدمة العملاء */
.profileCustomerInfo img,
.timer img {
    max-width: 100%;
    height: auto;
    display: block;
}


</style>
@foreach($currentOrders as $key=>$currentOrder)
    @php
        $date = $currentOrder->created_at;
        $newDate = date('Y-m-d H:i:s', strtotime($date. '+24 hours'));
    @endphp

    <div class="col-12 mb-4">
        <div class="card-custom shadow rounded-4 overflow-hidden position-relative">
            <div class="row g-0">
                <!-- الصور والسلايدر -->
                <div class="col-md-5 bg-white p-3">
                    <div class="swiper workerCvSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a data-fancybox="{{$currentOrder->biography->id}}"
                                   href="{{get_file($currentOrder->biography->cv_file)}}">
                                    <img src="{{get_file($currentOrder->biography->cv_file)}}"
                                         class="img-fluid rounded-3 shadow-sm">
                                </a>
                            </div>
                            @foreach($currentOrder->biography->images as $image)
                                <div class="swiper-slide">
                                    <a data-fancybox="{{$currentOrder->biography->id}}"
                                       href="{{get_file($image->image)}}">
                                        <img src="{{get_file($image->image)}}"
                                             class="img-fluid rounded-3 shadow-sm">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- المعلومات -->
                <div class="col-md-7 p-4 bg-light position-relative d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.Nationality') }}</h6>
                                <p class="mb-0 text-muted">{{ $currentOrder->biography->nationalitie->title ?? '-' }}</p>
                            </li>
                            <li class="mb-2">
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.job') }}</h6>
                                <p class="mb-0 text-muted">{{ $currentOrder->biography->job->title ?? '-' }}</p>
                            </li>
                            <li>
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.RecruitmentStatus') }}</h6>
                                <p class="mb-0 text-muted">{{ __('frontend.RecruitmentCurrent') }}</p>
                            </li>
                        </ul>
                    </div>

                    <!-- العداد -->
                    @php
                        $date = $currentOrder->created_at;
                        $newDate = date('Y-m-d H:i:s', strtotime($date. '+24 hours'));
                    @endphp

                    <div id="timer{{$currentOrder->id}}" class="timer" data-date="{{$newDate}}" data-id="{{$currentOrder->id}}"
                         class="timer-custom d-flex justify-content-between text-center rounded-3 p-2 mb-3">
                        <div id="days{{$currentOrder->id}}" class="time-box">00</div> 
                        <div id="hours{{$currentOrder->id}}" class="time-box">00</div> 
                        <div id="minutes{{$currentOrder->id}}" class="time-box">00</div>
                        <div id="seconds{{$currentOrder->id}}" class="time-box">00</div>
                    </div>

                    <!-- بيانات خدمة العملاء -->
                    <div class="d-flex justify-content-between align-items-center bg-white bg-opacity-75 p-2 rounded-3">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('frontend')}}/img/customer-service.png" width="40" class="me-2">
                            <div>
                                <h6 class="mb-0 text-orange">{{ $currentOrder->admin->name }}</h6>
                                <small class="text-muted">{{ __('frontend.customerSupport') }}</small>
                            </div>
                        </div>
                        <a href="{{route('profile.getOrder', $currentOrder->id)}}" target="_blank"
                           class="btn btn-orange btn-sm px-3">
                            تفاصيل الطلب
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1

            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
// our seconds have run out
                if(seconds <= 0) {
// our minutes have run out
                    if(current_minutes <= 0) {
// we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
// otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }

// we set our interval to a second.
            }, 1000);
        }

    </script>
@endforeach

