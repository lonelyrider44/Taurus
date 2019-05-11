@extends('master')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tabelarni prikaz korisnika</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ime i prezime</th>
                    <th>Email adresa</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@push('scripts')
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js" defer></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" defer></script>
<script>
$(function() {

    $('#example1').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/ajax/users/get",
            "type": "POST",
            "data": {
                '_token': "{{ csrf_token() }}"
            },


        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "name"
            },
            {
                "data": "email"
            },
            {
                "data":"opcije"
            }
        ],
        "initComplete": function(settings, json) {
            //alert( 'DataTables has finished its initialisation.' );
        },
        "language": {
            "decimal": "",
            "emptyTable": "Nema podataka",
            "info": "Prikaz od _START_ do _END_ od ukupno _TOTAL_ podataka",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Prikaz po _MENU_ korisnika",
            "loadingRecords": "Učitavanje...",
            "processing": "Obrada u toku...",
            "search": "Pretraga:",
            "zeroRecords": "Nema rezultata koji odgovaraju pretrazi",
            "paginate": {
                "first": "Prva",
                "last": "Poslednja",
                "next": "Sledeća",
                "previous": "Prethodna"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }

    })
});
</script>
@endpush
@endsection