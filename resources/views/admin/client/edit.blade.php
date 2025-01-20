@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.edit')}}
        </h2>
    </div>
    <!-- BEGIN: Form Layout -->
    <form action="{{route('clients.update', $client)}}" enctype="multipart/form-data"  method="POST" >
        @csrf
        @method('put')

        @include('admin.client.form')

    </form>
    <!-- END: Form Layout -->
@endsection

@section('my_own_js')
    <script type="text/javascript">

        $(document).ready(function(){
        });


        const another_address = document.getElementById("another_address");
        const address_container = document.getElementById("address_container");

        if (another_address.checked) {
            address_container.classList.remove("hidden")
        } else {
            address_container.classList.add("hidden")
        }

        another_address.addEventListener("change", function() {
            if (another_address.checked) {
                address_container.classList.remove("hidden")
            } else {
                address_container.classList.add("hidden")
            }
        });

    </script>
@endsection

