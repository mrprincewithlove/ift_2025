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
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Index', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Index')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Index', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('why-choose-us-section-items.index') }}" class="menu @if (isset($page) && in_array('WhyChooseUsSection_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.WhyChooseUsSection_items')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('index-partners.index') }}" class="menu @if (isset($page) && in_array('Index_partner', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Index_partner')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Meeting', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Meeting')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Meeting', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('meeting-page.edit') }}" class="menu @if (isset($page) && in_array('Meeting_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('meeting-page-items.index') }}" class="menu @if (isset($page) && in_array('Meeting_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_items')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('meeting-companies.index') }}" class="menu @if (isset($page) && in_array('Meeting_company', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Meeting_companies')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Sponsor', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Sponsor')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Sponsor', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('sponsor-page.edit') }}" class="menu @if (isset($page) && in_array('Sponsor_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Sponsor_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('Sponsor_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Sponsor_items')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sponsor-companies.index') }}" class="menu @if (isset($page) && in_array('Sponsor_companies', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Sponsor_companies')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Gallery', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Gallery')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Gallery', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('gallery-page.edit') }}" class="menu @if (isset($page) && in_array('Gallery_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Gallery_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('Gallery_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Gallery_items')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Agenda', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Agenda')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Agenda', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('agenda-page.edit') }}" class="menu @if (isset($page) && in_array('Agenda_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Agenda_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Press', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Press')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Press', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('press-page.edit') }}" class="menu @if (isset($page) && in_array('Press_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Press_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('News', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.News')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('News', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('news-page.edit') }}" class="menu @if (isset($page) && in_array('News_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.News_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Contact', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Contact')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Contact', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('contact-page.edit') }}" class="menu @if (isset($page) && in_array('Contact_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Contact_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('About', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.About')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('About', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('about-page.edit') }}" class="menu @if (isset($page) && in_array('About_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.About_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu @if (isset($page) && in_array('About_page_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.About_page_items')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('InvestProjects', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.InvestProjects')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('InvestProjects', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('invest-project-page.edit') }}" class="menu @if (isset($page) && in_array('InvestProjects_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.InvestProjects_page')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('invest-projects.index') }}" class="menu @if (isset($page) && in_array('InvestProjects_items', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.InvestProjects_items')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Speaker', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Speaker')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Speaker', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('speaker-page.edit') }}" class="menu @if (isset($page) && in_array('Speaker_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Speaker_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Invest', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Invest')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Invest', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('invest-page.edit') }}" class="menu @if (isset($page) && in_array('Invest_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Invest_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Media', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Media')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Media', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('media-page.edit') }}" class="menu @if (isset($page) && in_array('Media_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Media_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu @if (isset($page) && in_array('Exibition', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Exibition')}}
                                <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="@if (isset($page) && in_array('Exibition', $page)) menu__sub-open @endif">
                            <li>
                                <a href="{{ route('exibition-page.edit') }}" class="menu @if (isset($page) && in_array('Exibition_page', $page)) menu--active @endif">
                                    <div class="menu__icon"><i data-lucide="globe"></i></div>
                                    <div class="menu__title"> {{__('translates.Exibition_page')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
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
                    <li>
                        <a href="{{ route('labels.index') }}" class="menu @if (isset($page) && in_array('Label', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.labels')}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('types.index') }}" class="menu @if (isset($page) && in_array('Type', $page)) menu--active @endif">
                            <div class="menu__icon"><i data-lucide="globe"></i></div>
                            <div class="menu__title"> {{__('translates.Type')}}</div>
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
