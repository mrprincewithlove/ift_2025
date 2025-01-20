<div>
    <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

</div>
<div class="grid grid-cols-3 gap-2 w-full">
    <div class="mt-3">
        <label class="form-label w-full flex flex-row sm:flex-row-label required">{{__('user.name')}}</label>

        <input type="text" class="form-control w-full" name="name" required
               value="{{old('name' , $user->name)}}">
    </div>
    <div class="mt-3">
        <label class="form-label w-full flex flex-row sm:flex-row-label">{{__('user.surname')}}</label>

        <input type="text" class="form-control w-full" name="surname"
               value="{{old('surname' , $user->surname)}}">
    </div>
    <div class="mt-3">
        <label class="form-label w-full flex flex-row sm:flex-row-label">{{__('user.father_name')}}</label>

        <input type="text" class="form-control w-full" name="father_name"
               value="{{old('father_name' , $user->father_name)}}">
    </div>
    <div class="mt-3">
        <label class="form-label w-full flex flex-row sm:flex-row-label">{{__('user.email')}}</label>

        <input type="email" class="form-control w-full" name="email"
               value="{{old('email' , $user->email)}}">
    </div>
    <div class="mt-3">
        <label class="form-label w-full flex flex-row sm:flex-row-label required">{{__('user.mobile')}}</label>

        <input type="text" class="form-control w-full" name="mobile" required
               value="{{old('mobile' , $user->mobile)}}">
    </div>
    @if(!isset($user->id))
        <div class="w-full mt-3">
            <label class="form-label w-full flex flex-row sm:flex-row-label required">{{__('user.password')}}</label>
            <div class="input-group " id="show_hide_password">
                <input type="password" name="password" class="form-control" required>
                <div class="input-group-text">
                    <a class="" href="#"> <i data-lucide="eye" class="w-5 h-5"></i></a>
                </div>
            </div>
        </div>
    @else
        <div class="w-full mt-3">
            <label class="form-label w-full flex flex-row sm:flex-row-label required">{{__('user.password')}}</label>
            <div class="input-group " id="show_hide_password">
                <input type="password" name="password" class="form-control" value="********" disabled>
                <div class="">
                    {{--<a class=" form-control text-white" href="#" data-bs-toggle="modal"--}}
                    {{--data-bs-target="#modal-reset">{{ __('Reset Pass')}}</a>--}}
                    {{--<a class="" href="#"> <i data-lucide="eye"></i></a>--}}
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                       class="btn btn-danger whitespace-nowrap rounded-l-[0px]">{{ __('Reset Pass')}}</a>

                </div>
            </div>
        </div>
    @endif

</div>
<div class="flex  gap-2 w-full mt-3">

    <div class="w-1/3 mt-3">
        <label for="crud-form-1"
               class="form-label w-full flex flex-row sm:flex-row-label">{{__('user.image')}}</label>
        <img id="previewImage" class="w-full h-full text-gray-300 rounded-md"
             src="{{$user->image? asset($user->image) : asset('images/imageplaceholder.jpg') }}"
             alt="">

        <input type="file" id="image" name="image"
               style="display: none">
    </div>
    <div class="w-2/3  flex flex-col">

        <div class=" flex flex-row items-center gap-2 w-full ">
            <div class="w-full mt-3">
                <label class="form-label w-full flex flex-row sm:flex-row-label required">{{__('user.role')}}</label>

                <select class="tom-select w-full" data-placeholder="{{__('translates.Select')}}" name="role_id">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" {{((old('role_id') ?? $user->role_id) == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" flex flex-row items-center gap-2 w-full mt-3">
            <div class="w-1/2 mt-3">
                <label class="form-label w-full flex flex-row sm:flex-row-label">{{__('user.birth_date')}}</label>
                {{--<input type="text" class="datepicker form-control w-full block mx-auto" data-single-mode="true"--}}
                       {{--name="birth_date" value="{{old('birth_date' , $user->birth_date)}}">--}}
                <input type="date" class="form-control w-full" name="birth_date" value="{{old('birth_date' , $user->birth_date)}}">
            </div>


        </div>

        {{--<div class="w-full">--}}
            {{--<label class="form-label w-full flex flex-col sm:flex-row-label">{{__('user.address')}}--}}
                {{--<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 h-4"></span></label>--}}
            {{--<div class="input-group ">--}}
                    {{--<textarea name="address" id="address" class="w-full">--}}
                        {{--{{old('address' , $user->address)}}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
        {{--</div>--}}


    </div>
</div>

