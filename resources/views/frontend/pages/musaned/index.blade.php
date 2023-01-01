@extends('frontend.layouts.layout')

@section('title')
{{__('frontend.Musaned')}}
@endsection

@section('styles')
<style>
</style>
@endsection


@section('content')

<section class="musaned">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="SectionTitle">
                    <img class="musanedLogo" data-aos="fade-up" src="{{asset('frontend')}}/img/musaned.svg" alt="">
                    <h6 class="hint" data-aos="fade-up">منصة مساند أحد مبادرات وزارة الموارد البشرية والتنمية
                        الاجتماعية، وهي
                        منصة
                        الكترونية شاملة لتجربة
                        استقدام العمالة المنزلية بشكل متكامل، تهدف إلى تسهيل إجراءات استقدام العمالة المنزلية وزيادة
                        مستوى حفظ
                        حقوق جميع الاطراف عن طريق تعريف أصحاب العمل والعمالة المنزلية بحقوقهم وواجباتهم. </h6>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="videoSection">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-2">
                <div class="SectionTitle justify-content-md-start text-md-start ">
                    <h1 class="title" data-aos="fade-up"> منصة مساند </h1>
                    <h6 class="hint" data-aos="fade-up">
                        يعمل برنامج مساند من خلال نوافذ تعريفية وخدمات الكترونية كإصدار تأشيرات الإستقدام
                        الإلكترونية ونماذج
                        أخرى على تقديم خدمات الإستقدام للمواطنين والمقيمين الراغبين باستقدام عمالة منزلية وذلك من
                        خلال توفير
                        بيئة عمل مثالية لتحسين قطاع الاستقدام في المملكة وخارجها وتطوير خدمة استقدام العمالة
                        المنزلية للأسر
                        السعودية لحل شكاوى ونزاعات الاستقدام في السعودية وحماية الحقوق لجميع الأطراف المعنية
                        بالاستقدام ولتعريف
                        المواطنين السعوديين بحقوقهم والواجبات تجاههم.
                    </h6>
                </div>
                <div class="feature">
                    <div class="content" data-aos="fade-up">
                        <i class="fa-solid fa-badge-check me-3"></i>
                        <div class="info">
                            <h3>التوثيق الالكتروني </h3>
                            <p>
                                بكل سهولة يمكنك التعاقد مع أكثر من 1400 مكتب استقدام في جميع أنحاء المملكة
                            </p>
                        </div>
                    </div>
                    <div class="content" data-aos="fade-up">
                        <i class="fa-solid fa-buildings me-3"></i>
                        <div class="info">
                            <h3>إدارة المكاتب </h3>
                            <p>
                                بكل سهولة يمكنك التعاقد مع أكثر من 1400 مكتب استقدام في جميع أنحاء المملكة
                            </p>
                        </div>
                    </div>
                    <div class="content" data-aos="fade-up">
                        <i class="fa-solid fa-users me-3"></i>
                        <div class="info">
                            <h3> خدمات التأجير </h3>
                            <p>
                                بكل سهولة يمكنك التعاقد مع أكثر من 1400 مكتب استقدام في جميع أنحاء المملكة
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="video">
                    <a class="videoPopup" href="https://www.youtube.com/embed/wlLjqeDDi2Y" data-fancybox>
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="musanedTrip">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="SectionTitle">
                    <h1 class="title" data-aos="fade-up"> رحلة مساند </h1>
                    <h6 class="hint" data-aos="fade-up">
                        مساند ، برنامج العمالة المنزلية، يسمح لأصحاب العمل بإرسال تفضيلات الاستقدام الخاصة بالعمر
                        والدين وخبرة
                        العمل
                        السابقة إلى وكالة الاستقدام التي يختارونها. رداً على ذلك ، تزود مكاتب الاستقدام والوكالات
                        العملاء بما
                        يصل
                        إلى خمس سير ذاتية لعاملات المنازل للاختيار من بينها. وبمجرد اتخاذ القرار، يمكن لصاحب العمل
                        المضي قدمًا
                        في
                        دفع رسوم الاستخدام وتوقيع عقد إلكتروني مع مكتب الاستقدام. يختلف هذا العقد الإلكتروني عن
                        العقد المبرم بين
                        صاحب العمل وعامل الخدمة المنزلية، والذي غالبًا ما يتم توقيعه في بلد المنشأ بين الوكالة
                        السعودية (نيابة
                        عن
                        صاحب العمل) وعامل الخدمة المنزلية قبل وصولها إلى المملكة.
                    </h6>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class=" col">
                <div class="trip" data-aos="fade-up">
                    <img src="{{asset('frontend')}}/img/data.svg" alt="">
                    <h4> استقدام حسب المواصفات </h4>
                </div>
            </div>
            <div class=" col">
                <div class="trip" data-aos="fade-up">
                    <img src="{{asset('frontend')}}/img/job.svg" alt="">
                    <h4> استقدام حسب المهنة </h4>
                </div>
            </div>
            <div class=" col">
                <div class="trip" data-aos="fade-up">
                    <img src="{{asset('frontend')}}/img/national.svg" alt="">
                    <h4> استقدام حسب الجنسية </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="musanedRecruitment">
    <div class="container">
        <div class="SectionTitle">
            <h1 class="title" data-aos="fade-up"> خطوات </h1>
            <h6 class="hint" data-aos="fade-up"> الاستقدام مع مساند </h6>
        </div>
        <div class="row flex-wrap">
            <div class="col p-2">
                <div class="specifications " data-aos="fade-up">
                    <i class="fa-solid fa-hand-pointer"></i>
                    <h5>تحديد نوع الاستقدام </h5>
                    <p>اختيار نوع الاستقدام حسب التفضيل، إما استقدام عامل بمواصفات محددة أو استقدام عامل محدد مسبقاً
                        بالاسم
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="specifications " data-aos="fade-up">
                    <i class="fa-solid fa-buildings"></i>
                    <h5>اختيار مقدم الخدمه </h5>
                    <p>الاختيار من ضمن +1400 مقدم خدمة من جميع أنحاء المملكة، يمكنك الاختيار بناء على تقييم المكتب،
                        نسبة
                        قبول طلبات الاستقدام، مدينة الوصول
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="specifications " data-aos="fade-up">
                    <i class="fa-solid fa-file-pen"></i>
                    <h5>استلام عروض الاستقدام </h5>
                    <p>استلام عروض طلبات الاستقدام من مقدمي الخدمة، تتضمن الراتب المستحق للعامل مع سير ذاتية ليتم
                        ترتيبها
                        حسب الأفضلية
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="specifications " data-aos="fade-up">
                    <i class="fa-solid fa-credit-card"></i>
                    <h5>دفع رسوم الاستقدام </h5>
                    <p>
                        ادفع بأمان من خلال مساند بعد إنشاء العقد، يمكنك الاختيار ضمن عدة طرق للدفع: فيزا ، ماستركارد
                        ، أو من
                        خلال بطاقة مدى البنكية
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="specifications " data-aos="fade-up">
                    <i class="fa-solid fa-location-crosshairs"></i>
                    <h5>تتبع طلب الاستقدام </h5>
                    <p>يمكنك متابعة رحلة طلب الاستقدام بكل سهولة ويسر من خلال حسابك في منصة مساند، تبدأ من إنشاء
                        الطلب وحتى
                        وصول العامل للمملكة
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="musanedFees">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 p-2">
                <div class="SectionTitle">
                    <h1 class="title" data-aos="fade-up"> رسوم </h1>
                    <h6 class="hint" data-aos="fade-up"> الاستقدام مع مساند </h6>
                </div>
                <p data-aos="fade-up">
                    سداد رسوم تاشيره العمالة المنزلية الخاصة بك عبر الخدمات الحكوميه في البنك او عن طريق قنوات الدفع
                    عبر
                    الإنترنت حيث يوفر مساند عدة طرق دفع آمنة ، يمكن للمستخدم اختيار ما هو مناسب من بين مدى أو فيزا
                    أو
                    ماستركارد
                </p>
                <div class="images">
                    <img src="{{asset('frontend')}}/img/mc.webp" data-aos="fade-up">
                    <img src="{{asset('frontend')}}/img/visa.webp" data-aos="fade-up">
                    <img src="{{asset('frontend')}}/img/mada.webp" data-aos="fade-up">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="musanedApp">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6 p-2">
                <div class="info">
                    <img src="{{asset('frontend')}}/img/musaned.svg" alt="" data-aos="fade-up">
                    <h4>تطبيق مساند للجوال لكلى النظامين الاندرويد والايفون </h4>
                    <p>تطبيق مساند للهاتف المحمول هو تطبيق مدعوم من وزارة العمل في المملكة العربية السعودية لخدمة
                        العمالة
                        المنزلية حيث يمكنك من خلاله طلب تأشيرة توظيف أو تتبع حالة التأشيرات التي تم طلبها مسبقًا
                        بسهولة ، كما
                        يمكنك استخدام آلية توثيق العامل.
                    </p>
                    <div class="links">
                        <a href="#!" target="_blank" data-aos="fade-up">
                            <img src="{{asset('frontend')}}/img/google-play-android.webp" alt="">
                        </a>
                        <a href="#!" target="_blank" data-aos="fade-up">
                            <img src="{{asset('frontend')}}/img/apple-iphone-ios.webp" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0 d-md-block">
                <div class="appImg">
                    <img src="{{asset('frontend')}}/img/app.webp" alt="" data-aos="fade-up">
                </div>
            </div>
        </div>
    </div>
</section>





@endsection