<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="link" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.link')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="link" type="url" class="form-control w-full" name="link" required
               value="{{old('link' , $socialMedia->link)}}">
    </div>

    <div>
        <label for="position" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.position')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="position" type="number" min="1" step="1" class="form-control w-full" name="position"
               value="{{old('position' , $socialMedia->position)}}">
    </div>

    <div class="w-full items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($socialMedia->icon ?  $socialMedia->icon : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image" name="icon" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
    <div class="mt-10 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$socialMedia->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>


</div>









