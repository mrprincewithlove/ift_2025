<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>

<div class="grid grid-cols-3 gap-2 w-full">
    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name" required
               value="{{old('name' , $service->name)}}">
    </div>

    <div>
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name_ru')}}</label>
        <select name="form" id="" class="form-select w-full">
            <option value="form1">Form1</option>
            <option value="form2">Form2</option>
        </select>
    </div>
</div>









