<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_tm')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_tm" required
               value="{{old('name_tm' , $city->name_tm)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_ru')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_ru"
               value="{{old('name_ru' , $city->name_ru)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_en')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name_en"
               value="{{old('name_en' , $city->name_en)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.welayat')}}</label>

        <select data-placeholder="Select welayat" class="tom-select w-full" name="welayat_id" required>
            @foreach($welayats as $welayat)
                <option value="{{$welayat->id}}" {{ ($city->welayat_id == $welayat->id)? 'selected' : '' }}>{{ $welayat->{'name_'.app()->currentLocale()} }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-7 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$city->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>









