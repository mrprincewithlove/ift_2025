<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_tm')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_tm" required
               value="{{old('name_tm' , $agreement_type->name_tm)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.name_ru')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_ru"
               value="{{old('name_ru' , $agreement_type->name_ru)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.name_en')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_en"
               value="{{old('name_en' , $agreement_type->name_en)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.period_month')}}</label>

        <input id="crud-form-1" type="number" class="form-control w-full" name="period_month" min="0" step="1" required
               value="{{old('period_month' , $agreement_type->period_month)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.discount_percent')}}</label>

        <input id="crud-form-1" type="number" class="form-control w-full" name="discount_percent" min="0" step="1" max="100" required
               value="{{old('discount_percent' , $agreement_type->discount_percent)}}">
    </div>
    <div class="mt-7 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$agreement_type->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>









