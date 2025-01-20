@extends('layouts.admin_base')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        {{__('translates.profile')}}
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex items-center justify-between gap-4 mt-2">
            <a href="{{route('agreement.create_agreement', $client)}}"
               class="btn btn-primary shadow-md mr-2">{{ __('translates.add_agreement') }}
            </a>
            {{--<p class="bg-red-600"></p>--}}
            {{--<p class="bg-yellow-400"></p>--}}
            {{--<p class="bg-blue-600"></p>--}}
            {{--<p class="bg-green-600"></p>--}}
            {{--<p class="bg-fuchsia-600"></p>--}}
            {{--<p class="bg-gray-400"></p>--}}
            <div class="box p-2 flex gap-2 items-center text-white bg-{{$client->status->getStatusColor($client->status_id)}}">
                <p class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                              d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054A8.25 8.25 0 0 0 18 4.524l3.11-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.77l-.108-.054a8.25 8.25 0 0 0-5.69-.625l-2.202.55V21a.75.75 0 0 1-1.5 0V3A.75.75 0 0 1 3 2.25Z"
                              clip-rule="evenodd"/>
                    </svg>

                </p>
                <p class="font-semibold"> {{$client->status->{'name_'.app()->currentLocale()} }}</p>
            </div>


        </div>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 p-5">
            <div class="flex flex-col">
                <div class="w-full truncate sm:whitespace-normal font-medium text-base mb-2">{{$client->getFullName()}}</div>
                <div class="w-full text-slate-500 flex flex-col gap-2">
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.barcode')}}
                        : <span>{{ $client->barcode }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.birthday')}}
                        : <span>{{ $client->birth_date }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.salary')}}
                        : <span>{{ $client->salary . 'tmt'}}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.mobile')}}
                        : <span>{{ $client->mobile }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.phone')}}
                        : <span>{{ $client->mobile2 }}</span></p>

                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.phone')}}
                        : <span>{{ $client->home_phone }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.phone')}}
                        : <span>{{ $client->work_phone }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.phone')}}
                        : <span>{{ $client->tel1 }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.phone')}}
                        : <span>{{ $client->tel2 }}</span></p>

                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.work_place')}}
                        : <span>{{ $client->work_place }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.work_position')}}
                        : <span>{{ $client->work_position }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.category')}}
                        : <span>{{$client->category->{'name_'.app()->currentLocale()} }}</span></p>
                </div>
            </div>

        </div>
        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 p-5">
            <div class="flex flex-col">
                <div class="w-full truncate sm:whitespace-normal font-medium text-base mb-2">{{__('translates.passport_info')}}</div>
                <div class="text-slate-500 flex flex-col gap-2">
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.welayat')}}
                        : <span>{{ $client->passport_welayat->{'name_'.app()->currentLocale()} }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.city')}}
                        : <span>{{ $client->passport_city->{'name_'.app()->currentLocale()} }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.microdistrict')}}
                        : <span>{{ $client->passport_microdistrict ? $client->passport_microdistrict->{'name_'.app()->currentLocale()} ?? '': '' }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.passport_numbers')}}
                        : <span>{{ $client->pasport_number }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.passport_given')}}
                        : <span>{{ $client->pasport_given_at }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.passport_given_by')}}
                        : <span>{{ $client->pasport_given_by }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.p_street')}}
                        : <span>{{ $client->p_street }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.p_corpus')}}
                        : <span>{{ $client->p_corpus }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.p_apartment')}}
                        : <span>{{ $client->p_apartment }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.p_door')}}
                        : <span>{{ $client->p_door }}</span></p>
                </div>
            </div>

        </div>
        <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 p-5">
            <div class="flex flex-col">
                <div class="w-full truncate sm:whitespace-normal font-medium text-base mb-2">{{__('translates.info')}}</div>
                <div class="text-slate-500 flex flex-col gap-2">
                    @if($client->living_another_address == 1)
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.welayat')}}
                            : <span>{{ $client->address_welayat->{'name_'.app()->currentLocale()} }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.city')}}
                            : <span>{{ $client->address_city->{'name_'.app()->currentLocale()} }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.microdistrict')}}
                            : <span>{{ $client->address_microdistrict ? $client->address_microdistrict->{'name_'.app()->currentLocale()} : '' }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.ad_street')}}
                            : <span>{{ $client->ad_street }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.ad_corpus')}}
                            : <span>{{ $client->ad_corpus }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.ad_apartment')}}
                            : <span>{{ $client->ad_apartment }}</span></p>
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.ad_door')}}
                            : <span>{{ $client->ad_door }}</span></p>
                    @else
                        <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.living_in_passport_address')}}</p>
                    @endif
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.limit')}}
                        : <span>{{$client->limit . 'tmt' }}</span></p>
                    <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.description')}} : <span>{{$client->description}}</span></p>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="grid grid-cols-12 gap-6 mt-5">--}}
    {{--<div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 px-5 pt-5">--}}
    {{--<div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">--}}
    {{--<div class="flex flex-1 px-5 items-center justify-center lg:justify-start">--}}
    {{--<div class="">--}}
    {{--<div class="w-full truncate sm:whitespace-normal font-medium text-base">--}}
    {{--<p>{{__('translates.status')}} : {{$client->status->{'name_'.app()->currentLocale()} }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 px-5 pt-5">--}}
    {{--<div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">--}}
    {{--<div class="flex flex-1 px-5 items-center justify-center lg:justify-start">--}}
    {{--<div class="">--}}
    {{--<div class="w-full truncate sm:whitespace-normal font-medium text-base">--}}
    {{--<p>{{__('translates.category')}} : {{$client->category->{'name_'.app()->currentLocale()} }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4 px-5 pt-5">--}}
    {{--<div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">--}}
    {{--<div class="flex flex-1 px-5 items-center justify-center lg:justify-start">--}}
    {{--<div class="">--}}
    {{--<div class="w-full truncate sm:whitespace-normal font-medium text-base">--}}
    {{--<p>{{__('translates.limit')}} : {{$client->limit . 'tmt' }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div id="dashboard" class="tab-pane active" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Top Categories -->
            @foreach($client->agreements as $agreement)
                <!-- BEGIN: Daily Sales -->
                    <div class="intro-y box col-span-12 md:col-span-6 lg:col-span-4">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto flex flex-col">
                                {{__('translates.agreement_no')}} : {{ $agreement->agreement_no }}
                                <span class="text-slate-500">{{__('translates.agreement_type')}}
                                    : {{$agreement->agreement_type->{'name_'.app()->currentLocale()} }}</span>
                            </h2>
                            {{--<div class="dropdown ml-auto sm:hidden">--}}
                                {{--<a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"--}}
                                   {{--data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"--}}
                                                                 {{--class="w-5 h-5 text-slate-500"></i> </a>--}}
                                {{--<div class="dropdown-menu w-40">--}}
                                    {{--<ul class="dropdown-content">--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;" class="dropdown-item"> <i data-lucide="file"--}}
                                                                                             {{--class="w-4 h-4 mr-2"></i>--}}
                                                {{--Download Excel </a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<button class="btn btn-outline-secondary hidden sm:flex"><i data-lucide="file"--}}
                                                                                        {{--class="w-4 h-4 mr-2"></i>--}}
                                {{--Download Excel--}}
                            {{--</button>--}}
                        </div>
                        <div class="p-5">
                            <div class="flex flex-col gap-2">
                                <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.agreement_start_date')}}
                                    : <span>{{ \Carbon\Carbon::parse($agreement->date)->format('d.m.Y') }}</span>
                                </p>
                                <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.agreement_end_date')}}
                                    : <span>{{ \Carbon\Carbon::parse($agreement->getLatestInvoice()->date)->format('d.m.Y') }}</span>
                                </p>
                                <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.total_payed')}}
                                    : <span>{{$agreement->agreement_price - $agreement->price_to_pay  . 'tmt'}}</span>
                                </p>
                                <p class="w-full px-2 py-1 rounded bg-slate-100 flex items-center justify-between gap-4">{{__('translates.total_unpayed')}}
                                    : <span>{{$agreement->price_to_pay . 'tmt'}}</span></p>
                            </div>
                            <div class="flex items-center justify-between gap-2 mt-5">
                                <a href="{{route('agreement-print', $agreement)}}"
                                   class="relative w-full flex items-center btn btn-primary tooltip"
                                   title="{{__('translates.agreement_info')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-handshake">
                                        <path d="m11 17 2 2a1 1 0 1 0 3-3"/>
                                        <path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/>
                                        <path d="m21 3 1 11h-2"/>
                                        <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/>
                                        <path d="M3 4h8"/>
                                    </svg>
                                </a>
                                <a href="{{route('agreement.invoices', $agreement)}}"
                                   class="relative w-full flex items-center btn btn-primary tooltip"
                                   title="{{__('translates.invoices')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-receipt-text">
                                        <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/>
                                        <path d="M14 8H8"/>
                                        <path d="M16 12H8"/>
                                        <path d="M13 16H8"/>
                                    </svg>
                                </a>

                                <a href="{{route('agreement.payments', $agreement)}}"
                                   class="relative w-full flex items-center btn btn-primary tooltip"
                                   title="{{__('translates.payments')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-banknote">
                                        <rect width="20" height="12" x="2" y="6" rx="2"/>
                                        <circle cx="12" cy="12" r="2"/>
                                        <path d="M6 12h.01M18 12h.01"/>
                                    </svg>
                                </a>
                            </div>


                        </div>
                    </div>
                    <!-- END: Daily Sales -->
                @endforeach


            </div>
        </div>
    </div>

    <div class="intro-y overflow-auto mt-5">
        <table class="table table-report -mt-2">
            <thead>
                <th>#</th>
                <th>{{ __('translates.date')}}</th>
                <th>{{ __('translates.agreement')}}</th>
                <th>{{ __('translates.comment')}}</th>
            </thead>
            <tbody>
                @foreach($client->comments as $comment)
                    <tr class="intro-x">
                        <td class="">{{$loop->iteration }}</td>
                        <td class="">{{$comment->issue_date?? __('translates.empty')}}</td>
                        <td class="">{{$comment->agreement->agreement_no}}</td>
                        <td class="">{{$comment->comment}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection