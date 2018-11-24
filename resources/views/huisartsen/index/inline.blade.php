@if( $huisartsen->count() > 0)
	@foreach( $huisartsen as $huisarts )
		<tr>
			<td>{{ $huisarts->id }}</td>
			<td>{{ $huisarts->praktijknaam }} </td>
			<td>{{ $huisarts->adres }} </td>
			<td>{{ $huisarts->postcode }} </td>
			<td>{{ $huisarts->telefoon }} </td>
			<td>{{ $huisarts->contactpersoon }} </td>
			<td>{{ $huisarts->email }} </td>
			<td align="center">
				<a class="btn " data-toggle="tooltip" title="Show"
				href="">
					<i class="fa fa-book"></i>
				</a>

				<a class="btn " data-toggle="tooltip" title="Edit"
				href="">
					<i class="fa fa-edit"></i>
				</a>

				<a class="btn" data-toggle="tooltip" title="Delete"
				href="">
					<i class="fa fa-trash-o"></i>
				</a>
			</td>
		</tr>
	@endforeach
@else
	<tr>
		<td colspan="6" align="center">Geen huisartsen }}</td>
	</tr>
@endif
