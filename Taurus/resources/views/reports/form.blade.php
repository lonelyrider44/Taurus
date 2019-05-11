@extends('master')


@section('content')


<style>
.list-unstyled {
    max-height: 90px !important;
    display: flex !important;
    flex-direction: column !important;
    flex-wrap: wrap !important;
}
.list-unstyled li{
    font-size: 10px;
}
.boxDiv{
    border-radius: 10px;  
    border: 1px solid black;  
    margin-top: 10px; 
    margin-bottom:5px; 
    padding: 10px;  
}
.row h2{
    text-align: center;
}
textarea.form-control{
    overflow-y: visible;
}

</style>

<div class="container">
    <div class="row">
        
        <div class="col-sm-12">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Izveštaj o kliničkom pregledu</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                $disabled = ""; $readOnly = "";
            ?>            
@if(Route::currentRouteName()=="reports.create")
    <form style="padding: 20px" method="POST" action="{{route('reports.store')}}">
@elseif(Route::currentRouteName()=="reports.edit")
    <form style="padding: 20px" method="POST" action="{{route('reports.update',['report'=>$report])}}">
        @method('patch')
@elseif(Route::currentRouteName()=="reports.show")
<form style="padding: 20px" method="" action="">
    <?php
        $disabled = "disabled"; $readOnly = "readonly";
    ?>
@endif

        @csrf
        <div class="row">
            <h2></h2>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <h4>Podaci o vlasniku</h4>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Ime i prezime</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ime_i_prezime_vlasnika" placeholder="" name="ime_i_prezime_vlasnika"
                            value="{{ $report->ime_i_prezime_vlasnika }}" required {{ $disabled }}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Adresa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="adresa_vlasnika" placeholder="" name="adresa_vlasnika"
                            value="{{ $report->adresa_vlasnika }}"  required {{ $disabled }}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Telefon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefon_vlasnika" placeholder="" name="telefon_vlasnika"
                            value="{{ $report->telefon_vlasnika }}"  required {{ $disabled }}>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <h4>Podaci o pacijentu</h4>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Vrsta</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="vrsta_pacijenta" placeholder="" name="vrsta_pacijenta"
                            value="{{ $report->vrsta_pacijenta }}"  required {{ $disabled }}>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">Rasa</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="rasa_pacijenta" placeholder="" name="rasa_pacijenta"
                            value="{{ $report->rasa_pacijenta }}"  required {{ $disabled }}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Pol</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="pol_pacijenta" placeholder="" name="pol_pacijenta"
                            value="{{ $report->pol_pacijenta }}" required {{ $disabled }}>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">Ime životinje</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="ime_pacijenta" placeholder="" name="ime_pacijenta"
                            value="{{ $report->ime_pacijenta }}"  required {{ $disabled }}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Datum rođenja</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="datum_rodjenja_pacijenta" placeholder="" name="datum_rodjenja_pacijenta"
                            value="{{ $report->datum_rodjenja_pacijenta }}" {{ $disabled }}>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">ID životinje</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="id_pacijenta" placeholder="" name="id_pacijenta" 
                            value="{{ $report->id_pacijenta }}" {{ $disabled }}>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <hr style="border-top: 1px solid black">
        </div>

        <div class="row">

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Prethodna istorija</label>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li>Sterilizacija / kastracija</li>
                        <li>Alergije</li>
                        <li>Epilepsija</li>
                        <li>Druge hronične bolesti / stanja</li>
                    </ul>
                </div>
                <div class="col-sm-7">
                    <textarea class="form-control"
                        name="prethodna_istorija" id="prethodna_istorija" {{ $readOnly }}>{{ $report->prethodna_istorija }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Anamneza</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="anamneza" required {{ $readOnly }}>{{ $report->anamneza }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Klinički nalaz</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="klinicki_nalaz" {{ $readOnly }}>{{ $report->klinicki_nalaz }}</textarea>
                    </div>
                </div>
            </div>
        

        <div class="row">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Dijagnoza / radna dijagnoza</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="dijagnoza" required {{ $readOnly }}>{{ $report->dijagnoza }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Terapija</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="terapija" required {{ $readOnly }}>{{ $report->terapija }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Plaćeno</label>
                <div class="col-sm-3">
                    <input type="checkbox" class="" name="placeno" 
                        @if($report->placeno==1)
                            checked
                        @endif
                     />
                </div>
                
                <label for="" class="col-sm-3 col-form-label">Pregled izvršio</label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control" name="user" 
                    value="@if($report->user!=null) {{ $report->user->name }} @else {{ Auth::user()->name }} @endif" />
                </div>
            </div>
        </div>
        @if(Route::currentRouteName()!="reports.show")
        <div class="row">
            <div class="form-group row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2"><input type="submit" class="form-control btn btn-primary" 
                @if(Route::currentRouteName()=="reports.create")
                    value="Unos"
                @else
                    value="Izmena"
                @endif
                 /></div>
            </div>
        </div>
        @endif
    </form>
            </div>
        </div>
        
    </div>
</div>
@push('scripts')
@if(Route::currentRouteName()=="reports.create")
<script>
    $(function(){
       // 
       $('#id_pacijenta').focusout(function(){

        $.ajax({
                url: '/ajax/reports/updateInfo',
                dataType: 'text',
                type: 'GET',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    'id_pacijenta' : $(this).val()
                },
                success: function( data, textStatus, jQxhr ){
                    data = JSON.parse(data);   
                    $("#ime_i_prezime_vlasnika").val(data.ime_i_prezime_vlasnika);
                    $("#adresa_vlasnika").val(data.adresa_vlasnika);
                    $("#telefon_vlasnika").val(data.telefon_vlasnika);
                    $("#vrsta_pacijenta").val(data.vrsta_pacijenta);
                    $("#rasa_pacijenta").val(data.rasa_pacijenta);
                    $("#pol_pacijenta").val(data.pol_pacijenta);
                    $("#ime_pacijenta").val(data.ime_pacijenta);
                    $("#datum_rodjenja_pacijenta").val(data.datum_rodjenja_pacijenta);
                    $("#prethodna_istorija").val(data.prethodna_istorija);           
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            
        
        
       });
    });
</script>
@endif
@endpush

    @endsection('content')