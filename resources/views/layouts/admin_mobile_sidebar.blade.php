<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="{{route('home')}}" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('ucp/dist/images/logo.svg') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                                                               class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                                                               class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            <li>
                <a href="{{route('home')}}" class="menu  @if (isset($page) && in_array('Home', $page)) menu--active @endif">
                    <div class="menu__icon"><i data-lucide="home"></i></div>
                    <div class="menu__title"> Dashboard </div>
                </a>

            </li>
            <li>
                <a href="{{route('services.index')}}" class="menu  @if (isset($page) && in_array('Service', $page)) menu--active @endif">
                    <div class="menu__icon"><i data-lucide="home"></i></div>
                    <div class="menu__title"> Service </div>
                </a>

            </li>


            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu @if (isset($page) && in_array('Pages', $page)) menu--active @endif">
                    <div class="menu__icon"><i data-lucide="trello"></i></div>
                    <div class="menu__title">  {{__('translates.Pages')}}
                        <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="@if (isset($page) && in_array('Pages', $page)) menu__sub-open @endif">
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Meeting', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Meeting')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Meeting', $page)) menu__sub-open @endif">
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('Meeting_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('Meeting_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('Meeting_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu @if (isset($page) && in_array('Catalog', $page)) menu--active @endif">
                    <div class="menu__icon"><i data-lucide="trello"></i></div>
                    <div class="menu__title">  {{__('translates.catalogs')}}
                        <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="@if (isset($page) && in_array('Catalog', $page)) menu__sub-open @endif">
                    <li>
                        <a href="#" class="menu @if (isset($page) && in_array('Countries', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.countries')}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('socialMedias.index') }}" class="menu @if (isset($page) && in_array('SocialMedia', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.SocialMedia')}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('numbers.index') }}" class="menu @if (isset($page) && in_array('Number', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Numbers')}}</div>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Session::has('user_menus') && in_array('settings', Session::get('user_menus', [])) )
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu @if (isset($page) && in_array('Configs', $page)) menu--active @endif">
                    <div class="menu__icon"><i data-lucide="settings"></i></div>
                    <div class="menu__title">  {{__('translates.configs')}}
                        <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="@if (isset($page) && in_array('Configs', $page)) menu__sub-open @endif">
                    @if(Session::has('user_menus') && in_array('users', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('users.index')}}" class="menu @if (isset($page) && in_array('User', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.users')}}</div>
                        </a>
                    </li>
                    @endif
                        @if(Session::has('user_menus') && in_array('roles', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('roles.index')}}" class="menu @if (isset($page) && in_array('Role', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.roles')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('permissions', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('permissions.index')}}" class="menu @if (isset($page) && in_array('Permission', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.permissions')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('menus', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('menus.index')}}" class="menu @if (isset($page) && in_array('Menu', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.menus')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('translations', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('translations.index')}}" class="menu @if (isset($page) && in_array('Translations', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.translations')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('myconfig', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('myconfigs.index')}}" class="menu @if (isset($page) && in_array('MyConfig', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.myconfig')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('activity-log', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{ route('activitylogs.index',  ['page'=>'page']) }}" class="menu @if (isset($page) && in_array('SystemLog', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.systemLogs')}}</div>
                        </a>
                    </li>
                        @endif
                        @if(Session::has('user_menus') && in_array('api-log', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{ route('apilogs.index',  ['page'=>'page']) }}" class="menu @if (isset($page) && in_array('APILog', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="activity"></i></div>
                            <div class="menu__title"> {{__('translates.apiLogs')}}</div>
                        </a>
                    </li>
                        @endif

                </ul>
            </li>
            @endif
            <li class="menu__devider my-6"></li>

        </ul>
    </div>
</div>