<nav class="side-nav">
    <a href="{{route('home')}}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('ucp/dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> {{env('APP_NAME')}} </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('home')}}" class="side-menu @if (isset($page) && in_array('Home', $page)) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{route('services.index')}}" class="side-menu @if (isset($page) && in_array('Service', $page)) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Service </div>
            </a>
        </li>


        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;" class="side-menu @if (isset($page) && in_array('Catalog', $page)) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                <div class="side-menu__title">
                    {{__('translates.catalogs')}}
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="@if (isset($page) && in_array('Catalog', $page)) side-menu__sub-open @endif">
                <li>
                    <a href="#" class="side-menu @if (isset($page) && in_array('Countries', $page)) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-lucide="globe"></i> </div>
                        <div class="side-menu__title"> {{__('translates.countries')}}</div>
                    </a>
                </li>
            </ul>
        </li>

        @if(Session::has('user_menus') && in_array('settings', Session::get('user_menus', [])) )
        <li class="side-nav__devider my-6"></li>
            <li>
                <a href="javascript:;" class="side-menu @if (isset($page) && in_array('Configs', $page)) side-menu--active @endif">
                    <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                    <div class="side-menu__title">
                        {{__('translates.configs')}}
                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="@if (isset($page) && in_array('Configs', $page)) side-menu__sub-open @endif">
                    @if(Session::has('user_menus') && in_array('users', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('users.index')}}" class="side-menu @if (isset($page) && in_array('User', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.users')}}</div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('roles', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('roles.index')}}" class="side-menu @if (isset($page) && in_array('Role', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.roles')}}</div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('permissions', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('permissions.index')}}" class="side-menu @if (isset($page) && in_array('Permission', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.permissions')}} </div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('menus', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('menus.index')}}" class="side-menu @if (isset($page) && in_array('Menu', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.menus')}} </div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('translations', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{route('translations.index')}}" class="side-menu @if (isset($page) && in_array('Translations', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.translations')}} </div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('myconfig', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{ route('myconfigs.index') }}" class="side-menu @if (isset($page) && in_array('MyConfig', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.myconfig')}}</div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('activity-log', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{ route('activitylogs.index',  ['page'=>'page']) }}" class="side-menu @if (isset($page) && in_array('SystemLog', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.systemLogs')}} </div>
                        </a>
                    </li>
                    @endif
                    @if(Session::has('user_menus') && in_array('api-log', Session::get('user_menus', [])) )
                    <li>
                        <a href="{{ route('apilogs.index',  ['page'=>'page']) }}" class="side-menu @if (isset($page) && in_array('APILog', $page)) side-menu--active @endif">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> {{__('translates.apiLogs')}} </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif


    </ul>
</nav>