@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment Request')}}
@endsection

@section('styles')

@endsection

@section('content')



    <content>
        <!-- ================ select Customer Service ================= -->
        <section class="selectCustomerService">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 p-2">
                        <div class="headTitle">
                            <h1> اختر احد مندوبي خدمة العملاء </h1>
                            <p>
                                {{__('frontend.Please choose a customer service representative to continue completing the contract and complete the recruitmentContract')}}
                            </p>
                        </div>
                            <div class="choose">
                                @foreach($admins as $admin)
                                    <!--  customer -->
                                    <div class=" col customerOption " id="customerSupport">
                                        <input type="radio" class="btn-check customerSupport" value="{{$admin->id}}" name="customer" id="option{{$admin->id}}">
                                        <label class="btn btn-outline" for="option{{$admin->id}}">
                                            <img src="{{asset('frontend')}}/img/customer-service.png" alt="">
                                            <span> {{$admin->name}} </span>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            <div class=" pt-4 p-2 text-center">


                                <button  attr-id="{{$cv->id}}"    class="animatedLink Recruitment_Request">
                                    {{__('frontend.Recruitment Request')}}
                                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </section>




    </content>













@endsection


    @section('js')


    @endsection









