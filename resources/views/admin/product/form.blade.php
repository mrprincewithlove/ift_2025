<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="barcode"  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.barcode')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="barcode" type="text" class="form-control w-full" name="barcode"
                value="{{old('barcode', $product->barcode)}}">
    </div>
    <div>
        <label for="artikul"  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.articule')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

        <input id="artikul" type="text" class="form-control w-full" name="articule"
                value="{{old('articule', $product->articule)}}"> 
    </div>
</div>

<div class="grid grid-cols-2 gap-2 w-full">

    <div>
        <div>
            <label for="name"  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_name')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

            <input id="name" type="text" class="form-control w-full" name="name"
                   value="{{old('name', $product->name)}}">
        </div>
    </div>
    

    <div class="grid grid-cols-3 gap-2 w-full">
        <div>
            <label for="price"  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_price')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

            <input id="price" type="number" min="1" step="0.01" class="form-control w-full" name="price"
                   value="{{old('price', $product->price)}}">
        </div>


        <div>
            <label for="qua" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_quantity')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

            <input id="qua" type="number" min="1" step="1" class="form-control w-full" name="quantity"
                   value="{{old('quantity', $product->quantity)}}">
        </div>

        <div>
            <label for="total" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.total_price')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

            <input id="total" type="number" min="1" step="1" class="form-control w-full" name="total_price" disabled
                   value="0">
        </div>
        
    </div>
</div>

<div class="grid grid-cols-3 gap-2 w-full">
        <div>
            <label for="size"  class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_size')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

            <input id="size" type="text" class="form-control w-full" name="size"
                   value="{{old('size', $product->size)}}">
        </div>

        <div>
            <label for="color" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.product_color')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

            <input id="color" type="text" class="form-control w-full" name="color"
                   value="{{old('color', $product->color)}}">
        </div>

        <div>
            <label for="sex" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.total_sex')}}
                <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500"></span></label>

            <input id="sex" type="text" class="form-control w-full" name="sex" 
                   value="{{old('color', $product->sex)}}">
        </div>
        
    </div>








