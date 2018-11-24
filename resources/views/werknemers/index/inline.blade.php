@if( $employees->count() > 0)
	@foreach( $employees as $employee )
		<tr data-employee-id="{{ $employee->id }}" data-employee-url="{{ route('werknemer.show', $employee->id)}}">
			<td>{{ $employee->naam }} </td>
			<td>{{ $employee->adres }} </td>
			<td>{{ $employee->postcode }} </td>
			<td>{{ $employee->birthday }} </td>
			<td>{{ $employee->telefoon }} </td>
			<td>{{ $employee->email }} </td>
            <td align="center">

                <a class="btn " data-toggle="tooltip" title="Edit"
				href="{{ route(sprintf('%s.edit', $module['resourceful']), $employee->id) }}">
					<i class="fa fa-edit"></i>
				</a>
				<a class="btn" data-toggle="tooltip" title="Delete"
				href="javascript:deleteRecord('{{route(sprintf('%s.destroy', $module['resourceful']), $employee->id) }}')">
					<i class="fa fa-trash-o"></i>
				</a>
			</td>
		</tr>
	@endforeach
@else
	<tr>
		<td colspan="6" align="center">Geen werknemers }}</td>
	</tr>
@endif
