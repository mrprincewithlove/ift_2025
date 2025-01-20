<div id="removable-div-{{$product_count}}" class="flex flex-row">
    <div id="product-div-{{$product_count}}" class="flex flex-row gap-2 w-full">
        <div class="w-full">
            <div>
                <label for="crud-form-1" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product')}}
                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 h-4"> </span></label>

                <select id="product-{{$product_count}}" data-placeholder="Select product" class="tom-select w-full" name="products-{{$product_count}}" required>
                        <option>Select product</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}" >{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex flex-row gap-2 w-full items-end">
            <div>
                <label for=""  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_price')}}
                    <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

                <input id="price-{{$product_count}}" type="number" min="1" step="0.01" class="form-control w-full" name="price-{{$product_count}}"
                       value="0">
            </div>


            <div>
                <label for="" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_quantity')}}
                    <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

                <input id="quantity-{{$product_count}}" type="number" min="1" step="0.01" class="form-control w-full" name="quantity-{{$product_count}}"
                       value="1.00">
            </div>

            <div>
                <label for="" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.total_price')}}
                    <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

                <input id="total_price-{{$product_count}}" type="number" min="1" step="0.01" class="form-control w-full" name="total_price-{{$product_count}}"
                       value="0" readonly>
            </div>
            <div class="flex flex-col gap-2 w-1/2">

                <div class="flex flex-row  justify-end gap-2">
                    <a id="remove-btn-{{$product_count}}" class="btn btn-primary h-10 mr-1 whitespace-nowrap" data-id="{{$product_count}}">{{__('translates.remove')}}</a>
                    <a id="save-btn-{{$product_count}}" class="btn btn-primary  h-10 whitespace-nowrap" data-id="{{$product_count}}">{{__('translates.save')}}</a>
                </div>
            </div>

        </div>

    </div>
    
</div>