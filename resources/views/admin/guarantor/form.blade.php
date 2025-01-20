<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name" required
               value="{{old('name' , $guarantor->name)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.surname')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="surname" required
               value="{{old('surname' , $guarantor->surname)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.father_name')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="father_name"
               value="{{old('father_name' , $guarantor->father_name)}}">
    </div>

</div>
<div class="mt-2">
    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.work_place')}}</label>

    <input id="crud-form-1" type="text" class="form-control w-full" name="work_place" required
           value="{{old('work_place' , $guarantor->work_place)}}">
</div>

<div class="mt-2">
    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.work_position')}}</label>

    <input id="crud-form-1" type="text" class="form-control w-full" name="work_position" required
           value="{{old('work_position' , $guarantor->work_position)}}">
</div>

<div class="grid grid-cols-2 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.mobile')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="mobile"
           value="{{old('mobile' , $guarantor->mobile)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.home_phone')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="home_phone"
               value="{{old('home_phone' , $guarantor->home_phone)}}">
    </div>
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.work_phone')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="work_phone"
               value="{{old('work_phone' , $guarantor->work_phone)}}">
    </div>
    <div class="mt-7 form-check form-switch">
        <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
               name="status" {{$guarantor->status? 'checked':''}}>
        <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.status') }}</label>
    </div>
</div>







