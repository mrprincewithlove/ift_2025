<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="flex  gap-2">
    <div class="w-2/3">
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('permission.group')}}</label>

        <div class="flex flex-row">
            <select name="group" id="group_id" data-placeholder="{{__('common.select')}}" class="w-full p-2"
                    required>
                @if($groups)
                    @foreach ($groups as $group)
                        <option value="{{ $group}}" {{ ((old('group') ?? $permission->group) == $group) ? 'selected' : '' }}> {{ $group}} </option>
                    @endforeach
                @endif
            </select>

            <div class="text-center"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#basic-modal-preview"
                                        class="btn btn-primary text-white"><i data-lucide="plus-circle"
                                                                              class="w-6 h-6"></i></a></div>

            <div id="basic-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">{{__('permission.new_group')}}</h2>

                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12 sm:col-span-12">
                                <label for="new_group_id"  class="form-label">{{__('permission.group')}}</label>
                                <input id="new_group_id" type="text"  class="form-control"></div>

                        </div> <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" id="modal_close_id" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                                {{__('common.close')}}
                            </button>
                            <a  id="modal_save_btn_id" type="button" class="btn btn-primary w-20">{{__('permission.add')}}</a>
                        </div> <!-- END: Modal Footer -->
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="w-full">
        <label for="crud-form-1" class="form-label w-full flex flex-row sm:flex-row-label required">{{__('permission.name')}}</label>

        <input id="crud-form-1" type="text" class="form-control w-full" name="name" value="{{ old('name', $permission->name) }}" >
    </div>
</div>

<div class=" mt-2">
    <label>{{ __('permission.description')}}</label>
    <div class="mt-2" >
        <textarea name="description" class="editor" id="perm-descrp" rows="4">
            {!! old('description', $permission->description) !!}
        </textarea>
    </div>
</div>