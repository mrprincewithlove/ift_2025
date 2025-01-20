<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_tm')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_tm" required
               value="{{old('name_tm' , $microdistrict->name_tm)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_ru')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_ru"
               value="{{old('name_ru' , $microdistrict->name_ru)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_en')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_en"
               value="{{old('name_en' , $microdistrict->name_en)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.city')}}</label>

        <select data-placeholder="Select city" class="tom-select w-full" name="city_id" required>
            @foreach($cities as $city)
                <option value="{{$city->id}}" {{ ($microdistrict->city_id == $city->id)? 'selected' : '' }}>{{ $city->{'name_'.app()->currentLocale()} }} ( {{ $city->welayat->{'name_'.app()->currentLocale()}  }} )</option>
            @endforeach
        </select>
    </div>

    <div class="mt-7 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$microdistrict->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>









