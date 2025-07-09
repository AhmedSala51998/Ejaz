@extends('frontend.layouts.layout')

@section('title')
    ارسال طلب
@endsection

@section('styles')
    <style>
        /*body {
            background-color: #f9f9f9;
        }

        .banner {
            background: linear-gradient(to left, #f4a835, #f9f9f9);
            padding: 50px 20px;
            border-radius: 0 0 25px 25px;
            text-align: center;
            color: #3d3d3d;
        }

        .banner h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .banner ul {
            padding: 0;
            margin: 10px 0 0;
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .banner ul li a {
            color: #3d3d3d;
            font-weight: 500;
            text-decoration: none;
        }*/

        body {
            background-color: #fff;
            font-family: 'Tajawal', sans-serif;
        }

        .banner {
            background: linear-gradient(135deg, #f4a835, #fff1db);
            padding: 60px 20px;
            text-align: center;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            color: #333;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: bold;
            z-index: 1;
            position: relative;
        }

        .banner ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            z-index: 1;
            position: relative;
        }

        .banner ul li a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .banner ul li a.active,
        .banner ul li a:hover {
            color: #fff;
            background: #f4a835;
            padding: 6px 14px;
            border-radius: 12px;
        }

        .workers-section {
            padding: 30px 0;
        }

        .side-bar {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 20px;
        }

        .accordionButton {
            background-color: #f4f4f4;
            border: none;
            padding: 12px 15px;
            font-weight: bold;
            border-radius: 10px;
            margin-bottom: 10px;
            width: 100%;
            text-align: right;
        }

        .form-check-input:checked {
            background-color: #f4a835;
            border-color: #f4a835;
        }

        .btn.confirm {
            background-color: #f4a835;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
        }

        .btn.clear {
            background-color: #3d3d3d;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
        }

        .workers-list .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            overflow: hidden;
            background-color: #fff;
            transition: all 0.4s ease-in-out;
        }

        .workers-list .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }

        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
        }

        .card-body h5 {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .card-body .cv-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 0.95rem;
            color: #555;
        }

        .card-body .cv-info span {
            display: flex;
            justify-content: space-between;
        }

        .card-body .btn-view {
            margin-top: 15px;
            display: inline-block;
            background: #3d3d3d;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s;
        }

        .card-body .btn-view:hover {
            background: #f4a835;
        }

        .card-body .rating {
            color: #ffc107;
            font-size: 1.1rem;
        }

        .card-body .experience-icon {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #666;
            font-weight: 500;
        }
        .custom-pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding: 25px 0;
            flex-wrap: wrap;
        }

        .custom-pagination .page-item {
            transition: transform 0.2s ease;
        }

        .custom-pagination .page-item:hover {
            transform: translateY(-2px);
        }

        .custom-pagination .page-link {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #f4a835;
            color: #f4a835;
            border-radius: 12px;
            padding: 10px 16px;
            font-weight: 600;
            font-size: 16px;
            /*box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);*/
            box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
            transition: all 0.3s ease;
        }

        .custom-pagination .page-link:hover {
            background: #f4a835;
            color: white;
            border-color: #f4a835;
        }

        .custom-pagination .active_ejaz .page-link {
            background-color: #f4a835 !important;
            color: white;
            border-color: #f4a835;
            pointer-events: none;
            box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
        }
        .custom-pagination .page-item.active_ejaz .page-link {
            box-shadow: none !important;
            filter: none !important;
            text-shadow: none !important;
            outline: none !important;
            border-bottom: none !important;
            border-image: none !important;
            border-style: solid !important;
            border-width: 1px !important;
        }
        .page-link {
            box-shadow: none !important;
        }

        .page-item.active .page-link::after,
        .page-item.active .page-link::before {
            display: none !important;
            box-shadow: none !important;
        }
        .custom-pagination .page-item.active_ejaz .page-link {
            background-color: #f4a835 !important;
            color: white !important;
            border: 1px solid #f4a835 !important;
            border-radius: 12px !important;
            box-shadow: none !important;
            filter: none !important;
            outline: none !important;
            border-bottom: none !important;
        }

        .custom-pagination .page-item.active_ejaz .page-link::before,
        .custom-pagination .page-item.active_ejaz .page-link::after {
            display: none !important;
            content: none !important;
            box-shadow: none !important;
        }

        .custom-pagination .page-item.actiactive_ejazve .page-link,
        .custom-pagination .page-link:focus {
            background-color: #f4a835 !important;
            color: white !important;
            border: 1px solid #f4a835 !important;
            border-radius: 12px !important;

            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;

            outline: none !important;
            filter: none !important;
            text-shadow: none !important;
        }
        .custom-pagination .page-item.active_ejaz .page-link,
        .custom-pagination .page-item.active_ejaz .page-link:focus,
        .custom-pagination .page-item.active_ejaz .page-link:active,
        .custom-pagination .page-link:focus,
        .custom-pagination .page-link:active {
            background-color: #f4a835 !important;
            color: white !important;
            border: 1px solid #f4a835 !important;
            border-radius: 12px !important;

            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            text-shadow: none !important;
            outline: none !important;
            filter: none !important;
        }

        .custom-pagination .page-item.active_ejaz span.page-link {
            background-color: #f4a835 !important;
            color: white !important;
            border: 1px solid #f4a835 !important;
            border-radius: 12px !important;

            box-shadow: none !important;
            outline: none !important;
        }

        .custom-pagination .page-item.active_ejaz .page-link {
            box-shadow: none !important;
            outline: none !important;
            background-clip: padding-box !important;
            background-origin: border-box !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
        }

        .custom-pagination .page-item.active_ejaz .page-link:focus-visible,
        .custom-pagination .page-item.active_ejaz .page-link:focus-within {
            outline: none !important;
            box-shadow: none !important;
        }

        .custom-pagination .page-item.active_ejaz .page-link {
            border-radius: 12px !important;
            background-color: #f4a835 !important;
            border: 1px solid #f4a835 !important;
            color: white !important;
            box-shadow: none !important;
            
        }

        
        /*.side-bar {
            max-height: 80vh;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #f4a835 #f1f1f1;
        }

        .side-bar::-webkit-scrollbar {
            width: 6px;
        }

        .side-bar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .side-bar::-webkit-scrollbar-thumb {
            background-color: #f4a835;
            border-radius: 10px;
        }

        .side-bar::-webkit-scrollbar-thumb:hover {
            background-color: #e49b20;
        }*/

                /* ✅ فلتر متحرك للموبايل */
        .mobile-filter-sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 320px;
            height: 100vh;
            background: #fff;
            z-index: 9999;
            padding: 20px;
            box-shadow: -4px 0 20px rgba(0,0,0,0.15);
            transition: right 0.4s ease;
            overflow-y: auto;
            border-radius: 12px 0 0 12px;
        }
        .mobile-filter-sidebar.active {
            right: 0;
        }
        .mobile-filter-overlay {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 9998;
            display: none;
        }
        .mobile-filter-overlay.active {
            display: block;
        }

        .accordionButton {
            background-color: #f4a835 !important;
            color: #fff;
            border: none;
            padding: 12px 15px;
            font-weight: bold;
            border-radius: 12px;
            margin-bottom: 10px;
            width: 100%;
            text-align: right;
            transition: 0.3s ease;
            box-shadow: 0 6px 12px rgba(244, 168, 53, 0.2);
        }
        .accordionButton:hover {
            background-color: #e49b20 !important;
        }

        /* ✅ ستايل الفلتر الجانبي على الموبايل */
        .mobile-filter-sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 360px;
            height: 100%;
            background: #fff;
            z-index: 9999;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 16px 0 0 16px;
            transition: right 0.4s ease-in-out;
            overflow-y: auto;
        }
        .mobile-filter-sidebar.active {
            right: 0;
        }
        .mobile-filter-header {
            border-bottom: 1px solid #eee;
        }

        .close-filter-btn {
            width: 36px;
            height: 36px;
            background-color: #f4a835;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .close-filter-btn i {
            font-size: 18px;
            color: #fff;
            transition: 0.2s ease;
        }
        .close-filter-btn:hover {
            background-color: #e49b20;
            transform: rotate(90deg);
        }

        .mobile-filter-header h5 {
            font-size: 20px;
            color: #333;
            font-weight: bold;
            margin: 0;
        }

        /* تصميم احترافي للراديو بوتنز */
        .form-check-input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            background-color: #fff;
            margin-top: 0.3em;
            font: inherit;
            color: #f4a835;
            width: 20px;
            height: 20px;
            border: 2px solid #f4a835;
            border-radius: 50%;
            display: grid;
            place-content: center;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            position: relative;
            cursor: pointer;
        }

        .form-check-input[type="radio"]::before {
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            transform: scale(0);
            transition: transform 0.2s ease-in-out;
            background-color: #f4a835;
        }

        .form-check-input[type="radio"]:checked::before {
            transform: scale(1);
        }

        .form-check-input[type="radio"]:hover {
            box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
        }

        /* تحسين النص بجوار الراديو */
        .form-check-label {
            margin-right: 8px;
            font-weight: 500;
            color: #333;
            cursor: pointer;
        }

        /* دعم للموبايل (بدون تغيير هيكل) */
        @media (max-width: 767.98px) {
            .form-check {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .form-check-input[type="radio"] {
                width: 18px;
                height: 18px;
            }
            .form-check-label {
                font-size: 15px;
            }
        }

        .accordionButton .toggle-icon {
            font-weight: bold;
            font-size: 20px;
            transition: transform 0.3s ease;
        }
        .accordionButton {
            background-color: #f4a835;
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

    </style>

@endsection

@section('content')
<div class="banner">
    <h1>
        @if(isset($transfer)) طلب نقل خدمات
        @elseif(isset($rental)) تأجير
        @else طلب استقدام
        @endif
    </h1>
    <ul>
        <li><a href="{{route('home')}}">الرئيسية</a></li>
        <li><a href="#" class="active">@if(isset($transfer)) نقل خدمات @elseif(isset($rental)) تأجير @else استقدام @endif</a></li>
    </ul>
</div>

 <div id="mobileFilterSidebar" class="mobile-filter-sidebar d-lg-none">
    <div class="mobile-filter-header d-flex justify-content-between align-items-center mb-3 px-3 pt-3">
        <h5 class="fw-bold">فلترة متقدمة</h5>
        <button class="close-filter-btn" id="closeFilterBtn">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="side-bar px-3 pb-4">
        
        <form id="filterForm" action="{{ request()->routeIs('transferService') ? route('transferService') : (request()->routeIs('rental') ? route('rental') : route('all-workers')) }}" method="get">
            @csrf

            <!-- فلاتر الدولة -->
            @if(count($nationalities) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#nationalityFilter">
                        
                        <span>{{__('frontend.Nationality')}}</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="nationalityFilter" class="collapse show">
                        @foreach($nationalities as $key=> $nationalitie)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nationality" id="nationality1{{$key+1}}" value="{{$nationalitie->id}}">
                                <label class="form-check-label" for="nationality1{{$key+1}}">{{trans($nationalitie->title)}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- فلاتر الوظائف -->
            @if(count($jobs) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#jobFilter">
                        <span>{{__('frontend.Job')}}</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="jobFilter" class="collapse show">
                        @foreach($jobs as $key=> $job)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="job" id="job1{{$key+1}}" value="{{$job->id}}">
                                <label class="form-check-label" for="job1{{$key+1}}">{{trans($job->title)}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- فلاتر العمر -->
            @if(count($ages) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#ageFilter">
                         <span>العمر</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="ageFilter" class="collapse show">
                        @foreach($ages as $key=>$age)
                            <div class="form-check">
                                <input class="form-check-input" value="{{$age->id}}" type="radio" name="age" id="age1{{$key+1}}">
                                <label class="form-check-label" for="age1{{$key+1}}"> من {{$age->from}} إلى {{$age->to}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- فلاتر الديانة -->
            @if(count($religions) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#religionFilter">
                         <span>الديانة</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="religionFilter" class="collapse show">
                        @foreach($religions as $key => $religion)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="religion" id="religion1{{$key+1}}" value="{{ $religion->id }}">
                                <label class="form-check-label" for="religion1{{$key+1}}">{{ trans($religion->title) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- فلاتر الحالة الاجتماعية -->
            @if(count($social_types) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#socialFilter">
                         <span>الحالة الاجتماعية</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="socialFilter" class="collapse show">
                        @foreach($social_types as $key => $social)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social" id="social1{{$key+1}}" value="{{ $social->id }}">
                                <label class="form-check-label" for="social1{{$key+1}}">{{ trans($social->title) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- فلتر الخبرة العملية (يظهر فقط في حالة الاستقدام) -->
            @if(!isset($transfer) && !isset($rental))
            <div class="mb-4">
                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#experienceFilter">
                     <span>الخبرة العملية</span>
                        <span class="toggle-icon ms-auto">−</span>
                </button>
                <div id="experienceFilter" class="collapse show">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_of_experience" id="exp11" value="new">
                        <label class="form-check-label" for="exp11">قادم جديد</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_of_experience" id="exp21" value="with_experience">
                        <label class="form-check-label" for="exp21">لديه خبرة سابقة</label>
                    </div>
                </div>
            </div>
            @endif

            <!-- أزرار -->
            <div class="d-flex justify-content-between">
                <button class="btn clear resetFilterBtn" type="button" style="display:none;">
                    مسح
                </button>
                <button class="btn confirm searchWorkerBtn" type="submit">
                    تأكيد
                </button>
            </div>
        </form>

    </div>
</div>

<section class="workers-section">
    <div class="container-fluid">
        <!-- زر فتح الفلتر على الموبايل -->
       <!-- ✅ زر فتح الفلتر على الموبايل - كامل العرض وخلفية برتقالية -->
        <div class="d-block d-lg-none px-3 mb-3">
            <button class="btn w-100 text-white fw-bold py-3" id="openFilterBtn"
                style="border-radius: 20px; background-color: #f4a835; font-size: 16px; box-shadow: 0 8px 18px rgba(244, 168, 53, 0.4);">
                <i class="fa fa-sliders-h me-2"></i> فلترة النتائج
            </button>
        </div>
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="side-bar">
                    <h4 style="margin-bottom:10px;border-bottom:1px solid #f4a835">{{__('frontend.advanced search')}}</h4>
                    <form id="filterForm" action="{{ request()->routeIs('transferService') ? route('transferService') : (request()->routeIs('rental') ? route('rental') : route('all-workers')) }}" method="get">
                        @csrf

                        <!-- فلاتر الدولة -->
                        @if(count($nationalities) > 0)
                            <div class="mb-4">
                                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#nationalityFilter">
                                    
                                     <span>{{__('frontend.Nationality')}}</span>
                                     <span class="toggle-icon ms-auto">−</span>
                                </button>
                                <div id="nationalityFilter" class="collapse show">
                                    @foreach($nationalities as $key=> $nationalitie)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nationality" id="nationality{{$key+1}}" value="{{$nationalitie->id}}">
                                            <label class="form-check-label" for="nationality{{$key+1}}">{{trans($nationalitie->title)}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- فلاتر الوظائف -->
                        @if(count($jobs) > 0)
                            <div class="mb-4">
                                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#jobFilter">
                                    
                                <span>{{__('frontend.Job')}}</span>
                                <span class="toggle-icon ms-auto">−</span>
                                </button>
                                <div id="jobFilter" class="collapse show">
                                    @foreach($jobs as $key=> $job)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job" id="job{{$key+1}}" value="{{$job->id}}">
                                            <label class="form-check-label" for="job{{$key+1}}">{{trans($job->title)}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- فلاتر العمر -->
                        @if(count($ages) > 0)
                            <div class="mb-4">
                                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#ageFilter">
                                     <span>العمر</span>
                        <span class="toggle-icon ms-auto">−</span>
                                </button>
                                <div id="ageFilter" class="collapse show">
                                    @foreach($ages as $key=>$age)
                                        <div class="form-check">
                                            <input class="form-check-input" value="{{$age->id}}" type="radio" name="age" id="age{{$key+1}}">
                                            <label class="form-check-label" for="age{{$key+1}}"> من {{$age->from}} إلى {{$age->to}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- فلاتر الديانة -->
                        @if(count($religions) > 0)
                            <div class="mb-4">
                                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#religionFilter">
                                     <span>الديانة</span>
                        <span class="toggle-icon ms-auto">−</span>
                                </button>
                                <div id="religionFilter" class="collapse show">
                                    @foreach($religions as $key => $religion)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="religion" id="religion{{$key+1}}" value="{{ $religion->id }}">
                                            <label class="form-check-label" for="religion{{$key+1}}">{{ trans($religion->title) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- فلاتر الحالة الاجتماعية -->
                        @if(count($social_types) > 0)
                            <div class="mb-4">
                                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#socialFilter">
                                     <span>الحالة الاجتماعية</span>
                        <span class="toggle-icon ms-auto">−</span>
                                </button>
                                <div id="socialFilter" class="collapse show">
                                    @foreach($social_types as $key => $social)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="social" id="social{{$key+1}}" value="{{ $social->id }}">
                                            <label class="form-check-label" for="social{{$key+1}}">{{ trans($social->title) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- فلتر الخبرة العملية (يظهر فقط في حالة الاستقدام) -->
                        @if(!isset($transfer) && !isset($rental))
                        <div class="mb-4">
                            <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#experienceFilter">
                                 <span>الخبرة العملية</span>
                        <span class="toggle-icon ms-auto">−</span>
                            </button>
                            <div id="experienceFilter" class="collapse show">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_experience" id="exp1" value="new">
                                    <label class="form-check-label" for="exp1">قادم جديد</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_experience" id="exp2" value="with_experience">
                                    <label class="form-check-label" for="exp2">لديه خبرة سابقة</label>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- أزرار -->
                        <div class="d-flex justify-content-between">
                            <button class="btn clear resetFilterBtn" type="button" style="display:none;">
                                مسح
                            </button>
                            <button class="btn confirm searchWorkerBtn" type="submit">
                                تأكيد
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- قائمة العمالة -->
            <div class="col-lg-9 col-md-12">
                <div class="row workers-list" id="hereWillDisplayAllWorker">
                    @include('frontend.pages.all-workers.worker.workers_page', ['cvs' => $cvs])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')

<script>
    var loader_html = `
        <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html">
            <div class="wrapper">
                <div class="wrapper-cell row">
                    <div class="col-12"><div class="image"></div></div>
                    <div class="col-12">
                        <div class="text">
                            <div class="text-line"></div>
                            <div class="text-line price"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `.repeat(6);

    var new_page = 1;

    @php
        $ajaxUrl = route('all-workers');
        if (request()->routeIs('transferService')) {
            $ajaxUrl = route('transferService');
        } elseif (request()->routeIs('rental')) {
            $ajaxUrl = route('rental');
        }
    @endphp

    var link_only = '{{ $ajaxUrl }}';

    function getFilters() {
        return {
            age: $('input[name="age"]:checked').val() || '',
            job: $('input[name="job"]:checked').val() || '',
            nationality: $('input[name="nationality"]:checked').val() || '',
            religion: $('input[name="religion"]:checked').val() || '',
            social: $('input[name="social"]:checked').val() || '',
            type_of_experience: $('input[name="type_of_experience"]:checked').val() || ''
        };
    }

    function buildUrl(page) {
        const filters = getFilters();
        return link_only + "?page=" + page +
            "&age=" + filters.age +
            "&job=" + filters.job +
            "&nationality=" + filters.nationality +
            "&religion=" + filters.religion +
            "&social=" + filters.social +
            "&type_of_experience=" + filters.type_of_experience;
    }

    function loadWorkers(page = 1) {
        $.ajax({
            url: buildUrl(page),
            type: 'GET',
            beforeSend: function () {
                $("#hereWillDisplayAllWorker").html(loader_html);
                $('.searchWorkerBtn').attr('disabled', true).html(`<i class='fa fa-spinner fa-spin'></i>`);
            },
            success: function (data) {
                setTimeout(() => {
                    $("#hereWillDisplayAllWorker").html(data.html);
                    $('.searchWorkerBtn').attr('disabled', false).html(`تأكيد`);
                    if (data.last_page == data.current_page) {
                        $("#load_more_button").remove();
                    } else {
                        $("#buttonOfFilter").html(`
                            <button id="load_more_button" class="animatedLink" type="button">
                                {{ __('frontend.load more') }}
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </button>`);
                    }
                }, 500);
            },
            error: function () {
                $('.searchWorkerBtn').attr('disabled', false).html(`تأكيد`);
            }
        });
    }

    $(document).ready(function () {
        checkResetButtonVisibility();

        // عند تغيير أي فلتر
        $(document).on('change', 'input[name="age"], input[name="job"], input[name="nationality"], input[name="religion"], input[name="social"], input[name="type_of_experience"]', function () {
            checkResetButtonVisibility();
        });

        // زر التأكيد (للجميع: موبايل + ديسكتوب)
        $(document).on('click', '.searchWorkerBtn', function (e) {
            e.preventDefault();
            new_page = 1;
            loadWorkers(new_page);
        });

        // زر التحميل الإضافي
        $(document).on('click', '#load_more_button', function (e) {
            e.preventDefault();
            ++new_page;
            loadMoreData(new_page);
        });

        function loadMoreData(page) {
            $.ajax({
                url: buildUrl(page),
                type: 'GET',
                beforeSend: function () {
                    $('#hereWillDisplayAllWorker').append(loader_html);
                    $('#load_more_button').html(`<div class="spinner-border mt-1 mb-2" role="status"></div>`);
                },
                success: function (data) {
                    setTimeout(() => {
                        $(".loader_html").remove();
                        $('#hereWillDisplayAllWorker').append(data.html);
                        $('#load_more_button').html("{{ __('frontend.load more') }}");
                        if (data.last_page == data.current_page) {
                            $("#load_more_button").remove();
                        }
                    }, 300);
                },
                error: function () {
                    alert('حدث خطأ أثناء تحميل المزيد.');
                }
            });
        }

        // زر المسح (مسح الفلاتر وإعادة تحميل النتائج)
        $(document).on('click', '.resetFilterBtn', function (e) {
            e.preventDefault();
            const btn = $(this);
            btn.html(`<i class='fa fa-spinner fa-spin'></i>`);

            $('input[name="age"], input[name="job"], input[name="nationality"], input[name="religion"], input[name="social"], input[name="type_of_experience"]').prop('checked', false);

            setTimeout(() => {
                btn.html(`مسح`);
                checkResetButtonVisibility();
                $('.searchWorkerBtn').trigger('click');
            }, 300);
        });

        function checkResetButtonVisibility() {
            const filters = getFilters();
            const hasAnyFilter = Object.values(filters).some(value => value !== '');
            if (hasAnyFilter) {
                $('.resetFilterBtn').show();
            } else {
                $('.resetFilterBtn').hide();
            }
        }

        // فتح و غلق فلتر الموبايل
        $('#openFilterBtn').click(function () {
            $('#mobileFilterSidebar').addClass('active');
            $('body').css('overflow', 'hidden');
        });

        $('#closeFilterBtn').click(function () {
            $('#mobileFilterSidebar').removeClass('active');
            $('body').css('overflow', 'auto');
        });

        $(document).on('click', '.mobile-filter-overlay', function () {
            $('#mobileFilterSidebar').removeClass('active');
            $(this).removeClass('active');
        });

        // ---------
        // حل مشكلة عدم اختيار الـ radio عند الضغط على النص في الديسكتوب:
        // هذه المشكلة غالباً بسبب نقص أو خطأ في ارتباط الـ label بالـ input.
        // تأكد أن كل label يحتوي على الخاصية `for` التي تطابق الـ id الخاص بالـ input.
        // مثال:
        // <input type="radio" id="job1" name="job" value="1">
        // <label for="job1">اسم الوظيفة</label>
        //
        // إذا كانت موجودة وصحيحة، حاول تفعيل هذا الكود لإجبار اختيار الـ radio عند الضغط على النص:
        $('label').click(function() {
            var forAttr = $(this).attr('for');
            if (forAttr) {
                $('#' + forAttr).prop('checked', true).trigger('change');
            }
        });

    });

    $('label').on('click', function(e) {
        var forId = $(this).attr('for');
        if (forId) {
            e.preventDefault(); // منع السلوك الافتراضي للـ label
            var radioInput = $('#' + forId);
            if (radioInput.length) {
                radioInput.prop('checked', true).trigger('change');
            }
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const updateIcons = () => {
        document.querySelectorAll('.accordionButton').forEach(button => {
            const targetId = button.getAttribute('data-bs-target');
            const collapseEl = document.querySelector(targetId);
            const icon = button.querySelector('.toggle-icon');

            if (collapseEl && icon) {
                if (collapseEl.classList.contains('show')) {
                    icon.textContent = '−';
                } else {
                    icon.textContent = '+';
                }
            }
        });
    };

    // تحديث عند تحميل الصفحة
    updateIcons();

    // حدث عند الفتح
    document.querySelectorAll('.collapse').forEach(collapse => {
        collapse.addEventListener('shown.bs.collapse', updateIcons);
        collapse.addEventListener('hidden.bs.collapse', updateIcons);
    });
});
</script>



@endsection
