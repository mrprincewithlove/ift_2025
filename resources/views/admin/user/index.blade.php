@extends('layouts.admin_base')

@section('content')
	<h2 class="intro-y text-lg font-medium mt-10">
		{{__('user.users')}}
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<a href="{{route('users.create')}}"
			   class="btn btn-primary shadow-md mr-2">{{ __('user.add_new_user') }}</a>

			<div class="hidden md:block mx-auto text-slate-500">
				{{ __('common.entries_info', ['start' => $users->firstItem(), 'end' => $users->lastItem(), 'total' => $users->total()]) }}
				{{--Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries--}}
			</div>

			<form action="{{route('users.index')}}" method="GET"
				  class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">
				<div class="w-56 relative text-slate-500">
					<input type="text" class="form-control w-56 box pr-10" placeholder="{{__('user.search')}}"
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
					<th class="whitespace-nowrap text-center">{{__('user.name')}}</th>
					<th class="text-center whitespace-nowrap">{{__('user.email')}}</th>
					<th class="text-center whitespace-nowrap">{{__('user.mobile')}}</th>
					<th class="text-center whitespace-nowrap">{{__('user.role')}}</th>
					<th class="text-center whitespace-nowrap">{{__('user.action')}}</th>
				</tr>
				</thead>
				<tbody>
				@if(count($users)>0)
					@foreach($users as $r)
						<tr class="intro-x">
							<td class="text-center">{{ $loop->iteration + $users->firstItem() - 1 }}</td>
							<td class="text-center flex flex-col">
									<a  class="font-medium whitespace-nowrap">{{ $r->getFullName() }}</a>
									<div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $r->nick_name }}</div>
							</td>
							<td class="text-center">{{ $r->email ?? '' }}</td>
							<td class="text-center">{{ $r->mobile ?? '' }}</td>
							<td class="text-center">{{ $r->role->name ?? '' }}</td>
							<td class="table-report__action w-56 whitespace-nowrap">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3" href="{{route('users.edit', $r)}}">
										<i data-lucide="check-square" class="w-4 h-4"></i>
										{{__('user.edit-info')}} </a>
									<a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
									   data-tw-target="#delete-confirmation-modal{{$r->id}}">
										<i data-lucide="trash-2" class="w-4 h-4"></i>
										{{__('user.delete')}} </a>
								</div>
							</td>

						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<!-- END: Data List -->
		{!! $users->links('vendor.pagination.custom') !!}
	</div>
	<!-- BEGIN: Delete Confirmation Modal -->
	@if(count($users)>0)
		@foreach($users as $r)
			<div id="delete-confirmation-modal{{$r->id}}" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form  action="{{route('users.destroy', $r)}}" method="POST" class="modal-body p-0">
							@csrf
							@method('delete')

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
								<div class="text-3xl mt-5">{{__('user.Are you sure?')}}</div>
								<div class="text-slate-500 mt-2">
									{{ __('user.Do you really want to delete these records?') }}

									<br>
									{{__('user.This process cannot be undone.')}}

								</div>
							</div>
							<div class="px-5 pb-8 text-center">
								<button type="button" data-tw-dismiss="modal"
										class="btn btn-outline-secondary w-24 mr-1">
									{{__('user.cancel')}}
								</button>
								<button type="submit" class="btn btn-danger w-24">{{ __('user.delete') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	@endif
	<!-- END: Delete Confirmation Modal -->

@endsection