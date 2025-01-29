<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_tm" type="text" class="form-control w-full" name="title_tm" required
               value="{{old('title_tm' , $number->title_tm)}}">
    </div>
    <div>
        <label for="title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_ru" type="text" class="form-control w-full" name="title_ru" required
               value="{{old('title_ru' , $number->title_ru)}}">
    </div>
    <div>
        <label for="title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_en" type="text" class="form-control w-full" name="title_en" required
               value="{{old('title_en' , $number->title_en)}}">
    </div>

</div>
<div class="grid grid-cols-2 gap-2 w-full mt-5">
    <div>
        <label for="number" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.number')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="number" type="number" min="1" step="1" class="form-control w-full" name="number" required
               value="{{old('number' , $number->number)}}">
    </div>

    <div>
        <label for="position" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.position')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="position" type="number" min="1" step="1" class="form-control w-full" name="position"
               value="{{old('position' , $number->position)}}">
    </div>
</div>
<div class="grid grid-cols-2 gap-2 w-full mt-5">

    <div class="w-full items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($number->icon ?  $number->icon : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image" name="icon" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
    <div class="mt-10 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$number->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>


</div>









