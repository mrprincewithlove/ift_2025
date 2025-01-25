<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }} " />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styleCSS')

    <title>{{ __('ift.project_name') }}</title>
</head>
<body class="front min-h-screen">
<header class="absolute top-0 left-0 z-40 w-full">
    <div class="w-full bg-primary hidden md:flex">
        <div class="container">
            <div class="w-full px-5 md:px-10 py-1 flex items-center justify-between gap-4">
                <div class="flex items-center justify-start gap-4">
                    <a href="tel:+99312753648" class="text-white text-sm flex items-center gap-2 font-semibold hover:text-textColor transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-5"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd"
                            />
                        </svg>
                        +993 12 753648
                    </a>
                    <span class="w-[2px] h-5 bg-white"></span>
                    <a
                            href="tel:+99312753644"
                            class="text-white text-sm flex items-center gap-2 font-semibold hover:text-textColor transition-all"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-5"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd"
                            />
                        </svg>
                        +993 12 753644
                    </a>
                </div>
                <div class="flex items-center justify-end gap-4">
                    <a href="https://www.instagram.com/tmt_consulting_group/" class="text-white hover:text-textColor transition-all">
                        <svg
                                class="size-5"
                                viewBox="0 0 27 26"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M2.25 6.4295C2.25 4.13269 4.26472 2.27075 6.75 2.27075H20.25C22.7352 2.27075 24.75 4.13269 24.75 6.4295V18.9058C24.75 21.2025 22.7352 23.0645 20.25 23.0645H6.75C4.26472 23.0645 2.25 21.2025 2.25 18.9058V6.4295ZM6.75 4.35013C5.50736 4.35013 4.5 5.2811 4.5 6.4295V18.9058C4.5 20.0542 5.50736 20.9851 6.75 20.9851H20.25C21.4927 20.9851 22.5 20.0542 22.5 18.9058V6.4295C22.5 5.2811 21.4927 4.35013 20.25 4.35013H6.75ZM13.5 9.54857C11.636 9.54857 10.125 10.945 10.125 12.6676C10.125 14.3903 11.636 15.7867 13.5 15.7867C15.364 15.7867 16.875 14.3903 16.875 12.6676C16.875 10.945 15.364 9.54857 13.5 9.54857ZM7.875 12.6676C7.875 9.79661 10.3934 7.46919 13.5 7.46919C16.6066 7.46919 19.125 9.79661 19.125 12.6676C19.125 15.5386 16.6066 17.8661 13.5 17.8661C10.3934 17.8661 7.875 15.5386 7.875 12.6676ZM19.6875 8.50888C20.6194 8.50888 21.375 7.81066 21.375 6.94935C21.375 6.08804 20.6194 5.38982 19.6875 5.38982C18.7555 5.38982 18 6.08804 18 6.94935C18 7.81066 18.7555 8.50888 19.6875 8.50888Z"
                                    fill="currentColor"
                            />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/company/tmt-consulting-group" class="text-white hover:text-textColor transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="currentColor"
                                class="size-5"
                                version="1.1"
                                id="Layer_1"
                                viewBox="-143 145 512 512"
                                xml:space="preserve"
                        >
                  <path
                          d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z   M41.4,508.1H-8.5V348.4h49.9V508.1z M15.1,328.4h-0.4c-18.1,0-29.8-12.2-29.8-27.7c0-15.8,12.1-27.7,30.5-27.7  c18.4,0,29.7,11.9,30.1,27.7C45.6,316.1,33.9,328.4,15.1,328.4z M241,508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4  c-14.9,0-23.2,10-27,19.6c-1.4,3.4-1.2,8.2-1.2,13.1v86.3H71.8c0,0,0.7-146.4,0-159.7h56.1v25.1c3.3-11,21.2-26.6,49.8-26.6  c35.5,0,63.3,23,63.3,72.4V508.1z"
                  />
                </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <nav id="nav" class="w-full bg-blacks bg-opacity-60 py-2">
        <div class="container">
            <div class="w-full px-5 lg:px-10 flex flex-col">
                <div class="w-full flex items-center justify-between">
                    <a
                            href="{{ route('front.index') }}"
                            class="h-[60px] md:h-[70px] lg:h-[80px] mt-2"
                    >
                        <img
                                src="/assets/images/logo.png"
                                alt=""
                                class="h-full object-contain"
                        />
                    </a>
                    <div class="hidden md:flex items-center justify-end gap-5">
                        <a href="https://tstb.gov.tm/" class="size-16">
                            <img
                                    src="/assets/images/logo1.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                        <span class="w-[2px] h-16 bg-white"></span>
                        <a href="https://cci.gov.tm/" class="size-16">
                            <img
                                    src="/assets/images/logo2.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                        <span class="w-[2px] h-16 bg-white"></span>
                        <a href="https://tmt.tm" class="size-16">
                            <img
                                    src="/assets/images/logo3.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                    </div>
                    <!-- mobile menu -->
                    <div class="w-full flex md:hidden items-center justify-end">
                        <button
                                id="openMobileMenu"
                                class="text-white w-10 h-10 rounded-xl bg-primary flex items-center justify-center active:bg-secondary transition-all"
                        >
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6 rotate-180"
                            >
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5"
                                />
                            </svg>
                        </button>
                        <div id="mobileMenu" class="fixed top-0 left-0 z-50 w-full h-screen bg-white flex md:hidden ">
                            <div class="relative w-full h-screen flex flex-col items-center justify-start gap-5 px-5 overflow-y-auto">
                                <div class="w-full bg-white sticky top-0 flex items-center justify-start gap-2 border-b-2 border-headerColor py-5">
                                    <button id="closeMobileMenu" class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white active:bg-secondary transition-all">
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="size-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                    <h4 class="text-xl text-headerColor font-semibold">{{ __('ift.menu') }}</h4>
                                </div>
                                <div class="w-full flex flex-col items-center justify-start gap-5">
                                    <div class="flex items-center justify-end gap-5">
                                        <a href="https://tstb.gov.tm/" class="size-16">
                                            <img
                                                    src="/assets/images/logo1.png"
                                                    alt=""
                                                    class="w-full h-full object-contain"
                                            />
                                        </a>
                                        <span class="w-[2px] h-16 bg-headerColor"></span>
                                        <a href="https://cci.gov.tm/" class="size-16">
                                            <img
                                                    src="/assets/images/logo2.png"
                                                    alt=""
                                                    class="w-full h-full object-contain"
                                            />
                                        </a>
                                        <span class="w-[2px] h-16 bg-headerColor"></span>
                                        <a href="https://tmt.tm" class="size-16">
                                            <img
                                                    src="/assets/images/logo3.png"
                                                    alt=""
                                                    class="w-full h-full object-contain"
                                            />
                                        </a>
                                    </div>
                                    <!-- active lang class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-secondary text-white text-base font-semibold" -->
                                    <!-- dropdown -->
                                    <details name="dropdown" class="w-full">
                                        <summary
                                                class="w-full p-4 rounded-xl flex items-center justify-between gap-5 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                        >
                                            {{ __('ift.about_ift') }}
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="size-6 transition-all"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>
                                        </summary>
                                        <div class="w-full flex flex-col gap-5 mt-4">
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.about_ift') }}
                                                {{--About IFT 2025--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.guide_investor') }}
                                                {{--Guide for investors--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.meetings') }}
                                                {{--Meetings--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.speakers') }}
                                                {{--Speakers--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.sponsors') }}
                                                {{--Sponsors--}}
                                            </a>
                                        </div>
                                    </details>
                                    <!-- link -->
                                    <a
                                            href="{{ route('front.coming_soon') }}"
                                            class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                    >
                                        {{ __('ift.agenda_ift') }}
                                        {{--Agenda IFT 2025--}}
                                    </a>
                                    <!-- dropdown -->
                                    <details name="dropdown" class="w-full">
                                        <summary
                                                class="w-full p-4 rounded-xl flex items-center justify-between gap-5 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                        >
                                            {{ __('ift.media_center') }}
                                            {{--Media center--}}
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="size-6 transition-all"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>
                                        </summary>
                                        <div class="w-full flex flex-col gap-5 mt-4">
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.media') }}
                                                {{--Media--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.press_release') }}
                                                {{--Press Release--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.post_show_reports') }}
                                                {{--Post show reports--}}
                                            </a>
                                            <a
                                                    href="{{ route('front.coming_soon') }}"
                                                    class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                            >
                                                {{ __('ift.photo_gallery') }}
                                                {{--Photo Gallery--}}
                                            </a>
                                        </div>
                                    </details>
                                    <a
                                            href="{{ route('front.coming_soon') }}"
                                            class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                    >
                                        {{ __('ift.news') }}
                                        {{--News--}}
                                    </a>
                                    <a
                                            href="{{ route('front.coming_soon') }}"
                                            class="w-full p-4 rounded-xl flex items-center justify-between gap-4 bg-primary text-white text-base font-semibold active:bg-secondary transition-all"
                                    >
                                        {{ __('ift.contact_us') }}
                                        {{--Contact us--}}
                                    </a>
                                </div>
                                <div class="w-full flex items-center justify-between gap-5 py-5 border-t-2 border-headerColor">

                                    @foreach(config('app.supported_languages') as $key=>$locale)
                                        @if($key != app()->currentLocale())
                                            <a href="{{ route('front.locale', $key) }}" class="w-full capitalize rounded-xl p-3 text-white text-base font-semibold text-center bg-primary active:bg-secondary transition-all">
                                                {{$key}}
                                            </a>
                                        @else
                                            <a href="{{ route('front.locale', $key) }}" class="w-full capitalize rounded-xl p-3 text-white text-base font-semibold text-center bg-secondary">
                                                {{$key}}
                                            </a>
                                        @endif
                                    @endforeach


                                <!-- active lang class="w-full rounded-xl p-3 text-white text-base font-semibold text-center bg-secondary" -->
                                    {{--<a--}}
                                            {{--href=""--}}
                                            {{--class="w-full rounded-xl p-3 text-white text-base font-semibold text-center bg-primary active:bg-secondary transition-all"--}}
                                    {{-->--}}
                                        {{--Tm--}}
                                    {{--</a>--}}
                                    {{--<a--}}
                                            {{--href=""--}}
                                            {{--class="w-full rounded-xl p-3 text-white text-base font-semibold text-center bg-primary active:bg-secondary transition-all"--}}
                                    {{-->--}}
                                        {{--Ru--}}
                                    {{--</a>--}}
                                    {{--<a--}}
                                            {{--href=""--}}
                                            {{--class="w-full rounded-xl p-3 text-white text-base font-semibold text-center bg-primary active:bg-secondary transition-all"--}}
                                    {{-->--}}
                                        {{--En--}}
                                    {{--</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                        class="w-full hidden md:flex items-center justify-center gap-8"
                >
                    <div class="group relative py-4">
                        <a
                                href="{{ route('front.coming_soon') }}"
                                class="text-white text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            {{ __('ift.about_ift') }}
                            {{--About IFT 2025--}}
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4 group-hover:rotate-180"
                            >
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                                />
                            </svg>
                        </a>
                        <div
                                class="w-[230px] absolute top-28 group-hover:top-[60px] -left-2 p-4 rounded-xl bg-primary flex flex-col gap-5 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all shadow-lg"
                        >
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.guide_investor') }}
                                {{--Guide for investors--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.meetings') }}
                                {{--Meetings--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.speakers') }}
                                {{--Speakers--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.sponsors') }}
                                {{--Sponsors--}}
                            </a>
                        </div>
                    </div>
                    <a
                            href="{{ route('front.coming_soon') }}"
                            class="text-white text-lg font-semibold hover:text-primary transition-all whitespace-nowrap"
                    >
                        {{ __('ift.agenda_ift') }}
                        {{--Agenda IFT 2025--}}
                    </a>
                    <div class="group relative py-4">
                        <button
                                class="text-white text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            {{ __('ift.media_center') }}
                            {{--Media center--}}
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4 group-hover:rotate-180"
                            >
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                                />
                            </svg>
                        </button>
                        <div
                                class="w-[230px] absolute top-28 group-hover:top-[60px] -left-2 p-4 rounded-xl bg-primary flex flex-col gap-5 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all shadow-lg"
                        >
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.media') }}
                                {{--Media--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.press_release') }}
                                {{--Press Release--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.post_show_reports') }}
                                {{--Post show reports--}}
                            </a>
                            <a
                                    href="{{ route('front.coming_soon') }}"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                {{ __('ift.photo_gallery') }}
                                {{--Photo Gallery--}}
                            </a>
                        </div>
                    </div>
                    <a
                            href="{{ route('front.coming_soon') }}"
                            class="text-white text-lg font-semibold hover:text-primary transition-all whitespace-nowrap"
                    >
                        {{ __('ift.news') }}
                        {{--News--}}
                    </a>

                    <a
                            href="{{ route('front.coming_soon') }}"
                            class="px-6 py-2 rounded-xl bg-primary text-white text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all"
                    >
                        {{ __('ift.contact_us') }}
                        {{--Contact us--}}
                    </a
                    >
                    <div class="group relative py-4">
                        <button
                                class="text-white capitalize text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            {{ app()->currentLocale()}}
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4 group-hover:rotate-180"
                            >
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                                />
                            </svg>
                        </button>
                        <div
                                class="absolute top-28 group-hover:top-[60px] -left-2 p-4 rounded-xl bg-primary flex flex-col gap-5 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all shadow-lg"
                        >
                            @foreach(config('app.supported_languages') as $key=>$locale)
                                @if($key != app()->currentLocale())
                                    <a href="{{ route('front.locale', $key) }}" class="text-white capitalize text-lg font-semibold hover:text-textColor transition-all">
                                        {{$key}}
                                    </a>
                                @else
                                @endif
                            @endforeach
                            {{--<a--}}
                                    {{--href=""--}}
                                    {{--class="text-white text-lg font-semibold hover:text-textColor transition-all"--}}
                            {{-->--}}
                                {{--Tm--}}
                            {{--</a>--}}
                            {{--<a--}}
                                    {{--href=""--}}
                                    {{--class="text-white text-lg font-semibold hover:text-textColor transition-all"--}}
                            {{-->--}}
                                {{--Ru--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer class="w-full bg-gradient-to-b md:bg-gradient-to-r from-[#062126] via-secondary to-primary from-1% via-30% to-90%">
    <div class="container">
        <div class="w-full px-5 md:px-10 py-10 flex flex-col gap-10">
            <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="w-full flex flex-col gap-2 items-center md:items-start">
                    <div class="h-[80px]">
                        <img src="/assets/images/white-logo.png" alt="" class="h-full block object-contain"/>
                    </div>
                    <div class="flex items-center justify-start gap-4">
                        <a href="https://www.instagram.com/tmt_consulting_group/" class="text-white active:text-textColor md:hover:text-textColor transition-all">
                            <svg
                                    class="size-5"
                                    viewBox="0 0 27 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M2.25 6.4295C2.25 4.13269 4.26472 2.27075 6.75 2.27075H20.25C22.7352 2.27075 24.75 4.13269 24.75 6.4295V18.9058C24.75 21.2025 22.7352 23.0645 20.25 23.0645H6.75C4.26472 23.0645 2.25 21.2025 2.25 18.9058V6.4295ZM6.75 4.35013C5.50736 4.35013 4.5 5.2811 4.5 6.4295V18.9058C4.5 20.0542 5.50736 20.9851 6.75 20.9851H20.25C21.4927 20.9851 22.5 20.0542 22.5 18.9058V6.4295C22.5 5.2811 21.4927 4.35013 20.25 4.35013H6.75ZM13.5 9.54857C11.636 9.54857 10.125 10.945 10.125 12.6676C10.125 14.3903 11.636 15.7867 13.5 15.7867C15.364 15.7867 16.875 14.3903 16.875 12.6676C16.875 10.945 15.364 9.54857 13.5 9.54857ZM7.875 12.6676C7.875 9.79661 10.3934 7.46919 13.5 7.46919C16.6066 7.46919 19.125 9.79661 19.125 12.6676C19.125 15.5386 16.6066 17.8661 13.5 17.8661C10.3934 17.8661 7.875 15.5386 7.875 12.6676ZM19.6875 8.50888C20.6194 8.50888 21.375 7.81066 21.375 6.94935C21.375 6.08804 20.6194 5.38982 19.6875 5.38982C18.7555 5.38982 18 6.08804 18 6.94935C18 7.81066 18.7555 8.50888 19.6875 8.50888Z"
                                        fill="currentColor"
                                />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/company/tmt-consulting-group" class="text-white active:text-textColor md:hover:text-textColor transition-all">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="currentColor"
                                    class="size-5"
                                    version="1.1"
                                    id="Layer_1"
                                    viewBox="-143 145 512 512"
                                    xml:space="preserve"
                            >
                    <path
                            d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z   M41.4,508.1H-8.5V348.4h49.9V508.1z M15.1,328.4h-0.4c-18.1,0-29.8-12.2-29.8-27.7c0-15.8,12.1-27.7,30.5-27.7  c18.4,0,29.7,11.9,30.1,27.7C45.6,316.1,33.9,328.4,15.1,328.4z M241,508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4  c-14.9,0-23.2,10-27,19.6c-1.4,3.4-1.2,8.2-1.2,13.1v86.3H71.8c0,0,0.7-146.4,0-159.7h56.1v25.1c3.3-11,21.2-26.6,49.8-26.6  c35.5,0,63.3,23,63.3,72.4V508.1z"
                    />
                  </svg>
                        </a>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2 items-center md:items-start">
                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                        {{ __('ift.about_ift') }}
                        {{--About IFT 2025--}}
                    </h4>
                    <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg active:text-textColor md:hover:text-textColor transition-all w-fit">
                        {{ __('ift.guide_investor') }}
                        {{--Guide for investors--}}
                    </a>
                    <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg active:text-textColor md:hover:text-textColor transition-all w-fit">
                        {{ __('ift.meetings') }}
                        {{--Meetings--}}
                    </a>
                    <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg active:text-textColor md:hover:text-textColor transition-all w-fit">
                        {{ __('ift.speakers') }}
                        {{--Speakers--}}
                    </a>
                    <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg active:text-textColor md:hover:text-textColor transition-all w-fit">
                        {{ __('ift.sponsors') }}
                        {{--Sponsors--}}
                    </a>
                </div>

                <div class="w-full flex flex-col gap-2 items-center md:items-start">
                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                        {{ __('ift.contact_us') }}
                        {{--Contact us--}}
                    </h4>
                    <a href="tel:+99312753648" class="text-white text-base md:text-lg flex items-center gap-2 hover:text-textColor transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-6"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd"
                            />
                        </svg>
                        +993 12 753648
                    </a>
                    <a href="tel:+99312753644" class="text-white text-base md:text-lg flex items-center gap-2 hover:text-textColor transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-6"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd"
                            />
                        </svg>
                        +993 12 753644
                    </a>
                    <a href="mailto:info@tmt.tm" class="text-white text-base md:text-lg flex items-center gap-2 hover:text-textColor transition-all">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="size-6"
                        >
                            <path
                                    d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"
                            />
                            <path
                                    d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"
                            />
                        </svg>
                        info@tmt.tm
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center text-center">
                <p class="text-white text-base md:text-lg font-semibold">
                    {{ __('ift.project_address') }} {{ __('ift.all_right_reserved') }} &copy; {{date('Y')}}
                    {{--tiftm.com All rights reserved &copy; 2025--}}
                </p>
            </div>
        </div>
    </div>
</footer>
<div id="loader" class="fixed top-0 left-0 z-50 w-full h-full p-5 bg-white flex items-center justify-center">
    <div class="flex justify-center items-center h-full max-h-[250px]">
        <img src="/assets/images/logo.png" class="h-full object-contain animate-pulse"/>
    </div>
</div>
@stack('scriptJS')
</body>
</html>
