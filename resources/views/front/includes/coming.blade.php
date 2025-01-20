@extends('front.includes.base')

@push('styleCSS')
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }} " />--}}
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
                            {{ __('ift.coming_soon') }}
                            {{--Comming soon--}}
                        </h1>
                        <!-- <div class="flex items-center justify-center gap-2 flex-wrap">
                          <a
                            href=""
                            class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all"
                            >Главная страница</a
                          >
                          <span
                            class="text-white text-xl md:text-2xl text-center max-w-5xl"
                            >|</span
                          >
                          <h4
                            class="text-white text-xl md:text-2xl text-center max-w-5xl"
                          >
                            Pегистрации
                          </h4>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="w-full px-5 md:px-10 py-10 flex flex-col">
                    <div class="flex flex-col items-center justify-start gap-2 text-center text-balance">
                        <!-- <h1
                          class="text-headerColor text-4xl md:text-5xl lg:text-6xl font-semibold"
                        >
                          Comming soon
                        </h1> -->
                        <p class="text-textColor text-base md:text-lg">
                            {{ __('ift.coming_soon_text') }}
                            {{--Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum--}}
                            {{--vero repellat nam dolorem exercitationem consequatur,--}}
                            {{--accusantium aspernatur iusto provident repudiandae, quam natus--}}
                            {{--perferendis! Voluptatem, suscipit?--}}
                        </p>
                        <div class="w-full flex items-center justify-center mt-5">
                            <a href="{{ route('front.index') }}" class="px-10 py-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all">
                                {{ __('ift.back_to_home') }}
                                {{--Back to home--}}
                            </a>
                        </div>
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