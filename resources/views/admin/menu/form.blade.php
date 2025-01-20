<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="flex  gap-2">
    <div class="w-full">
        <label for="name" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name')}}</label>

        <input id="name" type="text" class="form-control w-full" name="name" value="{{ old('name', $menu->name) }}" >
    </div>
</div>

<div class=" mt-2">
    <label>{{ __('translates.description')}}</label>
    <div class="mt-2" >
        <textarea name="description" class="editor" id="perm-descrp" rows="4">
            {!! old('description', $menu->description) !!}
        </textarea>
    </div>
</div>