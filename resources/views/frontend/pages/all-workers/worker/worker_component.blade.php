<!-- cv -->
<style>
     .workerwarn {
     width: 100%;
     height: 60px;

     -o-object-fit: contain;
     object-fit: contain;
     padding: 10px;
    background-color: rgba(196, 131, 46, 0.1254901961);
    border-radius: 16px;
    text-align: center;
    margin-bottom: 20px;
     margin-top: 20px;
}
.workerwarn h6 {
    color: #ea1111;
    font-weight: bold;
    margin-bottom: 5px;
    margin-top: 10px;
}
</style>
<div class="workerCv" data-aos="fade-up">
    <div class="swiper workerCvSlider ">
        <div class="swiper-wrapper">
            <div class="swiper-slide ">

                <a data-fancybox="users{{$cv->id}}-CV" href="{{get_file($cv->cv_file)}}">
                    <img src="{{get_file($cv->cv_file)}}" alt="">
                </a>
            </div>


            @foreach($cv->images as $image)

                <div class="swiper-slide ">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{get_file($image->image)}}">
                        <img src="{{get_file($image->image)}}">
                    </a>
                </div>
            @endforeach

        </div>
        <div class="swiper-button-next workerCvSliderNext"></div>
        <div class="swiper-button-prev workerCvSliderPrev"></div>
    </div>


    @if(isset($transfer))

        <ul class="info">
            <li>
                <h6> الجنسية : </h6>
                <p>{{$cv->nationalitie->title??''}} </p>
            </li>
            <li>
                <h6> المهنة : </h6>
                <p> {{$cv->job->title??''}}</p>
            </li>
            <li>
                <h6> الديانة : </h6>
                <p> {{$cv->religion->title??''}} </p>
            </li>
            <li>
                <h6> سبب النقل : </h6>
                <p> {{$cv->reasonService??''}} </p>
            </li>
            <li>
                <h6>مدة العمل عند الكفيل السابق : </h6>
                <p> {{$cv->periodService??''}} </p>
            </li>
            <li>
                <h6> الراتب : </h6>
                <p> {{$cv->salary??''}} </p>
            </li>
            <li>
                <h6> سعر نقل الخدمات : </h6>
                <p> {{$cv->transferprice??''}} ريال </p>
            </li>
        </ul>
        <div class="text-center pt-auto pb-3">
            <!--<a href="https://wa.me/+966{{$settings->whatsapp}}?text={{get_file($cv->cv_file)}}" class="animatedLink">-->
                            <a href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" class="animatedLink">

                ارسال طلب نقل
                <i class="fa-regular fa-left-long ms-2"><span></span></i>
            </a>
        </div>
    @elseif(isset($rental))

        <ul class="info">
            @if($cv->cv_name != NULL)
                <li>
                    <h6> الاسم : </h6>
                    <p> {{$cv->cv_name??''}} </p>
                </li>
            @endif
            <li>
                <h6> الجنسية : </h6>
                <p>{{$cv->nationalitie->title??''}} </p>
            </li>
            <li>
                <h6> المهنة : </h6>
                <p> {{$cv->job->title??''}}</p>
            </li>
            <li>
                <h6> الديانة : </h6>
                <p> {{$cv->religion->title??''}} </p>
            </li>
            <li>
                <h6> رقم الجواز : </h6>
                <p> {{$cv->passport_number??''}} </p>
            </li>
            <li>
                <h6> العمر : </h6>
                <p> {{$cv->age??''}} </p>
            </li>
                <li>
                    <h6> الحالة الاجتماعية : </h6>
                    <p> {{$cv->social_type->title??''}} </p>
                </li>

            <li>
                <h6> تكلفة الايجار : </h6>
                <p> {{$cv->rentalprice??''}} ريال </p>
            </li>
        </ul>
        <div class="text-center pt-auto pb-3">
            <!--<a href="https://wa.me/+966{{$settings->whatsapp}}?text={{get_file($cv->cv_file)}}" class="animatedLink">-->
            <a href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" class="animatedLink">

                ارسال طلب تاجير
                <i class="fa-regular fa-left-long ms-2"><span></span></i>
            </a>
        </div>
    @else
     <div class="workerwarn">
          <h6>لضمان حقك ,لايتم سداد الرسوم بعد الحجز الا عن طريق منصة مساند
          </h6>

     </div>
        <ul class="info">
            @if($cv->cv_name != NULL)
            <li>
                <h6> الاسم : </h6>
                <p> {{$cv->cv_name??''}} </p>
            </li>
            @endif
            <li>
                <h6> الجنسية : </h6>
                <p>{{$cv->nationalitie->title??''}} </p>
            </li>
             <li>
                <h6> الراتب : </h6>
                <p> {{$cv->salary??''}} </p>
            </li>


              <li>
                <h6> رقم الجواز : </h6>
                <p> {{$cv->passport_number??''}} </p>
           </li>
             <li>
                <h6> الديانة : </h6>
                <p> {{$cv->religion->title??''}} </p>
            </li>

            <li>
                <h6> المهنة : </h6>
                <p> {{$cv->job->title??''}}</p>
            </li>


           <li>
                <h6> تكلفة الاستقدام : </h6>
                <p> {{$cv->nationalitie->price??''}} ريال </p>
            </li>

             <li>
                <h6> الحالة الاجتماعية : </h6>
                <p> {{$cv->social_type->title??''}} </p>
            </li>
            <li>
                <h6> العمر : </h6>
                <p> {{$cv->age??''}} </p>
            </li>

              <li>
                <h6> الخبرة العملية : </h6>

                  @if($cv->type_of_experience=='new')
                      <p>قادم جديد </p>
                  @elseif($cv->type_of_experience=='with_experience')
                      <p>لديه خبره سابقة</p>
                  @endif

            </li>


        </ul>
        <div class="text-center pt-4 pb-3">
            @auth
            <a href="{{route('frontend.show.worker',$cv->id)}}" class="animatedLink">
                حجز السيرة الذاتية
                <i class="fa-regular fa-left-long ms-2"><span></span></i>
            </a>
                @else
                <a href="{{route('register',$cv->id)}}" class="animatedLink">
                    حجز السيرة الذاتية
                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                </a>
            @endauth
        </div>

    @endif
</div>
<script>
    // workerCvSlider
    var workerCvSlider = new Swiper(".workerCvSlider", {
        spaceBetween: 0,
        centeredSlides: true,
        // loop: true,
        speed: 1000,
        pagination: {
            el: ".workerCvSliderpagination",
            clickable: true,
        },
        keyboard: {
            enabled: true,
        },
        navigation: {
            nextEl: ".workerCvSliderNext",
            prevEl: ".workerCvSliderPrev",
        },
    });
</script>
