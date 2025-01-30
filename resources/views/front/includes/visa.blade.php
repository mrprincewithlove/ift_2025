@extends('front.includes.base')

@push('styleCSS')
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }} " />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@endpush
@section('content')
    <main>
        <section class="relative">
            <div class="h-[50vh] w-full">
                <img src="/assets/images/hero.jpg" alt="" class="w-full h-full object-cover"/>
            </div>

            <div class="absolute top-0 left-0 w-full h-[50vh] bg-black bg-opacity-30 flex items-end justify-center">
                <div class="container">
                    <div class="w-full px-5 md:px-10 py-10 flex flex-col items-center justify-end gap-5 mt-10">
                        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl text-center max-w-5xl font-semibold">
                            {{ __('ift.visa-register') }}
                        </h1>
                        <div class="flex items-center justify-center gap-2 flex-wrap">
                            <a href="{{ route('front.index') }}" class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all">
                                {{ __('ift.home') }}
                            </a>
                            <span class="text-white text-xl md:text-2xl text-center max-w-5xl">|</span>
                            <h4 class="text-white text-xl md:text-2xl text-center max-w-5xl">
                                {{ __('ift.visa-register') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 grid grid-cols-5 gap-5 md:gap-10 items-start"
                >
                    <div class="col-span-5 md:col-span-2 border-[10px] border-white customShadow rounded-xl overflow-hidden text-primary">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="currentColor"
                                version="1.1"
                                id="Layer_1"
                                class="w-full h-full"
                                viewBox="0 0 236 256"
                                enable-background="new 0 0 236 256"
                                xml:space="preserve"
                        >
                <path
                        d="M81,113H61V81c0-15.587,12.413-29,28-29h57c15.486,0,28,13.514,28,29v32h-20V86c0-1.71-1.291-3-3-3s-3,1.29-3,3v27H87V86  c0-1.71-1.291-3-3-3s-3,1.29-3,3V113z M139.394,182.959c0,11.157-9.043,20.2-20.239,20.239c-11.196,0-20.239-9.082-20.239-20.239  c0-11.196,9.082-20.239,20.239-20.239C130.351,162.72,139.394,171.802,139.394,182.959z M105.962,172.82h4.189  c0.665-1.997,1.527-3.758,2.545-5.207C110.033,168.748,107.685,170.549,105.962,172.82z M102.556,181.667h6.107  c0.078-2.192,0.352-4.306,0.783-6.224h-5.128C103.339,177.322,102.752,179.436,102.556,181.667z M109.446,190.436  c-0.431-1.879-0.705-3.954-0.783-6.146h-6.107c0.157,2.192,0.783,4.267,1.722,6.146H109.446z M112.813,198.383  c-1.057-1.448-1.957-3.249-2.623-5.324h-4.267C107.685,195.369,110.073,197.248,112.813,198.383z M117.863,193.098h-4.933  c1.214,3.21,2.936,5.559,4.933,6.303V193.098z M117.863,184.29h-6.577c0.078,2.192,0.352,4.267,0.822,6.146h5.755V184.29z   M117.863,175.443h-5.755c-0.47,1.918-0.744,4.032-0.861,6.224h6.616V175.443z M117.863,166.517  c-1.997,0.744-3.719,3.053-4.933,6.303h4.933V166.517z M125.653,167.652c1.018,1.448,1.879,3.21,2.545,5.207h4.189  C130.625,170.588,128.315,168.788,125.653,167.652z M120.486,172.82h4.972c-1.214-3.249-2.975-5.559-4.972-6.303V172.82z   M120.486,181.667h6.616c-0.117-2.192-0.392-4.306-0.861-6.224h-5.755V181.667z M120.486,190.436h5.755  c0.47-1.879,0.744-3.954,0.861-6.146h-6.616V190.436z M125.458,193.098h-4.972v6.303  C122.482,198.696,124.244,196.347,125.458,193.098z M132.465,193.059h-4.228c-0.705,2.075-1.605,3.876-2.662,5.324  C128.315,197.248,130.664,195.408,132.465,193.059z M135.792,184.29h-6.107c-0.078,2.192-0.352,4.267-0.783,6.146h5.167  C135.01,188.557,135.597,186.482,135.792,184.29z M134.031,175.443h-5.128c0.47,1.918,0.705,4.032,0.783,6.224h6.107  C135.636,179.436,135.01,177.322,134.031,175.443z M98.955,221.989h40.439v-8.064H98.955V221.989z M234,118v27h-24v109H25V145H2v-27  H234z M152.234,148.509h-6.655v-9.278l-61.813,7.399V238h68.469V148.509z M140.842,148.509v-3.954l-32.884,3.954H140.842z   M117.497,47.251c12.369,0,22.626-10.156,22.626-22.626C140.123,12.156,129.967,2,117.497,2c-12.469,0-22.626,10.156-22.626,22.626  C94.872,37.095,104.927,47.251,117.497,47.251z"
                />
              </svg>
                        <!-- <img src="/assets/images/image2.jpg" alt="" class="w-full" /> -->
                    </div>
                    <div class="w-full col-span-5 md:col-span-3 flex flex-col gap-2">
                        <h4 class="text-headerColor text-xl md:text-2xl font-semibold">
                            {{ __('ift.visa-header-1') }}
                        </h4>
                        <p class="text-textColor text-base md:text-lg">
                            {{ __('ift.visa-text-1') }}
                        </p>
                        <ul class="text-textColor text-base md:text-lg list-decimal">
                            <h4 class="text-headerColor text-xl md:text-2xl font-semibold mb-2">
                                {{ __('ift.visa-header-2') }}
                            </h4>
                            <li class="ml-5">
                                <a href="{{ route('front.register') }}" class="text-primary active:text-secondary md:hover:text-secondary transition-all">
                                    {{ __('ift.visa-registration') }}
                                </a>
                                {{ __('ift.visa-text-2') }}
                            </li>
                            <li class="ml-5">{{ __('ift.visa-text-3') }}</li>
                        </ul>
                        <ul class="text-textColor text-base md:text-lg list-disc">
                            <h4 class="text-headerColor text-xl md:text-2xl font-semibold mb-2">
                                {{ __('ift.visa-header-3') }}
                            </h4>
                            <li class="ml-5">{{ __('ift.visa-text-4') }}</li>
                            <li class="ml-5">{{ __('ift.visa-text-5') }}</li>
                        </ul>
                        <p class="text-textColor text-base md:text-lg">
                            {{ __('ift.visa-text-6') }}
                        </p>

                        <p class="text-textColor text-base md:text-lg">
                            {{ __('ift.visa-text-7') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
                        <div class="flex flex-col items-center md:items-start justify-start gap-2 text-center md:text-start">
                            <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold">
                                {{ __('ift.visa-form') }}
                            </h1>
                            <ul class="text-textColor text-base md:text-lg font-semibold list-disc">
                                <h4 class="text-headerColor text-xl md:text-2xl font-semibold mb-2">
                                    {{ __('ift.visa-header-4') }}
                                </h4>
                                <li class="ml-5">{{ __('ift.visa-text-8') }}</li>
                                <li class="ml-5">{{ __('ift.visa-text-9') }}</li>
                            </ul>
                        </div>
                        <form action="{{ route('front.visa.send') }}" method="POST" enctype="multipart/form-data" class="w-full grid grid-cols-2 gap-5">
                            @csrf
                            <div class="col-span-2 sm:col-span-1 flex flex-col">
                                <label for="name" class="required w-fit {{ $errors->has('name') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.first-name') }}
                                </label>
                                <input type="text" name="name" id="name" class="border-2 {{ $errors->has('name') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('name') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="surname" class="required w-fit {{ $errors->has('surname') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.last-name') }}
                                </label>
                                <input type="text" name="surname" id="surname" class="border-2 {{ $errors->has('surname') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('surname') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="middle_name" class="w-fit {{ $errors->has('middle_name') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.middle-name') }}
                                </label>
                                <input type="text" name="middle_name" id="middle_name" class="border-2 {{ $errors->has('middle_name') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('middle_name') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="company_name" class="required w-fit {{ $errors->has('company_name') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.organization') }}
                                </label>
                                <input type="text" name="company_name" id="company_name" class="border-2 {{ $errors->has('company_name') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('company_name') }}" required
                                />
                            </div>

                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="job" class="required w-fit {{ $errors->has('job') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.position') }}
                                </label>
                                <input type="text" name="job" id="job" class="border-2 {{ $errors->has('job') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('job') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="email" class="required w-fit {{ $errors->has('email') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.email') }}
                                </label>
                                <input type="text" name="email" id="email" class="border-2 {{ $errors->has('email') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('email') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="birth_date" class="required w-fit {{ $errors->has('birth_date') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.date-of-birth') }}
                                </label>
                                <input type="date" name="birth_date" id="birth_date" class="w-full bg-white border-2 {{ $errors->has('birth_date') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('birth_date') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="country" class="required w-fit {{ $errors->has('country') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.citizenship') }}
                                </label>

                                <select name="country" id="country" required class="js-example-basic-single w-full border-2 {{ $errors->has('country') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
                                    <option value="">{{ __('ift.choose-one') }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country['id']}}" {{ old('country') == $country['id']? 'selected': '' }}>{{ $country['name_'.app()->currentLocale()] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="address" class="required w-fit {{ $errors->has('address') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.address') }}
                                </label>
                                <input type="text" name="address" id="address" class="border-2 {{ $errors->has('address') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('address') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="passport" class="required w-fit {{ $errors->has('passport') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.passport-number') }}
                                </label>
                                <input type="text" name="passport" id="passport" class="border-2 {{ $errors->has('passport') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('passport') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="date_issue" class="required w-fit {{ $errors->has('date_issue') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.date-of-issue') }}
                                </label>
                                <input type="date" name="date_issue" id="date_issue" class="w-full bg-white border-2 {{ $errors->has('date_issue') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('date_issue') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="date_expiry" class="required w-fit {{ $errors->has('date_expiry') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.date-of-expiry') }}
                                </label>
                                <input type="date" name="date_expiry" id="date_expiry" class="w-full bg-white border-2 {{ $errors->has('date_expiry') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('date_expiry') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="education" class="required w-fit {{ $errors->has('education') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.education') }}
                                </label>
                                <input type="text" name="education" id="education" class="border-2 {{ $errors->has('education') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('education') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="education_institute" class="required w-fit {{ $errors->has('education_institute') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.education-institution') }}
                                </label>
                                <input type="text" name="education_institute" id="education_institute" class="border-2 {{ $errors->has('education_institute') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('education_institute') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="specialization" class="required w-fit {{ $errors->has('specialization') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.specialization') }}
                                </label>
                                <input type="text" name="specialization" id="specialization" class="border-2 {{ $errors->has('specialization') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('specialization') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="purpose" class="w-fit {{ $errors->has('purpose') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.purpose-of-visit') }}
                                </label>
                                <input type="text" name="purpose" id="purpose" class="border-2 {{ $errors->has('purpose') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('purpose') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="arrival_date" class="required w-fit {{ $errors->has('arrival_date') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.date-of-arrival') }}
                                </label>
                                <input type="date" name="arrival_date" id="arrival_date" class="w-full bg-white border-2 {{ $errors->has('arrival_date') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('arrival_date') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="departure_date" class="required w-fit {{ $errors->has('departure_date') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.date-of-departure') }}
                                </label>
                                <input type="date" name="departure_date" id="departure_date" class="w-full bg-white border-2 {{ $errors->has('departure_date') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('departure_date') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="website" class="w-fit {{ $errors->has('website') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.website') }}
                                </label>
                                <input type="url" name="website" id="website" class="border-2 {{ $errors->has('website') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('website') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="passport_copy" class="required w-fit {{ $errors->has('passport_copy') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.upload-passport-copy') }}
                                </label>
                                <input type="file" name="passport_copy" id="passport_copy" class="border-2 {{ $errors->has('passport_copy') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('passport_copy') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="photo" class="required w-fit {{ $errors->has('photo') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.upload-delegate-photo') }}
                                </label>
                                <input type="file" name="photo" id="photo" class="border-2 {{ $errors->has('photo') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('passport_copy') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="employment_verification_letter" class="required w-fit {{ $errors->has('employment_verification_letter') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.employment-verification-letter') }}
                                </label>
                                <input type="file" name="employment_verification_letter" id="employment_verification_letter" class="border-2 {{ $errors->has('employment_verification_letter') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('employment_verification_letter') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="hotel" class="required w-fit {{ $errors->has('hotel') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.Hotel form') }}
                                </label>

                                <select name="hotel" id="hotel" class="js-example-basic-single w-full border-2 {{ $errors->has('hotel') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
                                    <option value="">{{ __('ift.choose-one') }}</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{$hotel['id']}}" {{ old('hotel') == $hotel['id']? 'selected': '' }}>{{ $hotel['name_'.app()->currentLocale()] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="col-span-2 p-3 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- modal -->
        <div id="requestModalWrapper" class="fixed top-0 left-0 w-full h-screen z-50 bg-black bg-opacity-30 flex items-center justify-center p-5">
            <div id="requestModal" class="w-full max-w-lg bg-white rounded-xl p-5 flex flex-col gap-5">
                <div class="flex items-center justify-between gap-4">
                    <h4 class="text-textColor text-xl md:text-2xl font-semibold">
                        Request Call
                    </h4>
                    <button id="closeRequestModal" class="text-textColor active:text-primary md:hover:text-primary transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18 18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
                <form action="" class="w-full flex flex-col gap-5">
                    <div class="w-full grid grid-cols-1 gap-5">
                        <div class="flex flex-col">
                            <label
                                    for="name"
                                    class="text-textColor text-base md:text-lg font-semibold required"
                            >Name</label
                            >
                            <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label
                                    for="email"
                                    class="text-textColor text-base md:text-lg font-semibold"
                            >Email</label
                            >
                            <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label
                                    for="Time"
                                    class="text-textColor text-base md:text-lg font-semibold"
                            >Date Time</label
                            >
                            <input
                                    type="datetime-local"
                                    name="email"
                                    id="email"
                                    class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label
                                    for="email"
                                    class="text-textColor text-base md:text-lg font-semibold"
                            >Name of Company</label
                            >
                            <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                            />
                        </div>
                    </div>

                    <button
                            class="p-3 rounded-xl bg-primary text-white text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all"
                    >
                        Book
                    </button>
                </form>
            </div>
        </div>
        @include('front.includes.messages')
    </main>

@endsection
@push('scriptJS')
    <script src="{{ asset('assets/plugins/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.js') }}"></script>



    {{--<script src="/plugins/swiper/swiper.js"></script>--}}
    {{--<script src="/plugins/jquery.js"></script>--}}
    {{--<script src="/plugins/select2/select2.js"></script>--}}
    <script>
        $(document).ready(function () {
            $(".js-example-basic-single").select2();
        });
    </script>

    <script src="{{ asset('assets/js/main.js') }}"></script>


@endpush