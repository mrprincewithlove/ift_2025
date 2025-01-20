<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="w-full">
    <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('role.name')}}</label>

    <input id="crud-form-1" type="text" class="form-control w-full" name="name" value="{{old('name' , $role->name)}}" >
</div>
<div class="mt-6">
    <label>{{ __('translates.description')}}</label>
    <div class="mt-2" >
        <textarea name="description" class="editor"  rows="4">
            {!! old('description', $role->description) !!}
        </textarea>
    </div>
</div>

