<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_tm" type="text" class="form-control w-full" name="title_tm" required
               value="{{old('title_tm' , $label->title_tm)}}">
    </div>
    <div>
        <label for="title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_ru" type="text" class="form-control w-full" name="title_ru" required
               value="{{old('title_ru' , $label->title_ru)}}">
    </div>
    <div>
        <label for="title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_en" type="text" class="form-control w-full" name="title_en" required
               value="{{old('title_en' , $label->title_en)}}">
    </div>

</div>
<div class="grid grid-cols-2 gap-2 w-full mt-5">
    <div>
        <label for="color" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.color')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="color" type="text" class="form-control w-full" name="color" required
               value="{{old('color' , $label->color)}}">
    </div>
</div>









