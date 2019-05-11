@extends('master')
@section('naslov', "Izveštaji")
@section('content')

<style>
    @media print{
        
    }
</style>
<!--
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>

                <div class="box-tools">
                    <form method="POST" action="{{ route('reports.search') }}">
                    @csrf
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control pull-right"
                                placeholder="Pretraga po imenu vlasnika">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header --
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Vlasnik</th>
                        <th>Pacijent</th>
                        <th>Datum</th>
                        <th>Status</th>
                        <th>Anamneza</th>
                        <th>Opcije</th>
                    </tr>
                    @foreach($reports as $r)
                    <tr>
                        <td><a href="{{ route('reports.show',['report'=>$r]) }}">{{ $r->id }}</a></td>
                        <td>{{ $r->ime_i_prezime_vlasnika }}</td>
                        <td>{{ $r->vrsta_pacijenta }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>
                          @if($r->placeno)  
                            <span class="label label-success"> Plaćeno</span>
                          @else 
                            <span class="label label-success"> Nije plaćeno  </span>
                          @endif
                        </td>
                        <td>{{ $r->anamneza }}</td>
                        <td>
                          <a href="{{ route('reports.show', ['report'=>$r]) }}">View</a>
                          <a href="{{ route('reports.edit', ['report'=>$r]) }}">Edit</a>
                          <a href="{{ route('reports.show.pdf', ['report'=>$r]) }}">PDF</a>
                          
                          <a href="{{ route('reports.destroy', ['report'=>$r]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
            <!-- /.box-body --
        </div>
        <!-- /.box --
    </div>
</div>
-->
@if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tabelarni prikaz izveštaja</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID čipa</th>
                    <th>Vlasnik</th>                    
                    <th>Datum</th>                    
                    <th>Pregled izvršio</th>
                    <th>Plaćeno</th>
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
            "url": "{{ route('reports.datatable') }}",
            "type": "POST",
            "data": {
                '_token': "{{ csrf_token() }}"
            },


        },
        "columns": [{
                "data": "id_pacijenta"
            },
            {
                "data": "ime_i_prezime_vlasnika"
            },
            {
                "data": "created_at"
            },
            {
                "data": "user_id"
            },
            {
                "data": "placeno"
            },
            {
                "data": "opcije"
            }
        ],
        "initComplete": function(settings, json) {
            //alert( 'DataTables has finished its initialisation.' );
        },
        "language": {
            "decimal": "",
            "emptyTable": "Nema podataka",
            "info": "Prikazano _START_ do _END_ od ukupno _TOTAL_ izveštaja",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Prikaz _MENU_ korisnika",
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