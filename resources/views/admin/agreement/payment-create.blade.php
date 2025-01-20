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
            <form action="{{route('agreement.payments.store', ['agreement'=>$agreement])}}" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf

                <div>
                    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

                </div>
                <div class="grid grid-cols-3 gap-2 w-full">
                    <div></div>
                    <div>
                        <label for="crud-form-1" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.date')}}
                            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

                        <input id="crud-form-1" type="date" class="form-control w-full" name="date"
                               value="{{old('date', $date)}}">
                    </div>
                    <div class="mt-3">
                        <label for="check_number_id" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.check_number')}}</label>

                        <input id="check_number_id" type="text" class="form-control w-full" name="check_number"
                               value="{{old('check_number')}}">
                    </div>


                </div>
                <div class="grid grid-cols-3 gap-2 w-full">
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.agreement_no')}}</label>

                        <input id="crud-form-1" type="text" class="form-control w-full" name="agreement_no" disabled 
                            value="{{$agreement->agreement_no}}">
                    </div>

                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.client')}}</label>

                        <input id="crud-form-1" type="text" class="form-control w-full" name="client" disabled
                            value="{{ $client->surname . ' ' . $client->name . ' ' . $client->father_name }}">
                    </div>

                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.price_to_pay')}}</label>

                        <input id="crud-form-1" type="text" class="form-control w-full" name="price_to_pay" disabled 
                            value="{{$agreement->price_to_pay . 'tmt'}}">
                    </div>
                    
                </div>

                <div class="grid grid-cols-3 gap-2 w-full">
                    <div class="mt-3">
                        <label for="cash_price" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.cash_payments')}}</label>

                        <input id="cash_price" type="number" min="0" class="form-control w-full" name="cash_price"
                               value="{{old('cash_price')}}">
                    </div>
                    <div class="mt-3">
                        <label for="terminal_price" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.terminal_payments')}}</label>

                        <input id="terminal_price" type="number" min="0" class="form-control w-full" name="terminal_price"
                               value="{{old('terminal_price')}}">
                    </div>
                    <div class="mt-3">
                        <label for="totalPrice" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.total_price')}}</label>

                        <input id="totalPrice" type="number" min="1" class="form-control w-full" name="price" readonly
                               value="{{old('price')}}">
                    </div>
                </div>
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
            function calculateTotalPrice() {
                var cashPrice = parseFloat($('#cash_price').val()) || 0;
                var terminalPrice = parseFloat($('#terminal_price').val()) || 0;
                var totalPrice = cashPrice + terminalPrice;
                $('#totalPrice').val(totalPrice);
            }

            $('#cash_price, #terminal_price').on('input', function(){
                calculateTotalPrice();
            } );
        });
    </script>
@endsection