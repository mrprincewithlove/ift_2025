<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_tm" type="text" class="form-control w-full" name="title_tm" required
               value="{{old('title_tm' , $meeting_page_item->title_tm)}}">
    </div>
    <div>
        <label for="title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_ru" type="text" class="form-control w-full" name="title_ru" required
               value="{{old('title_ru' , $meeting_page_item->title_ru)}}">
    </div>
    <div>
        <label for="title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_en" type="text" class="form-control w-full" name="title_en" required
               value="{{old('title_en' , $meeting_page_item->title_en)}}">
    </div>

</div>

<div class="grid grid-cols-3 gap-2 w-full mt-5">
    <div>
        <label for="position" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.position')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="position" type="number" min="1" step="1" class="form-control w-full" name="position"
               value="{{old('position' , $meeting_page_item->position)}}">
    </div>

    <div class="w-full items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($meeting_page_item->image ?  $meeting_page_item->image : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image" name="image" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>
    <div class="mt-10 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$meeting_page_item->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>


<div class="grid grid-cols-3 gap-2 w-full mt-5">
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_tm')}}</label>
        @if(isset($meeting_page_item->file_tm))
            <a href="{{ asset($meeting_page_item->file_tm) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_tm" type="file" class="form-control w-full" name="file_tm"
               value="{{old('file_tm' , $meeting_page_item->file_tm)}}">
    </div>
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_ru')}}</label>
        @if(isset($meeting_page_item->file_ru))
            <a href="{{ asset($meeting_page_item->file_ru) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_ru" type="file" class="form-control w-full" name="file_ru"
               value="{{old('file_ru' , $meeting_page_item->file_ru)}}">
    </div>
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_en')}}</label>
        @if(isset($meeting_page_item->file_en))
            <a href="{{ asset($meeting_page_item->file_en) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_en" type="file" class="form-control w-full" name="file_en"
               value="{{old('file_en' , $meeting_page_item->file_en)}}">
    </div>


</div>
<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea name="text_tm" class="editor" rows="4">
            {!! old('text_tm', $meeting_page_item->text_tm) !!}
        </textarea>
    </div>
</div>

<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea name="text_ru" class="editor" rows="4">
            {!! old('text_ru', $meeting_page_item->text_ru) !!}
        </textarea>
    </div>
</div>

<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea name="text_en" class="editor" rows="4">
            {!! old('text_en', $meeting_page_item->text_en) !!}
        </textarea>
    </div>
</div>








