<table class="table table-report -mt-2">
    <thead>
    <tr>
        <th class="whitespace-nowrap text-center">#</th>
        <th class="whitespace-nowrap text-center">
            {{__('myconfig.log_name')}}
        </th>
        <th class="text-center whitespace-nowrap">{{__('myconfig.description')}}</th>
        <th class="text-center whitespace-nowrap">{{__('myconfig.subject')}}</th>
        <th class="text-center whitespace-nowrap">{{__('myconfig.user')}}</th>
        <th class="text-center whitespace-nowrap">{{__('myconfig.created_at')}}</th>
    </tr>
    </thead>
    <tbody>
    @if(count($apilogs)>0)
        @foreach($apilogs as $r)


            <tr class="intro-x" style="z-index: 1 !important;" >
                <td class="text-center">{{ $loop->iteration + $apilogs->firstItem() - 1 }}</td>
                <td class="text-center">{{$r->type}}</td>
                <td class="text-center">{{$r->request_method}}</td>
                <td class="text-center">{{$r->request_url}}</td>
                <td class="text-center flex items-center justify-center gap-1">
                    {{$r->user_type}}
                    <a href="#" class="model-column"
                       data-tw-toggle="modal"
                       data-tw-target="#superlarge-modal-size-preview"
                       data-log-id="{{$r->id}}"
                       data-model-id={{$r->subject_id}}>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-external-link">
                            <path d="M15 3h6v6"/>
                            <path d="M10 14 21 3"/>
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                        </svg>
                    </a>
                </td>

                <td class="table-report__action w-56">{{$r->created_at}}</td>

            </tr>
        @endforeach
    @endif
    </tbody>
</table>

{!! $apilogs->links('vendor.pagination.custom') !!}


{{--<div class="card-body overflow-auto printable">--}}
{{--<table class="table table-hover table-sm">--}}
{{--<thead class="">--}}
{{--<tr>--}}
{{--<th>#</th>--}}
{{--<th>{{__('myconfig.log_name')}}</th>--}}
{{--<th>{{__('myconfig.description')}}</th>--}}
{{--<th>{{__('myconfig.subject')}}</th>--}}
{{--<th>{{__('myconfig.user')}}</th>--}}
{{--<th>{{__('myconfig.created_at')}}</th>--}}
{{--</tr>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--@if(count($activitylogs)>0)--}}
{{--@foreach($activitylogs as $r)--}}
{{--<tr>--}}
{{--<td>{{ $loop->iteration + $activitylogs->firstItem() - 1 }}</td>--}}
{{--<td>{{$r->log_name}}</td>--}}
{{--<td>{{$r->description}}</td>--}}
{{--<td>{{\Helper::splitModel($r->subject_type)}} <a href="#" class="model-column"--}}
{{--data-log-id="{{$r->id}}"--}}
{{--data-model-id={{$r->subject_id}}> <i--}}
{{--class="fa fa-external-link" aria-hidden="true"></i></a></td>--}}
{{--<td>{{($r->causer_id)? $r->user->getFullName() : ''}}</td>--}}
{{--<td>{{$r->created_at}}</td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--@endif--}}
{{--</tbody>--}}
{{--</table>--}}
{{--<hr>--}}
{{--<span style="margin-top:-20px;">{!! $activitylogs->links() !!}</span>--}}
{{--</div>--}}