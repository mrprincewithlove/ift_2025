@extends('layouts.admin_base')

@section('content')
	<h2 class="intro-y text-lg font-medium mt-10">
		{{__('translates.centers')}}
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<a href="{{route('centers.create')}}"
			   class="btn btn-primary shadow-md mr-2">{{ __('translates.add_new') }}</a>

			<div class="hidden md:block mx-auto text-slate-500">
				{{ __('translates.entries_info', ['start' => $centers->firstItem(), 'end' => $centers->lastItem(), 'total' => $centers->total()]) }}
			</div>

			<form action="{{route('centers.index')}}" method="GET"
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
					<th class="text-center whitespace-nowrap">{{__('translates.name_tm')}}</th>
					<th class="whitespace-nowrap text-center">{{__('translates.name_ru')}}</th>
					<th class="text-center whitespace-nowrap">{{__('translates.name_en')}}</th>
					<th class="text-center whitespace-nowrap">{{__('translates.status')}}</th>
					<th class="text-center whitespace-nowrap">{{__('translates.action')}}</th>
				</tr>
				</thead>
				<tbody>
				@if(count($centers)>0)
					@foreach($centers as $r)
						<tr class="intro-x">
							<td class="text-center">{{ $loop->iteration + $centers->firstItem() - 1 }}</td>
							<td class="text-center">{{ $r->name_tm ?? '' }}</td>
							<td class="text-center">{{ $r->name_ru ?? '' }}</td>
							<td class="text-center">{{ $r->name_en ?? '' }}</td>
							<td class="text-center">
								@if($r->status)
									<div class="flex items-center justify-center text-success">
										<i data-lucide="check-square" class="w-6 h-6"></i>
										{{ __('translates.active') }}
									</div>
								@else

									<div class="flex items-center justify-center text-danger">
										<i data-lucide="check-square" class="w-6 h-6"></i>
										{{ __('translates.not_active') }}
									</div>
								@endif
							</td>
							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3" href="{{route('centers.edit', $r)}}">
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
		{!! $centers->links('vendor.pagination.custom') !!}
	</div>
	<!-- BEGIN: Delete Confirmation Modal -->
	@if(count($centers)>0)
		@foreach($centers as $r)
			<div id="delete-confirmation-modal{{$r->id}}" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form  action="{{route('centers.destroy', $r)}}" method="POST" class="modal-body p-0">
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
	<!-- END: Delete Confirmation Modal -->




@endsection