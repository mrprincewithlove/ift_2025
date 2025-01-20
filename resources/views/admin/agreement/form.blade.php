<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12 flex flex-col gap-5">
        <!-- BEGIN: Form Layout -->

        <div class="intro-y box p-5">


            <div>
                <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

            </div>

            <div class="grid grid-cols-3 gap-2 w-full">
                <div>
                    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.agreement_no')}}</label>

                    <input id="crud-form-1" type="text" class="form-control w-full" name="agreement_no"
                           value="{{old('agreement_no' , $agreement->agreement_no)}}">
                </div>

                <div>
					<label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.date')}}</label>

					<input id="agreement_date" type="date" class="form-control w-full" name="date"
						value="{{old('date', $agreement->date)}}">
				</div>

                <div>
                    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.doc_number')}}</label>

                    <input id="crud-form-1" type="text" class="form-control w-full" name="doc_number"
                           value="{{old('doc_number' , $agreement->doc_number)}}">
                </div>

            </div>
            <div class="grid grid-cols-1 mt-5 gap-2 w-full">
                <div>
                    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.description')}}</label>

                    <textarea id="crud-form-1" class="form-control w-full" cols="10" rows="4" name="description">
                        {{old('description' , $agreement->description)}}
                    </textarea>
                </div>

            </div>
        </div>
        <div class="intro-y box p-5">
                <button  class="btn btn-primary w-24 mr-1 whitespace-nowrap" data-href="{{route('product-temp')}}" id="add_product">{{__('translates.add_product')}}</button>
            <input id="product_count" type="number" name="product_count" value="0" readonly class="hidden">
            <input id="all_products" type="text" name="all_products"  readonly class="hidden">
            <div id="product-container" class="product-item  grid grid-cols-1 gap-2 w-full mt-4">
            </div>
        </div>
        <div   class="intro-y box p-5">
            <div class="grid grid-cols-2 gap-2 w-full">
                <div>
                    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.client')}}</label>

                    <select data-placeholder="Select client" class="tom-select-2 w-full" name="client_id" required>
                        @foreach($clients as $client_one)
                            <option value="{{$client_one->id}}" {{ ($client->id == $client_one->id) || ($agreement->client_id == $client_one->id)? 'selected' : '' }}>{{ $client_one->getFullName() }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                </div>

                <div class="mt-3">
                    <label for="agreement_type" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.agreement_type')}}</label>

                    <select id="agreement_type" data-placeholder="Select agreement" class=" w-full" name="agreement_type_id" required>
                        <option>{{__('translates.select')}}</option>
                        @foreach($agreement_types as $agreement_type)
                            <option value="{{$agreement_type->id}}" {{ ($agreement->agreement_type_id == $agreement_type->id)? 'selected' : '' }}>{{ $agreement_type->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <label for="agreement_discount" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.agreement_discount')}}</label>

                    <input id="agreement_discount" type="number" min="0" step="1" max="100" class="form-control w-full" name="agreement_discount"
                           value="0" readonly>
                </div>



            </div>
        </div>
        <div   class="intro-y box p-5">

            <div class="grid grid-cols-2 gap-2 w-full">
                <div class="hidden">
                    <label for="total_price" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.product_prices')}}</label>

                    <input id="total_price" type="number" min="1" step="0.01" class="form-control w-full" name="product_prices" readonly
                           value="0">
                </div>
                <div class="mt-3">
                    <label for="total" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.agreement_price')}}</label>

                    <input id="total" type="number" min="1" step="1" class="form-control w-full" name="agreement_price"
                           value="{{old('agreement_price' , $agreement->agreement_price)}}">
                </div>
                <div class="mt-3">
                    <label for="prepayment" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.prepayment')}}</label>

                    <input id="prepayment" type="number" min="0" step="1" class="form-control w-full" name="prepayment"
                           value="0">
                </div>
                <div class="mt-3">
                </div>
                <div class="mt-3">
                    <label for="additional" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.additional')}}</label>

                    <input id="additional" type="number" min="0" step="1" class="form-control w-full" name="additional_price"
                           value="0">
                </div>
                
                

            </div>
            <div class="grid grid-cols-1 mt-5 gap-2 w-full">
                <a  class="btn btn-primary w-24 mr-1 whitespace-nowrap" data-href="{{route('agreement_calculation')}}" id="calculate-btn">{{__('translates.calculate')}}</a>
                <div id= "calculation_container" class="calculation  grid grid-cols-1 gap-2 w-full">
                </div>
            </div>
        </div>

        <div   class="intro-y box p-5">
        </div>

        <div class="intro-y box p-5">
            <div class="text-right">


                <a href="{{ Session::get('prev-url') ?? URL::previous() }}" class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
            </div>
        </div>

        <!-- END: Form Layout -->
    </div>
</div>