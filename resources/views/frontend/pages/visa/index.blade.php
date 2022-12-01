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
            <h1> إصدار تأشيرة الإستقدام </h1>
            <ul>
                <li> <a href="{{route('home')}}">{{__('frontend.Home')}} </a> </li>
                <li> <a href="#!" class="active"> إصدار تأشيرة الإستقدام </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        <!-- ================ recruitmentContract Visa ================= -->
        <section class="recruitmentVisa">
            <div class="container">
                <div class="row">
                    <!-- tabs -->
                    <div class="col-md-3 col-lg-2 p-2 nav" role="tablist">
                        <!-- button -->
                        <button class="nav-link active" id="newAccount-tab" data-bs-toggle="pill" data-bs-target="#newAccount">
                            <i class="fa-solid fa-user-plus"></i>
                            <p> مستخدم جديد على موقع مساند </p>
                        </button>
                        <!-- button -->
                        <button class="nav-link" id="haveAccount-tab" data-bs-toggle="pill" data-bs-target="#haveAccount">
                            <i class="fa-solid fa-user-check"></i>
                            <p> لدي حساب بالفعل على موقع مساند</p>
                        </button>
                    </div>
                    <!-- content -->
                    <div class="col-md-9 col-lg-10 p-2 p-md-4  tab-content">
                        <!-- new account -->
                        <div class="tab-pane fade show active" id="newAccount">

                            <h4 class=" secondaryTitle"> لتقديم طلب للحصول على تأشيرة الإستقدام يرجى اتباع الخطوات التالية </h4>
                            <h6 class="thirdTitle"> زيارة موقع مساند الإلكتروني على الرابط التالي
                                <a href="https://musaned.com.sa" target="_Blank">
                                    musaned.com.sa </a>
                            </h6>
                            <!-- step -->
                            <div class="step">
                                <div class="head">
                                    <h5>تسجيل حساب جديد</h5>
                                </div>
                                <div class="info">
                                    <p>سوف يتم التحقق من رقم الهوية من خلال (أبشر) خدمات وزارة الداخلية، لذا يجب التأكد من التسجيل بخدمات
                                        أبشر مسبقاً وللمزيد من التفاصيل يمكنك زيارة خدمات أبشر موقع وزارة الداخلية</p>
                                </div>
                                <!-- single step -->
                                <div class="secondaryTitle">تعبئة نموذج تسجيل المعلومات الأساسية</div>
                                <ul>
                                    <li>رقم الهوية الوطنية للمواطنين أو الإقامة للمقيمين </li>
                                    <li>الإسم الأول و اسم العائلة </li>
                                    <li>تاريخ الميلاد (هجري) </li>
                                    <li>رقم الجوال </li>
                                    <li>المدينة</li>
                                </ul>
                                <div class="info">
                                    <p> بعد تسجيل المعلومات الأساسية ستصلك رسالة نصية على جوالك تحتوي على رمز تفعيل مساند. أدخل “رمز
                                        التفعيل” لتعبئة النموذج لتسجيل حساب في مساند </p>
                                </div>


                                <!-- single step -->
                                <div class="secondaryTitle">تعبئة نموذج تسجيل المعلومات الأساسية</div>
                                <ul>
                                    <li>تأكيد كلمة المرور: إعادة كلمة المرور المختارة </li>
                                    <li>رقم الجوال: رقم جوال مسجل في أبشر </li>
                                    <li>البريد الإلكتروني: لتفعيل حساب مساند </li>
                                </ul>
                                <div class="info">
                                    <p> كلمة المرور: اختر كلمة مرور تحتوي على حروف وأرقام ورموز </p>
                                </div>

                            </div>

                            <!-- requirement -->
                            <div class="requirement">
                                <h4 class="secondaryTitle"> قبل البدأ في اصدار التأشيرة يجب التأكد من جاهزية المتطلبات التالية : </h4>
                                <ul>
                                    <li>هل أنت مسجل في المؤسسة العامة التأمينات الإجتماعية؟ </li>
                                    <li>الحالة الوظيفية: حسب الإثبات للمقدرة المالية </li>
                                    <li>نوع إثبات المقدرة المالية: تعريف بالراتب من القطاع الخاص أو الحكومي، أوكشف حساب البنك حسب عدد
                                        التأشيرات المسموحة </li>
                                </ul>

                            </div>

                            <!-- step -->
                            <div class="step">
                                <div class="head">
                                    <h5> طريقة سداد رسوم التأشيرة عن طريق خدمة سداد
                                    </h5>
                                </div>

                                <ul>
                                    <li>الدخول الى موقع او تطبيق البنك او الصراف الالى</li>
                                    <li>"اختيار "المدفوعات </li>
                                    <li>"اختيار "المدفوعات الحكومية -سداد </li>
                                    <li>"نوع "الخدمة الإستقدام </li>
                                    <li>"الطلب "تأشيرة عمالة </li>
                                    <li>"نوع العملية" دفع </li>
                                    <li>إدخال رقم هوية صاحب العمل </li>
                                    <li>تحديد عدد التأشيرات المراده </li>
                                    <li>تسديد رسوم التأشيرة </li>
                                </ul>
                                <div class="info">
                                    <p> إصدار الفاتورة لرسوم التأشيرة عن طريق (سداد) ودفع المبلغ خلال يوم واحد ليتم إرسال الطلب </p>
                                </div>

                            </div>
                            <!-- step -->
                            <div class="step">
                                <div class="head">
                                    <h5> طلب إصدار التأشيرة </h5>
                                </div>
                                <!-- single step -->
                                <div class="secondaryTitle"> تعبئة بيانات التأشيرة </div>
                                <ul>
                                    <li>المهنة: قم بإختيار المهنة للعمالة المنزلية </li>
                                    <li>الجنسية: قم بإختيار الجنسية للعمالة المنزلية </li>
                                    <li>جهة القدوم: قم بإختيار جهة القدوم حسب الدولة </li>
                                </ul>
                                <!-- single step -->
                                <div class="secondaryTitle"> إثبات المقدرة المالية </div>
                                <ul>
                                    <li>تعريف الراتب: قم بإدخال القيمة للراتب الشهري من القطاع الخاص أو الحكومي </li>
                                    <li>شهادة بنكية: قم بإدخال القيمة لمتوسط الحساب الشهري من الشهادة البنكية </li>
                                </ul>
                                <!-- single step -->
                                <div class="secondaryTitle"> رفع الوثائق والمرفقات </div>
                                <ul>
                                    <li>إثبات المقدرة المالية </li>
                                    <li>صورة سجل الأسرة أو الهوية الوطنية </li>
                                </ul>
                                <div class="info">
                                    <p> الموافقة على التعهد والإقرار على سياسة الخصوصية والشروط والأحكام </p>
                                </div>

                            </div>

                            <h4 class="secondaryTitle">
                                في حال تم الإرسال سيتم ابلاغك بحالة الطلب خلال يوم عمل واحد عبر رقم الجوال والبريد الإلكتروني
                            </h4>

                        </div>
                        <!-- have account -->
                        <div class="tab-pane fade" id="haveAccount">


                            <h4 class=" secondaryTitle"> لتقديم طلب للحصول على تأشيرة الإستقدام يرجى اتباع الخطوات التالية </h4>
                            <h6 class="thirdTitle"> زيارة موقع مساند الإلكتروني على الرابط التالي
                                <a href="https://musaned.com.sa" target="_Blank">
                                    musaned.com.sa </a>
                            </h6>

                            <!-- requirement -->
                            <div class="requirement">
                                <h4 class="secondaryTitle"> قبل البدأ في اصدار التأشيرة يجب التأكد من جاهزية المتطلبات التالية : </h4>
                                <ul>
                                    <li>هل أنت مسجل في المؤسسة العامة التأمينات الإجتماعية؟ </li>
                                    <li>الحالة الوظيفية: حسب الإثبات للمقدرة المالية </li>
                                    <li>نوع إثبات المقدرة المالية: تعريف بالراتب من القطاع الخاص أو الحكومي، أوكشف حساب البنك حسب عدد
                                        التأشيرات المسموحة </li>
                                </ul>

                            </div>

                            <!-- step -->
                            <div class="step">
                                <div class="head">
                                    <h5> طريقة سداد رسوم التأشيرة عن طريق خدمة سداد
                                    </h5>
                                </div>

                                <ul>
                                    <li>الدخول الى موقع او تطبيق البنك او الصراف الالى</li>
                                    <li>"اختيار "المدفوعات </li>
                                    <li>"اختيار "المدفوعات الحكومية -سداد </li>
                                    <li>"نوع "الخدمة الإستقدام </li>
                                    <li>"الطلب "تأشيرة عمالة </li>
                                    <li>"نوع العملية" دفع </li>
                                    <li>إدخال رقم هوية صاحب العمل </li>
                                    <li>تحديد عدد التأشيرات المراده </li>
                                    <li>تسديد رسوم التأشيرة </li>
                                </ul>
                                <div class="info">
                                    <p> إصدار الفاتورة لرسوم التأشيرة عن طريق (سداد) ودفع المبلغ خلال يوم واحد ليتم إرسال الطلب </p>
                                </div>

                            </div>
                            <!-- step -->
                            <div class="step">
                                <div class="head">
                                    <h5> طلب إصدار التأشيرة </h5>
                                </div>
                                <!-- single step -->
                                <div class="secondaryTitle"> تعبئة بيانات التأشيرة </div>
                                <ul>
                                    <li>المهنة: قم بإختيار المهنة للعمالة المنزلية </li>
                                    <li>الجنسية: قم بإختيار الجنسية للعمالة المنزلية </li>
                                    <li>جهة القدوم: قم بإختيار جهة القدوم حسب الدولة </li>
                                </ul>
                                <!-- single step -->
                                <div class="secondaryTitle"> إثبات المقدرة المالية </div>
                                <ul>
                                    <li>تعريف الراتب: قم بإدخال القيمة للراتب الشهري من القطاع الخاص أو الحكومي </li>
                                    <li>شهادة بنكية: قم بإدخال القيمة لمتوسط الحساب الشهري من الشهادة البنكية </li>
                                </ul>
                                <!-- single step -->
                                <div class="secondaryTitle"> رفع الوثائق والمرفقات </div>
                                <ul>
                                    <li>إثبات المقدرة المالية </li>
                                    <li>صورة سجل الأسرة أو الهوية الوطنية </li>
                                </ul>
                                <div class="info">
                                    <p> الموافقة على التعهد والإقرار على سياسة الخصوصية والشروط والأحكام </p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ /recruitmentContract Visa ================= -->


        <!-- ================ references ================= -->
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


    </content>




@endsection
