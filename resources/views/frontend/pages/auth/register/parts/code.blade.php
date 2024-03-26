<content id="hide-code" >
    <!-- ================ banner ================= -->
    <div class="banner">
        <h1> كود التفعيل </h1>
    </div>
    <!-- ================  / banner ================= -->
    <!-- login form -->
    <section class="account">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 m-auto p-2">
                    <div class="card">
                        <img class="loginImg" src="{{asset('frontend')}}/img/code.svg" alt="">
                        <form id="CompleteRegister" method="post" action="{{route('register_action')}}" class="row">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="name" value="" id="nameInCode">
                            <input type="hidden" name="password" value="" id="passwordInCode">
                            <input type="hidden" name="phone" value="" id="phoneInCode">


                            <div class="col-12 p-2 text-center">
                                <label class="form-label"> {{__('frontend.PleaseEnterTheSentCode')}} <span> 5XXXXXXXX </span> </label>
                                <div class="vCode " id="vCode" >
                                    <input value="2" id="vCodeIdFirst" onkeypress="isNumber(evt)"  type="number" class="vCode-input mx-1" maxlength="1">
                                    <input value="2" type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                                    <input value="4" type="number"   onkeypress="isNumber(evt)" class="vCode-input mx-1" maxlength="1">
                                    <input value="4" type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                                </div>

                            </div>
                            <div class="col-12 p-2 text-center">
                                <button type="submit" class="animatedLink">
                                    {{__('frontend.confirm')}}
                                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                </button>
                            </div>
                        </form>
                        <p class="text-center pt-4 pb-2">تم وضع كود افتراضي لتعذر ارسال رسالة نصية اليكم في الوقت الحالي</p>

                        <p class="text-center pt-4 pb-2"> {{__('frontend.I did not receive the activation code')}} <a href="#" id="sendCodeAgain" attr-code-sent="sent"> {{__('frontend.ReSent')}} </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>
