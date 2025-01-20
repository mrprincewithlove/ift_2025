@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('user.edit')}}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('users.update', $user)}}" enctype="multipart/form-data"  method="POST" class="intro-y box p-5">
                @csrf
                @method('put')

                @include('admin.user.form')


                <div class="text-right mt-5">


                    <a href="{{ Session::get('prev-url') ?? URL::previous() }}"
                       class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                    <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{route('users.reset-password', $user)}}" method="POST">
            @csrf
            @method('put')
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">{{ __('Reset User Password')}}</h2>

                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-1 gap-4 gap-y-3">
                    <div>
                        <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">
                    </div>
                    <div class="">
                        <label  class="form-label">{{ __('New Password')}}
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 h-4">{{__('common.required')}} </span></label>
                        <div class="input-group " id="show_hide_password">
                            <input type="password" name="password1" class="form-control" required>
                            <div class="input-group-text">
                                <a class="" href="#"> <i data-lucide="eye" class="w-5 h-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label  class="form-label">{{ __('New Password')}}<small>({{ __('again')}})</small>
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 h-4">{{__('common.required')}} </span></label>
                        <div class="input-group " id="show_hide_password">
                            <input type="password" name="password2" class="form-control" required>
                            <div class="input-group-text">
                                <a class="" href="#"> <i data-lucide="eye" class="w-5 h-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <p id="modal_result_id"></p>
                </div> <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">{{__('common.cancel')}}</button>
                    <button type="" id="modal_save_btn_id" data-href="{{route('users.reset-password', $user)}}"  class="btn btn-primary w-20">{{__('common.save')}}</button> </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div> <!-- END: Modal Content -->

@endsection

@push('customJS')
    <script>
        document.getElementById('image').onchange = function () {
            var src = URL.createObjectURL(this.files[0]);
            document.getElementById('previewImage').src = src;

        };



        const imageTag = document.getElementById('previewImage');
        const fileInput = document.getElementById('image');

        imageTag.addEventListener('click', function () {
            fileInput.click();
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $("#modal_close_id" ).click(function(){
                $('#show_hide_password1 input').val('');
                $('#show_hide_password2 input').val('');
                $('#show_hide_password1 input').css('border', '');
                $('#show_hide_password2 input').css('border', '');
                $('#modal_result_id').html('');
            });

            $("#show_hide_password1 a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password1 input').attr("type") == "text")
                {
                    $('#show_hide_password1 input').attr('type', 'password');
                    $('#show_hide_password1 i').addClass( "fa-eye-slash" );
                    $('#show_hide_password1 i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password1 input').attr("type") == "password")
                {
                    $('#show_hide_password1 input').attr('type', 'text');
                    $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password1 i').addClass( "fa-eye" );
                }
            });

            $("#show_hide_password2 a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password2 input').attr("type") == "text")
                {
                    $('#show_hide_password2 input').attr('type', 'password');
                    $('#show_hide_password2 i').addClass( "fa-eye-slash" );
                    $('#show_hide_password2 i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password2 input').attr("type") == "password")
                {
                    $('#show_hide_password2 input').attr('type', 'text');
                    $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password2 i').addClass( "fa-eye" );
                }
            });

            $('#modal_save_btn_id').on('click', function(){
                resetPassword($(this).data('href'), $('#newpassword1_id').val(), $('#newpassword2_id').val(), $('#force_password_change').is(':checked'));
            })
        });

        function resetPassword(href_v, password1_v, password2_v, force_password_change_v)
        {
            if((password1_v.length > 0 && password2_v.length > 0) && (password1_v == password2_v))
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var d = {_token: CSRF_TOKEN, password1: password1_v, password2: password2_v, force_password_change: force_password_change_v};
                $.ajax({  
                    url: href_v,
                    data: d,
                    method: 'PUT',
                    cache: false,
                    dataType: 'json',
                    async: false,
                    success: function(result)
                    {
                        if(result.success == true)
                        {
                            $('#modal_result_id').html(ajaxSuccessMessage(result.data));
                            $('#show_hide_password1 input').val('');
                            $('#show_hide_password2 input').val('');
                        }
                        else if(result.success == false)
                        {
                            $('#modal_result_id').html(ajaxErrorMessage(result.data));
                        }
                    },
                    error: function(result){
                        $('#modal_result_id').html(ajaxErrorMessage(result.data));
                        // location.reload(true);
                    }
                });
            }
            else
            {
                $('#show_hide_password1 input').css('border', '1px solid red');
                $('#show_hide_password2 input').css('border', '1px solid red');
            }
        }

        function ajaxErrorMessage(errors)
        {
            var out = '<i class="fa fa-times text-danger"></i><br>' + '<ul class="text-danger">';
            for(var i=0; i<errors.length; i++)
                out += '<li>' + errors[i] + '</li>';

            return out + '</ul>';
        }

        function ajaxSuccessMessage(data)
        {
            var out = '<i class="fa fa-check text-success"></i><br>' + '<ul>';
                out += '<li>' + data + '</li>';

            return out + '</ul>';
        }
    </script>
@endpush