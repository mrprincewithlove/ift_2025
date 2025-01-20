@extends('layouts.admin_base')

@section('content')
	<h2 class="intro-y text-lg font-medium mt-10">
		{{__('translates.daily')}}
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<!-- <a href="{{route('categories.create')}}"
			   class="btn btn-primary shadow-md mr-2">{{ __('translates.add_new') }}</a> -->

			<form action="{{route('report.daily')}}" method="GET"
				  class="w-full flex mt-3 sm:mt-0 md:ml-0 mr-2 gap-3">
				<div>
					<label for="crud-form-1" class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.from')}}
						</label>

					<input id="crud-form-1" type="date" class="form-control w-full" name="from"
						value="{{ old('from', $from) }}">
				</div>

				<div>
					<label for="crud-form-1" class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.to')}}
						</label>

					<input id="crud-form-1" type="date" class="form-control w-full" name="to"
						value="{{ old('to', $to) }}">
				</div>

				<div>
					@if(count(session('centers')) > 1)
						<label for="crud-form-1" class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 ">{{__('translates.center')}}
							</label>
						
						<select data-placeholder="Select center" class="form-control w-full p-2" name="centerId" required>
							@foreach(session('centers') as $center)
								<option value="{{$center->id}}" @if(isset($centerId) && $centerId==$center->id) selected  @endif>{{$center->{'name_' . app()->currentLocale()} }}</option>
							@endforeach
						</select>
					@endif
                </div>
				<div class="flex items-bottom pt-5">
					<button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.send')}}</button>
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
					<th class="whitespace-nowrap ">{{ __('translates.days')}}</th>
					<th class="whitespace-nowrap">{{__('translates.cashagreements_total')}}</th>					
					<th class="whitespace-nowrap">{{__('translates.agreements_total')}}</th>					
					<th class="whitespace-nowrap ">{{__('translates.invoices_total')}}</th>
					<th class="whitespace-nowrap">{{__('translates.prepayments_total')}}</th>
					<th class="whitespace-nowrap">{{__('translates.payments_total')}}</th>
				</tr>
				</thead>
				<tbody>
					@php 
						$cashAgreementTotal = 0; 
						$agreementTotal = 0; 
						$invoceTotal = 0; 
						$paymentTotal = 0; 
						$prepaymentTotal = 0; 
					@endphp
					@foreach($report as $day)
						<tr>
							<td>{{$day['date']}}</td>
							<td>{{$day['cashagreements'] . 'tmt'}}</td>
							<td>{{$day['agreements'] . 'tmt'}}</td>
							<td>{{$day['invoces'] . 'tmt'}}</td>
							<td>{{$day['prepayments'] . 'tmt'}}</td>
							<td>{{$day['payments'] . 'tmt'}}</td>
						</tr>
						@php 
							$cashAgreementTotal = $cashAgreementTotal + $day['cashagreements']; 
							$agreementTotal = $agreementTotal + $day['agreements']; 
							$invoceTotal = $invoceTotal + $day['invoces']; 
							$paymentTotal = $paymentTotal + $day['payments']; 
							$prepaymentTotal = $prepaymentTotal + $day['prepayments']; 
						@endphp
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td>{{ __('translates.total') }}</td>
						<td>{{$cashAgreementTotal . 'tmt'}}</td>
						<td>{{$agreementTotal . 'tmt'}}</td>
						<td>{{$invoceTotal . 'tmt'}}</td>
						<td>{{$prepaymentTotal . 'tmt'}}</td>
						<td>{{$paymentTotal . 'tmt'}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
	</div>

@endsection