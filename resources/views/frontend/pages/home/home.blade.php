@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Home')}}
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')


    {{--    <!-- start services -->--}}
    {{--    <!-- end services -->--}}
    {{--    <!-- family -->--}}
    {{--    @include('frontend.pages.home.parts.ourFamily')--}}
    {{--    <!-- end family -->--}}
    {{--    <!-- start workers -->--}}
    {{--    @include('frontend.pages.home.parts.Cvs')--}}
    {{--    <!-- end workers -->--}}
    {{--    <!-- start statistics -->--}}
    {{--    @include('frontend.pages.home.parts.ourStatistics')--}}
    {{--    <!-- end statistics -->--}}
    {{--    <!-- start steps -->--}}
    {{--    @include('frontend.pages.home.parts.recruitmentSteps')--}}
    {{--    <!-- end steps -->--}}
    {{--    <!-- start faq  -->--}}
    {{--    @include('frontend.pages.home.parts.feq')--}}
    {{--    <!-- end faq  -->--}}
    {{--    <!-- start contact us  -->--}}
    {{--    @include('frontend.pages.home.parts.contactUs')--}}
    {{--    <!-- end contact us -->--}}
    {{--    <!-- start references -->--}}
    {{--   @include('frontend.pages.home.parts.references')--}}
    {{--    <!-- end references -->--}}
    <content>

                @include('frontend.pages.home.parts.slider')
                @include('frontend.pages.home.parts.ourService')
                @include('frontend.pages.home.parts.countries')
{{--                @include('frontend.pages.home.parts.recruitmentOperations')--}}
                @include('frontend.pages.home.parts.recruitmentSteps')
                @include('frontend.pages.home.parts.ourStatistics')
                @include('frontend.pages.home.parts.contactUs')



    </content>

@endsection

@section('js')
    <script>

        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function () {

                },
                success: function (data) {
                    // var name = `${$("#contact_name").val()}`;
                    cuteAlert({
                        title: "{{__('frontend.Message Successfully Sent')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success", // or 'info', 'error', 'warning'
                        buttonText: "{{__('frontend.confirm')}}"
                    });
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>
                                <span></span>`)

                    $('#Form')[0].reset();
                },
                error: function (data) {
                    if (data.status === 500) {

                    }
                    if (data.status === 422) {

                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
    </script>

@endsection
