
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="img">
                    <a href="{{route('home')}}">
                        <img src="{{$settings->footer_logo?get_file($settings->footer_logo):asset('frontend/img/logo.svg')}}" alt="logo">
                    </a>
                </div>
                <div class="about2">
                    <p>
                        {{$settings->footer_desc}}
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12">
                <h3>روابط سريعة</h3>
                <ul>
                    <li>

                    <li>
                        <a href="{{route('all-workers')}}"><span></span> طلب استقدام</a>
                    </li>
                    <li>
                        <a href="{{trans('transferService')}}"><span></span> طلب نقل خدمات</a>
                    </li>
                    <li><a  href="{{route('track_order_view')}}"><span></span> تتبع طلبك</a></li>

                @auth
                        <li>
                            <a href="{{route('auth.profile')}}"> <span></span> {{__('frontend.profile')}} </a>
                        </li>
                        <li><a  href="{{route('auth.profile')}}"><span></span> طلبات
                                الاستقدام </a></li>
                    @endauth
                    @guest
                        <li>
                            <a  href="{{route('auth.login')}}"><span></span> {{__('frontend.Login')}} </a>
                        </li>
                    @endguest
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-12">
                <h3>روابط تهمك</h3>
                <ul>
                    <li>
                    <a href="{{checkRouteIsHome('#popular_service')}}"><span></span> {{__('frontend.OurServices')}} </a>
                    </li>
                    <li>
                        <a  href="{{checkRouteIsHome('#countrie')}}"> <span></span>دول الاستقدام </a>
                    </li>
                    <li>
                        <a  href="{{route('frontend.supports')}}"> <span></span>{{__('frontend.faq')}} </a>
                    </li>
                    <li>
                        <a href="{{route('frontend.supports.contactUs')}}"><span></span> {{__('frontend.contactUs')}} </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-12">
                <h3>مزيد من الدعم</h3>
                <ul class="connect">
                    <li>
                        <i class="fa-sharp fa-light fa-location-dot"></i>
                        <p> {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}} </p>

                    </li>
                    @if($settings->callNumber != null )

                        <li>
                            <i class="fa-light fa-phone"></i> <a href="tel: {{$settings->callNumber??"0531221212"}}">
                                {{$settings->callNumber??"0531221212"}}
                            </a>
                        </li>
                    @endif

                    <li>
                        <i class="fa-brands fa-whatsapp"></i>
                        <a href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}">
                            {{$settings->whatsappNumber}}
                        </a>
                    </li>
                    <li>
                        <i class="fa-light fa-phone-office"></i>
                        <a href="https://api.whatsapp.com/send?phone={{$settings->phone1}}">
                            {{$settings->phone1}}
                        </a> - <a href="https://api.whatsapp.com/send?phone={{$settings->phone2}}">
                            {{$settings->phone2}}
                        </a>
                    </li>
                    <li>
                        <i class="fa-light fa-phone-plus"></i>
                        <a href="https://api.whatsapp.com/send?phone={{$settings->phone3}}">
                            {{$settings->phone3}}
                        </a> - <a href="https://api.whatsapp.com/send?phone={{$settings->phone4}}">
                            {{$settings->phone4}}
                        </a>
                    </li>
                    <li>
                        <i class="fa-light fa-envelope"></i> <a href="mailto:{{$settings->email1}}">{{$settings->email1}}</a>
                    </li>
                </ul>
                <ul class="social">


                    @if ($settings->facebook !=  null )
                        <li>
                        <a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook"></i></a>
                        </li>
                    @endif
                    @if($settings->whatsapp != null)
                            <li>
                        <a target="_blank" href="{{$settings->whatsapp}}"><i class="fab fa-whatsapp"></i></a>
                            </li>
                    @endif
                    @if ($settings->twitter !=  null )
                            <li>
                        <a href="{{$settings->twitter}}">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="18" height="18" x="0" y="0" viewBox="0 0 1226.37 1226.37"
                                 style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                  <g>
                      <path
                          d="M727.348 519.284 1174.075 0h-105.86L680.322 450.887 370.513 0H13.185l468.492 681.821L13.185 1226.37h105.866l409.625-476.152 327.181 476.152h357.328L727.322 519.284zM582.35 687.828l-47.468-67.894-377.686-540.24H319.8l304.797 435.991 47.468 67.894 396.2 566.721H905.661L582.35 687.854z"
                          fill="#FFFFFF" opacity="1" data-original="#000000">
                      </path>
                  </g>
                </svg>
                        </a>
                            </li>
                    @endif
                    @if ($settings->snapchat_ghost !=  null )
                            <li>
                        <a target="_blank" href="{{$settings->snapchat_ghost}}"><i class="fab fa-snapchat"></i></a>
                            </li>
                    @endif
                    @if ($settings->instagram !=  null )
                            <li>
                        <a target="_blank" href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a>
                            </li>
                    @endif
                    @if ($settings->email1 !=  null )
                            <li>
                        <a target="_blank" href="mailto:{{$settings->email1}}"><i class="fas fa-envelope"></i></a>
                            </li>
                    @endif

                </ul>
            </div>
            <div class="col-12">
                <div class="copy">
                    <p>   كل الحقوق محفوظة لشركة ايجاز للاستقدام ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </p>
                    <img src="{{asset('frontend/img/musand.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>
