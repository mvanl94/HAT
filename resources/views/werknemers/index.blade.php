@extends('layouts.app')
@section('content')
<section class="content-header">
  <div>
      <h1>
    {{ $module['name']}}
    <small>Overzicht</small>
  </h1>
  <a class="addobject btn btn-primary" href="{{ route('werknemers.create') }}">{{ $module['resourceful']}} toevoegen</a>
</div>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>{{ $module['name']}}</a></li>
    <li class="active">Overzicht</li>
  </ol>

</section>

<section class="content">

    <form role="form" method="post" name="frm-list" id="frm-list"
      action="{{ route(sprintf('%s.index', $module['resourceful'])) }}">
          <input type="hidden" name="act" id="act" value="">
          <input type="hidden" name="_method" id="_method" value="">
          <div class="form-body">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @include( 'werknemers.index.list' )
          </div>
      </form>

</section>
@endsection


@section('scripts')
    @parent
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var lengthMenu = [ [10, 20, 50, 100, 150, 500000], [10, 20, 50, 100, 150, "All"] ];
            var pageLength = 10;
            var columnDefs = [{ "orderable": false, "targets": 5 }];
            var order      = [[1, "asc"]];

            @if( $employees->count() > 0 )

                @if( 'inline' == $datatable )

                    oTable = jQuery('#data_table_list').DataTable({
                        "columnDefs": columnDefs,
                        "order": order,
                        "lengthMenu": lengthMenu,
                        "pageLength": pageLength, // default record count per page
                        "searching": true,
                        "dom":'<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-tl ui-corner-tr"fr>'+
't'+
'<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-bl ui-corner-br"lip>',
});

                    var tableWrapper = jQuery('#data_table_list_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
                @endif
            @endif
        });

        deleteRecord=function( url ){

            bootbox.confirm("Weet je zeker dat je deze werknemer wilt verwijderen?",
                function(result) {
                    jQuery("#frm-list").prop("action", url);
                        jQuery("#_method").val("DELETE");
                        jQuery("#frm-list").submit();
                }
            );
        }
    </script>


@endsection
