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
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf

                @include('admin.product.form')

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

    <script src="{{asset('assets/js/tomselect.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Create a mapping of product IDs to prices from the PHP variable

            // Initialize Tom Select
            // new TomSelect('select[name="products"]', {
            //     placeholder: "Select product",
            //     onChange: function(value) {
            //         // Set the price input based on the selected product
            //         if (value && productPrices[value] !== undefined) {
            //             $('#new-price').val(productPrices[value]);
            //         } else {
            //             $('#new-price').val('');
            //         }
            //         calculateTotalPrice();
            //     }
            // });

            // Calculate total price on quantity or price change
            $('#new-price, [name="quantity"]').on('input', function() {
                calculateTotalPrice();
            });

            function calculateTotalPrice() {
                let price = parseFloat($('#new-price').val()) || 0;
                let quantity = parseFloat($('[name="quantity"]').val()) || 0;
                let totalPrice = price * quantity;
                $('[name="total_price"]').val(totalPrice.toFixed(2));
            }
        });
    </script>
@endsection

