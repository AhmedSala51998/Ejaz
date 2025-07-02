@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Congratulation page')}}
@endsection

@section('styles')
    <style>
        body {
        background-color: #fffefc;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
    }

    .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
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
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
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
    </style>
@endsection


@section('content')
    <div class="banner">
        <h1>  </h1>
        <ul>
            <li><a href="{{route('home')}}">الرئيسية </a></li>
            <li><a href="#!" class="active">   </a></li>
        </ul>
    </div>
    <section class="account">
        <div class="container">
            <div class="formCard row">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                <div class="col-md-12 p-2 text-center">
                    <img class="loginImg" style="height: 120px!important;width: 120px!important;" src="{{asset('frontend/img/check.png')}}" alt="">
                    <h6 class="text-center mb-4 mt-4">{{__('frontend.Reset Password Phone Is Sent Successfully')}}</h6>
                    <h6 class="text-center mb-4"><a href="{{route('home')}}">{{__('frontend.GoToHome')}}</a>
                    </h6>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')


@endsection
