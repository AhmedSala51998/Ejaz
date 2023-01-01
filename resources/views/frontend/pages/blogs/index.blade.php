@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.visa')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')
    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> المقالات </h1>
            <ul>
                <li> <a href="index.html">الرئيسية </a> </li>
                <li> <a href="#!" class="active"> المقالات </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        <!-- blogs Page  -->
        <section class="blogsPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s2.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s3.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s1.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s2.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s3.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3">
                        <div class="blog ">
                            <div class="blog-image">
                                <a href="blog_details.html"><img src="{{asset('frontend')}}/img/s1.webp"></a>
                            </div>
                            <span class="date"> <i class="fas fa-calendar-alt me-2"></i> 20 / 10 / 2021 </span>
                            <div class="blog-content">
                                <a href="blog_details.html"> تم توفير خدمة جديدة </a>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                                    الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها
                                    تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- pagination -->
                <ul class="pagination " data-aos=" fade-up">
                    <li class="page-item"><a class="page-link" href="#!">السابق</a></li>
                    <li class="page-item active"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">التالي</a></li>
                </ul>

            </div>
        </section>




    </content>

@endsection
