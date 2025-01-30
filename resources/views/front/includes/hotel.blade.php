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
                            {{ __('ift.Hotel') }}
                        </h1>
                        <div class="flex items-center justify-center gap-2 flex-wrap">
                            <a href="{{ route('front.index') }}" class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all">
                                {{ __('ift.home') }}
                            </a>
                            <span class="text-white text-xl md:text-2xl text-center max-w-5xl">|</span>
                            <h4 class="text-white text-xl md:text-2xl text-center max-w-5xl">
                                {{ __('ift.Hotel') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 grid grid-cols-5 gap-5 md:gap-10 items-start">
                    <div class="col-span-5 md:col-span-2 border-[10px] border-white customShadow rounded-xl overflow-hidden text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-full h-full" viewBox="0 -32 576 576">
                            <path d="M560 64c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16H16C7.16 0 0 7.16 0 16v32c0 8.84 7.16 16 16 16h15.98v384H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h240v-80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v80h240c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16h-16V64h16zm-304 44.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm0 96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm-128-96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zM179.2 256h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8zM192 384c0-53.02 42.98-96 96-96s96 42.98 96 96H192zm256-140.8c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-96c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4z"/>
                        </svg>
                        <!-- <img src="/assets/images/image2.jpg" alt="" class="w-full" /> -->
                    </div>
                    <div class="w-full col-span-5 md:col-span-3 flex flex-col gap-2">
                        <ul class="text-textColor text-base md:text-lg">
                        <!-- <h4
                  class="text-headerColor text-xl md:text-2xl font-semibold mb-2"
                >
                  {{ __('ift.hotel-header-1') }}
                                </h4> -->
                            <li class="">{{ __('ift.hotel-text-1') }}</li>
                            <li class="">{{ __('ift.hotel-text-2') }}</li>
                            <li class="">{{ __('ift.hotel-text-3') }}</li>
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
                        <div class="flex flex-col items-center md:items-start justify-start gap-2 text-center md:text-start">
                            <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold">
                                {{ __('ift.hotel-form') }}
                            </h1>
                        </div>
                        <form action="{{ route('front.hotel.send') }}" method="POST" enctype="multipart/form-data" class="w-full grid grid-cols-2 gap-5">
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
                                <label for="number" class="required w-fit {{ $errors->has('number') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.number') }}
                                </label>
                                <input type="text" name="number" id="number" class="border-2 {{ $errors->has('number') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"
                                       value="{{ old('number') }}" required
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
                                <label for="hotel" class="required w-fit {{ $errors->has('hotel') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.Hotel') }}
                                </label>
                                <select name="hotelSelect" id="hotelSelect" class="js-example-basic-singl e w-full border-2 {{ $errors->has('hotel') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
{{--                                <select name="hotel" id="hotel" class="js-example-basic-single w-full border-2 {{ $errors->has('hotel') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">--}}
                                    <option value="">{{ __('ift.choose-one') }}</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{$hotel['id']}}" {{ old('hotel') == $hotel['id']? 'selected': '' }}>{{ $hotel['name_'.app()->currentLocale()] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="roomSelect" class="required w-fit text-textColor text-base md:text-lg font-semibold">
                                    {{ __('ift.choose-room') }}
                                </label>

                                <select name="roomSelect" id="roomSelect" class="js-example-basic-singl e w-full border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
                                    <option value="">{{ __('ift.choose-one') }}</option>
                                </select>
                            </div>

                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="in_date" class="required w-fit {{ $errors->has('in_date') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.check-in-date') }}
                                </label>
                                <input type="date" name="in_date" id="in_date" class="w-full bg-white border-2 {{ $errors->has('in_date') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('in_date') }}" required
                                />
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="out_date" class="required w-fit {{ $errors->has('out_date') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.check-out-date') }}
                                </label>
                                <input type="date" name="out_date" id="out_date" class="w-full bg-white border-2 {{ $errors->has('out_date') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none placeholder:text-red-500" placeholder=""
                                       value="{{ old('out_date') }}" required
                                />
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

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        sessionStorage.setItem("language", "ru");
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const rooms = @json($hotelPrices);
            const currentLocale = "{{ app()->getLocale() }}";
            const choose_one = "{{ __('ift.choose-one') }}";

            const hotelSelect = document.getElementById("hotelSelect");
            const roomSelect = document.getElementById("roomSelect");

            function getCurrentLanguage() {
                return currentLocale || "en";
            }

            hotelSelect.addEventListener("change", function () {
                const selectedHotelId = parseInt(hotelSelect.value);

                roomSelect.innerHTML =
                    `<option value="">${choose_one}</option>`;

                const language = getCurrentLanguage();

                const filteredRooms = rooms.filter(
                    (room) => room.hotel_id === selectedHotelId
                );

                filteredRooms.forEach((room) => {
                    const option = document.createElement("option");
                    option.value = room.id;

                    const roomNameWithPrice = `${room[`name_${language}`]} - ${
                        room.price
                        }`;

                    option.textContent = roomNameWithPrice;
                    roomSelect.appendChild(option);
                });
            });
        });
    </script>
@endpush