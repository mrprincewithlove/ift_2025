<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="key" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.key')}}</label>

        <input id="key" type="text" class="form-control w-full" name="key" required
               value="{{old('key' , $translation->key)}}">
    </div>
    <div>
        <label for="file" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.file')}}</label>
        <select name="file" id="file" class="form-select w-full" required>
            @foreach($files as $file)
                <option value="{{ $file }}"  {{ $file == $translation->file? 'selected':'' }}> {{$file}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="grid grid-cols-3 gap-2 w-full">

    <div>
        <label for="value_tm" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.value_tm')}}</label>

        <input id="value_tm" type="text" class="form-control w-full" name="value_tm" required
               value="{{old('value_tm' , $translation->value_tm)}}">
    </div>
    <div>
        <label for="value_ru" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.value_ru')}}</label>

        <input id="value_ru" type="text" class="form-control w-full" name="value_ru"
               value="{{old('value_ru' , $translation->value_ru)}}">
    </div>
    <div>
        <label for="value_en" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.value_en')}}</label>

        <input id="value_en" type="text" class="form-control w-full" name="value_en"
               value="{{old('value_en' , $translation->value_en)}}">
    </div>

</div>









