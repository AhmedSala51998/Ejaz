@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Home')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')


    <content>
        <?php
        $local='ar'
        ?>
                @include('frontend.pages.home.parts.slider')
{{--        <!-- *** about section -->--}}
{{--        @include('frontend.pages.home.parts.aboutUs')--}}

                @include('frontend.pages.home.parts.ourService')
        @include('frontend.pages.home.parts.customarServices')
                @include('frontend.pages.home.parts.countries')
{{--                @include('frontend.pages.home.parts.recruitmentOperations')--}}
{{--
                @include('frontend.pages.home.parts.recruitmentSteps')
--}}
                @include('frontend.pages.home.parts.ourStatistics')
                @include('frontend.pages.home.parts.contactUs')
                @include('frontend.pages.home.parts.references')


    </content>

@endsection

@section('js')
   <script>
    $(document).on('submit', 'form#Form', function (e) {
        e.preventDefault();

        var myForm = $("#Form")[0];
        var formData = new FormData(myForm);
        var url = $('#Form').attr('action');
        var phoneInput = $('#phoneInput'); // تأكد أن الـ input فيه id="phoneInput"
        var phoneValue = phoneInput.val().trim();
        var phoneRegex = /^(00966|966|\+966)?5[0-9]{8}$/;

        // حذف الأخطاء السابقة
        phoneInput.removeClass('is-invalid');
        phoneInput.next('.invalid-feedback').text('');

        // ✅ تحقق من رقم الجوال
        if (!phoneRegex.test(phoneValue)) {
            phoneInput.addClass('is-invalid');
            phoneInput.next('.invalid-feedback').text("يرجى إدخال رقم جوال سعودي صحيح يبدأ بـ 5 بدون صفر");
            return; // إيقاف الإرسال
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#submit_button').attr('disabled', true);
                $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`);
            },
            success: function (data) {
                cuteAlert({
                    title: "{{__('frontend.Message Successfully Sent')}}",
                    message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                    type: "success",
                    buttonText: "{{__('frontend.confirm')}}"
                });

                $('#submit_button').attr('disabled', false);
                $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i><span></span>`);
                $('#Form')[0].reset();
            },
            error: function (data) {
                if (data.status === 500) {
                    cuteAlert({
                        title: "خطأ في السيرفر",
                        message: "حدث خطأ داخلي، حاول لاحقاً.",
                        type: "error",
                        buttonText: "موافق"
                    });
                }

                if (data.status === 422) {
                    let errors = data.responseJSON?.errors || {};
                    for (let field in errors) {
                        let input = $(`[name="${field}"]`);
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(errors[field][0]);
                    }

                    cuteAlert({
                        title: "خطأ في البيانات",
                        message: "يرجى تصحيح الحقول المطلوبة.",
                        type: "error",
                        buttonText: "حسناً"
                    });
                }
            },
            complete: function () {
                $('#submit_button').removeAttr('disabled');
                $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i><span></span>`);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // منع إدخال غير الأرقام
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>


@endsection
