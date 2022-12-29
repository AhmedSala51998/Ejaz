@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment Request')}}
@endsection

@section('styles')

@endsection


@section('content')

    <content>

        <section class="cvPrint" style="padding:200px">
            <div class="text-end pt- pb-3">
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
        <div class="container-fluid">
            <!--main Info  -->
            <div class="mainInfo">
                <img class="userImg" src="{{get_file($cv->cv_file)}}" alt="">
                <div class="sideData">
                    <h1 class="name"> {{$cv->name}}</h1>

                    <div class="topInfo">
                        <div class="info">
                            <p class="title"> المهنة : </p>
                            <h4 class="data">{{$cv->job->title??''}} </h4>
                        </div>
                        <div class="info">
                            <p class="title"> الراتب الشهري : </p>
                            <h4 class="data"> {{$cv->salary??''}}  </h4>
                        </div>
                        <div class="info">
                            <p class="title"> مدة التعاقد : </p>
                            <h4 class="data"> {{$cv->contract_period}} سنة </h4>
                        </div>
                    </div>
                    <!-- Percentages -->
                    <div class="Percentages">
                        <?php
                           $arabic_degree =$cv->arabic_degree;
                           if($arabic_degree=='weak'){
                               $ar_degree=25;}
                        elseif($arabic_degree=='average'){
                            $ar_degree=50;}
                           elseif($arabic_degree=='good'){
                               $ar_degree=75;}
                           elseif($arabic_degree=='excellent'){
                               $ar_degree=100;}
                        $english_degree =$cv->english_degree;
                             if($english_degree=='weak'){
                                 $en_degree=25;}
                             elseif($english_degree=='average'){
                                 $en_degree=50;}
                             elseif($english_degree=='good'){
                                 $en_degree=75;}
                             elseif($english_degree=='excellent'){
                                 $en_degree=100;}

                        ?>

                        <div class="percentDiv">
                            <!-- circle percent -->

                            <div class="percent p{{$ar_degree}}">
                                <p class="percentNum">{{$ar_degree}} <span> % </span> </p>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h3> عربي </h3>
                        </div>
                        <div class="percentDiv">
                            <!-- circle percent -->
                            <div class="percent p{{$en_degree}}">
                                <p class="percentNum"> {{$en_degree}} <span> % </span> </p>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h3> إنجليزي </h3>
                        </div>
                    </div>

                </div>


                <!-- logo -->
                <div class="logo">
                    <img src="{{asset('frontend/img/logoH.svg')}}" alt="">

                </div>
            </div>
            <!-- bottomInfo -->
            <div class="bottomInfo">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <!--info Div  -->
                        <div class="infoDiv">
                            <div class="title">
                                <h4> البيانات الشخصية </h4>
                            </div>
                            <div class="innerInfo">
                                <div class="row">
                                    <div class="col-md-4 col-6 p-2 infoRow">
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> الجنسية </h6>
                                            <h3 class="innerData"> {{$cv->nationalitie->title??''}}  </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> السن </h6>
                                            <h3 class="innerData">  {{$cv->age??''}}  </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> الحالة الاجتماعية </h6>
                                            <h3 class="innerData"> {{$cv->social_type->title??''}} </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> الطول </h6>
                                            <h3 class="innerData"> {{$cv->height}} </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2 infoRow">
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> الديانة </h6>
                                            <h3 class="innerData"> {{$cv->religion->title??''}} </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> مكان الميلاد </h6>
                                            <h3 class="innerData">  {{$cv->birth_place??''}}  </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> عدد الاطفال </h6>
                                            <h3 class="innerData"> {{$cv->childern_number}} </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> التعليم </h6>
                                            <h3 class="innerData"> {{$cv->high_degree}} </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-2 infoRow">
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> تاريخ الميلاد </h6>
                                            <h3 class="innerData"> {{$cv->birth_date}} </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> رقم التواصل </h6>
                                            <h3 class="innerData"> {{$cv->contact_num}} </h3>
                                        </div>
                                        <!-- data -->
                                        <div class="data">
                                            <h6 class=" innerTitle"> الوزن </h6>
                                            <h3 class="innerData"> {{$cv->weight}} </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <!--info Div  -->
                        <div class="infoDiv">
                            <div class="title">
                                <h4> خبرة العمل </h4>
                            </div>
                            <!-- table -->
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    @foreach($cv->skills as $skill)
                                        <th> {{$skill->title}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($cv->skills as $skill)

                                        @php
                                            $degree=\App\Models\BiographySkill::where('skill_id',$skill->id)->where('biography_id',$cv->id)->first()->degree??''

                                        @endphp

                                        <td>

                                            @if($degree=="weak")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    ضعيف
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    weak
                                                @endif

                                            @elseif($degree=="average")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    متوسط
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    average
                                                @endif

                                            @elseif($degree=="good")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    جيد
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    good
                                                @endif

                                            @elseif($degree=="very good")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    جيد جدا
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    very good
                                                @endif

                                            @elseif($degree=="excellent")

                                                @if(LaravelLocalization::getCurrentLocale()=="ar")
                                                    ممتاز
                                                @elseif(LaravelLocalization::getCurrentLocale()=="en")

                                                    excellent
                                                @endif

                                            @endif


                                        </td>

                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--info Div  -->
                        <div class="infoDiv">
                            <div class="title">
                                <h4> تفاصيل جواز السفر</h4>
                            </div>
                            <div class="row py-4 px-2">
                                <div class="col-md-6 p-2">
                                    <div class="passport">
                                        <h6> رقم جواز السفر : </h6>
                                        <h3> {{$cv->passport_number}} </h3>

                                    </div>
                                </div>
                                <div class="col-md-6 p-2">
                                    <div class="passport">
                                        <h6> تاريخ الاصدار : </h6>
                                        <h3> {{$cv->passport_created_at}}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 p-2">
                                    <div class="passport">
                                        <h6> مكان الاصدار : </h6>
                                        <h3> {{$cv->passport_place}} </h3>
                                    </div>
                                </div>
                                <div class="col-md-6 p-2">
                                    <div class="passport">
                                        <h6> تاريخ الانتهاء : </h6>
                                        <h3> {{$cv->passport_ended_at}} </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!--  print Footer -->
        <div class="printFooter">
            <div class="contact">
                <h4> aljawahra </h4>
                <i class="ri-twitter-fill ms-2"></i>
            </div>
            <div class="contact">
                <h4> {{$settings->callNumber}} </h4>
                <i class="ri-phone-fill ms-2"></i>
            </div>
            <div class="contact">
                <h4> www.aljawhra.sa</h4>
                <i class="ri-global-fill ms-2"></i>
            </div>
        </div>
    </section>
</content>
@endsection
