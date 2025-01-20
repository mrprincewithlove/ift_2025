<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('ucp/dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>{{env('APP_NAME')}} </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('ucp/dist/css/app.css') }}"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
{{--<link rel="stylesheet" href="dist/css/app.css" />--}}
<!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="py-5">

<div>
    @include('layouts.messages')
</div>
<!-- BEGIN: Mobile Menu -->
@include('layouts.admin_mobile_sidebar')
<!-- END: Mobile Menu -->
<div class="flex mt-[4.7rem] md:mt-0">
    <!-- BEGIN: Side Menu -->
@include('layouts.admin_sidebar')
<!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="top-bar flex items-center justify-end">
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                     aria-expanded="false" data-tw-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="bell" data-lucide="bell"
                         class="lucide lucide-bell notification__icon dark:text-slate-500">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 01-3.46 0"></path>
                    </svg>
                </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-content">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                {{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
                                     {{--src="dist/images/profile-3.jpg">--}}
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                    injected humour, or randomi
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                {{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
                                     {{--src="dist/images/profile-10.jpg">--}}
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                    injected humour, or randomi
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                {{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
                                     {{--src="dist/images/profile-14.jpg">--}}
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                    Ipsum is not simply random text. It has roots in a piece of classical Latin
                                    literature from 45 BC, making it over 20
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                {{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
                                     {{--src="dist/images/profile-6.jpg">--}}
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                    Ipsum is not simply random text. It has roots in a piece of classical Latin
                                    literature from 45 BC, making it over 20
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                {{--<img alt="Midone - HTML Admin Template" class="rounded-full"--}}
                                     {{--src="dist/images/profile-15.jpg">--}}
                                <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a>
                                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of
                                    the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                    dummy text ever since the 1500
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--begin language --}}
            <div class="intro-x dropdown w-8 h-8 mr-2">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 flex items-center justify-center" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                    {{--<i data-lucide="globe" class="w-3 h-3 text-white"></i>--}}
                </div>
                <div class="dropdown-menu w-24">
                    <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li>
                            <a href="{{route('locale', 'tm')}}" class="dropdown-item hover:bg-white/5 flex items-center justify-start gap-2"> <img style="height: 17px; width: 20px;" src="{{asset('/assets/img/tm.svg')}}"> Tm</a>
                        </li>
                        <li>
                            <a href="{{route('locale', 'ru')}}" class="dropdown-item hover:bg-white/5 flex items-center justify-start gap-2"> <img style="height: 17px; width: 20px;" src="{{asset('/assets/img/ru.svg')}}"> Ru</a>
                        </li>
                        <li>
                            <a href="{{route('locale', 'en')}}" class="dropdown-item hover:bg-white/5 flex items-center justify-start gap-2"> <img style="height: 17px; width: 20px;" src="{{asset('/assets/img/en.svg')}}"> En</a>
                        </li>
                    </ul>
                </div>
            </div>
        {{--end language--}}
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                     role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="" src="{{ auth()->user()->image? asset(auth()->user()->image) : asset('/ucp/dist/images/images.png')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{auth()->user()->getFullName()}}</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ auth()->user()->role->name }}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="{{ route('users.profile') }}" class="dropdown-item hover:bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="user" data-lucide="user"
                                     class="lucide lucide-user w-4 h-4 mr-2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profile </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="#" class="dropdown-item hover:bg-white/5" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i data-lucide="toggle-right"  ></i>
                                Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        @yield('content')
    </div>
</div>
<!-- END: Content -->
</div>
<script src="{{asset('/assets/js/chart.js')}}"></script>
<script>
    const success = document.querySelector('#success-notification-content');
    const error = document.querySelector('#error-notification-content');
    const errors = document.querySelector('#errors-notification-content');
    const permission = document.querySelector('#permission-notification-content');
    const closeAlert = document.querySelector('.toast-close');
    const alertMsg = document.querySelector(".toastify");
    if(alertMsg)
    {

        setTimeout(() => {
            alertMsg.classList.remove("off");
            alertMsg.classList.add("on","active")
        }, 200);
        closeAlert.addEventListener("click", () => {
            alertMsg.classList.remove("on","active");
            alertMsg.classList.add("off")
        })
    }
    if(success || error || errors)
    {
        setTimeout(() => {
            alertMsg.classList.remove("on","active");
            alertMsg.classList.add("off")
        }, 5200);
        closeAlert.addEventListener("click", () => {
            alertMsg.classList.remove("on","active");
            alertMsg.classList.add("off")
        })
    }






</script>
<!-- BEGIN: JS Assets-->
{{--<script src="dist/js/app.js"></script>--}}
<script src="{{ asset('ucp/dist/js/app.js') }}" ></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/tomselect.min.js')}}"></script>

<!-- END: JS Assets-->
@yield('my_own_js')
@stack('customJS')
</body>
</html>