@if (count($sponsors)>0)
    <section class="references">
        <div class="container">
            <div class="swiper referencesSlider ">
                <div class="swiper-wrapper">
                    @foreach($sponsors as $sponsor)
                        <div class="swiper-slide">
                            <div class="referenceLogo ">
                                <img src="{{get_file($sponsor->image)}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

@else
    <section class="references">
        <div class="container">
            <div class="swiper referencesSlider ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="referenceLogo ">
                            <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="referenceLogo ">
                            <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="referenceLogo ">
                            <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="referenceLogo ">
                            <img src="{{asset('frontend')}}/img/musand.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

@endif
