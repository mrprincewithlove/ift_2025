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
                            {{ __('ift.Flight') }}
                        </h1>
                        <div class="flex items-center justify-center gap-2 flex-wrap">
                            <a href="{{ route('front.index') }}" class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all">
                                {{ __('ift.home') }}</a>
                            <span class="text-white text-xl md:text-2xl text-center max-w-5xl">|</span>
                            <h4 class="text-white text-xl md:text-2xl text-center max-w-5xl">
                                {{ __('ift.Flight') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 grid grid-cols-5 gap-5 md:gap-10 items-center">
                    <div class="col-span-5 md:col-span-2 border-[10px] border-white customShadow rounded-xl overflow-hidden text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="w-full h-full" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
                            <path class="clr-i-solid clr-i-solid-path-1" d="M6.25,11.5,12,13.16l6.32-4.59-9.07.26A.52.52,0,0,0,9,8.91L6.13,10.56A.51.51,0,0,0,6.25,11.5Z"/>
                            <path class="clr-i-solid clr-i-solid-path-2" d="M34.52,6.36,28.22,5a3.78,3.78,0,0,0-3.07.67L6.12,19.5l-4.57-.2a1.25,1.25,0,0,0-.83,2.22l4.45,3.53a.55.55,0,0,0,.53.09c1.27-.49,6-3,11.59-6.07l1.12,11.51a.55.55,0,0,0,.9.37l2.5-2.08a.76.76,0,0,0,.26-.45l2.37-13.29c4-2.22,7.82-4.37,10.51-5.89A1.55,1.55,0,0,0,34.52,6.36Z"/>
                            <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                        </svg>
                        <!-- <img src="/assets/images/image2.jpg" alt="" class="w-full" /> -->
                    </div>
                    <div class="w-full col-span-5 md:col-span-3 flex flex-col gap-2">
                        <h4 class="text-headerColor text-xl md:text-2xl font-semibold">
                            {{ __('ift.Flight') }}
                        </h4>
                        <ul class="text-textColor text-base md:text-lg">
                            <li class="">{{ __('ift.flight-text-1') }}</li>
                            <li class="">{{ __('ift.flight-text-2') }}</li>
                            <h4 class="text-headerColor text-xl md:text-2xl font-semibold mb-2">
                                {{ __('ift.flight-header-1') }}
                            </h4>
                            <li class="">{{ __('ift.flight-text-3') }}</li>
                            <li class="">{{ __('ift.flight-text-4') }}</li>
                            <li class="">{{ __('ift.flight-text-5') }}</li>
                        </ul>
                        <div class="w-full flex items-center justify-start">
                            <a href="{{ route('front.coming_soon') }}" class="px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.download-pdf') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
                        <div
                                class="flex flex-col items-center md:items-start justify-start gap-2 text-center md:text-start"
                        >
                            <h1
                                    class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold"
                            >
                                {{ __('ift.flight-form') }}
                            </h1>
                            <!-- <p class="text-textColor text-base md:text-lg">
                              Становление спонсором мероприятий — это стратегический шаг,
                              который может принести множество выгод для бизнеса.
                              Спонсорство позволяет Вам не только заявить о себе на рынке,
                              но и выстроить более глубокие связи с целевой аудиторией и
                              улучшить имидж.
                            </p> -->
                        </div>
                        <form action="" class="w-full grid grid-cols-2 gap-5">
                            <div class="col-span-2 sm:col-span-1 flex flex-col">
                                <label
                                        for="name"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >
                                    {{ __('ift.first-name') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="name"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >{{ __('ift.last-name') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="name"
                                        class="w-fit text-textColor text-base md:text-lg font-semibold"
                                >{{ __('ift.middle-name') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="name"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >{{ __('ift.organization') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>

                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="name"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >{{ __('ift.position') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="name"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >{{ __('ift.email') }}</label
                                >
                                <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="email"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >
                                    {{ __('ift.emergency_number') }}</label
                                >
                                <input
                                        type="number"
                                        name="email"
                                        id="email"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="email"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >
                                    {{ __('ift.arrival-date-time') }}</label
                                >
                                <input
                                        type="datetime-local"
                                        name="email"
                                        id="email"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500"
                                        placeholder=""
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="email"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >
                                    {{ __('ift.departure-date-time') }}</label
                                >
                                <input
                                        type="datetime-local"
                                        name="email"
                                        id="email"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500"
                                        placeholder=""
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label
                                        for="email"
                                        class="required w-fit text-textColor text-base md:text-lg font-semibold"
                                >
                                    {{ __('ift.upload-ticket') }}</label
                                >
                                <input
                                        type="file"
                                        name="email"
                                        id="email"
                                        class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500"
                                        placeholder=""
                                />
                            </div>
                            <button
                                    class="col-span-2 p-3 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all"
                            >
                                {{ __('ift.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
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