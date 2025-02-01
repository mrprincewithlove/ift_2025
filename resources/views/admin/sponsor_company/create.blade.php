@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.create')}}
        </h2>

    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('sponsor-companies.store')}}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf

                @include('admin.sponsor_company.form')

                <div class="text-right mt-5">


                    <a href="{{ Session::get('prev-url') ?? URL::previous() }}" class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                    <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>


@endsection

@section('my_own_js')
    <script type="text/javascript">

        $(document).ready(function(){
        });

        //background_image
        document.getElementById('image_tm').onchange = function () {
            var src = URL.createObjectURL(this.files[0]);
            document.getElementById('image_tm_img').src = src;
        };

        const image_tm_img = document.getElementById('image_tm_img');
        const image_tm = document.getElementById('image_tm');

        image_tm_img.addEventListener('click', function () {
            image_tm.click();
        });


        document.getElementById('image_ru').onchange = function () {
            var src = URL.createObjectURL(this.files[0]);
            document.getElementById('image_ru_img').src = src;
        };

        const image_ru_img = document.getElementById('image_ru_img');
        const image_ru = document.getElementById('image_ru');

        image_ru_img.addEventListener('click', function () {
            image_ru.click();
        });



        document.getElementById('image_en').onchange = function () {
            var src = URL.createObjectURL(this.files[0]);
            document.getElementById('image_en_img').src = src;
        };

        const image_en_img = document.getElementById('image_en_img');
        const image_en = document.getElementById('image_en');

        image_en_img.addEventListener('click', function () {
            image_en.click();
        });
    </script>
@endsection
