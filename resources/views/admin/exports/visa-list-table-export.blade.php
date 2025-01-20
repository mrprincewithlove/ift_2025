<div class="printable">
	@if(isset($rows) && count($rows)>0)
		<table class="table table-bordered table-hover">
			<thead class="">
				<tr>
					@foreach($theads as $h)
					<th style="vertical-align:middle;">{{ $h }}</th>
					@endforeach
					{{--<th style="vertical-align:middle;">Familiyasy</th>--}}
					{{--<th style="vertical-align:middle;">Ady</th>--}}
					{{--<th style="vertical-align:middle;">Atasynyn ady</th>--}}
					{{--<th style="vertical-align:middle;">Doglan wagty</th>--}}
					{{--<th style="vertical-align:middle;">Doglan yeri</th>--}}
					{{--<th style="vertical-align:middle;">Rayatlygy</th>--}}
					{{--<th style="vertical-align:middle;">Passport belgisi</th>--}}
					{{--<th style="vertical-align:middle;">Passport mohleti</th>--}}
					{{--<th style="vertical-align:middle;">Bilimi</th>--}}
					{{--<th style="vertical-align:middle;">Gelmegin maksady</th>--}}
					{{--<th style="vertical-align:middle;">Wizanyn mohleti</th>--}}
					{{--<th style="vertical-align:middle;">Yashajak yeri </th>--}}
				</tr>
			</thead>
			<tbody>
				@foreach($rows as $r)
					<tr>
						<td> {{ $loop->iteration }} </td>
						<td> {{ $r->surname ?? '' }}</td>
						<td> {{ $r->name ?? '' }}</td>
						<td> {{ $r->middle_name ?? '' }}</td>
						<td> {{ $r->born_date ?? '' }}</td>
						<td> {{ $r->born_place ?? '' }}</td>
						<td> {{ $r->citizen ?? '' }}</td>
						<td> {{ $r->passport_number ?? '' }}</td>
						<td> {{ $r->passport_date ?? '' }}</td>
						<td> {{ $r->education ?? '' }}</td>
						<td> {{ $r->coming_text ?? '' }}</td>
						<td> {{ $r->visa_date ?? '' }}</td>
						<td> {{ $r->hotel ?? '' }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</div>