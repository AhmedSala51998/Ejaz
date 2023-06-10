<footer>


    <section class="footer">
{{--        <a   href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" target="_blank">--}}
{{--        <div  class="container-wa">--}}

{{--            <div  class="floating-button">--}}

{{--                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}

{{--                    <i class="fa fa-whatsapp icon wa"></i>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        </a>--}}
{{--        <a href="tel:{{$settings->callNumber}}" target="_blank">--}}
{{--            <div class="container-call">--}}

{{--                <div class="floating-button">--}}

{{--                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}

{{--                    <i class="fa-regular fa-phone"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--       --}}
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 p-2 ">
                    <div class="info">
                        <img class="logo" src="{{$settings->footer_logo?get_file($settings->footer_logo):asset('frontend/img/logo.svg')}}" alt="" />
                        <div class="data">
                            <p>
                                {{$settings->footer_desc}}
                            </p>
                            <div class="socialIcons">
                                <a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook"></i></a>
                                <a target="_blank" href="{{$settings->whatsapp}}"><i class="fab fa-whatsapp"></i></a>
                                <a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="mailto:{{$settings->email1}}"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-5 p-2 py-4">
                    <h5 class="head"> {{__('frontend.Quick Links')}} </h5>
                    <div class="Links">
                        <ul>
                            <li>
                                <a href="{{checkRouteIsHome('#services')}}"> {{__('frontend.OurServices')}} </a>
                            </li>
                            <li>
                                <a  href="{{checkRouteIsHome('#steps')}}"> {{__('frontend.Recruitment steps')}} </a>
                            </li>
                          <li>
                                <a  href="https://aljawhra.sa/ar/supports"> {{__('frontend.faq')}} </a>
                            </li>
                            <li>
                                <a href="https://aljawhra.sa/ar/supports/contactUs"> {{__('frontend.contactUs')}} </a>
                            </li>
                            @auth
                            <li>
                                <a href="{{route('auth.profile')}}"> {{__('frontend.profile')}} </a>
                            </li>
                            @endauth
                            @guest
                            <li>
                                <a  href="{{route('auth.login')}}"> {{__('frontend.Login')}} </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>

            </div>

            <div class="Copyright">
  <p>{{__('frontend.Copyright')}} @ {{date("Y")}}. <a target="_blank" href="https://aljawhra.sa"> مكتب الجوهرة للاستقدام </a> </p>
            </div>

        </div>
    </section>
</footer>
