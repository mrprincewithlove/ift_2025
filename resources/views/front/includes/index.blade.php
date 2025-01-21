@extends('front.includes.base')

@push('styleCSS')
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }} " />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@endpush
@section('content')
    <main>
        <section class="relative">
            <div class="h-screen w-full">
                <video
                        src="{{ asset('assets/video.mp4') }}"
                        class="w-full h-full object-cover"
                        autoplay
                        loop
                        muted
                        playsinline
                ></video>
            </div>
            <div class="absolute top-0 left-0 w-full h-screen bg-black bg-opacity-50 flex items-center justify-center">
                <div class="container">
                    <div class="w-full px-5 md:px-10 py-10 flex flex-col items-center justify-center gap-5 mt-10">
                        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl text-center max-w-5xl font-bold">
                            {{ __('ift.main_title') }}
                            {{--IFT 2025 «Investment in the Future of Turkmenistan»--}}
                        </h1>
                        <h4 class="text-white text-xl md:text-2xl text-center max-w-5xl">
                            {{ __('ift.main_title2') }}
                            {{--International Forum on Attracting Investments to the Private--}}
                            {{--Sector--}}
                        </h4>
                        <p class="text-white text-base md:text-lg font-semibold text-center max-w-5xl">
                            {{ __('ift.main_address') }}
                            {{--18.03.2024 Asghabat, Turkmenistan--}}
                        </p>
                        <a href="{{ route('front.register') }}" class="w-full max-w-lg text-center px-10 py-4 rounded-xl bg-primary text-white text-lg md:text-xl md:text-2xl font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                            {{ __('ift.registration') }}
                            {{--Hasaba alynmak--}}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full bg-primary">
            <div class="max-w-[1680px] w-full ml-auto">
                <div class="w-full pr-5 md:pr-0 pl-5 md:pl-10 py-10 grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 items-center">
                    <div class="flex flex-col gap-2">
                        <h4 class="text-white text-xl md:text-2xl font-semibold">
                            {{ __('ift.about_ift_section_title') }}
                            {{--About IFT 2025--}}
                        </h4>
                        <p class="text-white text-base md:text-lg line-clamp-6">
                            {{ __('ift.about_ift_section_text') }}
                            {{--In 2025, Turkmenistan has declared the “International Year of--}}
                            {{--Peace and Trust”, which emphasizes the country&#39;s aspiration--}}
                            {{--to strengthen international cooperation, promote the ideas of--}}
                            {{--peace and mutual trust between peoples. Accordingly, in March--}}
                            {{--this year, Turkmenistan will for the first time become a venue--}}
                            {{--for the IFT 2025 International Forum “Investment in the Future--}}
                            {{--of Turkmenistan”. IFT 2025 is an absolutely new project ready to--}}
                            {{--unite the international community to exchange experience,--}}
                            {{--establish partnerships between countries and realize ambitious--}}
                            {{--projects aimed at the development of all sectors of the economy.--}}
                            {{--The event will be held on March 18 in Ashgabat, the capital of--}}
                            {{--Turkmenistan. This important event will attract leading--}}
                            {{--representatives of major companies, investment funds, experts--}}
                            {{--and government officials who will discuss key areas of--}}
                            {{--infrastructure, transportation, logistics and technology--}}
                            {{--development to enhance the global competitiveness of the region.--}}
                        </p>
                        <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg font-semibold underline">
                            {{ __('ift.read_all') }}
                            {{--Read all--}}
                        </a>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">
                            <a href="/assets/files/konsepsiya.docx" target="_blank" class="text-center border-2 border-white px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.Official support') }}
                                {{--Official support--}}
                            </a>
                            <a href="/assets/files/konsepsiya.docx" target="_blank" class="text-center border-2 border-white px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.Agenda') }}
                                {{--Agenda--}}
                            </a>
                            <a href="/assets/files/konsepsiya.docx" target="_blank" class="text-center border-2 border-white px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.Forum Concept') }}
                                {{--Forum Concept--}}
                            </a>
                            <a href="/assets/files/broshura.pdf" target="_blank" class="text-center border-2 border-white px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.IFT 2025 brochure') }}
                                {{--IFT 2025 brochure--}}
                            </a>
                        </div>
                    </div>
                    <div class="border-[10px] border-r-[10px] md:border-r-0 border-primary customShadow rounded-xl md:rounded-none rounded-l-xl md:rounded-l-full overflow-hidden">
                        <img src="/assets/images/image2.jpg" alt="" class="w-full rounded-xl md:rounded-none"/>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full">
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col gap-5 md:gap-10">
                    <div class="flex flex-col items-center justify-center gap-2">
                        <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold text-center text-balance max-w-5xl">
                            {{ __('ift.Our services') }}
                            {{--Our services--}}
                        </h1>
                    </div>
                    <div class="flex items-start justify-center flex-wrap gap-5 md:gap-10">
                        <a href="{{ route('front.coming_soon') }}" class="group bg-white active:bg-primary md:hover:bg-primary w-full max-w-[440px] flex flex-col items-center justify-start gap-2 text-center text-balance rounded-xl px-4 py-8 customShadow active:scale-105 md:hover:scale-105 transition-all">
                            <div class="size-20 text-primary group-active:text-white md:group-hover:text-white">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="currentColor"
                                        class="w-full h-full"
                                        viewBox="0 0 36 36"
                                        version="1.1"
                                        preserveAspectRatio="xMidYMid meet"
                                >
                                    <path
                                            class="clr-i-solid clr-i-solid-path-1"
                                            d="M6.25,11.5,12,13.16l6.32-4.59-9.07.26A.52.52,0,0,0,9,8.91L6.13,10.56A.51.51,0,0,0,6.25,11.5Z"
                                    />
                                    <path
                                            class="clr-i-solid clr-i-solid-path-2"
                                            d="M34.52,6.36,28.22,5a3.78,3.78,0,0,0-3.07.67L6.12,19.5l-4.57-.2a1.25,1.25,0,0,0-.83,2.22l4.45,3.53a.55.55,0,0,0,.53.09c1.27-.49,6-3,11.59-6.07l1.12,11.51a.55.55,0,0,0,.9.37l2.5-2.08a.76.76,0,0,0,.26-.45l2.37-13.29c4-2.22,7.82-4.37,10.51-5.89A1.55,1.55,0,0,0,34.52,6.36Z"
                                    />
                                    <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                                </svg>
                            </div>
                            <h4 class="text-headerColor group-active:text-white md:group-hover:text-white text-xl md:text-2xl font-bold transition-all">
                                {{ __('ift.Flight') }}
                                {{--Flight--}}
                            </h4>
                            <span class="w-20 h-[2px] bg-headerColor group-active:bg-white md:group-hover:bg-white transition-all"></span>
                        </a>
                        <a href="{{ route('front.coming_soon') }}" class="group bg-white active:bg-primary md:hover:bg-primary w-full max-w-[440px] flex flex-col items-center justify-start gap-2 text-center text-balance rounded-xl px-4 py-8 customShadow active:scale-105 md:hover:scale-105 transition-all">
                            <div class="size-20 text-primary group-active:text-white md:group-hover:text-white">
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
                            </div>
                            <h4 class="text-headerColor group-active:text-white md:group-hover:text-white text-xl md:text-2xl font-bold transition-all">
                                {{ __('ift.Visa support') }}
                                {{--Visa support--}}
                            </h4>
                            <span class="w-20 h-[2px] bg-headerColor group-active:bg-white md:group-hover:bg-white transition-all"></span>
                        </a>
                        <a href="{{ route('front.coming_soon') }}" class="group bg-white active:bg-primary md:hover:bg-primary w-full max-w-[440px] flex flex-col items-center justify-start gap-2 text-center text-balance rounded-xl px-4 py-8 customShadow active:scale-105 md:hover:scale-105 transition-all">
                            <div class="size-20 text-primary group-active:text-white md:group-hover:text-white">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="w-full h-full"
                                        viewBox="-0.5 0 24 24"
                                >
                                    <path
                                            d="m14.275 19.36c.001-.426.346-.771.772-.772h3.101c.426.001.771.346.772.772-.001.426-.346.771-.772.772h-3.101c-.426-.001-.771-.346-.772-.772zm-6.174 0c-.001.426-.346.771-.772.772h-3.101c-.426-.001-.771-.346-.772-.772.001-.426.346-.771.772-.772h3.101c.426.001.771.346.772.772zm-3.741-17.11h13.727c.499 0 .903.404.903.903l-.462 10.349v.001c0 .499-.404.903-.903.903h-12.8c-.499 0-.903-.404-.903-.903v-.001l-.462-10.349c0-.499.405-.903.904-.903zm17.685 1.944h-1.531v-3.143c-.001-.578-.469-1.047-1.047-1.048h-16.48c-.577.002-1.045.47-1.046 1.047v3.143h-1.474c-.255.001-.461.207-.462.462v3.826c0 .255.207.461.462.462h1.474v15.055h3.845v-2.013h10.865v2.013h3.846v-2.839c.015-.066.024-.142.025-.22v-12h1.531c.255-.001.461-.207.462-.462v-3.826c0-.255-.207-.461-.462-.462z"
                                    />
                                </svg>
                            </div>
                            <h4 class="text-headerColor group-active:text-white md:group-hover:text-white text-xl md:text-2xl font-bold transition-all">
                                {{ __('ift.Logistics') }}
                                {{--Logistics--}}
                            </h4>
                            <span class="w-20 h-[2px] bg-headerColor group-active:bg-white md:group-hover:bg-white transition-all"></span>
                        </a>
                        <a href="{{ route('front.coming_soon') }}" class="group bg-white active:bg-primary md:hover:bg-primary w-full max-w-[440px] flex flex-col items-center justify-start gap-2 text-center text-balance rounded-xl px-4 py-8 customShadow active:scale-105 md:hover:scale-105 transition-all">
                            <div class="size-20 text-primary group-active:text-white md:group-hover:text-white">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="w-full h-full"
                                        viewBox="0 -32 576 576"
                                >
                                    <path
                                            d="M560 64c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16H16C7.16 0 0 7.16 0 16v32c0 8.84 7.16 16 16 16h15.98v384H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h240v-80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v80h240c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16h-16V64h16zm-304 44.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm0 96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm-128-96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zM179.2 256h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8zM192 384c0-53.02 42.98-96 96-96s96 42.98 96 96H192zm256-140.8c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-96c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4z"
                                    />
                                </svg>
                            </div>
                            <h4 class="text-headerColor group-active:text-white md:group-hover:text-white text-xl md:text-2xl font-bold transition-all">
                                {{ __('ift.Hotel') }}
                                {{--Hotel--}}
                            </h4>
                            <span class="w-20 h-[2px] bg-headerColor group-active:text-white md:group-hover:text-white transition-all"></span>
                        </a>
                        <a href="{{ route('front.coming_soon') }}" class="group bg-white active:bg-primary md:hover:bg-primary w-full max-w-[440px] flex flex-col items-center justify-start gap-2 text-center text-balance rounded-xl px-4 py-8 customShadow active:scale-105 md:hover:scale-105 transition-all">
                            <div class="size-20 text-primary group-active:text-white md:group-hover:text-white">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.0"
                                        id="Layer_1"
                                        class="w-full h-full"
                                        viewBox="0 0 64 64"
                                        enable-background="new 0 0 64 64"
                                        xml:space="preserve"
                                >
                    <g>
                        <path
                                fill="currentColor"
                                d="M62.364,0.773c-0.694-0.509-1.526-0.772-2.366-0.772c-0.403,0-0.809,0.061-1.202,0.185l-9.276,2.93   c0.102,0.175,0.183,0.386,0.234,0.649c0.286,1.477-0.732,2.198-1.188,3.606c0.456,1.195,0.159,2.094,0.785,3.078   c0.584,0.893,1.581,0.5,1.995,1.545c0.637,1.586-0.393,3.215-1.592,4.108c-0.388,0.284-0.748,0.38-1.108,0.38   c-0.641,0-1.279-0.301-2.07-0.38c-2.212-0.213-3.385-0.97-5.555-1.546c-2.187-0.563-3.505-1.598-5.509-1.598   c-0.268,0-0.547,0.019-0.843,0.059c-1.607,0.233-3.03-0.151-3.975,1.539c-0.901,1.635-0.949,3.558,0,5.152   c0.817,1.345,1.889,1.174,3.179,1.532c0.56,0.154,1.05,0.206,1.517,0.206c0.947,0,1.794-0.213,2.901-0.213   c0.113,0,0.229,0.002,0.347,0.007c0.22,0.009,0.43,0.013,0.634,0.013c0.752,0,1.409-0.048,2.053-0.048   c0.907,0,1.787,0.095,2.869,0.55c1.321,0.55,1.836,1.601,3.178,2.061c0.495,0.169,0.945,0.233,1.372,0.233   c1.383,0,2.528-0.682,4.194-0.756c1.013-0.036,1.851-0.505,2.675-0.504c0.428,0,0.852,0.126,1.294,0.504   c1.146,1.004,0.541,2.926,1.581,4.114c0.881,1.024,1.613,1.312,2.78,1.546c0.528,0.101,1.002,0.196,1.451,0.196   c0.442,0,0.86-0.095,1.281-0.367V4C64,2.726,63.393,1.527,62.364,0.773z"
                        />
                        <path
                                fill="currentColor"
                                d="M46.773,14.112c0.515,0.052,0.955,0.162,1.309,0.252c0.166,0.042,0.384,0.097,0.505,0.113   c0.448-0.344,0.963-0.978,0.948-1.507c-0.477-0.184-1.27-0.527-1.872-1.448c-0.596-0.938-0.7-1.829-0.776-2.479   c-0.044-0.372-0.078-0.666-0.189-0.959c-0.163-0.426-0.175-0.896-0.034-1.329c0.223-0.688,0.527-1.231,0.772-1.667   c0.29-0.516,0.367-0.684,0.368-0.826c-0.127-0.028-0.285-0.059-0.415-0.082c-0.218-0.041-0.472-0.094-0.736-0.159L43,5.174v7.9   c0.274,0.094,0.548,0.188,0.794,0.275C44.813,13.714,45.619,14.001,46.773,14.112z"
                        />
                        <path
                                fill="currentColor"
                                d="M0,11v6.054c0.659,0.069,1.257,0.104,1.86,0.104c0.646,0,1.271-0.035,2.062-0.078l0.807-0.044   c0.425-0.023,0.847-0.168,1.335-0.335c0.661-0.228,1.412-0.484,2.314-0.484c0.725,0,1.437,0.173,2.098,0.504   c1.245,0.607,1.876,1.559,2.383,2.322c0.274,0.413,0.511,0.77,0.811,1.021c0.709,0.595,1.312,0.808,2.148,1.102   c0.826,0.292,1.763,0.622,2.845,1.348c0.894,0.601,1.636,1.149,2.338,1.737V0.475L2.617,7.247C1.045,7.826,0,9.324,0,11z"
                        />
                        <path
                                fill="currentColor"
                                d="M39.271,23.254c-0.229,0-0.467-0.004-0.716-0.015c-0.09-0.003-0.179-0.005-0.265-0.005   c-0.462,0-0.888,0.049-1.339,0.1c-0.488,0.056-0.993,0.113-1.562,0.113c-0.7,0-1.371-0.091-2.052-0.279   c-0.225-0.062-0.464-0.107-0.717-0.154c-1.016-0.191-2.55-0.479-3.646-2.281c-1.29-2.169-1.303-4.838-0.027-7.151   c1.267-2.267,3.243-2.387,4.551-2.466c0.312-0.019,0.605-0.037,0.898-0.079c0.375-0.052,0.75-0.077,1.114-0.077   c1.619,0,2.844,0.492,4.026,0.968c0.482,0.193,0.958,0.37,1.462,0.53V5.784L24.265,0.205C23.854,0.068,23.428,0,23,0v26.147   c0.383,0.402,0.779,0.836,1.213,1.329c0.519,0.591,0.866,1.182,1.146,1.657c0.334,0.567,0.521,0.873,0.81,1.06   c0.04,0.025,0.059,0.031,0.078,0.032c0.153,0,0.454-0.089,0.745-0.176c0.528-0.157,1.188-0.354,1.961-0.354   c0.571,0,1.128,0.109,1.669,0.33l0.347,0.143c1.569,0.643,3.521,1.443,4.364,4.208c0.527,1.7,0.525,3.133-0.001,4.777   c-0.387,1.233-1.182,1.86-1.657,2.234c-0.111,0.089-0.265,0.209-0.295,0.249l-0.017,0.052c-0.024,0.084,0.025,0.346,0.07,0.576   c0.123,0.635,0.309,1.595-0.14,2.712c-0.764,1.856-2.263,2.798-4.456,2.798c-0.229,0-0.461-0.009-0.689-0.023   c-1.413-0.083-2.312-0.787-2.968-1.302c-0.241-0.189-0.47-0.368-0.71-0.51c-0.576-0.34-1.048-0.718-1.47-1.091v13.345l17.796,5.62   c0.067,0.021,0.137,0.03,0.204,0.048V23.214c-0.183,0.004-0.362,0.007-0.552,0.014C40.075,23.24,39.688,23.254,39.271,23.254z"
                        />
                        <path
                                fill="currentColor"
                                d="M20.09,43.093c-0.058-0.004-0.114-0.009-0.17-0.012c-0.002,0.063-0.004,0.127-0.006,0.181   c-0.022,0.691-0.055,1.735-0.769,2.666c-0.82,1.09-1.949,1.666-3.265,1.666c-0.718,0-1.395-0.167-1.991-0.314l-0.363-0.088   c-1.226-0.279-1.983-1.005-2.537-1.534c-0.263-0.252-0.512-0.49-0.659-0.526c-0.365-0.088-0.682-0.164-0.861-0.164   c-0.043,0-0.122,0-0.3,0.072c-0.45,0.184-0.708,0.805-1.19,2.18c-0.151,0.434-0.31,0.884-0.489,1.333   c-0.162,0.41-0.198,0.939-0.235,1.5c-0.075,1.11-0.177,2.632-1.433,3.827C4.926,54.734,3.91,55.15,2.719,55.15   c-0.613,0-1.186-0.109-1.739-0.215l-0.104-0.021C0.57,54.854,0.281,54.782,0,54.7V60c0,1.274,0.607,2.473,1.636,3.227   C2.33,63.735,3.16,64,4,64c0.404,0,0.811-0.062,1.204-0.186L21,58.826V43.193c-0.111-0.041-0.222-0.063-0.34-0.068   C20.462,43.119,20.272,43.106,20.09,43.093z"
                        />
                        <path
                                fill="currentColor"
                                d="M54.77,41.25c-0.93-0.286-1.528-0.468-2.054-0.19c0.165,0.238,0.497,0.591,0.735,0.843   c0.9,0.954,2.132,2.26,1.539,3.812c-0.413,1.104-1.393,1.496-2.107,1.782c-0.679,0.271-0.833,0.373-0.87,0.572   c-0.038,0.209,0.021,0.279,0.055,0.32c0.193,0.231,0.798,0.464,1.717,0.464c1.042,0,2.11-0.295,2.721-0.751   c1.052-0.807,1.4-1.912,1.118-3.578C57.345,42.836,56.411,41.767,54.77,41.25z"
                        />
                        <path
                                fill="currentColor"
                                d="M60.979,30.936l-0.104-0.021c-1.498-0.3-2.675-0.772-3.893-2.189c-0.879-1.005-1.068-2.183-1.207-3.042   c-0.048-0.301-0.12-0.751-0.198-0.893c-0.146,0.012-0.427,0.09-0.676,0.158c-0.509,0.141-1.142,0.316-1.875,0.343   c-0.615,0.027-1.179,0.179-1.775,0.34c-0.728,0.196-1.553,0.418-2.508,0.418c-0.685,0-1.344-0.111-2.021-0.342   c-1.055-0.361-1.744-0.943-2.298-1.41c-0.379-0.32-0.653-0.551-1.007-0.698c-0.146-0.062-0.282-0.106-0.418-0.15V63.86   c0.088-0.023,0.178-0.036,0.265-0.065l18-6C62.898,57.25,64,55.722,64,54V30.948c-0.406,0.122-0.827,0.202-1.281,0.202   C62.105,31.15,61.533,31.041,60.979,30.936z M57.712,49.697c-0.973,0.727-2.438,1.156-3.928,1.156c-1.462,0-2.616-0.42-3.253-1.183   c-0.453-0.544-0.621-1.222-0.485-1.96c0.241-1.33,1.356-1.775,2.094-2.071c0.594-0.237,0.884-0.377,0.979-0.633   c0.147-0.386-0.616-1.195-1.122-1.731c-0.758-0.803-1.473-1.561-1.361-2.525c0.042-0.357,0.225-0.872,0.856-1.289   c0.562-0.366,1.151-0.543,1.804-0.543c0.691,0,1.332,0.196,2.01,0.404c2.427,0.763,3.889,2.44,4.29,4.872   C59.999,46.577,59.365,48.43,57.712,49.697z"
                        />
                        <path
                                fill="currentColor"
                                d="M12.384,21.596c-1.199-1.004-1.448-2.425-2.785-3.077c-0.437-0.219-0.837-0.302-1.221-0.302   c-1.145,0-2.145,0.739-3.539,0.816c-1.177,0.06-2.053,0.125-2.979,0.125c-0.572,0-1.169-0.027-1.86-0.094v33.519   c0.376,0.165,0.783,0.274,1.268,0.371c0.528,0.101,1.002,0.196,1.451,0.196c0.596,0,1.146-0.169,1.722-0.718   c1.184-1.127,0.521-2.926,1.188-4.616c0.817-2.041,1.099-3.943,2.786-4.63c0.393-0.158,0.725-0.22,1.054-0.22   c0.413,0,0.82,0.098,1.329,0.22c1.357,0.33,1.809,1.744,3.173,2.055c0.679,0.159,1.318,0.353,1.91,0.353   c0.609,0,1.168-0.206,1.666-0.868c0.685-0.893,0.037-2.268,0.79-3.078c0.437-0.475,0.872-0.576,1.357-0.576   c0.315,0,0.653,0.044,1.025,0.055c0.101,0.004,0.186,0.03,0.28,0.043v-14.21c-1.035-1.028-2.025-1.827-3.453-2.786   C15.631,22.888,14.193,23.113,12.384,21.596z"
                        />
                        <path
                                fill="currentColor"
                                d="M28.265,45.756c0.193,0.012,0.385,0.02,0.572,0.02c1.098,0,2.076-0.269,2.606-1.559   c0.43-1.072-0.335-1.951,0-3.091c0.376-1.333,1.57-1.265,1.979-2.569c0.414-1.291,0.403-2.287,0-3.587   c-0.615-2.02-1.974-2.432-3.57-3.098c-0.312-0.127-0.61-0.176-0.899-0.176c-0.952,0-1.805,0.529-2.706,0.529   c-0.376,0-0.761-0.092-1.165-0.354C24.04,31.198,23.747,30.17,23,29.161v12.98c0.759,0.649,1.463,1.474,2.484,2.075   C26.557,44.849,27.087,45.687,28.265,45.756z"
                        />
                    </g>
                  </svg>
                            </div>
                            <h4 class="text-headerColor group-active:text-white md:group-hover:text-white text-xl md:text-2xl font-bold transition-all">
                                {{ __('ift.City tours') }}
                                {{--City tours--}}
                            </h4>
                            <span class="w-20 h-[2px] bg-headerColor group-active:text-white md:group-hover:text-white transition-all"></span>

                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full min-h-screen relative">
            <div class="min-h-screen h-full w-full absolute top-0 left-0 -z-10">
                <img src="/assets/images/tstb.jpg" alt="" class="w-full min-h-screen h-full object-cover"/>
            </div>
            <div class="w-full min-h-screen bg-black bg-opacity-50 flex items-center justify-center">
                <div class="container">
                    <div class="w-full px-5 md:px-10 py-10 flex flex-col gap-5 md:gap-10">
                        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl text-center font-semibold">
                            {{ __('ift.Union of Industrialists and Entrepreneurs of Turkmenistan') }}
                            {{--Union of Industrialists and Entrepreneurs of Turkmenistan--}}
                        </h1>

                        <div class="numberEl hiddenEl w-full flex flex-col md:flex-row items-start justify-evenly gap-5 md:gap-10">
                            <div class="w-full flex flex-col items-center justify-start gap-2 text-center text-balance">
                                <div class="text-white">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="size-16 md:size-20"
                                    >
                                        <path
                                                d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z"
                                        />
                                    </svg>
                                </div>
                                <h2 akhi="29700" class="value text-white text-xl md:text-2xl font-bold">
                                    0
                                </h2>
                                <p class="text-white text-base md:text-lg">
                                    {{ __('ift.Number of entrepreneurs with us') }}
                                    {{--Number of entrepreneurs with us--}}
                                </p>
                            </div>
                            <div class="w-full flex flex-col items-center justify-start gap-2 text-center text-balance">
                                <div class="text-white">
                                    <svg
                                            version="1.0"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-16 md:size-20"
                                            viewBox="0 0 512.000000 512.000000"
                                            preserveAspectRatio="xMidYMid meet"
                                    >
                                        <g
                                                transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="currentColor"
                                                stroke="none"
                                        >
                                            <path
                                                    d="M680 4905 l0 -85 -310 0 -310 0 0 -450 0 -450 310 0 310 0 0 -85 0
-85 85 0 85 0 0 -1660 0 -1660 -425 0 -425 0 0 -150 0 -150 2560 0 2560 0 0
150 0 150 -75 0 -75 0 0 1285 0 1285 -385 0 -385 0 0 -625 0 -625 -268 0 -267
0 -240 240 -240 240 -282 0 -283 0 0 -900 0 -900 -435 0 -435 0 0 1660 0 1660
85 0 85 0 0 85 0 85 800 0 800 0 0 -245 0 -245 150 0 150 0 0 245 0 245 372 2
371 3 -443 448 -442 447 -879 0 -879 0 0 85 0 85 -620 0 -620 0 0 -85z m0
-535 l0 -150 -160 0 -160 0 0 150 0 150 160 0 160 0 0 -150z m1585 0 l150
-150 -248 0 -247 0 0 150 0 150 98 0 97 0 150 -150z m855 147 c0 -1 -64 -66
-143 -145 l-142 -142 -145 145 -145 145 288 0 c158 0 287 -1 287 -3z m580
-152 l145 -145 -295 0 -295 0 145 145 c80 80 147 145 150 145 3 0 70 -65 150
-145z m-2250 -800 l0 -185 -150 0 -150 0 0 185 0 185 150 0 150 0 0 -185z m0
-825 l0 -340 -150 0 -150 0 0 340 0 340 150 0 150 0 0 -340z m0 -980 l0 -340
-150 0 -150 0 0 340 0 340 150 0 150 0 0 -340z m2090 -805 l0 -235 -150 0
-150 0 0 235 0 235 150 0 150 0 0 -235z m920 0 l0 -235 -150 0 -150 0 0 235 0
235 150 0 150 0 0 -235z m-3010 -180 l0 -345 -150 0 -150 0 0 345 0 345 150 0
150 0 0 -345z"
                                            />
                                        </g>
                                    </svg>
                                </div>
                                <h2 akhi="22500" class="value text-white text-xl md:text-2xl font-bold">
                                    0
                                </h2>
                                <p class="text-white text-base md:text-lg">
                                    {{ __('ift.Completed projects') }}
                                    {{--Completed projects--}}
                                </p>
                            </div>
                            <div class="w-full flex flex-col items-center justify-start gap-2 text-center text-balance">
                                <div class="text-white">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-16 md:size-20"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"
                                        />
                                    </svg>
                                </div>
                                <h2 akhi="16" class="value text-white text-xl md:text-2xl font-bold">
                                    0
                                </h2>
                                <p class="text-white text-base md:text-lg">
                                    {{ __('ift.We have been helping to work since the year') }}
                                    {{--We have been helping to work since the year--}}
                                </p>
                            </div>
                            <div class="w-full flex flex-col items-center justify-start gap-2 text-center text-balance">
                                <div class="text-white">
                                    <svg
                                            version="1.0"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-16 md:size-20"
                                            viewBox="0 0 512.000000 512.000000"
                                            preserveAspectRatio="xMidYMid meet"
                                    >
                                        <g
                                                transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="currentColor"
                                                stroke="none"
                                        >
                                            <path
                                                    d="M2505 5108 c-44 -15 -1485 -718 -1517 -740 -16 -11 -31 -31 -34 -44
-14 -56 1 -67 299 -213 321 -157 297 -135 297 -270 0 -36 9 -127 20 -201 11
-74 23 -154 26 -176 5 -34 3 -45 -16 -64 -39 -39 -60 -99 -60 -175 0 -167 39
-283 111 -325 87 -52 106 -75 124 -150 68 -278 311 -534 595 -626 74 -24 101
-27 210 -27 109 0 136 3 210 27 284 92 527 348 595 626 18 75 37 98 124 150
72 42 111 158 111 325 0 76 -21 136 -60 175 -19 19 -21 30 -16 64 3 22 15 102
26 176 11 74 20 165 20 201 0 132 -8 122 177 210 91 44 166 79 169 79 2 0 4
-90 4 -201 0 -200 0 -201 -25 -231 -31 -37 -34 -94 -5 -130 19 -25 19 -25 -12
-203 -31 -168 -31 -178 -15 -190 28 -20 96 -27 157 -15 89 17 88 13 52 211
-31 172 -31 172 -11 197 28 36 25 93 -6 130 l-25 30 0 230 0 231 61 32 c34 18
66 43 71 55 15 32 2 70 -30 92 -35 24 -1476 726 -1521 741 -40 13 -66 13 -106
-1z"
                                            />
                                            <path
                                                    d="M1690 1783 c-194 -108 -325 -170 -504 -240 -387 -150 -660 -320 -744
-462 l-27 -46 -3 -518 -3 -517 2151 0 2151 0 -3 518 -3 517 -27 46 c-83 142
-356 311 -743 462 -190 74 -285 119 -488 232 -95 52 -181 95 -191 95 -55 0
-72 -25 -257 -392 -230 -457 -314 -585 -406 -624 -28 -12 -38 -12 -65 0 -94
39 -178 169 -407 625 -185 366 -201 391 -258 391 -10 0 -88 -39 -173 -87z"
                                            />
                                        </g>
                                    </svg>
                                </div>
                                <h2 akhi="80500" class="value text-white text-xl md:text-2xl font-bold">
                                    0
                                </h2>
                                <p class="text-white text-base md:text-lg">
                                    {{ __('ift.Number of future entrepreneurs who have received education') }}
                                    {{--Bilim alan geljekki telekeçileriň sany--}}
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex items-center justify-center">
                            <a href="{{ route('front.coming_soon') }}" class="px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.Detailed information') }}
                                {{--Detailed information--}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full bg-primary">
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col gap-5 md:gap-10">
                    <div class="flex flex-col items-center justify-center gap-2">
                        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-semibold text-center">
                            {{ __('ift.WHY JOIN IFT 2025?') }}
                            {{--WHY JOIN IFT 2025?--}}
                        </h1>

                    </div>
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-10">
                        <a class="group relative w-full min-h-[250px] bg-no-repeat bg-center gap-5 rounded-xl p-5 customShadow active:scale-105 md:hover:scale-105 transition-all" style="background-image: url('/assets/images/image1.jpg')">
                            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center text-center bg-black bg-opacity-50 rounded-xl p-2">
                                <div class="flex flex-col gap-2">
                                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                                        {{ __('ift.An impressive experience') }}
                                        {{--An impressive experience--}}
                                    </h4>
                                    <p class="text-white text-base md:text-lg"></p>
                                </div>
                            </div>
                        </a>
                        <a class="group relative w-full min-h-[250px] bg-no-repeat bg-center gap-5 rounded-xl p-5 customShadow active:scale-105 md:hover:scale-105 transition-all" style="background-image: url('/assets/images/image2.jpg')">
                            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center text-center bg-black bg-opacity-50 rounded-xl p-2">
                                <div class="flex flex-col gap-2">
                                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                                        {{ __('ift.Rich business and cultural program') }}
                                        {{--Rich business and cultural program--}}
                                    </h4>
                                    <p class="text-white text-base md:text-lg"></p>
                                </div>
                            </div>
                        </a>
                        <a class="group relative w-full min-h-[250px] bg-no-repeat bg-center gap-5 rounded-xl p-5 customShadow active:scale-105 md:hover:scale-105 transition-all" style="background-image: url('/assets/images/image3.jpg')">
                            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center text-center bg-black bg-opacity-50 rounded-xl p-2">
                                <div class="flex flex-col gap-2">
                                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                                        {{ __('ift.Space for business communication and networking') }}
                                        {{--Space for business communication and networking--}}
                                    </h4>
                                    <p class="text-white text-base md:text-lg"></p>
                                </div>
                            </div>
                        </a>
                        <a class="group relative w-full min-h-[250px] bg-no-repeat bg-center gap-5 rounded-xl p-5 customShadow active:scale-105 md:hover:scale-105 transition-all" style="background-image: url('/assets/images/image5.jpg')">
                            <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center text-center bg-black bg-opacity-50 rounded-xl p-2">
                                <div class="flex flex-col gap-2">
                                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                                        {{ __('ift.Exhibitions introducing the latest technologies') }}
                                        {{--Exhibitions introducing the latest technologies--}}
                                    </h4>
                                    <p class="text-white text-base md:text-lg"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
                    <div class="flex flex-col items-center gap-5 md:gap-10">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold text-center text-balance max-w-5xl">
                                {{ __('ift.Organizers') }}
                                {{--Organizers--}}
                            </h1>
                        </div>
                        <div class="flex gap-5 md:gap-10">
                            <a href="https://tstb.gov.tm/" target="_blank" class="hover:scale-105 transition-all">
                                <div class="h-[130px] flex items-center justify-center">
                                    <img src="/assets/images/logo1.png" alt="" class="h-full block"/>
                                </div>
                            </a>
                            <a href="https://cci.gov.tm/" target="_blank" class="hover:scale-105 transition-all">
                                <div class="h-[130px] flex items-center justify-center">
                                    <img src="/assets/images/logo2.png" alt="" class="h-full block"/>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-5 md:gap-10">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold text-center text-balance max-w-5xl">
                                {{ __('ift.Co-organizer') }}
                                {{--Co-organizer--}}
                            </h1>
                        </div>
                        <div class="flex gap-5 md:gap-10">
                            <a href="https://tmt.tm" class="hover:scale-105 transition-all">
                                <div class="h-[130px] flex items-center justify-center">
                                    <img src="/assets/images/logo3.png" alt="" class="h-full block"/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="containesr">
                <div class="w-full py-10 flex flex-col">
                    <div class="flex flex-col items-center justify-center gap-2">
                        <h1 class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold text-center text-balance max-w-5xl">
                            {{ __('ift.Our partners') }}
                            {{--Our partners--}}
                        </h1>
                    </div>
                    <div class="w-full swiper partnerSlider py-9 md:py-14">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide hover:scale-105 transition-all">
                                <a href="" class="">
                                    <div class="h-[80px] flex items-center justify-center">
                                        <img src="/assets/images/partner1.svg" alt="" class="h-full block object-contain"/>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover:scale-105 transition-all">
                                <a href="" class="">
                                    <div class="h-[80px] flex items-center justify-center">
                                        <img src="/assets/images/partner2.png" alt="" class="h-full block object-contain"/>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide hover:scale-105 transition-all">
                                <a href="" class="">
                                    <div class="h-[80px] flex items-center justify-center">
                                        <img src="/assets/images/partner3.png" alt="" class="h-full block object-contain"/>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover:scale-105 transition-all">
                                <a href="" class="">
                                    <div class="h-[80px] flex items-center justify-center">
                                        <img src="/assets/images/partner4.jpg" alt="" class="h-full block object-contain"/>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide hover:scale-105 transition-all">
                                <a href="" class="">
                                    <div class="h-[80px] flex items-center justify-center">
                                        <img src="/assets/images/partner5.jpg" alt="" class="h-full block object-contain"/>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- <div
                          class="custom-swiper-button-next2 absolute z-10 top-1/2 right-5 -translate-y-1/2 w-10 h-10 rounded-md hidden md:flex items-center justify-center bg-primary text-white shadow-lg active:bg-secondary md:hover:bg-secondary transition-all"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m8.25 4.5 7.5 7.5-7.5 7.5"
                            />
                          </svg>
                        </div>
                        <div
                          class="custom-swiper-button-prev2 absolute z-10 top-1/2 left-5 -translate-y-1/2 w-10 h-10 rounded-md hidden md:flex items-center justify-center bg-primary text-white shadow-lg active:bg-secondary md:hover:bg-secondary transition-all"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15.75 19.5 8.25 12l7.5-7.5"
                            />
                          </svg>
                        </div> -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full bg-primary">
            <div class="max-w-[1680px] w-full mr-auto">
                <div class="w-full pl-5 md:pl-0 pr-5 md:pr-10 py-10 grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 items-center">
                    <div class="border-[10px] border-l-[10px] md:border-l-0 border-primary customShadow rounded-xl md:rounded-none rounded-r-xl md:rounded-r-full overflow-hidden">
                        <img src="/assets/images/image2.jpg" alt="" class="w-full rounded-xl md:rounded-none"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h4 class="text-white text-xl md:text-2xl font-semibold">
                            {{ __('ift.About the exhibition') }}
                            {{--About the exhibition--}}
                        </h4>

                        <p class="text-white text-base md:text-lg line-clamp-6">
                            {{ __('ift.About the exhibition text') }}
                            {{--In honor of the 17th anniversary of the formation of the Union--}}
                            {{--of Industrialists and Entrepreneurs of Turkmenistan, an--}}
                            {{--exhibition will be held from March 17 to 19, 2025. More than 200--}}
                            {{--SPPT members specializing in various industries will present--}}
                            {{--their products and achievements for 17 years of work. The--}}
                            {{--exhibition will reveal the experience and opportunities of--}}
                            {{--Turkmen entrepreneurs. The three-day multidisciplinary--}}
                            {{--exhibition will familiarize visitors with modern achievements of--}}
                            {{--the private sector of Turkmenistan&#39;s economy, where they--}}
                            {{--will be able to see samples of innovative products of--}}
                            {{--enterprises, new types of services offered by businesses. Of--}}
                            {{--great interest is the demonstration of import-substituting--}}
                            {{--products - goods, the production of which is established in--}}
                            {{--Turkmenistan and which can compete with foreign analogs.--}}
                        </p>
                        <a href="{{ route('front.coming_soon') }}" class="text-white text-base md:text-lg font-semibold underline">
                            {{ __('ift.Read more') }}
                            {{--Read more--}}
                        </a>
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
                                {{ __('ift.Contact us') }}
                                {{--Contact us--}}
                            </h1>

                            <div class="flex items-center flex-wrap gap-4 mt-5">
                                <a href="tel:+99312753638" class="text-textColor text-base md:text-lg flex items-center gap-2 font-semibold hover:text-primary transition-all">
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
                                    +993 12 753638
                                </a>
                                <a href="tel:+99312753644" class="text-textColor text-base md:text-lg flex items-center gap-2 font-semibold hover:text-primary transition-all">
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
                                <a href="mailto:info@tmt.tm" class="text-textColor text-base md:text-lg flex items-center gap-2 font-semibold hover:text-primary transition-all">
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
                        <form action="{{ route('front.feedback.send') }}" method="POST" class="w-full grid grid-cols-2 gap-5">
                            @csrf
                            <div class="col-span-2 sm:col-span-1 flex flex-col">
                                <label for="name" class="required w-fit {{ $errors->has('name') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.name') }}
                                    {{--Имя--}}
                                </label>
                                <input type="text" name="name" id="name" class="border-2 {{ $errors->has('name') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"  value="{{ old('name') }}"/>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col justify-end">
                                <label for="surname" class="required w-fit {{ $errors->has('surname') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.surname') }}
                                    {{--Фамилия--}}
                                </label>
                                <input type="text" name="surname" id="surname" class="border-2 {{ $errors->has('surname') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"  value="{{ old('surname') }}"/>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col">
                                <label for="email" class="required w-fit {{ $errors->has('email') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.email') }}
                                    {{--Адрес электронной почты--}}
                                </label>
                                <input type="email" name="email" id="email" class="border-2 {{ $errors->has('email') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none" value="{{ old('email') }}"/>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex flex-col">
                                <label for="number" class="required w-fit {{ $errors->has('number') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.number') }}
                                    {{--Номер телефона--}}
                                </label>
                                <input type="text" name="number" id="number" class="border-2 {{ $errors->has('number') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none" value="{{ old('number') }}"/>
                            </div>
                            <div class="col-span-2 flex flex-col">
                                <label for="message" class="required w-fit {{ $errors->has('message') ? 'text-red-500' : 'text-textColor' }} text-base md:text-lg font-semibold">
                                    {{ __('ift.message') }}
                                    {{--Cобщение--}}
                                </label>

                                <textarea name="message" id="message" cols="30" rows="5" class="border-2 {{ $errors->has('message') ? 'border-red-500' : 'border-textColor' }} p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none resize-none"
                                >{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="col-span-2 p-3 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.send') }}
                                {{--Отправить--}}
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

    <script src="{{ asset('assets/js/main.js') }}"></script>



@endpush