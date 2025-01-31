<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_tm" type="text" class="form-control w-full" name="title_tm" required
               value="{{old('title_tm' , $newsPage->title_tm)}}">
    </div>
    <div>
        <label for="title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_ru" type="text" class="form-control w-full" name="title_ru" required
               value="{{old('title_ru' , $newsPage->title_ru)}}">
    </div>
    <div>
        <label for="title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="title_en" type="text" class="form-control w-full" name="title_en" required
               value="{{old('title_en' , $newsPage->title_en)}}">
    </div>

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="main_breadcrumb_title_tm" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_tm')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_tm" type="text" class="form-control w-full" name="main_breadcrumb_title_tm" required
               value="{{old('main_breadcrumb_title_tm' , $newsPage->main_breadcrumb_title_tm)}}">
    </div>
    <div>
        <label for="main_breadcrumb_title_ru" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_ru')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_ru" type="text" class="form-control w-full" name="main_breadcrumb_title_ru" required
               value="{{old('main_breadcrumb_title_ru' , $newsPage->main_breadcrumb_title_ru)}}">
    </div>
    <div>
        <label for="main_breadcrumb_title_en" class="form-label w-full flex flex-col sm:flex-row-label">{{__('translates.main_breadcrumb_title_en')}}
            <span class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.required')}}</span></label>

        <input id="main_breadcrumb_title_en" type="text" class="form-control w-full" name="main_breadcrumb_title_en" required
               value="{{old('main_breadcrumb_title_en' , $newsPage->main_breadcrumb_title_en)}}">
    </div>

</div>

<div class="grid grid-cols-2 gap-2 w-full mt-5">

    <div class="w-full items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center  mt-3 overflow-hidden">
            <img id="image_img" class="inline-block w-18 h-12  text-gray-300 rounded-md border"
                 src="{{  asset($newsPage->main_background_image ?  $newsPage->main_background_image : 'images/imageplaceholder.jpg') }}"
                 alt="">
            <input type="file" id="image" name="main_background_image" onclick="Android.openFilePicker()"
                   style="display: none">
        </div>
    </div>



</div>









