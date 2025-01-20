<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/assets/images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/swiper.css') }}" />
    {{--<link rel="stylesheet" href="./src/style.css" />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--<script async src="https://www.google.com/recaptcha/api.js"></script>--}}

    <title>IFT 2025</title>
</head>
<body class="min-h-screen">
@laravelTelInputScripts

<div>
    @include('layouts.messages')
</div>
<header class="absolute top-0 left-0 z-40 w-full">
    <div class="w-full bg-primary">
        <div class="container">
            <div
                    class="w-full px-5 md:px-10 py-1 flex items-center justify-between gap-4"
            >
                <div class="flex items-center justify-start gap-4">
                    <a
                            href=""
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
                        +993 12 753638
                    </a>
                    <span class="w-[2px] h-5 bg-white"></span>
                    <a
                            href=""
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
                    <!-- <span class="w-[2px] h-5 bg-white"></span>
                    <a
                      href=""
                      class="text-white text-sm flex items-center gap-2 font-semibold hover:text-textColor transition-all"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-5"
                      >
                        <path
                          d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"
                        />
                        <path
                          d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"
                        />
                      </svg>

                      example@mail.com
                    </a> -->
                </div>
                <div class="flex items-center justify-end gap-4">
                    <!-- <a href="" class="text-white hover:text-textColor transition-all">
                      <svg
                        class="size-5"
                        viewBox="0 0 27 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <g clip-path="url(#clip0_237_118)">
                          <path
                            d="M14.9303 5.84913C14.9303 6.09504 14.9303 6.89657 14.9303 8.03528H19.3296L18.8526 11.5254H14.9303C14.9303 16.9077 14.9303 24.1203 14.9303 24.1203H9.72404C9.72404 24.1203 9.72404 17.0032 9.72404 11.5254H7.01123V8.03528H9.72404C9.72404 6.65121 9.72404 5.66704 9.72404 5.39301C9.72404 4.08741 9.61351 3.46793 10.2369 2.4562C10.8606 1.44453 12.6198 0.107292 15.6625 0.139486C18.706 0.172854 19.9888 0.433411 19.9888 0.433411L19.3296 4.15297C19.3296 4.15297 17.3862 3.69629 16.4323 3.85905C15.4796 4.02185 14.9303 4.54409 14.9303 5.84913Z"
                            fill="currentColor"
                          />
                        </g>
                        <defs>
                          <clipPath id="clip0_237_118">
                            <rect
                              width="27"
                              height="24.0283"
                              fill="white"
                              transform="translate(0 0.115479)"
                            />
                          </clipPath>
                        </defs>
                      </svg>
                    </a>
                    <a href="" class="text-white hover:text-textColor transition-all">
                      <svg
                        class="size-5"
                        viewBox="0 0 27 26"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M8.4915 22.6485C18.68 22.6485 24.2528 14.9676 24.2528 8.30753C24.2528 8.08888 24.2527 7.87188 24.2365 7.65569C25.3206 6.94325 26.2562 6.05867 27 5.04652C25.9902 5.45433 24.9169 5.72178 23.8194 5.83969C24.975 5.20955 25.8404 4.21957 26.2548 3.05142C25.1667 3.63856 23.9773 4.05295 22.7367 4.27528C20.6388 2.24606 17.1301 2.14774 14.8986 4.05658C13.4609 5.28738 12.8493 7.12248 13.2962 8.87286C8.8425 8.66896 4.6926 6.75523 1.8792 3.607C0.40905 5.91013 1.161 8.85539 3.59505 10.3343C2.7135 10.311 1.85085 10.095 1.08 9.70441V9.76837C1.08135 12.1673 2.9403 14.233 5.5242 14.7083C4.7088 14.911 3.8529 14.9404 3.024 14.7942C3.74895 16.848 5.8293 18.2547 8.19855 18.2952C6.237 19.698 3.81375 20.4597 1.31895 20.4573C0.87885 20.456 0.43875 20.4327 0 20.3848C2.53395 21.8637 5.481 22.6485 8.4915 22.6449"
                          fill="currentColor"
                        />
                      </svg>
                    </a> -->
                    <a href="" class="text-white hover:text-textColor transition-all">
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
                    <a href="" class="text-white hover:text-textColor transition-all">
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
            <div class="w-full px-5 md:px-10 flex flex-col">
                <div class="w-full flex items-center justify-between">
                    <a href="./index.html" class="h-[80px] mt-2">
                        <img src="/assets/images/logo.png" alt="" class="h-full" />
                    </a>
                    <div class="flex items-center justify-end gap-5">
                        <a href="" class="w-16 h-16">
                            <img
                                    src="/assets/images/logo1.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                        <span class="w-[2px] h-16 bg-white"></span>
                        <a href="" class="w-16 h-16">
                            <img
                                    src="/assets/images/logo2.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                        <span class="w-[2px] h-16 bg-white"></span>
                        <a href="" class="w-16 h-16">
                            <img
                                    src="/assets/images/logo3.png"
                                    alt=""
                                    class="w-full h-full object-contain"
                            />
                        </a>
                    </div>
                </div>

                <div class="w-full flex items-center justify-center gap-8">
                    <div class="group relative py-4">
                        <a
                                href="./about.html"
                                class="text-white text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            IFT 2025 barada
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
                                    href="./visit.html"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                IFT 2025 Maksatnamasy
                            </a>
                            <a
                                    href="./meeting.html"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Встречи
                            </a>
                            <a
                                    href="./speaker.html"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Спикеры
                            </a>
                            <a
                                    href="./sponsor.html"
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Спонсоры
                            </a>
                        </div>
                    </div>
                    <a
                            href="./agenda.html"
                            class="text-white text-lg font-semibold hover:text-primary transition-all whitespace-nowrap"
                    >
                        IFT 2025 Maksatnamasy
                    </a>
                    <div class="group relative py-4">
                        <button
                                class="text-white text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            Media
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
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                СМИ
                            </a>
                            <a
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Пресс релиз
                            </a>
                            <a
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Итоги мероприятия
                            </a>
                            <a
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Фотогалерея
                            </a>
                        </div>
                    </div>
                    <a
                            href=""
                            class="text-white text-lg font-semibold hover:text-primary transition-all whitespace-nowrap"
                    >
                        Täzelikler
                    </a>

                    <a
                            href="./contact.html"
                            class="px-6 py-2 rounded-xl bg-primary text-white text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all"
                    >Habarlaşmak üçin</a
                    >
                    <div class="group relative py-4">
                        <button
                                class="text-white text-lg font-semibold group-hover:text-primary transition-all flex items-center gap-1"
                        >
                            Tm
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
                            <a
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Tkm
                            </a>
                            <a
                                    href=""
                                    class="text-white text-lg font-semibold hover:text-textColor transition-all"
                            >
                                Eng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <section class="relative">
        <div class="h-[50vh] w-full">
            <img
                    src="/assets/images/hero.jpg"
                    alt=""
                    class="w-full h-full object-cover"
            />
        </div>

        <div
                class="absolute top-0 left-0 w-full h-[50vh] bg-black bg-opacity-30 flex items-end justify-center"
        >
            <div class="container">
                <div
                        class="w-full px-5 md:px-10 py-10 flex flex-col items-center justify-end gap-5 mt-10"
                >
                    <h1
                            class="text-white text-5xl md:text-6xl text-center max-w-5xl font-semibold"
                    >
                        Register
                    </h1>
                    <div class="flex items-center justify-center gap-2 flex-wrap">
                        <a
                                href=""
                                class="text-white text-xl md:text-2xl text-center max-w-5xl active:text-primary md:hover:text-primary transition-all"
                        >Home</a
                        >
                        <span
                                class="text-white text-xl md:text-2xl text-center max-w-5xl"
                        >|</span
                        >
                        <h4
                                class="text-white text-xl md:text-2xl text-center max-w-5xl"
                        >
                            Register
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
                    <div
                            class="flex flex-col items-center md:items-end justify-center gap-2"
                    >
                        <h1
                                class="text-textColor text-5xl md:text-6xl font-semibold text-center md:text-end text-balance max-w-5xl"
                        >
                            Register Form
                        </h1>
                        <p
                                class="text-textColor text-base md:text-lg text-center md:text-end text-balance"
                        >
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Dolorum vero repellat nam dolorem exercitationem consequatur,
                            accusantium aspernatur iusto provident repudiandae, quam natus
                            perferendis! Voluptatem, suscipit?
                        </p>
                    </div>
                    <form onsubmit="return showCustomDialog();" action="{{ route('front.register.send') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-5">
                        @csrf
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label for="name" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Name
                                </label>
                                <input type="text" name="name" id="name" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="surname" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Surname
                                </label>
                                <input type="text" name="surname" id="surname" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="middle_name" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Middle name
                                </label>
                                <input type="text" name="middle_name" id="middle_name" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="company_name" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Company name
                                </label>
                                <input type="text" name="company_name" id="company_name" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>

                            <div class="flex flex-col">
                                <label for="job" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Job
                                </label>
                                <input type="text" name="job" id="job" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="country" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Country
                                </label>
                                <select name="country" id="country" required class="s-example-basic-single border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
                                    <option value="" disabled>choose country</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Uzbeekistan">Uzbeekistan</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="number" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Number
                                </label>
                                <input type="text" name="number" id="number" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="email" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="website" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Website
                                </label>
                                <input type="url" name="website" id="website" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="status" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Status
                                </label>
                                <select name="status" id="status" required class="s-example-basic-single border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none">
                                    <option value="" disabled>choose country</option>
                                    <option value="Delegate">Delegate</option>
                                    <option value="Press">Press</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="Diplomat">A diplomat</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="photo" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Photo (3x4)
                                </label>
                                <input type="file" name="photo" id="photo" required class="border-2 border-textColor p-3 text-base md:text-lg rounded-xl focus:border-primary outline-none"/>
                            </div>
                            <div class="flex flex-col">
                                <label for="visa" class="w-fit text-textColor text-base md:text-lg font-semibold">
                                    Do you need visa
                                </label>
                                <div class="flex items-center mb-4">
                                    <input
                                            id="default-radio-1"
                                            type="radio"
                                            value="yes"
                                            name="visa"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    />
                                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Yes
                                    </label>
                                </div>
                            </div>
                            {{--<div class="flex flex-col" >--}}
                                {{--<div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>--}}
                            {{--</div>--}}
                            {{--<div class="flex flex-col">--}}
                                {{--<strong>Recaptcha : </strong>--}}
                                {{--{!! NoCaptcha::renderJs() !!}--}}
                                {{--{!! NoCaptcha::display() !!}--}}

                                {{--@if ($errors->has('g-recaptcha-response'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        </div>

                        <button
                                class="p-3 rounded-xl bg-primary text-white text-lg font-semibold active:bg-secondary md:hover:bg-secondary transition-all"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- custom dialog -->
    <div id="dialog" style="display: none" class="fixed top-0 left-0 z-50 w-full h-screen bg-black bg-opacity-50 flex items-center justify-center p-5">
        <div class="w-full max-w-lg rounded-xl p-5 bg-white flex flex-col gap-1">
            <h4 class="text-headerColor text-xl md:text-2xl font-semibold">
                Custom Dialog
            </h4>
            <p class="text-textColor text-base md:text-lg">
                Are you sure you want to submit?
            </p>
            <div class="w-full flex items-center gap-5 mt-5">
                <button onclick="submitForm()" class="w-full p-2 rounded-xl bg-primary text-white text-base md:text-lg font-semibold hover:bg-secondary transition-all">
                    OK
                </button>
                <button onclick="closeDialog()" class="w-full p-2 rounded-xl bg-textColor text-white text-base md:text-lg font-semibold hover:bg-headerColor transition-all">
                    Cancel
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
<footer class="w-full bg-gradient-to-r from-primary to-secondary">
    <div class="container">
        <div class="w-full px-5 md:px-10 py-10 flex flex-col gap-10">
            <div
                    class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
            >
                <div class="w-full flex flex-col gap-2">
                    <h1 class="text-4xl text-white font-bold">WHITE LOGO</h1>
                    <p class="text-white text-base md:text-lg">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Aliquam!
                    </p>
                    <div class="flex items-center justify-start gap-4">
                        <a
                                href=""
                                class="text-white hover:text-textColor transition-all"
                        >
                            <svg
                                    class="size-5"
                                    viewBox="0 0 27 25"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <g clip-path="url(#clip0_237_118)">
                                    <path
                                            d="M14.9303 5.84913C14.9303 6.09504 14.9303 6.89657 14.9303 8.03528H19.3296L18.8526 11.5254H14.9303C14.9303 16.9077 14.9303 24.1203 14.9303 24.1203H9.72404C9.72404 24.1203 9.72404 17.0032 9.72404 11.5254H7.01123V8.03528H9.72404C9.72404 6.65121 9.72404 5.66704 9.72404 5.39301C9.72404 4.08741 9.61351 3.46793 10.2369 2.4562C10.8606 1.44453 12.6198 0.107292 15.6625 0.139486C18.706 0.172854 19.9888 0.433411 19.9888 0.433411L19.3296 4.15297C19.3296 4.15297 17.3862 3.69629 16.4323 3.85905C15.4796 4.02185 14.9303 4.54409 14.9303 5.84913Z"
                                            fill="currentColor"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="clip0_237_118">
                                        <rect
                                                width="27"
                                                height="24.0283"
                                                fill="white"
                                                transform="translate(0 0.115479)"
                                        />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a
                                href=""
                                class="text-white hover:text-textColor transition-all"
                        >
                            <svg
                                    class="size-5"
                                    viewBox="0 0 27 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M8.4915 22.6485C18.68 22.6485 24.2528 14.9676 24.2528 8.30753C24.2528 8.08888 24.2527 7.87188 24.2365 7.65569C25.3206 6.94325 26.2562 6.05867 27 5.04652C25.9902 5.45433 24.9169 5.72178 23.8194 5.83969C24.975 5.20955 25.8404 4.21957 26.2548 3.05142C25.1667 3.63856 23.9773 4.05295 22.7367 4.27528C20.6388 2.24606 17.1301 2.14774 14.8986 4.05658C13.4609 5.28738 12.8493 7.12248 13.2962 8.87286C8.8425 8.66896 4.6926 6.75523 1.8792 3.607C0.40905 5.91013 1.161 8.85539 3.59505 10.3343C2.7135 10.311 1.85085 10.095 1.08 9.70441V9.76837C1.08135 12.1673 2.9403 14.233 5.5242 14.7083C4.7088 14.911 3.8529 14.9404 3.024 14.7942C3.74895 16.848 5.8293 18.2547 8.19855 18.2952C6.237 19.698 3.81375 20.4597 1.31895 20.4573C0.87885 20.456 0.43875 20.4327 0 20.3848C2.53395 21.8637 5.481 22.6485 8.4915 22.6449"
                                        fill="currentColor"
                                />
                            </svg>
                        </a>
                        <a
                                href=""
                                class="text-white hover:text-textColor transition-all"
                        >
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
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                        Header
                    </h4>
                    <a
                            href=""
                            class="text-white text-base md:text-lg hover:text-textColor transition-all w-fit"
                    >Lorem ipsum dolor sit.</a
                    >
                    <a
                            href=""
                            class="text-white text-base md:text-lg hover:text-textColor transition-all w-fit"
                    >Lorem ipsum dolor sit.</a
                    >
                    <a
                            href=""
                            class="text-white text-base md:text-lg hover:text-textColor transition-all w-fit"
                    >Lorem ipsum dolor sit.</a
                    >
                </div>
                <div class="w-full flex flex-col gap-2">
                    <h4 class="text-white text-xl md:text-2xl font-semibold">
                        Contact Us
                    </h4>
                    <a
                            href=""
                            class="text-white text-base md:text-lg flex items-center gap-2 font-semibold hover:text-textColor transition-all"
                    >
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
                        +993 65 123456
                    </a>
                    <a
                            href=""
                            class="text-white text-base md:text-lg flex items-center gap-2 font-semibold hover:text-textColor transition-all"
                    >
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

                        example@mail.com
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center text-center">
                <p class="text-white text-base md:text-lg font-semibold">
                    tiftm.com All rights reserved &copy; 2025
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- back to top button -->
<!-- <button
  onclick="topFunction()"
  id="scrollToTop"
  title="Go to top"
  class="group fixed text-4xl font-bold bottom-24 right-4 z-40 w-16 h-16 flex items-center justify-center rounded-full bg-primary text-white border-2 border-white shadow-xl active:bg-secondary md:hover:bg-secondary transition-all"
>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="currentColor"
    class="size-6"
  >
    <path
      fill-rule="evenodd"
      d="M11.47 10.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 12.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z"
      clip-rule="evenodd"
    />
    <path
      fill-rule="evenodd"
      d="M11.47 4.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 6.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z"
      clip-rule="evenodd"
    />
  </svg>
</button> -->
<!-- request call -->
<button
        id="openRequestModal"
        title="Request Call"
        class="group fixed text-4xl font-bold bottom-4 right-4 z-40 w-16 h-16 flex items-center justify-center rounded-full bg-primary text-white border-2 border-white shadow-xl active:bg-secondary md:hover:bg-secondary transition-all"
>
    <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="size-6 group-hover:animate-bounce"
    >
        <path
                fill-rule="evenodd"
                d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                clip-rule="evenodd"
        />
    </svg>
</button>
<!-- loader -->
<div
        id="loader"
        class="fixed top-0 left-0 z-50 w-full h-full p-3 bg-white flex items-center justify-center"
>
    <div class="flex justify-center items-center h-full max-h-[250px]">
        <img
                src="/assets/images/logo.png"
                class="h-full object-contain animate-pulse"
        />
    </div>
</div>
<script>
    function showCustomDialog() {
        document.getElementById("dialog").style.display = "flex";
        return false; // Prevent default form submission
    }

    function closeDialog() {
        document.getElementById("dialog").style.display = "none";
    }

    function submitForm() {
        document.getElementById("dialog").style.display = "none";
        document.forms[0].submit(); // Submit the form
    }
</script>
<script src="{{ asset('assets/plugins/swiper/swiper.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
