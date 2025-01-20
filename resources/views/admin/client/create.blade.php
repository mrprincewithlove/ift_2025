@extends('layouts.admin_base')


@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.create')}}
        </h2>

    </div>
    <form action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @include('admin.client.form')

    </form>


@endsection

@section('my_own_js')
    <script type="text/javascript">

        $(document).ready(function(){
        });

        // address
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