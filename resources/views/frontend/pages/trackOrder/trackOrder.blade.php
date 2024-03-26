@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Application for the recruitment of domestic workers')}}
@endsection

@section('styles')
    <style></style>
@endsection


@section('content')


    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> تتبع طلبك</h1>
            <ul>
                <li> <a href="{{route('home')}}">{{__('frontend.Home')}} </a> </li>
                <li> <a href="#!" class="active"> تتبع الطلب </a> </li>
            </ul>
        </div>

<!-- INNER PAGE BANNER END -->

<!-- =========================================== trackOrder ======================================== -->
<section class="trackOrder">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">

                <form action="{{route('track_order')}}" id="CompleteRegister" method="post">
                    @csrf
                    <div class="inputField">
                        <label for="track">
                            <i class="fa-solid fa-map-pin"></i>
                           من فضلك ادخل رقم الطلب
                        </label>
                        <input id="track" type="text"  name="code" class="form-control" placeholder=" ادخل هنا " required>
                    </div>
                    <button class="btn track-btn"  id="CompleteRegister" type="submit">  تحقق </button>
                </form>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="trackorder-image">
                    <img src="{{asset('frontend')}}/img/register.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

    </content>

@endsection

@section('js')
    <script>
$(document).on('submit','form#CompleteRegister',function(e) {
e.preventDefault();
// const codeHere = [];

var myForm = $("#CompleteRegister")[0]
var formData = new FormData(myForm)
var url = $('#CompleteRegister').attr('action');
$.ajax({
url:url,
type: 'POST',
data: formData,
beforeSend: function(){

},
complete: function(){

},
success: function (data) {

window.setTimeout(function() {
cuteToast({
type: "success", // or 'info', 'error', 'warning'
message: "{{__('frontend.good operation')}}",
timer: 3000
})
location.href = "/order_details/"+data.order_code
}, 2000);

},
error: function (data) {

if (data.status === 500) {
cuteToast({
type: "error", // or 'info', 'error', 'warning'
message: "يجب تسجيل الدخول لاستخدام هذة الخدمة",
timer: 3000
})
}
    if (data.status === 403) {
        cuteToast({
            type: "error", // or 'info', 'error', 'warning'
            message: "ﻻ يمكنك تتبع هذا الطلب",
            timer: 3000
        })
    }


},//end error method

cache: false,
contentType: false,
processData: false
});//end ajax
});//end submit
    </script>
@endsection
