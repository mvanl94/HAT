<div>
	<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="data_table_list">
		<thead>
			<tr>
				<th data-column='id' data-sort=''>ID#</th>
				<th data-column='praktijknaam' data-sort=''>Praktijknaam</th>
				<th data-column='adres' data-sort=''>Adres</th>
				<th data-column='postcode' data-sort=''>Postcode</th>
				<th data-column='telefoon' data-sort=''>Telefoon</th>
				<th data-column='contactpersoon' data-sort=''>Contactpersoon</th>
				<th data-column='email' data-sort=''>Email</th>
				<th >Actions</th>
			</tr>
		</thead>
		<tbody>
            @include('huisartsen.index.inline')
		</tbody>
	</table>
</div>
