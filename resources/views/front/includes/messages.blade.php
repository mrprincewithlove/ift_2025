@if(Session::has('errors'))
    <div id="notificationErrorWrapper" class="active fixed top-0 left-0 w-full h-screen z-50 bg-black bg-opacity-30 flex items-center justify-center p-5">
        <div id="notificationError" class="w-full max-w-lg bg-white rounded-xl p-5 flex flex-col items-center justify-start gap-5">
            <div class="w-full flex items-center justify-end gap-4">
                <button id="closeNotificationError" class="text-textColor active:text-primary md:hover:text-primary transition-all">
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
            <div class="flex flex-col items-center justify-start pb-10">
                <div class="text-red-500">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-40"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <h4 class="text-red-500 text-xl md:text-2xl font-semibold">
                    Error Error Error
                </h4>
                <div class="flex flex-col">
                    @foreach($errors->all() as $error)
                        <p class="text-primary-200 text-sm">{{$error}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

{{--@if(Session::has("error"))--}}
    {{--<div id="errorAlert" class=" fixed  alertMsg  top-[100px] sm:top-[110px] right-0 z-50 w-[90%] sm:w-[40%] flex items-center justify-start gap-2 p-3 rounded-l-md border-t-2 border-b-2 border-l-2 border-red-700 bg-white shadow-lg">--}}
        {{--<div class="text-red-700">--}}
            {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16">--}}
                {{--<path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />--}}
            {{--</svg>--}}
        {{--</div>--}}
        {{--<div class="flex flex-col items-start justify-center">--}}
            {{--<h3 class="text-red-700 text-base sm:text-lg font-bold">{{ __('common.error') }}</h3>--}}
            {{--<p class="text-primary-200 text-sm">{{ Session::get("error") }}</p>--}}
            {{--<p class="text-primary-200 text-sm">{{ __('common.error_message') }}</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}


@if(Session::has('success'))
    <div id="notificationSuccessWrapper" class="active fixed top-0 left-0 w-full h-screen z-50 bg-black bg-opacity-30 flex items-center justify-center p-5">
        <div id="notificationSuccess" class="w-full max-w-lg bg-white rounded-xl p-5 flex flex-col items-center justify-start gap-5">
            <div class="w-full flex items-center justify-end gap-4">
                <button id="closeNotificationSuccess" class="text-textColor active:text-primary md:hover:text-primary transition-all">
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
            <div class="flex flex-col items-center justify-start pb-10 text-center text-balance">
                <div class="text-green-500">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-40"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <h4 class="text-green-500 text-xl md:text-2xl font-semibold mb-2">
                    {{ __('ift.Dear Participant') }}
                </h4>
                <p class="text-textColor text-base md:text-lg">{{ session('success') }}</p>
            </div>
        </div>
    </div>

@endif

