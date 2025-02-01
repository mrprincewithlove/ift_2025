<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_tm" type="text" class="form-control w-full" name="title_tm" required
               value="{{old('title_tm' , $mediaPage->title_tm)}}">
    </div>
    <div>
        <label for="title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_ru" type="text" class="form-control w-full" name="title_ru" required
               value="{{old('title_ru' , $mediaPage->title_ru)}}">
    </div>
    <div>
        <label for="title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_en" type="text" class="form-control w-full" name="title_en" required
               value="{{old('title_en' , $mediaPage->title_en)}}">
    </div>

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="main_breadcrumb_title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_tm" type="text" class="form-control w-full" name="main_breadcrumb_title_tm" required
               value="{{old('main_breadcrumb_title_tm' , $mediaPage->main_breadcrumb_title_tm)}}">
    </div>
    <div>
        <label for="main_breadcrumb_title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_ru" type="text" class="form-control w-full" name="main_breadcrumb_title_ru" required
               value="{{old('main_breadcrumb_title_ru' , $mediaPage->main_breadcrumb_title_ru)}}">
    </div>
    <div>
        <label for="main_breadcrumb_title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_en" type="text" class="form-control w-full" name="main_breadcrumb_title_en" required
               value="{{old('main_breadcrumb_title_en' , $mediaPage->main_breadcrumb_title_en)}}">
    </div>

</div>


<div class="grid grid-cols-2 gap-2 w-full mt-5">

    <div class="flex flex-col  w-full items-center justify-center">
        <label for="main_background_image" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_image')}}</label>
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="main_background_image_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($mediaPage->main_background_image ?  $mediaPage->main_background_image : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="main_background_image" name="main_background_image" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>

</div>


<div class="grid grid-cols-3 gap-2 w-full mt-5">
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_tm')}}</label>
        @if(isset($mediaPage->file_tm))
            <a href="{{ asset($mediaPage->file_tm) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_tm" type="file" class="form-control w-full" name="file_tm"
               value="{{old('file_tm' , $mediaPage->file_tm)}}">
    </div>
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_ru')}}</label>
        @if(isset($mediaPage->file_ru))
            <a href="{{ asset($mediaPage->file_ru) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_ru" type="file" class="form-control w-full" name="file_ru"
               value="{{old('file_ru' , $mediaPage->file_ru)}}">
    </div>
    <div class="flex flex-col items-center justify-center gap-3">
        <label for="file_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.file_en')}}</label>
        @if(isset($mediaPage->file_en))
            <a href="{{ asset($mediaPage->file_en) }}" target="_blank">{{ __('translates.show_file') }}</a>
        @endif
        <input id="file_en" type="file" class="form-control w-full" name="file_en"
               value="{{old('file_en' , $mediaPage->file_en)}}">
    </div>
</div>

<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea id="text_tm" name="text_tm" class="editor" rows="4">
            {!! old('text_tm', $mediaPage->text_tm) !!}
        </textarea>
    </div>
</div>

<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea id="text_ru" name="text_ru" class="editor" rows="4">
            {!! old('text_ru', $mediaPage->text_ru) !!}
        </textarea>
    </div>
</div>

<div class="grid grid-cols-1 gap-2 w-full mt-5">
    <div>
        <label for="text_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.text_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <textarea id="text_en" name="text_en" class="editor" rows="4">
            {!! old('text_en', $mediaPage->text_en) !!}
        </textarea>
    </div>
</div>








