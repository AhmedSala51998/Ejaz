@extends('admin.layouts.layout')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

@endsection

@section('page-title')
   طلبات التواصل
@endsection

@section('page-links')
@endsection

@section('content')
    @include('admin.layouts.loader.loaderHtml')
    {{-------------------------}}

    <div id="contactDiv" class="card-body ">

    </div>
@endsection

@section('js')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


    </script>

    <script>
        //loader in js

        getSection()
        //get sections
        function getSection() {
            $('.loader-ajax').show()
            $.get('{{route('contacts.index')}}', function (data) {
                window.setTimeout(function() {
                    $('.loader-ajax').hide()
                    $('#contactDiv').html(data.html);
                }, 2000);


            });
        }

        $(document).on('click','.pagination a',function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page)
        });

        function fetch_data(page)
        {
            $('.loader-ajax').show()
            $.ajax({
                url:"{{route('contacts.index')}}?page="+page,
                success:function(data)
                {
                    window.setTimeout(function() {
                        $('.loader-ajax').hide()
                        $('#contactDiv').html(data.html);
                    }, 2000);
                }
            });
        }

        //edit-card
        {{--$(document).on('click', '.edit-card', function (e) {--}}
        {{--    e.preventDefault()--}}
        {{--    var id = $(this).attr('id');--}}
        {{--    swal({--}}
        {{--        title: "{{__('admin.Are You Sure')}}",--}}
        {{--        text: "{{__('admin.You Can not to rollback')}}",--}}
        {{--        type: "warning",--}}
        {{--        showCancelButton: true,--}}
        {{--        confirmButtonColor: "#DD6B55",--}}
        {{--        confirmButtonText: "{{__('admin.accept')}}",--}}
        {{--        cancelButtonText: "{{__('admin.cancel')}}",--}}
        {{--        okButtonText: "{{__('admin.accept')}}",--}}
        {{--        closeOnConfirm: false--}}
        {{--    }, function () {--}}
        {{--        var url = '{{ route("contacts.destroy", ":id") }}';--}}
        {{--        url = url.replace(':id', id);--}}
        {{--        $.ajax({--}}
        {{--            url: url,--}}
        {{--            type: 'DELETE',--}}
        {{--            data: {id: id},--}}
        {{--            success: function (data) {--}}
        {{--                swal.close()--}}
        {{--                window.setTimeout(function() {--}}
        {{--                    getSection()--}}
        {{--                   --}}

        {{--                }, 2000);--}}

        {{--            },error: function(data) {--}}
        {{--                swal.close()--}}
        {{--           --}}
        {{--            }--}}

        {{--        });--}}
        {{--    });--}}
        {{--});--}}
    </script>

    <script>
        $(document).on('click','.deleteContact',function (e){
            e.preventDefault();
           var id=$(this).attr('data-id');
           var url="{{route('admin.deleteContact',':id')}}";
           url=url.replace(':id',id);



            $.ajax({
                url:url,
                type: 'GET',
                data: {
                    id:id,
                },
                beforeSend: function(){
                    $('#delete_button').attr('disabled',true)

                },
                complete: function(){

                },
                success: function (data) {

                   $(`#tr-${id}`).remove();
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "تمت العملية بنجاح",
                            timer: 3000
                        })


                },
                error: function (data) {
                    $('.loader-ajax').hide()
                    $('#submit_button').html(`حفظ`)
                    $('#submit_button').attr('disabled',false)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "أنت لا تملك الصلاحية لفعل هذا",
                            timer: 3000
                        });
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    cuteToast({
                                        type: "error", // or 'info', 'error', 'warning'
                                        message: value,
                                        timer: 3000
                                    });

                                });

                            } else {

                            }
                        });
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });








        })
    </script>



@endsection
