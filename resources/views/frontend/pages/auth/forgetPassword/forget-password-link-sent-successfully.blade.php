@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Congratulation page')}}
@endsection

@section('styles')
    <style></style>
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
