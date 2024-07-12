@extends('frontend.layouts.layout')

@section('title')
    خدمة العملاء
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>     خدمة العملاء</h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active">   خدمة العملاء</a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        @if (count($admins)>0)
            <section class="Countries-section" id="Countries">
                <div class="container-fluid">
                    <!-- Section Title -->
{{--                    <div class="SectionTitle">--}}
{{--                        <h1 class="title" data-aos="fade-up"> خدمة العملاء </h1>--}}
{{--                        <h6 class="hint" data-aos="fade-up"> لخدمة عملاء متميزة ... </h6>--}}
                    </div>
                    <div class="Countries-boxes">
                        <div class="row">
                            @foreach($admins as $key=> $admin)
                                <div class="col-lg-3 col-md-6">
                                    <div class="Countries-block">
                                        <div class="Countries-media">
                                            <div> <img src="{{asset('frontend')}}/img/customer-service.png" alt=""/></div>
                                        </div>
                                        <div class="Countries-content">
                                            <div class="count-content-title">{{$admin->name}}</div>
                                            <p>نخدمكم علي مدار 24/7 </p>
                                            <a href="https://api.whatsapp.com/send?phone={{$admin->phone}}" class="defaultBtn"> واتساب  </a>
                                            <a href="tel:{{$admin->phone}}" class="defaultBtn"> اتصال  </a>
                                        </div>
                                    </div>
                                </div>
                                {{--                        @if($key==3 or $key==7 or $key==15)--}}
                                {{--                            <div class="col-lg-2"></div>--}}
                                {{--                        @endif--}}
                            @endforeach

                        </div>
                    </div>

                </div>

            </section>

        @else
        @endif

    </content>
@endsection
