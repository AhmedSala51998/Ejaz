<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <!-- title -->
    <title>الجوهرة الاولي للاستقدام </title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="img/fav.svg" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.rtl.min.css" />
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- swiper -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/swiper-bundle.min.css" />
    <!-- aos -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/aos.css" />
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/select2.min.css" />
    <!-- img gallery -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery.fancybox.min.css" />
    <!-- odometer -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/odometer.min.css" />
    <!-- Custom style  -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" />
</head>

<body>
<!-- custom cursor  -->
<div class="customCursor"></div>
<div class="customCursorInner"></div>
<!-- end custom cursor  -->
<!-- ================ Header ================= -->
<!-- <header></header> -->
<!-- ================ /Header ================= -->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((((( content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<content>
    <section class="cvPrint">
        <div class="container-fluid">
            <!--main Info  -->
            <div class="mainInfo">
                <img class="userImg" src="{{get_file($cv->cv_file)}}" alt="">
                <div class="sideData">
                    <h1 class="name">{{$cv->cv_name}} </h1>

                    <div class="topInfo">
                        <div class="info">
                            <p class="title"> المهنة : </p>
                            <h4 class="data">{{$cv->job->title}} </h4>
                        </div>
                        <div class="info">
                            <p class="title"> الراتب الشهري : </p>
                            <h4 class="data"> {{$cv->salary.' دولار '}}  </h4>
                        </div>
                        <div class="info">
                            <p class="title"> مدة التعاقد : </p>
                            <h4 class="data"> 1 سنة </h4>
                        </div>
                    </div>
                    <!-- Percentages -->
                    <div class="Percentages">
                        <div class="percentDiv">
                            <!-- circle percent -->
                            <div class="percent p75 ">
                                @if($cv->arabic_degree=="weak")
                                        <?php $arabic_degree=0; ?>
                                @elseif($cv->arabic_degree=="average")
                                        <?php $arabic_degree=25; ?>

                                @elseif($cv->arabic_degree=="good")
                                        <?php $arabic_degree=50; ?>

                                @elseif($cv->arabic_degree=="very good")
                                        <?php $arabic_degree=70; ?>

                                @elseif($cv->arabic_degree=="excellent")
                                        <?php $arabic_degree=100; ?>
                                @else
                                        <?php $arabic_degree=25; ?>
                                @endif
                                <p class="percentNum">{{$arabic_degree}} <span> % </span> </p>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <h3> عربي </h3>
                        </div>
                        <div class="percentDiv">
                            <!-- circle percent -->
                            <div class="percent p100 ">
                                @if($cv->english_degree=="weak")
                                    <?php $degree_english=0; ?>
                                @elseif($cv->english_degree=="average")
                                        <?php $degree_english=25; ?>

                                @elseif($cv->english_degree=="good")
                                        <?php $degree_english=50; ?>

                                @elseif($cv->english_degree=="very good")
                                        <?php $degree_english=70; ?>

                                @elseif($cv->english_degree=="excellent")
                                        <?php $degree_english=100; ?>
                                @else
                                        <?php $degree_english=25; ?>
                                @endif
                                <p class="percentNum"> {{$degree_english}} <span> % </span> </p>
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
                    <img src="{{asset('frontend')}}/img/logoH.svg" alt="">
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 p-2">
                <div class="bottomInfo">
                    <!--info Div  -->
                    <div class="infoDiv">
                        <div class="title">
                            <h4> البيانات الشخصية </h4>
                        </div>
                        <div class="innerInfo">
                            <div class="row">
                                <div class="col-md-3 p-2 infoRow">
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الجنسية </h6>
                                        <h3 class="innerData"> {{$cv->nationalitie->title}} </h3>
                                    </div>

                                    <div class="data">
                                        <h6 class=" innerTitle"> الديانة </h6>
                                        <h3 class="innerData"> {{$cv->religion->title}}  </h3>
                                    </div>

                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الحالة الاجتماعية </h6>
                                        <h3 class="innerData">  {{$cv->social_type->title}}  </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> التعليم </h6>
                                        <h3 class="innerData"> اعدادي </h3>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 infoRow">
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> العمر </h6>
                                        <h3 class="innerData"> {{$cv->age}} </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> عدد الاطفال </h6>
                                        <h3 class="innerData"> {{$cv->childern_number}} </h3>
                                    </div>

                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الطول </h6>
                                        <h3 class="innerData"> {{$cv->height}} </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الوزن </h6>
                                        <h3 class="innerData"> {{$cv->weight}} </h3>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 infoRow">
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> تاريخ الميلاد </h6>
                                        <h3 class="innerData"> 10 / 10 / 2022 </h3>
                                    </div>


                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> مكان الميلاد </h6>
                                        <h3 class="innerData"> {{$cv->living_location}} </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> رقم التواصل </h6>
                                        <h3 class="innerData"> 0564553535 </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> اللغة الام </h6>
                                        <h3 class="innerData">  {{$cv->language_title->title}} </h3>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 infoRow">
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> سعر الاستقدام </h6>
                                        <h3 class="innerData"> 9200  شامل الضريبة  </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الراتب </h6>
                                        <h3 class="innerData">  {{$cv->salary.' دولار '}} </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> الخبرة السابقة </h6>
                                        <h3 class="innerData">{{($cv->type_of_experience == 'new')?"قادم جديد":"لديه خبرة سابقة"}} </h3>
                                    </div>
                                    <!-- data -->
                                    <div class="data">
                                        <h6 class=" innerTitle"> مدة الضمان </h6>
                                        <h3 class="innerData"> ٣ شهور + تامين </h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--info Div  -->
                    <div class="infoDiv">
                        <div class="title">
                            <h4>المهارات </h4>
                        </div>
                        <!-- table -->
                        <table class="table table-bordered">
@if(!empty( $cv->skills))

                            <thead>
                            <tr>
                                @foreach($cv->skills as $skill)

                                <th>{{$skill->title}} </th>
                                @endforeach

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($cv->biography_skill as $skill)
                                    @if($skill->level=="weak")
                                    <th>ضعيف</th>
                                    @elseif($skill->level=="average")
                                        <th>متوسط</th>
                                    @elseif($skill->level=="good")
                                        <th> جيد</th>
                                    @elseif($skill->level=="very good")
                                        <th>جيد جدا</th>
                                    @elseif($skill->level=="excellent")
                                        <th>ممتاز</th>
                                 @endif
                                @endforeach

                            </tr>

                            </tbody>
                            @endif
                        </table>
                    </div>
                    <!--info Div  -->
                    <div class="infoDiv">
                        <div class="title">
                            <h4> خبرة العمل </h4>
                        </div>
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> البلد </th>
                                <th> المدة </th>
                                <th> الوظيفة </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> {{$cv->experience_country}} </td>
                                <td> {{$cv->experience_year}} </td>
                                <td> {{$cv->job->title}}</td>

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
                                    <h6> تاريخ الإصدار : </h6>
                                    <h3>    {{$cv->passport_created_at}}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="passport">
                                    <h6> مكان الإصدار : </h6>
                                    <h3>    {{$cv->passport_place}}   </h3>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="passport">
                                    <h6> تاريخ الانتهاء : </h6>
                                    <h3> {{$cv->passport_ended_at}}  </h3>
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
                <h4> 0123456789 </h4>
                <i class="ri-phone-fill ms-2"></i>
            </div>
            <div class="contact">
                <h4> www.aljawhra.sa</h4>
                <i class="ri-global-fill ms-2"></i>
            </div>
        </div>
    </section>
</content>

<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((( / content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!-- ================ Footer ================= -->
<!-- <footer></footer> -->
<!-- ================ /Footer ================= -->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!-- jquery  -->
<script src="{{asset('frontend')}}/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<!-- apper  -->
<script src="{{asset('frontend')}}/js/jquery.appear.js"></script>
<!-- swiper slider -->
<script src="{{asset('frontend')}}/js/swiper-bundle.min.js"></script>
<!-- select -->
<script src="{{asset('frontend')}}/js/select2.min.js"></script>
<!-- fancybox Img viewr and zoom -->
<script src="{{asset('frontend')}}/js/jquery.fancybox.min.js"></script>
<!-- animation on scroll -->
<script src="{{asset('frontend')}}/js/aos.js"></script>
<!-- odometer counterUp  -->
<script src="{{asset('frontend')}}/js/odometer.min.js"></script>
<!-- custom -->
<script src="{{asset('frontend')}}/js/Custom.js"></script>
<!-- load header and footer -->
<script>
    $("header").load("header.html");
    $("footer").load("footer.html");
</script>
</body>

</html>
