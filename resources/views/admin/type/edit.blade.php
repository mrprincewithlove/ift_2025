@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.edit')}}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('types.update', $type)}}" enctype="multipart/form-data"  method="POST" class="intro-y box p-5">
                @csrf
                @method('put')

                @include('admin.type.form')


                <div class="text-right mt-5">


                    <a href="{{ Session::get('prev-url') ?? URL::previous() }}"
                       class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                    <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('my_own_js')
    <script type="text/javascript">
        //background_image
        document.getElementById('image').onchange = function () {
            var src = URL.createObjectURL(this.files[0]);
            document.getElementById('image_img').src = src;
        };

        const image_img = document.getElementById('image_img');
        const image = document.getElementById('image');

        image_img.addEventListener('click', function () {
            image.click();
        });
    </script>
@endsection

