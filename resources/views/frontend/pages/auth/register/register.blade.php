@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.RegisterPage')}}
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
        .password-wrapper {
        position: relative;
    }

    .password-input {
        padding-right: 40px;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        transition: color 0.3s ease;
        z-index: 10;
    }

    .toggle-password:hover {
        color: #f4a835;
    }

    /* ✅ كارد الدخول بشكل احترافي */
.card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    padding: 40px 30px;
    transition: all 0.4s ease-in-out;
    overflow: hidden;
}

/* ✅ صورة */
.loginImg {
    width: 100%;
    max-width: 200px;
    display: block;
    margin: 0 auto 25px;
}

/* ✅ الحقول */
.form-control {
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 16px;
    border: 1px solid #ddd;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}

/* ✅ اللابل */
.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

/* ✅ الرابط السفلي */
.card p a {
    color: #f4a835;
    font-weight: 600;
    transition: color 0.3s ease;
}
.card p a:hover {
    color: #d4901d;
    text-decoration: underline;
}

/* ✅ تنسيق input-group */
.input-group {
    border-radius: 12px;
    overflow: hidden;
}

/* ✅ checkbox و نسيت كلمة المرور */
.form-check-label {
    font-weight: 500;
    font-size: 14px;
}

.auth-card a {
    text-decoration: none;
    font-weight: 500;
    color: #555;
    transition: 0.3s;
}

.auth-card a:hover {
    color: #f4a835;
}

.card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 24px;
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    padding: 45px 35px;
    transition: all 0.4s ease;
    overflow: hidden;
    position: relative;
}
.card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f4a835, #ffdfb0);
    border-radius: 50%;
    top: -40px;
    right: -40px;
    opacity: 0.1;
    z-index: 0;
}
.loginImg {
    max-width: 180px;
    margin: 0 auto 30px;
    display: block;
}
.form-label {
    font-weight: 700;
    font-size: 15px;
    color: #444;
}
.form-control {
    border-radius: 14px;
    padding: 14px 16px;
    font-size: 15px;
    border: 1px solid #ddd;
    transition: 0.3s ease;
}
.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}
.password-wrapper {
    position: relative;
}
.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #aaa;
    transition: 0.3s;
}
.toggle-password:hover {
    color: #f4a835;
}
.form-check-label {
    font-size: 14px;
    font-weight: 500;
}
.card p a {
    color: #f4a835;
    font-weight: 600;
}
.card p a:hover {
    color: #d88f1e;
    text-decoration: underline;
}

.card {
    background: rgba(255, 255, 255, 0.25);
    border-radius: 24px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 45px 35px;
    transition: all 0.4s ease;
    position: relative;
}

.loginImg {
    max-width: 180px;
    margin: 0 auto 30px;
    display: block;
}

.form-label {
    font-weight: 700;
    font-size: 15px;
    color: #333;
}

.form-control {
    border-radius: 14px;
    padding: 14px 16px;
    font-size: 15px;
    border: 1px solid #ddd;
    transition: 0.3s ease;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}

/* Toggle password */
.password-wrapper {
    position: relative;
}
.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #aaa;
    transition: 0.3s;
    display: none; /* ✅ مخفية بالبداية */
}
.toggle-password:hover {
    color: #f4a835;
}

.auth-section {
    background: #fffefc;
    font-family: 'Tajawal', sans-serif;
}

.auth-card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(16px);
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.auth-card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f4a835, #ffdfb0);
    border-radius: 50%;
    top: -40px;
    right: -40px;
    opacity: 0.1;
    z-index: 0;
}

.auth-img {
    display: block;
    width: 160px;
    margin: 0 auto 20px;
}

.form-label {
    font-weight: 600;
    color: #444;
}

.form-control {
    border-radius: 12px;
    padding: 12px 16px;
    border: 1px solid #ccc;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.1);
}

.input-group-text {
    background: #f4a835;
    color: #fff;
    font-weight: 600;
    border: none;
}

.btn-submit {
    background-color: #f4a835;
    color: white;
    font-weight: 600;
    padding: 12px 20px;
    border: none;
    border-radius: 30px;
    transition: 0.3s;
}
.btn-submit:hover {
    background-color: #d88f1e;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(244,168,53,0.4);
}

.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    display: none;
    font-size: 16px;
}
.toggle-password:hover {
    color: #f4a835;
}

.auth-card {
    background: rgba(255, 255, 255, 0.25);
    border-radius: 24px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 45px 35px;
    transition: all 0.4s ease;
    position: relative;
}

.form-error {
    color: red;
    font-size: 13px;
    margin-top: 4px;
}

</style>
@endsection


@section('content')
    <div id="displaySectionHere">
        @include('frontend.pages.auth.register.parts.register-form')
        @include('frontend.pages.auth.register.parts.code')
    </div
@endsection

@section('js')
    <script>

        var timeOfSendingCode = 0;
        // Add validator
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(5)[0-9]{8}$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });


        $.formUtils.addValidator({
            name : 'repeatPassword',
            validatorFunction : function(value, $el, config, language, $form) {
                return value == $("#password").val()
            },
            errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
            errorMessageKey: 'repeatPasswordKey'
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }


        $(".passwordEye").click(function() {

            $(this).find('.far').toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).closest('.passwordDiv').find('.passwordInput'));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        var codeSentToMobile
        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();

            $("#nameInCode").val($("#name").val())
            $("#passwordInCode").val($("#password").val())
            $("#phoneInCode").val($("#Phone").val())

            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){

                },
                success: function (data) {

                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Code Is Sent to Your phone')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled',false)
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                        codeSentToMobile = data
                        $("#registerForm").hide()
                        $('#hide-code').show();
                        $('#register-hide').hide();

                        $("#CodeForm").show()
                        document.getElementById("vCodeIdFirst").focus();
                        timeOfSendingCode++
                    }, 2000);

                    // submit();

                },
                error: function (data) {
                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)

                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }


                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit

    </script>
    <script>
        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");
            //bind events
            $inputs.on('keyup', processInput);
            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }
                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }
            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }
        })();


        $(document).on('submit','form#CompleteRegister',function(e) {
            e.preventDefault();
            const codeHere = [];
            var inputs = $(".vCode-input");
            for(var i = 0; i < inputs.length; i++){
                if ($(inputs[i]).val() == '' || $(inputs[i]).val() == null){
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.please , fill all input with correct code')}}",
                        timer: 3000
                    })
                    return 0
                }else{
                    codeHere.push($(inputs[i]).val());
                }

            }
            if (codeSentToMobile != codeHere.join('')){
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.this code is wrong')}}",
                    timer: 3000
                })
                return 0;
            }

            $("#codeInCode").val(codeSentToMobile)
            var myForm = $("#CompleteRegister")[0]
            var formData = new FormData(myForm)
            var url = $('#CompleteRegister').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#CompleteRegisterButton').attr('disabled',true)
                    $('#CompleteRegisterButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
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
                        $('#CompleteRegisterButton').attr('disabled',false)
                        $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                        location.href = "{{route('auth.profile')}}"
                    }, 2000);

                },
                error: function (data) {
                    $('#CompleteRegisterButton').attr('disabled',false)
                    $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)

                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }


                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 415) {


                        var url="{{route('frontend.show.worker',$id)}}";
                        location.replace(url);
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit



        $(document).on('click',"#registerAgain",function (e){
            e.preventDefault()
            $("#registerForm").show()
            $("#CodeForm").hide()
            $('#hide-code').hide();
            $('#register-hide').show();
            document.getElementById("vCodeIdFirst").blur();
        })


        $(document).on('click',"#sendCodeAgain",function (e){
            e.preventDefault()
          if ( $("#sendCodeAgain").attr('attr-code-sent') == 'sent')
          {
              $('#sendCodeAgain').html(`<i class='fa fa-spinner fa-spin '></i>`)
              window.setTimeout(function() {
                  $("#codeReceiveOrNot").html("{{__('frontend.CodeIsSentAgain')}}")
                  $("#Form").submit()
                  countdown(1)
                  $("#sendCodeAgain").attr('attr-code-sent',"no_send")
              }, 1000);

          }else{
              cuteToast({
                  type: "error", // or 'info', 'error', 'warning'
                  message: "{{__('frontend.Please wait until the time is up')}}",
                  timer: 3000
              })
             return 0;
          }

        })


        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1

            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                // our seconds have run out
                if(seconds <= 0) {
                    // our minutes have run out
                    if(current_minutes <= 0) {
                        // we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
                        // otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }

                // we set our interval to a second.
            }, 1000);
        }

        $('#hide-code').hide();

    </script>
    <script>
    // تفعيل فاليديشن رقم الجوال السعودي
    $.formUtils.addValidator({
        name: 'validatePhoneNumberOfSAR',
        validatorFunction: function (value) {
            return /^(05\d{8})$|^(5\d{8})$/.test(value);
        },
        errorMessage: "رقم الجوال غير صحيح. يجب أن يبدأ بـ 05 ويتبعه 8 أرقام.",
        errorMessageKey: 'badPhoneNumber'
    });

    $.validate({
        form: '#Form',
        modules: 'security',
        lang: 'ar',
        onError: function () {
            $('#phone-error').text("يرجى التأكد من صحة رقم الجوال.");
        },
        onSuccess: function () {
            $('#phone-error').text('');
            return true;
        }
    });

    // إظهار وإخفاء كلمة المرور
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    // إظهار أيقونة العين فقط عند الكتابة
    document.addEventListener("DOMContentLoaded", function () {
        const toggleVisibility = (inputId, toggleId) => {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            input.addEventListener("input", function () {
                if (this.value.trim()) {
                    toggle.style.display = "block";
                } else {
                    toggle.style.display = "none";
                    this.type = "password";
                    const icon = toggle.querySelector("i");
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        };
        toggleVisibility("password", "togglePassword");
        toggleVisibility("repeatPassword", "toggleRepeatPassword");
    });

    // منع الحروف في رقم الجوال
    function isNumber(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>
@endsection
