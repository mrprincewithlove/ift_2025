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
                            {{ __('ift.registration') }}
                            {{--Registration--}}
                        </h1>
                        <div class="flex items-center justify-center gap-2 flex-wrap">
                            <a href="{{ route('front.index') }}" class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all">
                                {{ __('ift.home') }}
                                {{--Home--}}
                            </a>
                            <span class="text-white text-xl md:text-2xl text-center max-w-5xl">|</span>
                            <h4 class="text-white text-xl md:text-2xl text-center max-w-5xl">
                                {{ __('ift.registration') }}
                                {{--Registration--}}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
                        <div class="flex flex-col items-center md:items-start justify-start gap-2 text-center md:text-start text-balance">
                            <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold">
                                {{ __('ift.form_title') }}
                                {{--Registration Form for Delegates:--}}
                            </h1>
                            <!-- <p class="text-textColor text-base md:text-lg">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit.
                              Dolorum vero repellat nam dolorem exercitationem consequatur,
                              accusantium aspernatur iusto provident repudiandae, quam natus
                              perferendis! Voluptatem, suscipit?
                            </p> -->
                        </div>
                        <form action="{{ route('front.register.send') }}" method="POST" enctype="multipart/form-data" id="registerForm" class="w-full grid grid-cols-2 gap-5">
                            @csrf
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="name" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.name') }}
                                    {{--First Name--}}
                                </label>
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('name') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="surname" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.surname') }}
                                    {{--Last Name--}}
                                </label>
                                <input
                                        type="text"
                                        name="surname"
                                        id="surname"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('surname') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="middle_name" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.middle_name') }}
                                    {{--Middle Name--}}
                                </label>
                                <input
                                        type="text"
                                        name="middle_name"
                                        id="middle_name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('middle_name') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="company_name" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.company_name') }}
                                    {{--Organization Name--}}
                                </label>
                                <input
                                        type="text"
                                        name="company_name"
                                        id="company_name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('company_name') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="job" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.job') }}
                                    {{--Position--}}
                                </label>
                                <input
                                        type="text"
                                        name="job"
                                        id="job"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('job') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="country" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.country') }}
                                    {{--Country--}}
                                </label>

                                <select
                                        name="country"
                                        id="country"
                                        class="js-example-basic-single w-full border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                >
                                    @foreach($countries as $country)
                                        <option value="{{$country['id']}}" {{ old('country') == $country['id']? 'selected': '' }}>{{ $country['name_'.app()->currentLocale()] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="number" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.number') }}
                                    {{--Phone Number--}}
                                </label>
                                <input
                                        type="text"
                                        name="number"
                                        id="number"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('number') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="emergency_number" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.emergency_number') }}
                                    {{--Emergency Contact Number in Whatsup, Telegram, Skype,--}}
                                    {{--WeChat--}}
                                </label>
                                <input
                                        type="text"
                                        name="emergency_number"
                                        id="emergency_number"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('emergency_number') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="email" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.email') }}
                                    {{--Email Address--}}
                                </label>
                                <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('email') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="website" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.website') }}
                                    {{--Company Website--}}
                                </label>
                                <input
                                        type="url"
                                        name="website"
                                        id="website"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                        value="{{ old('website') }}"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="status" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.name') }}
                                    {{--Participation Status (select one)--}}
                                </label>
                                <select
                                        name="status"
                                        id="status"
                                        class="js-example-basic-single w-full border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                >
                                    <option value="Delegate">{{ __('ift.delegate') }}</option>
                                    <option value="Media">{{ __('ift.media') }}</option>
                                    <option value="Speaker">{{ __('ift.speaker') }}</option>
                                    <option value="Diplomat">{{ __('ift.diplomat') }}</option>
                                    <option value="Sponsor">{{ __('ift.sponsor') }}</option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="visa" class="text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.visa') }}
                                    {{--Do you require a visa to enter Turkmenistan?--}}
                                </label>

                                <div class="flex items-center gap-2">
                                    <div class="flex items-center input">
                                        <input
                                                id="radio1"
                                                type="radio"
                                                name="visa"
                                                class="hidden"
                                                value="yes"
                                        />
                                        <label for="radio1" class="flex items-center cursor-pointer text-textColor text-base md:text-lg">
                                            <span class="w-6 h-6 inline-block mr-2 rounded-full border border-textColor flex-no-shrink"></span>
                                            {{ __('ift.yes') }}
                                            {{--Yes--}}
                                        </label>
                                    </div>
                                    <div class="flex items-center input">
                                        <input
                                                id="radio2"
                                                type="radio"
                                                name="visa"
                                                class="hidden"
                                                value="no"
                                        />
                                        <label for="radio2" class="flex items-center cursor-pointer text-textColor text-base md:text-lg">
                                            <span class="w-6 h-6 inline-block mr-2 rounded-full border border-textColor flex-no-shrink"></span>
                                            {{ __('ift.no') }}
                                            {{--No--}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button id="submitButton" class="col-span-2 p-3 rounded-xl bg-primary text-white text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.send') }}
                                {{--Send--}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- custom dialog -->
        <div
                id="dialogWrapper"
                class="fixed top-0 left-0 z-50 w-full h-screen bg-black bg-opacity-50 flex items-center justify-center p-5"
        >
            <div
                    id="dialog"
                    class="w-full max-w-lg rounded-xl p-5 bg-white flex flex-col gap-1"
            >
                <div class="flex items-center justify-between gap-4">
                    <h4 class="text-headerColor text-xl md:text-2xl font-semibold">
                        Custom Dialog
                    </h4>
                    <button
                            id="closeDialog"
                            class="text-textColor active:text-primary md:hover:text-primary transition-all"
                    >
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

                <p class="text-textColor text-base md:text-lg">
                    Are you sure you want to submit?
                </p>
                <div class="w-full flex items-center gap-5 mt-5">
                    <button
                            id="dialogSubmitButton"
                            class="w-full p-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold hover:bg-secondary transition-all"
                    >
                        submit
                    </button>
                </div>
            </div>
        </div>

        <!-- modal -->
        <div
                id="requestModalWrapper"
                class="fixed top-0 left-0 w-full h-screen z-50 bg-black bg-opacity-30 flex items-center justify-center p-5"
        >
            <div
                    id="requestModal"
                    class="w-full max-w-lg bg-white rounded-xl p-5 flex flex-col gap-5"
            >
                <div class="flex items-center justify-between gap-4">
                    <h4 class="text-textColor text-xl md:text-2xl font-semibold">
                        Request Call
                    </h4>
                    <button
                            id="closeRequestModal"
                            class="text-textColor active:text-primary md:hover:text-primary transition-all"
                    >
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
    <script>
        const registerForm = document.getElementById("registerForm");
        const dialogWrapper = document.getElementById("dialogWrapper");
        const closeDialog = document.getElementById("closeDialog");
        const radio2 = document.getElementById("radio2");
        const submitButton = document.getElementById("submitButton");
        const dialogSubmitButton = document.getElementById("dialogSubmitButton");

        registerForm.addEventListener("submit", (event) => {
            if (radio2.checked) {
                event.preventDefault();
                dialogWrapper.classList.add("active");
            }

            dialogSubmitButton.addEventListener("click", () => {
                document.forms.registerForm.submit();
            });
            closeDialog.addEventListener("click", function () {
                dialogWrapper.classList.remove("active");
            });
        });
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


@endpush