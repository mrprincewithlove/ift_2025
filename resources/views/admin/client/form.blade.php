<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12 flex flex-col gap-5">
        <!-- BEGIN: Form Layout -->

        <div class="intro-y box p-5">


            <div>
                <input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">

            </div>
            <div class="grid grid-cols-4 gap-2 w-full">
                <div>
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.name')}}</label>

                    <input id="" type="text" class="form-control w-full" name="name" required
                           value="{{old('name' , $client->name)}}">
                </div>

                <div>
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.surname')}}</label>

                    <input id="" type="text" class="form-control w-full" name="surname"
                           value="{{old('surname' , $client->surname)}}">
                </div>
                <div>
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.father_name')}}</label>

                    <input id="" type="text" class="form-control w-full" name="father_name"
                           value="{{old('father_name' , $client->father_name)}}">
                </div>
                <div>
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.birthday')}}</label>
                    <input type="text" class="datepicker form-control w-full block mx-auto" data-single-mode="true"
                           name="birth_date"
                           value="{{old('birth_date' , $client->birth_date)}}">

                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.pasport_number')}} {{$client->getPassportSeriaOnly()}}</label>
                    <div class="flex flex-row gap-1">
                        <div class="form-control w-2/5">
                            <select name="passport_seria" class="tom-select w-full" required>
                                @foreach($client->getPassportSeriaOptions() as $passport_seria)
                                    <option value="{{$passport_seria}}" {{(old('passport_seria', $passport_seria) == $client->getPassportSeriaOnly()) ? 'selected' : ''}}>{{$passport_seria}}</option>
                                @endforeach
                            </select>
                            {{-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('tr.Select...')}}</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                            </div> --}}
                        </div>
                        <input type="number" name="passport_digit" class="form-control w-full"
                               value="{{old('passport_digit', $client->getPassportDigitOnly())}}" placeholder="121212">
                    </div>


                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.welayat')}}</label>

                    <select data-placeholder="Select welayat" class="tom-select w-full" name="p_welayat_id" required>
                        @foreach($welayats as $welayat)
                            <option value="{{$welayat->id}}" {{ ($client->p_welayat_id == $welayat->id)? 'selected' : '' }}>{{ $welayat->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.city')}}</label>

                    <select data-placeholder="Select city" class="tom-select w-full" name="p_city_id" required>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" {{ ($client->p_city_id == $city->id)? 'selected' : '' }}>{{ $city->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.microdistrict')}}</label>

                    <select data-placeholder="Select microdistrict" class="tom-select w-full" name="p_microdistrict_id"
                            required>
                        <option>Select microdistrict</option>
                        @foreach($microdistricts as $microdistrict)
                            <option value="{{$microdistrict->id}}" {{ ($client->p_microdistrict_id == $microdistrict->id)? 'selected' : '' }}>{{ $microdistrict->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="grid grid-cols-2 gap-2 w-full">

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.passport_given_by')}}</label>

                    <input id="" type="text" class="form-control w-full" name="pasport_given_by"
                           value="{{old('pasport_given_by' , $client->pasport_given_by)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.passport_given')}}</label>
                    <input type="text" class="datepicker form-control w-full block mx-auto" data-single-mode="true"
                           name="pasport_given_at"
                           value="{{old('pasport_given_at' , $client->pasport_given_at)}}">

                </div>
            </div>
            <div class="grid grid-cols-4 gap-2 w-full">

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.p_street')}}</label>

                    <input id="" type="text" class="form-control w-full" name="p_street"
                           value="{{old('p_street' , $client->p_street)}}">
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.p_corpus')}}</label>

                    <input id="" type="text" class="form-control w-full" name="p_corpus"
                           value="{{old('p_corpus' , $client->p_corpus)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.p_apartment')}}</label>

                    <input id="" type="text" class="form-control w-full" name="p_apartment"
                           value="{{old('p_apartment' , $client->p_apartment)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.p_door')}}</label>

                    <input id="" type="text" class="form-control w-full" name="p_door"
                           value="{{old('p_door' , $client->p_door)}}">
                </div>

            </div>
        </div>

        <div class="intro-y box p-5">
            <div class="form-check mb-3"><input id="another_address" class="form-check-input" name="living_another_address" type="checkbox" value="on" {{$client->living_another_address? 'checked' : ''}}>
                <label class="form-check-label" for="another_address">{{__('translates.another_address')}}</label></div>
            <div id="address_container" class="intro-y mb-3 border-b pb-6 {{$client->living_another_address ? '': 'hidden'}} ">
                <div class="grid grid-cols-3 gap-2 w-full">

                    <div>
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label ">{{__('translates.welayat')}}</label>

                        <select data-placeholder="Select welayat" class="tom-select w-full" name="ad_welayat_id"
                                required>
                            <option value="0">Select</option>
                            @foreach($welayats as $welayat)
                                <option value="{{$welayat->id}}" {{ ($client->ad_welayat_id == $welayat->id)? 'selected' : '' }}>{{ $welayat->{'name_'.app()->currentLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label ">{{__('translates.city')}}</label>

                        <select data-placeholder="Select city" class="tom-select w-full" name="ad_city_id" required>
                            <option value="0">Select</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" {{ ($client->ad_city_id == $city->id)? 'selected' : '' }}>{{ $city->{'name_'.app()->currentLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.microdistrict')}}</label>

                        <select data-placeholder="Select microdistrict" class="tom-select w-full"
                                name="ad_microdistrict_id" required>
                            <option>Select microdistrict</option>
                            @foreach($microdistricts as $microdistrict)
                                <option value="{{$microdistrict->id}}" {{ ($client->ad_microdistrict_id == $microdistrict->id)? 'selected' : '' }}>{{ $microdistrict->{'name_'.app()->currentLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="grid grid-cols-4 gap-2 w-full">

                    <div class="mt-3">
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.ad_street')}}</label>

                        <input id="" type="text" class="form-control w-full" name="ad_street"
                               value="{{old('ad_street' , $client->ad_street)}}">
                    </div>
                    <div class="mt-3">
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.ad_corpus')}}</label>

                        <input id="" type="text" class="form-control w-full" name="ad_corpus"
                               value="{{old('ad_corpus' , $client->ad_corpus)}}">
                    </div>

                    <div class="mt-3">
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.ad_apartment')}}</label>

                        <input id="" type="text" class="form-control w-full" name="ad_apartment"
                               value="{{old('ad_apartment' , $client->ad_apartment)}}">
                    </div>

                    <div class="mt-3">
                        <label for=""
                               class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.ad_door')}}</label>

                        <input id="" type="text" class="form-control w-full" name="ad_door"
                               value="{{old('ad_door' , $client->ad_door)}}">
                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 gap-2 w-1/2">
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.mobile')}}</label>

                    <input id="" type="text" class="form-control w-full" name="mobile" required
                           value="{{old('mobile' , $client->mobile)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.phone')}}</label>

                    <input id="" type="text" class="form-control w-full" name="mobile2"
                           value="{{old('mobile2' , $client->mobile2)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.phone')}}</label>

                    <input id="" type="text" class="form-control w-full" name="home_phone"
                           value="{{old('home_phone' , $client->home_phone)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.phone')}}</label>

                    <input id="" type="text" class="form-control w-full" name="work_phone"
                           value="{{old('work_phone' , $client->work_phone)}}">
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.phone')}}</label>

                    <input id="" type="text" class="form-control w-full" name="tel1"
                           value="{{old('tel1' , $client->tel1)}}">
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.phone')}}</label>

                    <input id="" type="text" class="form-control w-full" name="tel2"
                           value="{{old('tel2' , $client->tel2)}}">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 w-full">
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.work_place')}}</label>

                    <input id="" type="text" class="form-control w-full" name="work_place"
                           value="{{old('work_place' , $client->work_place)}}">
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.work_position')}}</label>

                    <input id="" type="text" class="form-control w-full" name="work_position"
                           value="{{old('work_position' , $client->work_position)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.salary')}}</label>

                    <input id="" type="number" class="form-control w-full" name="salary"
                           value="{{old('salary' , $client->salary)}}">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 w-full">
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.status')}}</label>

                    <select data-placeholder="Select status" class="tom-select w-full" name="status_id" required>
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}" {{ ($client->status_id == $status->id)? 'selected' : '' }}>{{ $status->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label required">{{__('translates.category')}}</label>

                    <select data-placeholder="Select category" class="tom-select w-full" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ ($client->category_id == $category->id)? 'selected' : '' }}>{{ $category->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.referer')}}</label>

                    <select data-placeholder="Select referer" class="tom-select w-full" name="referer_id">
                        <option value="0">{{__('translates.select')}}</option>
                        @foreach($clients as $one_client)
                            <option value="{{$one_client->id}}" {{ ($client->referer_id == $one_client->id)? 'selected' : '' }}>{{ $one_client->getFullName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.limit')}}</label>
                    <input id="" type="number" class="form-control w-full" name="limit"
                           value="{{old('limit' , $client->limit)}}">
                </div>

                <div class="mt-3">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.barcode')}}</label>

                    <input id="" type="text" class="form-control w-full" name="barcode"
                           value="{{old('barcode' , $client->barcode)}}">
                </div>

                <div class="mt-7 form-check form-switch">
                    <input id="checkbox-switch-7" class="form-check-input" type="checkbox"
                           name="can_be_referall" {{$client->can_be_referall? 'checked':''}}>
                    <label class="form-check-label"
                           for="checkbox-switch-7">{{ __('translates.can_be_referer') }}</label>
                </div>

            </div>
            <div class="grid grid-cols-3 gap-2 w-full">
                <div class="mt-3 col-span-2">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.description')}}</label>

                    <input id="" type="text" class="form-control w-full" name="description"
                           value="{{old('description' , $client->description)}}">
                </div>
                <div class="mt-3 col-span-1">
                    <label for=""
                           class="form-label w-full flex flex-row sm:flex-row-label">{{__('translates.bonus_card')}}</label>

                    <input id="" type="text" class="form-control w-full" name="bonus_card"
                           value="{{old('bonus_card' , $client->bonus_card)}}">
                </div>
            </div>
        </div>
        <div class="intro-y box p-5">
            <div class="text-right">


                <a href="{{ Session::get('prev-url') ?? URL::previous() }}"
                   class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
                <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
            </div>
        </div>

        <!-- END: Form Layout -->
    </div>
</div>
