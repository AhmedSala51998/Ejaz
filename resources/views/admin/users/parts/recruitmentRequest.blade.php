@extends('admin.layouts.layout')
@section('styles')

    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>

@endsection

@section('page-title')
    طلب استقدام
@endsection


@section('content')

    <div class="row g-2">

        @foreach($cvs as $cv)
            <div class="col-md-4">
                <div class="workerCv card p-2 rounded-3">
                    <a href="{{route('admins.selectCustomerServiceForCv',[$cv->id,$user->id])}}" class="d-block">
                        <img src="{{get_file($cv->cv_file)}}" style=" height: 300px; max-width: 100% ; object-fit: cover" alt="">
                    </a>
                    <ul class="info p-0 row g-2">
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الجنسية : </h6>
                            <p class="mb-0 mx-2">{{$cv->nationalitie->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> المهنة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->job->title??''}}</p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الديانة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->religion->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الخبرة العملية : </h6>
                            <p class="mb-0 mx-2"> {{$cv->high_degree}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الحالة الاجتماعية : </h6>
                            <p class="mb-0 mx-2"> {{$cv->social_type->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> راتب العاملة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->salary??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> سعر الاستقدام : </h6>
                            <p class="mb-0 mx-2"> {{$cv->nationalitie->price??''}} ريال </p>
                        </li>
                    </ul>
                    <a href="{{route('admins.selectCustomerServiceForCv',[$cv->id,$user->id])}}" class="btn btn-success"> طلب استقدام </a>

                </div>
            </div>
        @endforeach

    </div>

@endsection
