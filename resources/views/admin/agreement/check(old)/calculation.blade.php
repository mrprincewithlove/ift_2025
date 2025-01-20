<div class="overflow-x-auto">
    
    <div class="grid grid-cols-2 mt-5 gap-2 w-full">
        <div class="w-full px-3 py-2 border rounded-md bg-gray-100 flex items-center justify-between gap-4">
            <p>{{__('translates.agreement_type')}} </p>
            <p>{{$agreement_type->{'name_'.app()->currentLocale()} }}</p>
        </div>

        <!-- <div class="w-full px-3 py-2 border rounded-md bg-gray-100 flex items-center justify-between gap-4">
            <p>Agreement period</p>
            <p>{{ $agreement_type->period_month}}</p>
        </div>
        <div class="w-full px-3 py-2 border rounded-md bg-gray-100 flex items-center justify-between gap-4">
            <p>Total price</p>
            <p>{{ $total }}</p>
        </div>
        <div class="w-full px-3 py-2 border rounded-md bg-gray-100 flex items-center justify-between gap-4">
            <p>Prepayment</p>
            <p>{{ $prepayment}}</p>
        </div> -->
        <div class="w-full px-3 py-2 border rounded-md bg-gray-100 flex items-center justify-between gap-4">
            <p>{{__('translates.agreement_start_date')}} </p>
            <p>{{ $start_date}}</p>
        </div>
    </div>
    @if ($agreement_type->id != 1 )  
        <table class="table mt-5">
            <thead class="table-light">
            <tr>
                <th class="whitespace-nowrap">{{__('translates.document')}}</th>
                <th class="whitespace-nowrap">{{__('translates.date')}}</th>
                <th class="whitespace-nowrap">{{__('translates.invoice_total') }}  </th>
                
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i<$agreement_type->period_month; $i++)
            <tr>
                <td>{{__('translates.invoice')}}</td>
                <td>{{ $dates[$i] }}</td>
                <td>{{ $monthly_payment . 'tmt' }}</td>            
            </tr>
            @endfor

            </tbody>
        </table>
    @endif
</div>