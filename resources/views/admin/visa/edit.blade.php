@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('permission.edit')}}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('permissions.update', $permission)}}" method="POST" class="intro-y box p-5">
                @csrf
                @method('put')

                @include('admin.permission.form')

                <div class="text-right mt-5">


                    <a href="{{ Session::get('prev-url') ?? URL::previous() }}" class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('permission.back')}}</a>
                    <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('permission.save')}}</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>


@endsection

@section('my_own_js')
    <script type="text/javascript" >

        $(document).ready(function(){
            // $("#modal_close_id" ).click(function(){
            //     $('#new_group_id').val('');
            //     $('#modal_result_id').html('');
            // });

            $('#modal_save_btn_id').on('click', function(){
                var new_group = $('#new_group_id').val();

                if(new_group.length > 0)
                {
                    console.log(new_group);
                    $('#group_id').append('<option value="' + new_group + '">' + new_group  + '</option>');
                    $('#group_id').val(new_group).trigger('change');
                    $('#modal_close_id').trigger('click');
                }
            });
        });
    </script>

    <script src=" {{ asset('/ucp/dist/js/ckeditor-classic.js') }} "></script>
@endsection

