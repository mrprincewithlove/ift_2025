<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="name_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="name_tm" type="text" class="form-control w-full" name="name_tm" required
               value="{{old('name_tm' , $meetingCompany->name_tm)}}">
    </div>
    <div>
        <label for="name_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="name_ru" type="text" class="form-control w-full" name="name_ru" required
               value="{{old('name_ru' , $meetingCompany->name_ru)}}">
    </div>
    <div>
        <label for="name_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.name_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="name_en" type="text" class="form-control w-full" name="name_en" required
               value="{{old('name_en' , $meetingCompany->name_en)}}">
    </div>

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div class="flex flex-col  w-full items-center justify-center">
        <label for="image_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.image_tm')}}</label>
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_tm_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($meetingCompany->image_tm ?  $meetingCompany->image_tm : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image_tm" name="image_tm" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
    <div class="flex flex-col  w-full items-center justify-center">
        <label for="image_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.image_ru')}}</label>
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_ru_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($meetingCompany->image_ru ?  $meetingCompany->image_ru : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image_ru" name="image_ru" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
    <div class="flex flex-col  w-full items-center justify-center">
        <label for="image_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.image_en')}}</label>
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_en_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($meetingCompany->image_en ?  $meetingCompany->image_en : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image_en" name="image_en" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="link" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.link')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="link" type="url" class="form-control w-full" name="link" required
               value="{{old('link' , $meetingCompany->link)}}">
    </div>
    <div>
        <label for="label_id" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.label')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>
        <select name="label_id" id="label_id" class="form-select w-full">
            @foreach($labels as $label)
                <option value="{{$label->id}}" {{$label->id == $meetingCompany->label_id ? 'selected': '' }} >{{ $label->{'title_'.app()->currentLocale()} }}</option>
            @endforeach
        </select>

    </div>
    <div>
        <label for="position" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.position')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="position" type="number" min="1" step="1" class="form-control w-full" name="position"
               value="{{old('position' , $meetingCompany->position)}}">
    </div>


    <div class="mt-10 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$meetingCompany->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>


</div>









