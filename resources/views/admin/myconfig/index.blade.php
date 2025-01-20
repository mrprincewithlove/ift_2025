@extends('layouts.admin_base')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        {{__('translates.configs')}}
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <div class="hidden md:block mx-auto text-slate-500">

            </div>
            <form action="{{route('myconfigs.index')}}" method="GET"
                  class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="{{__('tariff.search')}}"
                           name="search" value="{{($input['search']) ?? '' }}">
                    <button type="submit" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="search" class="w-full h-full" data-lucide="search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </form>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex flex-row gap 2">
                <a href="{{route('myconfigs.clear-cache')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-trash-2">
                        <path d="M3 6h18"/>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        <line x1="10" x2="10" y1="11" y2="17"/>
                        <line x1="14" x2="14" y1="11" y2="17"/>
                    </svg>
                </a>
                <a href="{{($from == 'db') ? route('myconfigs.restore') : route('myconfigs.index')}}">
                    @if($from =='db')
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-rotate-ccw">
                            <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                            <path d="M3 3v5h5"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-database">
                            <ellipse cx="12" cy="5" rx="9" ry="3"/>
                            <path d="M3 5V19A9 3 0 0 0 21 19V5"/>
                            <path d="M3 12A9 3 0 0 0 21 12"/>
                        </svg>
                    @endif

                </a>
                <a href="{{route('home')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-house">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                        <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                </a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="text-center whitespace-nowrap">{{__('myconfig.key')}}</th>
                    <th class="text-center whitespace-nowrap">{{__('myconfig.value')}}</th>
                    <th class="whitespace-nowrap text-center">{{__('myconfig.description')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($myconfigs)>0)
                    <form action="{{route('myconfigs.store')}}" method="POST">
                        @csrf

                        @if($from == 'file')
                            @foreach($myconfigs as $key => $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><label for="">{{$key}}</label></td>
                                    <td><input type="text" name="{{$key}}" value="{{$value}}" class="form-control"></td>
                                    <td><input type="text" name="{{$key}}_description" value="" class="form-control"></td>
                                </tr>
                            @endforeach
                        @elseif($from == 'db')
                            @foreach ($myconfigs as $myconfig)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><label for="">{{$myconfig->key}}</label></td>
                                    <td><input type="text" name="{{$myconfig->key}}" value="{{$myconfig->value}}" class="form-control"></td>
                                    <td><input type="text" name="{{$myconfig->key}}_description" value="{{$myconfig->description}}" class="form-control"></td>
                                </tr>
                            @endforeach
                        @endif
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-right mt-5">


        <a href="{{ Session::get('prev-url') ?? URL::previous() }}" class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
        <button type="submit" class="btn btn-primary w-24 whitespace-nowrap whitespace-nowrap">{{__('translates.save')}}</button>
    </div>
    </form>
@endsection