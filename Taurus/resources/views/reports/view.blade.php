@extends('master')

@section('naslov',"Izveštaj o kliničkom pregledu")
@section('content')


<form style="padding: 20px" method="POST" action="{{route('reports.store')}}">
    @csrf
    <div class="row">
        <div class="col-sm-5">
            <h4>Podaci o vlasniku</h4>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Ime i prezime</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="ime_i_prezime_vlasnika" value="{{ $report->ime_i_prezime_vlasnika }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Adresa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="" placeholder="" name="adresa_vlasnika"
                        value="{{ $report->adresa_vlasnika }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Telefon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="telefon_vlasnika" value="{{ $report->telefon_vlasnika }}" >
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <h4>Podaci o pacijentu</h4>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Vrsta</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="vrsta_pacijenta" value="{{ $report->vrsta_pacijenta }}">
                </div>
                <label for="" class="col-sm-2 col-form-label">Rasa</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="rasa_pacijenta" value="{{ $report->rasa_pacijenta }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Pol</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="pol_pacijenta" value="{{ $report->pol_pacijenta }}" >
                </div>
                <label for="" class="col-sm-2 col-form-label">Ime životinje</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="" placeholder="" 
                    name="ime_pacijenta" value="{{ $report->ime_pacijenta }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Datum rođenja</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="datum_rodjenja_pacijenta" value="{{ $report->datum_rodjenja_pacijenta }}">
                </div>
                <label for="" class="col-sm-2 col-form-label">ID životinje</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="" placeholder="" 
                        name="id_pacijenta" value="{{ $report->id_pacijenta }}">
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
                Sterilizacija / kastracija<br />
                Alergije<br />
                Epilepsija<br />
                Druge hronične bolesti / stanja
            </div>
            <div class="col-sm-7">
                <textarea class="form-control" name="prethodna_istorija">
                    {{ $report->prethodna_istorija }}
                </textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Anamneza</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="anamneza">
                    {{ $report->anamneza }}
                </textarea>
            </div>
        </div>
    </div>

    <div class="row" style="border-radius: 20px;  border: 1px solid black;  margin-top: 20px; margin-bottom:20px; padding: 20px">
        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Nervni i lokomotorni sistem</label>
            <div class="col-sm-2">
                <p>Mentalni status</p>
                <p>Stav</p>
                <p>Koordinisanost pokreta</p>
                <p>Tikovi</p>
                <p>Istorija traume glave</p>
            </div>
            <div class="col-sm-2">
                <p>Nociocepsija</p>
                <p>Kranijalni refleksi</p>
                <p>Posturalne reakcije</p>
                <p>Spinalni refleksi</p>
            </div>
            <div class="col-sm-1">
            <p>Zglobovi:</p>
            <p>Pokretljivost</p>
            <p>Palpacija</p>
            </div>
            <div class="col-sm-1">
                Opis abnormalnosti
            </div>
            
            <div class="col-sm-5">
                <textarea class="form-control" name="nervni_i_lokomotorni_sistem_opis_abnormalnosti">
                {{ $report->nervni_i_lokomotorni_sistem_opis_abnormalnosti }}
                </textarea>
            </div>
        </div>
    </div>

    <div class="row" style="border-radius: 20px;  border: 1px solid black;  margin-top: 20px; margin-bottom:20px; padding: 20px">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Uši</label>
            <div class="col-sm-1">Opis abnormalnosti</div>
            <div class="col-sm-9">
                <textarea class="form-control" name="usi_opis_abnormalnosti">
                {{ $report->usi_opis_abnormalnosti }}
                </textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Dijagnoza / radna dijagnoza</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="dijagnoza">
                {{ $report->dijagnoza }}
                </textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Terapija</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="terapija">
                {{ $report->terapija }}
                </textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Plaćeno</label>
            <div class="col-sm-10">
                <input type="checkbox" class="" name="placeno" 
                 checked />
            </div>
        </div>
    </div>
    <div class="row">
    <div class="form-group row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"><input type="submit" class="form-control btn btn-primary" value="Unos"/></div>
</div>
    </div>
</form>
@endsection('content')