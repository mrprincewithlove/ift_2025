@extends('layouts.admin_base')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        {{__('translates.products')}}
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('products.create')}}"
                class="btn btn-primary shadow-md mr-2">{{ __('translates.add_new') }}</a>

            <div class="hidden md:block mx-auto text-slate-500">
                {{ __('translates.entries_info', ['start' => $products->firstItem(), 'end' => $products->lastItem(), 'total' => $products->total()]) }}
            </div>

            <form action="{{route('products.index')}}" method="GET"
                  class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="{{__('translates.search')}}"
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
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
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
                    <th class="text-center">{{__('translates.name_articule_barcode')}}</th>
                    <th class="text-center">{{__('translates.color_size_sex')}}</th>
                    <th class="text-center">{{__('translates.price')}}</th>
                    <th class="text-center">{{__('translates.quantity')}}</th>
                    <th class="text-center">{{__('translates.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($products)>0)
                    @foreach($products as $r)
                        <tr class="intro-x">
                            <td class="text-center">{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                            <td class="text-center">
                                <div class="flex flex-col">
                                    <p>
                                        {{ $r->name ?? '' }}
                                    </p>
                                    <span>
                                        {{ $r->articule ?? '' }}
                                    </span>
                                    <span>
                                        {{ $r->barcode ?? '' }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="flex flex-col">
                                    <p>
                                        {{ $r->color ?? '' }}
                                    </p>
                                    <p>
                                        {{ $r->size ?? '' }}
                                    </p>
                                    <p>
                                        {{ $r->sex ?? '' }}
                                    </p>
                                </div>
                            </td>
                            <td class="text-center">{{ $r->price ? $r->price . '.tmt' : '' }}</td>
                            <td class="text-center">{{ $r->quantity ?? '' }}</td>
                            <td class="justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('products.edit', $r)}}">
                                    <i data-lucide="check-square" class="w-4 h-4"></i>
                                    {{__('translates.edit')}} </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        {!! $products->links('vendor.pagination.custom') !!}
    </div>





@endsection