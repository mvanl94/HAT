<div>
	<table class="table table-striped table-bordered table-hover dt-responsive clickable" width="100%" id="data_table_list">
		<thead>
			<tr>
				<th data-column='naam' data-sort=''>Naam</th>
				<th data-column='adres' data-sort=''>Adres</th>
				<th data-column='postcode' data-sort=''>Postcode</th>
				<th data-column='birthday' data-sort=''>Geboortedatum</th>
				<th data-column='telefoon' data-sort=''>Telefoon</th>
				<th data-column='email' data-sort=''>Email</th>
				<th >Actions</th>
			</tr>
		</thead>
		<tbody>
            @include('werknemers.index.inline')
		</tbody>
	</table>
</div>
