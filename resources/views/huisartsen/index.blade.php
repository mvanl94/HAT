@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Huisartsen
    <small>Manager</small>
  </h1>
  <a class="addobject btn btn-primary" href="{{ route('huisartsen.create') }}">Huisarts toevoegen</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Huisartsen</a></li>
    <li class="active">Huisartsen</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
</div>

<form role="form" method="post" name="frm-list" id="frm-list"
    action="">
        <input type="hidden" name="act" id="act" value="">
        <input type="hidden" name="_method" id="_method" value="">
        <div class="form-body">
            @include( 'huisartsen.index.list' )
        </div>
    </form>
</section>
@endsection


@section('scripts')
   @parent

    <script language="javascript">
        jQuery(document).ready(function() {

            function filterGlobal () {
                $('#data_table_list').DataTable().search(
                    $('#global_filter').val(),
                    $('#global_regex').prop('checked'),
                    $('#global_smart').prop('checked')
                ).draw();
            }

            function filterColumn ( i ) {
                $('#data_table_list').DataTable().column( i ).search(
                    $('#col'+i+'_filter').val(),
                    $('#col'+i+'_regex').prop('checked'),
                    $('#col'+i+'_smart').prop('checked')
                ).draw();
            }

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );

            var lengthMenu = [ [10, 20, 50, 100, 150, 500000], [10, 20, 50, 100, 150, "All"] ];
            var pageLength = 10;
            var columnDefs = [{ "orderable": false, "targets": 5 }];
            var order      = [[1, "asc"]];

            @if( $huisartsen->count() > 0 )

                @if( 'inline' == $datatable )

                    oTable = jQuery('#data_table_list').DataTable({
                        "columnDefs": columnDefs,
                        "searching": true,
                        "order": order,
                        "lengthMenu": lengthMenu,
                        "pageLength": pageLength // default record count per page
                    });

                    var tableWrapper = jQuery('#data_table_list_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
                    tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

                @elseif( 'ajax' == $datatable )

                    @include( 'misc.datatable_pipeline_js' )

                    jQuery('#data_table_list').DataTable({
                        "columnDefs": columnDefs,
                        "searching": true,
                        "order": order,// set first column as a default sort by asc
                        "lengthMenu": lengthMenu,
                        "pageLength": pageLength, // default record count per page
                        "responsive": true,
                        "pagingType": "full_numbers",
                        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                        "processing": true,
                        "serverSide": true,
                        "ajax": jQuery.fn.dataTable.pipeline( {
                            method: 'GET',
                            url: "{{ route('huisartsen.index') }}", // ajax source
                            data: {_token: '{{ csrf_token() }}' },
                            pages: 1 // number of pages to cache
                        } )
                    });
                @else
                    tableSortable('#data_table_list', '{{ $module['name'] }}');
                @endif
            @endif
        });

        deleteRecord=function( url ){
            bootbox.confirm("Do you really want to delete this huisarts?",
                function(result) {
                    if( result ){
                        jQuery("#frm-list").prop("action", url);
                        jQuery("#_method").val("DELETE");
                        jQuery("#frm-list").submit();
                    }
                }
            );
        }
    </script>


@endsection
