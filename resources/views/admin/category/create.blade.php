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
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf

                @include('admin.category.form')

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
    </script>
@endsection