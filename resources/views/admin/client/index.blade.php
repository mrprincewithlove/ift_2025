@extends('layouts.admin_base')

@section('content')
	<h2 class="intro-y text-lg font-medium mt-10">
		{{__('translates.clients')}}
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<a href="{{route('clients.create')}}"
			   class="btn btn-primary shadow-md mr-2">{{ __('translates.add_new') }}</a>

			<div class="hidden md:block mx-auto text-slate-500">
				{{ __('translates.entries_info', ['start' => $clients->firstItem(), 'end' => $clients->lastItem(), 'total' => $clients->total()]) }}
			</div>

			<form action="{{route('clients.index')}}" method="GET"
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

					<th class="text-center whitespace-nowrap">
							<p>{{__('translates.status')}}</p>
					</th>
					<th class="text-center whitespace-nowrap">
							<p>{{__('translates.full_name')}}</p>
					</th>
					<th class="whitespace-nowrap text-center">
							<p>{{__('translates.pasport_number')}}</p>
					</th>
					<th class="text-center whitespace-nowrap">
							<p>{{__('translates.mobile')}}</p>
					</th>
					<th class="text-center whitespace-nowrap">
							<p>{{__('translates.total_price')}}</p>

					</th>
					<th class="text-center whitespace-nowrap">
						<p>{{__('translates.bonus_card')}}</p>
					</th>
					<th class="text-center whitespace-nowrap">{{__('translates.action')}}</th>
				</tr>
				</thead>
				<tbody>
				@if(count($clients)>0)
					@foreach($clients as $r)
						<tr class="intro-x">
							<td class="text-center">{{ $loop->iteration + $clients->firstItem() - 1 }}</td>

							<td class="">
                                {{--<p class="text-red-600"></p>--}}
                                {{--<p class="text-yellow-400"></p>--}}
                                {{--<p class="text-blue-600"></p>--}}
                                {{--<p class="text-green-600"></p>--}}
                                {{--<p class="text-fuchsia-600"></p>--}}
                                {{--<p class="text-gray-400"></p>--}}
								<p class="flex items-center justify-center text-{{$r->status->getStatusColor($r->status_id)}} tooltip" title="{{$r->status->{'name_'.app()->currentLocale()}  }}">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
										<path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054A8.25 8.25 0 0 0 18 4.524l3.11-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.77l-.108-.054a8.25 8.25 0 0 0-5.69-.625l-2.202.55V21a.75.75 0 0 1-1.5 0V3A.75.75 0 0 1 3 2.25Z" clip-rule="evenodd" />
									</svg>

								</p>
							</td>

							<td class="text-center">
								{{--<p class="text-gray-400">--}}

								{{--<p>{{$r->status->name_tm}}</p>--}}
									<p>{{ $r->getFullName() ?? '' }}</p>
							</td>
							<td class="text-center">
									<p>{{ $r->pasport_number ?? '' }}</p>
							</td>
							<td class="text-center">
									<p>{{ $r->mobile ?? '' }}</p>
							</td>
							<td class="text-center">
								<p>{{ $r->getAllAgreemmentPriceToPay() ?? '' }}</p>
							</td>
							<td class="text-center">
								<p>{{ $r->bonus_card ?? '' }}</p>
							</td>
							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3" href="{{route('clients.show', $r)}}">
										<i data-lucide="eye" class="w-4 h-4"></i>
										{{__('translates.profile')}} </a>
									<a class="flex items-center mr-3" href="{{route('clients.edit', $r)}}">
										<i data-lucide="check-square" class="w-4 h-4"></i>
										{{__('translates.edit')}} </a>
									<a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
									   data-tw-target="#delete-confirmation-modal{{$r->id}}">
										<i data-lucide="trash-2" class="w-4 h-4"></i>
										{{__('translates.delete')}} </a>
								</div>
							</td>

						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<!-- END: Data List -->
		{!! $clients->links('vendor.pagination.custom') !!}

		@if(count($clients)>0)
			@foreach($clients as $r)
				<div id="delete-confirmation-modal{{$r->id}}" class="modal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<form  action="{{route('clients.destroy', $r)}}" method="POST" class="modal-body p-0">
								@csrf
								@method('delete')
								<input type="hidden" name="prev-url" value="{{ Session::get('prev-url') ?? URL::previous() }}">
								<div class="p-5 text-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										 fill="none"
										 stroke="currentColor" stroke-width="2" stroke-linecap="round"
										 stroke-linejoin="round"
										 icon-name="x-circle" data-lucide="x-circle"
										 class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3">
										<circle cx="12" cy="12" r="10"></circle>
										<line x1="15" y1="9" x2="9" y2="15"></line>
										<line x1="9" y1="9" x2="15" y2="15"></line>
									</svg>
									<div class="text-3xl mt-5">{{__('translates.Are you sure?')}}</div>
									<div class="text-slate-500 mt-2">
										{{ __('translates.Do you really want to delete these records?') }}

										<br>
										{{__('translates.This process cannot be undone.')}}

									</div>
								</div>
								<div class="px-5 pb-8 text-center">
									<button type="button" data-tw-dismiss="modal"
											class="btn btn-outline-secondary w-24 mr-1">
										{{__('translates.cancel')}}
									</button>
									<button type="submit" class="btn btn-danger w-24">{{ __('translates.delete') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>




@endsection