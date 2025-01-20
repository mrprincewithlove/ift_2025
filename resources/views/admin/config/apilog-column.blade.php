<div class="modal-header">
    <h2 class="font-medium text-base mr-auto">{{__('myconfig.event_log_ch')}}</h2>
</div> <!-- END: Modal Header -->
<!-- BEGIN: Modal Body -->
<div class="modal-body  gap-4 gap-y-3">
    <p>{{__('myconfig.request_headers')}}</p>
    <div class="w-full overflow-hidden">

        <table class="table w-full overflow-hidden">
            @if($activityLog)
                @php
                    $req_headers = json_decode($activityLog->request_headers);
                    $req_body = json_decode($activityLog->request_body);
                    $res_headers = json_decode($activityLog->response_headers);
                    $res_body = json_decode($activityLog->response_body);
                @endphp
                <tr>
                    <th class="w-full">{{__('myconfig.id')}}</th>
                    <td class="w-full">{{ $activityLog->id ?? '' }}</td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.user_type')}}</th>
                    <td class="w-full">{{ $activityLog->user_type ?? '' }}</td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.response_status')}}</th>
                    <td class="w-full">{{ $activityLog->response_status ?? '' }}</td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.type')}}</th>
                    <td class="w-full">{{ $activityLog->type ?? '' }}</td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.request_method')}}</th>
                    <td class="w-full">{{ $activityLog->request_method ?? '' }}</td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.request_url')}}</th>
                    <td class="w-full">{{ $activityLog->request_url ?? '' }}</td>
                </tr>

                <tr>
                    <th class="w-full">{{__('myconfig.request_headers')}}</th>
                    <td class="w-full">
                        <table class="w-full">
                            <tr>
                                <td>key</td>
                                <td>value</td>
                            </tr>
                            @foreach($req_headers as $k =>$v)

                                <tr cla ss="w-full">
                                    <td> {{$k }} </td>
                                    <td class="w-full">
                                        <p class="w-full line-clamp-1">{{json_encode($v)}}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.request_body')}}</th>
                    <td class="w-full">
                        <table class="w-full">

                            <tr>
                                <td>key</td>
                                <td>value</td>
                            </tr>
                            @foreach($req_body as $k =>$v)
                                <tr class="w-full">
                                    <td> {{$k }} </td>
                                    <td class="w-full">
                                        <p class="w-full line-clamp-1">{{json_encode($v)}}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="w-full">{{__('myconfig.response_headers')}}</th>
                    <td class="w-full">
                        <table class="w-full">

                            <tr>
                                <td>key</td>
                                <td>value</td>
                            </tr>
                            @if(!empty($res_headers) )
                                @foreach($res_headers as $k =>$v)
                                    <tr class="w-full">
                                        <td> {{$k }} </td>
                                        <td class="w-full">
                                            <p class="w-full line-clamp-1">{{json_encode($v)}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="w-full">
                                    <td> response header </td>
                                    <td class="w-full">
                                        <p class="w-full line-clamp-1">{{$res_headers?? ''}}</p>
                                    </td>
                                </tr>
                            @endif




                        </table>
                    </td>
                </tr>

                <tr>
                    <th class="w-full">{{__('myconfig.response_body')}}</th>
                    <td class="w-full">
                        <table class="w-full">

                            <tr>
                                <td>key</td>
                                <td>value</td>
                            </tr>
                            @if( ( !empty($activityLog->response_status ) && $activityLog->response_status != 500  )&& !empty($res_body) && gettype($res_body) == 'Array')
                                @foreach($res_body as $k =>$v)
                                    <tr class="w-full">
                                        <td> {{$k }} </td>
                                        <td class="w-full">
                                            <p class="w-full line-clamp-1">{{json_encode($v)}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="w-full">
                                    <td> response</td>
                                    <td class="w-full">
                                        <p class="w-full line-clamp-1">{{$res_body}}</p>
                                    </td>
                                </tr>
                            @endif

                        </table>
                    </td>
                </tr>
            @endif
        </table>
    </div>
</div>