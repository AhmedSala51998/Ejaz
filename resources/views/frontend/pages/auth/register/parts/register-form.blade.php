<content id="register-hide">
    <!-- ================ banner ================= -->
    <div class="banner">
        <h1>  {{__('frontend.create account')}} </h1>
        <ul>
            <li><a href="{{route('home')}}">{{__('frontend.Home')}} </a></li>
            <li><a href="#!" class="active"> {{__('frontend.create account')}} </a></li>
        </ul>
    </div>
    <!-- ================  / banner ================= -->


    <!-- register form -->
    <section class="account" id="">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 m-auto p-2">
                    <div class="card">
                        <img class="loginImg" src="{{asset('frontend')}}/img/register.svg" alt="">

                        <form method="post" action="{{route('checkPhoneToSendOtp')}}" class="row" id="Form">
                            <div class="col-12 p-2">
                                <label for="name" class="form-label"> <i
                                        class="fas fa-user me-2"></i> {{__('frontend.FullName')}}* </label>
                                <input data-validation="required,length" data-validation-length="min2" type="text"
                                       class="form-control" name="name" id="name"
                                       placeholder="{{__('frontend.enter FullName')}}">
                            </div>
                            <div class="col-12 p-2">
                                <label for="Phone" class="form-label"> <i
                                        class="fas fa-phone-alt me-2"></i> {{__('frontend.phone')}}* </label>

                                <div class="input-group">
                                    <input onkeypress="return isNumber(event)"
                                           data-validation="required,validatePhoneNumberOfSAR" type="number"
                                           class="form-control" id="Phone" name="phone" placeholder="5********">
                                    <span class="input-group-text" style="direction: ltr;"> +996 </span>
                                </div>

                            </div>

                            <div class="col-md-6 p-2">
                                <label for="password" class="form-label"> <i
                                        class="fas fa-key me-2"></i> {{__('frontend.Password')}}* </label>
                                <input data-validation="required,length" data-validation-length="min6" type="password"
                                       class="form-control passwordInput" id="password" name="password"
                                       placeholder="*****">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="repetPassword" class="form-label"> <i
                                        class="fas fa-key me-2"></i>{{__('frontend.confirmPassword')}} *
                                </label>
                                <input data-validation="required,repeatPassword" type="password"
                                       class="form-control passwordInput" id="repetPassword" name="repeatPassword"
                                       placeholder="*****">
                            </div>
                            <div class="col-12 pt-4 p-2 text-center">

                                <button type="submit" class="animatedLink">
                                    {{__('frontend.RegisterPage')}}
                                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                </button>
                            </div>
                        </form>
                        <p class="text-center pt-4 pb-2"> {{__('frontend.you already have account ?')}} <a
                                href="{{route('auth.login')}}"> {{__('frontend.Login')}} </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</content>
