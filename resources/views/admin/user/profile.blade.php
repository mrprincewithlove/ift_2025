@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('Profile')}}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="grid grid-cols-4 gap-2 w-full">

                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.name')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->name}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.surname')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->surname}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.father_name')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->father_name}}">
                    </div>

                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.birth_date')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->login}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.role')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->name}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('Password Updated At')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{Carbon\Carbon::parse($user->password_updated_at)->format('d-m-Y H:i:s')}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.mobile')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->mobile}}">
                    </div>
                    <div>
                        <label class="form-label w-full flex flex-col sm:flex-row-label">{{ __('user.email')}}</label>
                        <input type="text" class="form-control w-full" disabled value="{{$user->email}}">
                    </div>

                </div>
                <hr class="my-2"><br>
                <div class="flex  gap-2 w-full">

                    <div class="w-1/3">
                        <label for="crud-form-1"
                               class="form-label w-full flex flex-col sm:flex-row-label">{{__('user.image')}}</label>
                        <img id="previewImage" class="w-full h-full text-gray-300 rounded-md"
                             src="{{$user->image? asset($user->image) : asset('images/imageplaceholder.jpg') }}"
                             alt="">
                    </div>
                    <div class="w-2/3 flex flex-col">

                        <div class=" flex flex-row items-center gap-2 w-full ">
                            <div class="w-full">
                                <label class="form-label w-full flex flex-col sm:flex-row-label">{{__('user.password')}}
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 h-4"></span></label>
                                <div class="input-group " id="show_hide_password">
                                    <input type="password" name="password" class="form-control" value="********" disabled>
                                    <div class="">
                                        {{--<a class=" form-control text-white" href="#" data-bs-toggle="modal"--}}
                                        {{--data-bs-target="#modal-reset">{{ __('Reset Pass')}}</a>--}}
                                        {{--<a class="" href="#"> <i data-lucide="eye"></i></a>--}}
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                                           class="btn btn-danger whitespace-nowrap rounded-l-[0px]">{{ __('Reset Pass')}}</a>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>


                <div class="text-right mt-5">
                    <a href="{{route('home')}}"
                       class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.home')}}</a>
                </div>
            </div>



            <!-- END: Form Layout -->
        </div>
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{route('users.change-password')}}" method="POST">
            @csrf
            @method('put')
            <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">{{ __('translates.Change Password')}}</h2>

                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-1 gap-4 gap-y-3">
                    <div>
                        <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">
                    </div>
                    <div class="">
                        <label  class="form-label required">{{ __('translates.Current Password')}}</label>
                        <div class="input-group " id="show_hide_password1">
                            <input type="password" id="oldpassword_id" name="oldpassword" class="form-control" required>
                            <div class="input-group-text">
                                <a class="" href="#"> <i data-lucide="eye" class="w-5 h-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label  class="form-label required">{{ __('translates.New Password')}}</label>
                        <div class="input-group " id="show_hide_password2">
                            <input type="password" name="password1" class="form-control" required>
                            <div class="input-group-text">
                                <a class="" href="#"> <i data-lucide="eye" class="w-5 h-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label  class="form-label required">{{ __('translates.New Password')}}<small>({{ __('translates.again')}})</small></label>
                        <div class="input-group " id="show_hide_password3">
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
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">{{__('translates.back')}}</button>
                    <button type="" id="modal_save_btn_id" data-href="{{route('users.reset-password', $user)}}"  class="btn btn-primary w-20">{{__('translates.save')}}</button> </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div> <!-- END: Modal Content -->

@endsection

@push('customJS')
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
                showHidePassword('show_hide_password1');
            });

            $("#show_hide_password2 a").on('click', function(event) {
                showHidePassword('show_hide_password2');
            });

            $("#show_hide_password3 a").on('click', function(event) {
                showHidePassword('show_hide_password3');
            });

            // $('#lang_save_btn_id').on('click', function(){
            //     updateLanguage($(this).data('href'), $('#lang_id').val());
            // });
        });

        function showHidePassword(id)
        {
            event.preventDefault();
            if($('#'+id+ ' input').attr("type") == "text")
            {
                $('#'+id+' input').attr('type', 'password');
                $('#'+id+' i').addClass( "fa-eye-slash" );
                $('#'+id+' i').removeClass( "fa-eye" );
            }
            else if($('#'+id+' input').attr("type") == "password")
            {
                $('#'+id+' input').attr('type', 'text');
                $('#'+id+' i').removeClass( "fa-eye-slash" );
                $('#'+id+' i').addClass( "fa-eye" );
            }
        }

        // function updateLanguage(href_v, language_v)
        // {
        //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //     var d = {_token: CSRF_TOKEN, language: language_v};
        //     $.ajax({  
        //         url: href_v,
        //         data: d,
        //         method: 'PUT',
        //         cache: false,
        //         dataType: 'json',
        //         async: false,
        //         success: function(result)
        //         {
        //             if(result.success == true)
        //             {
        //                 $('#modal_result_id').html(ajaxSuccessMessage(result.data));
        //             }
        //             else if(result.success == false)
        //             {
        //                 $('#modal_result_id').html(ajaxErrorMessage(result.data));
        //             }
        //         },
        //         error: function(result){
        //             $('#modal_result_id').html(ajaxErrorMessage(result.data));
        //             // location.reload(true);
        //         }
        //     });
        // }

        // function ajaxErrorMessage(errors)
        // {
        //     var out = '<i class="fa fa-times text-danger"></i><br>' + '<ul class="text-danger">';
        //     for(var i=0; i<errors.length; i++)
        //         out += '<li>' + errors[i] + '</li>';

        //     return out + '</ul>';
        // }

        // function ajaxSuccessMessage(data)
        // {
        //     var out = '<i class="fa fa-check text-success"></i><br>' + '<ul>';
        //         out += '<li>' + data + '</li>';

        //     return out + '</ul>';
        // }
    </script>
@endpush