@extends('layouts.admin_base')


@section('content')
    <div id="basic-non-sticky-notification-content" class="toastify-content hidden flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-circle" class="lucide lucide-check-circle text-danger" data-lucide="check-circle"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        <div class="ml-4 mr-4">
            <div class="font-medium">
                {{__('translates.fill_all_inputs')}}
            </div>
        </div>

    </div>
    <button id="basic-non-sticky-notification-toggle" class="hidden">Notification</button>



    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.create')}}
        </h2>

    </div>
    <form action="{{route('agreement.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @include('admin.agreement.form')

    </form>


@endsection

@section('my_own_js')
    <link rel="stylesheet" href="{{ asset('assets/css/tomselect.min.css') }}"/>
    <script src="{{asset('assets/js/tomselect.min.js')}}"></script>
    <script defer>
        $(document).ready(function() {


            const productPrices = @json($products->pluck('price', 'id'));
            const agreementTypes = @json($agreement_types);
            // console.log(agreementTypes);

            const agreementTypesMap = agreementTypes.reduce((map, obj) => {
                map[obj.id] = obj;
                return map;
            }, {});


            new TomSelect(`#agreement_type`, {
                    // placeholder: "Select agreement",
                    onChange: function(value) {
                        // Set the price input based on the selected product
                        const agreement_discount = `#agreement_discount`;
                        // console.log(value);
                        // console.log(agreementTypesMap[value]);
                        let total = $('#total').val();
                        if (value && agreementTypesMap[value] !== undefined) {
                            $(agreement_discount).val(agreementTypesMap[value].discount_percent);
                            // console.log(myProducts);
                            $('.product-disc').val(agreementTypesMap[value].discount_percent);

                            if(value == 1) {
                                $('#prepayment').val(total);
                            }
                        } else {
                            $(agreement_discount).val(0);
                            $('.product-disc').val(0);
                        }
                        // console.log(111);
                        calculateAllProductsTotalPrice();
                        // console.log(22);

                        totalPriceCalculate();
                        if(value == 1) {
                            $('#prepayment').val($('#total').val());
                        }

                    }
                });

            $('#total_price, #additional, #prepayment').on('input', totalPriceCalculate);


            document.querySelectorAll('.tom-select-2').forEach(element => {
                new TomSelect(element, {
                    placeholder: "Select",
                    multiple:false,
                });
            });
            $('#calculate-btn').on('click', function (e) {
                e.preventDefault();
                let href = $('#calculate-btn').data('href');
                let aggreement = $('#agreement_type').val();
                let agreementDate = $('#agreement_date').val();
                //let ogreement = $('# agreement_type option: selected');
                let total = $('#total').val();
                let prepayment = $('#prepayment').val();
                //check if type is cash
                if(aggreement == 1) {
                    $('#prepayment').val(total);
                }

                if(href == null || href == undefined || href == "" ||
                    aggreement == null || aggreement == undefined || aggreement == "Select agreement" ||
                    total == null || total == undefined || total == "" ||
                    prepayment == null || prepayment == undefined || prepayment == ""
                ){
                    $('#basic-non-sticky-notification-toggle').click();
                }
                else {
                    var d = {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        aggrement: aggreement,
                        total: total,
                        prepayment: prepayment,
                        agreementDate: agreementDate
                    };
                    //console.log(d);
                    $.ajax({
                        url: href,
                        method: 'GET',
                        cache: false,
                        dataType: 'json',
                        data: d,
                        async: false,
                        success: function(result) {
                            if (result['result'] == 'success')
                                $('#calculation_container').html(result['data']);
                            // $('#temp-products').html(result['data']);
                        },
                        error: function(result) {
                            // console.log(result);
                            // location.reload(true);
                        }
                    });
                }
            });

            $('#add_product').on('click', function(e) {
                e.preventDefault();


                var currentValue = parseInt($('#product_count').val(), 10) || 0;
                $('#product_count').val(currentValue + 1);
                let discount = $('#agreement_discount').val()? $('#agreement_discount').val() : 0;
                // console.log(discount);
                // Get the number of current product items
                const productCount = currentValue + 1;
                let href = $('#add_product').data('href');
                var d = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_count: productCount,
                    // discount: discount
                };
                $.ajax({
                    url: href,
                    method: 'GET',
                    cache: false,
                    dataType: 'json',
                    data: d,
                    async: false,
                    success: function(result) {
                        if (result['result'] == 'success')
                            $('#product-container').append(result['data']);
                            // $('#temp-products').html(result['data']);
                        TomS(productCount);
                        $(document).on('input', `#price-${productCount}, [name="quantity-${productCount}"], [name="product-disc-${productCount}"]`, function() {
                            calculateTotalPrice(productCount);
                            addProductToInput(productCount);
                            totalPriceCalculate();
                        });
                        let remove_btn =  `#remove-btn-${productCount}`;
                        let save_btn =  `#save-btn-${productCount}`;
                        $(remove_btn).on('click', function(e) {
                            e.preventDefault();
                            removeBtn(productCount);
                            removeProductFromInput(productCount);
                            totalPriceCalculate();
                        });
                        $(save_btn).on('click', function(e) {
                            e.preventDefault();
                            saveBtn(productCount);
                        });
                    },
                    error: function(result) {
                        // console.log(result);
                        // location.reload(true);
                    }
                });

            });


            // Initialize Tom Select
            function TomS(product_count) {
                new TomSelect(`#product-${product_count}`, {
                    placeholder: "Select product",
                    onChange: function(value) {
                        // Set the price input based on the selected product
                        const priceInputSelector = `#price-${product_count}`;
                        const discountInputSelector = `#product-disc-${product_count}`;
                        let discount = $('#agreement_discount').val()? $('#agreement_discount').val() : 0;
                        if (value && productPrices[value] !== undefined) {
                            // console.log(productPrices[value]);
                            // console.log(priceInputSelector);
                            $(priceInputSelector).val(productPrices[value]);
                            $(discountInputSelector).val(discount);
                        } else {
                            $(priceInputSelector).val('');
                        }
                        calculateTotalPrice(product_count);
                        addProductToInput(product_count);
                        totalPriceCalculate();
                    }
                });
            }
            //remove btn
            function removeBtn(product_count) {
                const divElement = `#removable-div-${product_count}`;
                var deleteDiv = $(divElement);
                if (deleteDiv.length) {
                    deleteDiv.remove();
                } else {
                }
            }
            function saveBtn(product_count) {
                const divElement = `#product-div-${product_count}`;
                var readonly = $(divElement);
                if (readonly.length) {
                    readonly.addClass('read-only');
                } else {
                }

            }
            function  totalPriceCalculate(){


                // old
                let myInput = `#all_products`;
                let additional = `#additional`;
                let prepayment = `#prepayment`;
                let discount = `#agreement_discount`;
                let myProducts = $(myInput).val() ? JSON.parse($(myInput).val()): {};
                const totalSum = Object.values(myProducts).reduce((sum, item) => {
                    // console.log(item.total_price);
                    return sum + parseFloat(item.total_price);
                }, 0);
                if(totalSum>0) {
                    $('#total_price').val(totalSum);
                }
                // console.log(totalSum);

                let additionalPrice =parseFloat( $(additional).val()? $(additional).val(): 0);
                let discPercent = parseFloat($(discount).val());

                // console.log(additionalPrice);
                // let calculateTotal = (totalSum+additionalPrice) - (totalSum+additionalPrice)*discPercent/100;
                let calculateTotal = (totalSum+additionalPrice);
                $('#total').val(Math.ceil(calculateTotal));

            }

            function addProductToInput(product_count){
                let myInput = `#all_products`;
                let myProducts = $(myInput).val() ? JSON.parse($(myInput).val()): {};

                let selForm =  `#product-${product_count}`;
                let priceForm =  `#price-${product_count}`;
                let quantityForm =  `#quantity-${product_count}`;
                let discountForm =  `#product-disc-${product_count}`;
                let totalForm =  `#total_price-${product_count}`;
                let sel = $(selForm).val();
                let price = $(priceForm).val();
                let quantity = $(quantityForm).val();
                let discount = $(discountForm).val();
                let total = $(totalForm).val();
                let data = {'product' :sel, 'price':price, 'quantity':quantity, 'product_discount':discount , 'total_price':total };
                myProducts[product_count] = data;
                $(myInput).val(JSON.stringify(myProducts));


            }
            function removeProductFromInput(product_count) {
                let myInput = `#all_products`;
                let myProducts = $(myInput).val() ? JSON.parse($(myInput).val()): {};
                // console.log(myProducts);
                if(myProducts[product_count] != undefined )
                    delete myProducts[product_count];

                $(myInput).val(JSON.stringify(myProducts));
            }

            // Calculate total price on quantity or price change

            function calculateTotalPrice(productCount) {
                let priceInputSelector =  `#price-${productCount}`;
                let quantityInputSelector =  `#quantity-${productCount}`;
                let discountInputSelector =  `#product-disc-${productCount}`;
                let total_priceInputSelector =  `#total_price-${productCount}`;
                const price = parseFloat($(priceInputSelector).val()) || 0;
                const discount = parseFloat($(discountInputSelector).val()) || 0;

                const quantity = parseFloat($(quantityInputSelector).val()) || 0;

                const totalPrice = price * quantity - (price * quantity*discount)/100;
                $(total_priceInputSelector).val(totalPrice.toFixed(2));
            }
            function calculateAllProductsTotalPrice() {
                let myInput = `#all_products`;
                let myProducts = $(myInput).val() ? JSON.parse($(myInput).val()): {};
                // console.log(myProducts);
                let input = {};
                let data;
                Object.entries(myProducts).forEach(([key, value]) => {
                    // console.log(key);
                    // console.log(value);

                    let selForm =  `#product-${key}`;
                    let sel = $(selForm).val();

                    let priceInputSelector =  `#price-${key}`;
                    let quantityInputSelector =  `#quantity-${key}`;
                    let discountInputSelector =  `#product-disc-${key}`;
                    let total_priceInputSelector =  `#total_price-${key}`;
                    const price = parseFloat($(priceInputSelector).val()) || 0;
                    const discount = parseFloat($(discountInputSelector).val()) || 0;

                    const quantity = parseFloat($(quantityInputSelector).val()) || 0;

                    const totalPrice = price * quantity - (price * quantity*discount)/100;
                    $(total_priceInputSelector).val(totalPrice.toFixed(2));
                    // console.log(`Key: ${key}, Value: ${value}`);

                     data = {'product' :sel, 'price':price, 'quantity':quantity, 'product_discount':discount , 'total_price':$(total_priceInputSelector).val() };
                    input[key] = data;
                });
                $(myInput).val(JSON.stringify(input));

            }
        });
    </script>
@endsection

