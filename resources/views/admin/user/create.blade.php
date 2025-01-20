@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('user.create')}}
        </h2>

    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf

                @include('admin.user.form')

                <div class="text-right mt-5">


                    <a href="{{ Session::get('prev-url') ?? URL::previous() }}" class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                    <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>



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
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text")
                {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password input').attr("type") == "password")
                {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endpush