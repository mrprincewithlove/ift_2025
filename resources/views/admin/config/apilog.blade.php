@extends('layouts.admin_base')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        {{__('logs.activity_logs')}}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="hidden md:block mx-auto text-slate-500">
                {{--Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} entries--}}
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="intro-y box p-5 my-5">
                <div class="w-full flex items-start">
                    <div id="tabulator-html-filter-form" class="w-full grid grid-cols-5">

                        {{--<div class="sm:flex flex-col items-start sm:mr-4 gap-1">--}}
                            {{--<label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{__('logs.log_name')}}</label>--}}
                            {{--<select name="log_name[]" id="log_name_id" data-placeholder="log_name" class="tom-select w-full z-auto" multiple>--}}
                                {{--@foreach($input['log_name'] as $r)--}}
                                    {{--<option value="{{$r}}">{{$r}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="sm:flex flex-col items-start sm:mr-4 gap-1">--}}
                            {{--<label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{__('logs.description')}}</label>--}}
                            {{--<select name="description[]" id="description_id" data-placeholder="description" class="tom-select w-full z-auto" multiple>--}}
                                {{--@foreach($input['description'] as $r)--}}
                                    {{--<option value="{{$r}}">{{$r}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="sm:flex flex-col items-start sm:mr-4 gap-1">--}}
                            {{--<label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{__('logs.subject')}}</label>--}}
                            {{--<select name="subject[]" id="subject_id" data-placeholder="subject" class="tom-select w-full z-auto" multiple>--}}
                                {{--@foreach($input['subjects'] as $r)--}}
                                    {{--<option value="{{'App\\Models\\'.$r}}">{{$r}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        {{--<div class="sm:flex flex-col items-start sm:mr-4 gap-1">--}}
                            {{--<label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{__('logs.user')}}</label>--}}
                            {{--<select name="user[]" id="user_id" data-placeholder="user" class="tom-select w-full z-auto" multiple>--}}
                                {{--@foreach($input['users'] as $r)--}}
                                    {{--<option value="{{$r->id}}">{{$r->name . ' ' . $r->surname}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        <div class="sm:flex flex-col items-start sm:mr-4 gap-1">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{__('logs.created_at')}}</label>
                            <input id="created_at_id" type="text" data-daterange="true" class="datepicker form-control w-56 block mx-auto">
                        </div>


                    </div>
                    <div class="w-fit flex pt-6 sm:mt-0 items-center justify-center gap-2">
                        <input title="{{__('myconfig.automated_refresh')}}" class="form-check-input" type="checkbox" id="periodic_check" >

                        <div class="mt-2 xl:mt-0">
                            <a href="#" id="searchBtnId" data-href="{{ route('apilogs.index') }}" >
                                <div   class="btn btn-primary w-full sm:w-16">
                                    <i data-lucide="search" class="w-5 h-5" ></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="report_info" class="w-full overflow-y-"></div>
        </div>

        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" id="modal-body-id">

                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="modal-column" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    {{--<div class="modal-body" id="modal-body-id">--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <!-- END: Data List -->

        @endsection


        @push('customJS')
            <script type="text/javascript">

                $(document).ready(function () {

                    $(document).on('click', '.pagination a', function (event) {
                        event.preventDefault();
                        getMoreAccount($(this).attr('href'));
                    });
                    $('.daterange').on('apply.daterangepicker', function (ev, picker) {
                        $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
                    });

                    $('.daterange').on('cancel.daterangepicker', function (ev, picker) {
                        $(this).val('');
                    });

                    $('#searchBtnId').on('click', function (event) {
                        event.preventDefault();
                        getActivityLog($(this).data('href'));
                    });

                    setInterval(refresh, {{intval(\Helper::getMyConfigCache('log_refresh_seconds'))*1000 ?? 10000}});
                });

                function getColumn(model_id, log_id) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var d = {_token: CSRF_TOKEN, model_id: model_id, log_id: log_id};
                    console.log(CSRF_TOKEN);
                    console.log(d);
                    $.ajax({
                        url: `{{route('apilogs.get-property')}}`,
                        method: 'GET',
                        cache: false,
                        dataType: 'json',
                        data: d,
                        async: false,
                        success: function (result) {
                            console.log(result);
                            $('#modal-body-id').html('');
                            $('#modal-body-id').html(result.data);
                            $('#modal-column').modal('show');
                        },
                        error: function (result) {
                            // alert('Refresh page...');
                            // location.reload(true);
                        }
                    });
                }

                function refresh() {
                    if ($('#periodic_check').is(':checked'))
                        $('#searchBtnId').trigger('click');
                }

                function getMoreAccount(href_v) {
                    $.ajax({
                        url: href_v,
                        method: 'GET',
                        cache: false,
                        dataType: 'json',
                        async: false,
                        success: function (result) {
                            console.log(result.data)
                            $('#report_info').html('');
                            $('#report_info').html(result.data);
                        },
                        error: function (result) {
                            console.log(result);
                            alert('Refresh page...');
                            location.reload(true);
                        }
                    });
                    $('.model-column').on('click', function () {
                        console.log($(this).data('log-id'));
                        console.log($(this).data('model-id'));
                        getColumn($(this).data('model-id'), $(this).data('log-id'));
                    });
                };

                function getFormInfo() {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var d = {
                        _token: CSRF_TOKEN,
                        address: $('#address_id').val(),
                        building: $('#building_id').val(),
                        department: $('#department_id').val(),
                        cities: $('#city_id').val(),
                        cashtype: $('#cashtype_id').val(),
                        bycity: $('#bycity').is(':checked'),
                        bydepartment: $('#bydepartment').is(':checked'),
                        from_date: $('#from_date').val()
                    };
                    $('.export-filterBy').val(JSON.stringify(d));
                };

                function getActivityLog(href_v) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var d = {
                        _token: CSRF_TOKEN,
                        // log_name: $('#log_name_id').val(),
                        // description: $('#description_id').val(),
                        // subject: $('#subject_id').val(),
                        // user: $('#user_id').val(),
                        created_at: $('#created_at_id').val()
                    };
                    console.log(d);
                    $.ajax({
                        url: href_v,
                        method: 'GET',
                        cache: false,
                        dataType: 'json',
                        data: d,
                        async: false,
                        success: function (result) {
                            $('#report_info').html('');

                            $('#report_info').html(result.data);
                            $('#report_info').on('click', '.model-column', function () {
                                getColumn($(this).data('model-id'), $(this).data('log-id'));
                            });

                        },
                        error: function (result) {
                            alert('Refresh page...');
                            location.reload(true);
                        }
                    });
                    // $('.model-column').on('click', function () {
                    //     console.log(2222);
                    //     getColumn($(this).data('model-id'), $(this).data('log-id'));
                    // });
                };

            </script>
    @endpush
