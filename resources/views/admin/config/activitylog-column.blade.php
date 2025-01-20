<div class="modal-header">
    <h2 class="font-medium text-base mr-auto">{{__('myconfig.event_log_ch')}}</h2>
</div> <!-- END: Modal Header -->
<!-- BEGIN: Modal Body -->
<div class="modal-body  gap-4 gap-y-3">
    <table class="table w-full">
        <thead class="table-light">
        <tr>
            <th class="whitespace-nowrap">{{__('myconfig.column')}}</th>
            <th class="whitespace-nowrap">{{__('myconfig.pre-value')}}</th>
            <th class="whitespace-nowrap">{{__('myconfig.post-value')}}</th>
        </tr>
        </thead>
        <tbody>
        @if($activityLog)
            @php
                $properties = json_decode($activityLog->properties);
            @endphp
            @foreach($properties->attributes as $k=>$v)
                <tr>
                    <td>{{$k}}</td>
                    <td>{{($properties->old->$k ?? '')}}</td>
                    <td>{{$v}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">
                    <center>{{$msg}}</center>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>