@extends('layouts.admin_base')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        {{__('translates.delays')}}
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <a href="{{route('categories.create')}}"
			   class="btn btn-primary shadow-md mr-2">{{ __('translates.add_new') }}</a> -->

            <form action="{{route('report.late_invoices')}}" method="GET"
                  class="w-full flex mt-3 sm:mt-0 md:ml-0 mr-2 gap-3">
                <div>
                    <label for="from_date"
                           class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.from')}}
                    </label>

                    <input id="from_date" type="date" class="form-control w-full" name="from_date"
                           value="{{ request()->get('from_date', '') }}">
                </div>
                <div>
                    <label for="to_date"
                           class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.to') }}
                    </label>

                    <input id="to_date" type="date" class="form-control w-full" name="to_date"
                           value="{{ request()->get('to_date') ? request()->get('to_date') : $to_date }}">
                </div>
                <div>
                    <label for="agreement_type_id"
                           class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">{{__('translates.agreement_type')}}
                    </label>
                    <select name="agreement_type" id="agreement_type_id" class="form-select w-full">
                        <option value="">Hemmesi</option>
                        @foreach($agreement_types as $agreement_type)
                            <option value="{{ $agreement_type->id }}" {{request()->get('agreement_type') == $agreement_type->id? 'selected':'' }}> {{$agreement_type->{'name_'.app()->currentLocale()} }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" form-check form-switch pt-5">
                    <input id="delayed" class="form-check-input" type="checkbox"
                           name="delayed" {{request()->get('delayed')? 'checked': ''}} >
                    <label class="form-check-label" for="checkbox-switch-7">{{ __('translates.delayed') }}</label>
                </div>

                <div>
                    {{--@if(count(session('centers')) > 1)--}}
                    {{--<label for="crud-form-1" class="h-4 sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500 ">{{__('translates.center')}}--}}
                    {{--</label>--}}
                    {{----}}
                    {{--<select data-placeholder="Select center" class="form-control w-full p-2" name="centerId" required>--}}
                    {{--@foreach(session('centers') as $center)--}}
                    {{--<option value="{{$center->id}}" @if(isset($centerId) && $centerId==$center->id) selected  @endif>{{$center->{'name_' . app()->currentLocale()} }}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--@endif--}}
                </div>
                <div class="flex items-bottom pt-5">
                    <button type="submit"
                            class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.send')}}</button>
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
        <div class="intro-y col-span-12 overflow-x-auto">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap ">{{ __('translates.invoice_no')}}</th>
                    <th class="whitespace-nowrap">{{__('translates.agreement_no') . ', ' . __('translates.date')}}</th>
                    <th class="whitespace-nowrap">{{__('translates.client')}}</th>
                    <th class="whitespace-nowrap">{{__('translates.date')}}</th>
                    <th class="whitespace-nowrap ">{{__('translates.invoices_total')}}</th>
                    <th class="whitespace-nowrap ">{{__('translates.agreement_price')}}</th>
                    <th class="whitespace-nowrap ">{{__('translates.price_to_pay')}}</th>
                    <th class="whitespace-nowrap ">{{__('translates.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $item)
                    <tr class="intro-x">
                        <td>{{$item->invoice_no}}</td>
                        <td>{{$item->agreement->agreement_no . ', ' . date('d.m.Y', strtotime($item->agreement->date)) }}</td>
                        <td>
                            <div>
                                <a href="{{route('clients.show', $item->agreement->client)}}" class="flex items-center gap-1 whitespace-nowrap text-black hover:text-[#660059] transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-user min-w-6">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    {{$item->agreement->client->surname . ' ' . $item->agreement->client->name . ' ' . $item->agreement->client->father_name}}
                                </a>
                            </div>


                        </td>
                        <td>{{date('d.m.Y', strtotime($item->date))}}</td>
                        <td>{{$item->price . 'tmt'}}</td>
                        <td>{{$item->agreement->agreement_price}}</td>
                        <td>{{$item->agreement->price_to_pay}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center gap-1 mr-3"
                                   href="{{route('agreement.invoices', $item->agreement)}}">
                                    <i data-lucide="file-digit" class="w-4 h-4"></i>
                                    {{__('translates.invoices_short')}} </a>
                                <a class="flex items-center gap-1 mr-3"
                                   href="{{route('agreement.payments', $item->agreement)}}">
                                    <i data-lucide="banknote" class="w-4 h-4 la la-print"></i>
                                    {{__('translates.payments')}} </a>

                                <a id="" class="commentModal flex items-center gap-1" href="#" data-href="{{ route('comment.create') }}" data-invoice="{{$item->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-message-circle-plus">
                                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
                                        <path d="M8 12h8"/>
                                        <path d="M12 8v8"/>
                                    </svg>
                                    {{__('translates.comment')}} </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {!! $invoices ->links('vendor.pagination.custom') !!}

    </div>
    <div id="comment-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header flex flex-row justify-between">
                    <h2 class="font-medium text-base mr-auto">{{__('translates.write_comment')}}</h2>
                    <button type="button" data-tw-dismiss="modal" class="">x</button>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div id="old_comments" class="modal-body  flex flex-col  gap-4 gap-y-3">
                </div> <!-- END: Modal Body -->

            </div>
        </div>
    </div>

@endsection

@section('my_own_js')
    <script>
        $(document).ready(function () {
            $('.commentModal').on('click', function () {
                // console.log($(this).data('invoice'));
                let modal = tailwind.Modal.getOrCreateInstance(document.querySelector("#comment-modal-preview"));


                var d = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    invoice: $(this).data('invoice'),
                };
                //console.log(d);
                $.ajax({
                    url:  $(this).data('href'),
                    method: 'GET',
                    cache: false,
                    dataType: 'json',
                    data: d,
                    async: false,
                    success: function(result) {
                        if (result['result'] == 'success')
                            $('#old_comments').html(result['data']);
                        // $('#temp-products').html(result['data']);
                        $('#add-comment-form').submit(function(event) {
                            event.preventDefault();
                            var formData = $(this).serialize();
                            // console.log(formData);
                            // console.log($(this).attr('action'));
                                $.ajax({
                                    url: $(this).attr('action'), // Get the form action
                                    type: 'POST', // HTTP method
                                    data: formData, // Serialized form data
                                    success: function(response) {
                                        if(response.result =='success'){
                                            modal.hide();
                                            // $('#old_comments').html(result['data']);
                                        }
                                    },
                                    error: function(xhr) {}
                                });
                        });

                    },
                    error: function(result) {
                        // console.log(result);
                        // location.reload(true);
                    }
                });



                // let myModal = tailwind.Modal.getInstance(document.querySelector("#myModal"));
                modal.show();

            });

        });
    </script>

@endsection