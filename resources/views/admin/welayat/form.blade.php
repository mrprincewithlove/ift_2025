<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_tm" required
               value="{{old('name_tm' , $welayat->name_tm)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_ru"
               value="{{old('name_ru' , $welayat->name_ru)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_en"
               value="{{old('name_en' , $welayat->name_en)}}">
    </div>
    <div class="mt-10 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$welayat->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>









