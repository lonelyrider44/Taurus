<?php

namespace App\Http\Controllers;

use App\Reports;
use Illuminate\Http\Request;
use Auth;
use PDF;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index', ['reports'=>Reports::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.form', ['report' => new Reports()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $report = new Reports();
        $report->ime_i_prezime_vlasnika = $request->ime_i_prezime_vlasnika;
        $report->adresa_vlasnika = $request->adresa_vlasnika;
        $report->telefon_vlasnika = $request->telefon_vlasnika;
        $report->vrsta_pacijenta = $request->vrsta_pacijenta;
        $report->rasa_pacijenta = $request->rasa_pacijenta;
        $report->pol_pacijenta = $request->pol_pacijenta;
        $report->ime_pacijenta = $request->ime_pacijenta;
        $report->datum_rodjenja_pacijenta = $request->datum_rodjenja_pacijenta;
        $report->id_pacijenta = $request->id_pacijenta;
        $report->prethodna_istorija = $request->prethodna_istorija;
        $report->anamneza = $request->anamneza;
        // $report->nervni_i_lokomotorni_sistem_opis_abnormalnosti = 
        //     $request->nervni_i_lokomotorni_sistem_opis_abnormalnosti;
        // $report->usi_opis_abnormalnosti = $request->usi_opis_abnormalnosti;
        $report->klinicki_nalaz = $request->klinicki_nalaz;
        $report->dijagnoza = $request->dijagnoza;
        $report->terapija = $request->terapija;
        $report->placeno = ($request->placeno=="on")?true:false;
        
        $report->user_id = Auth::user()->id;
        
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Izveštaj je uspešno unet!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show(Reports $report)
    {
        //return view('reports.view',['report'=>$report]);
        return view('reports.form', ['report'=>$report]);
    }

    public function showPDF(Reports $report)
    {
        
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return PDF::loadView('reports.pdf', ['report' => $report])->setPaper('a4', 'landscape')->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Reports $report)
    {
        return view('reports.form', ['report'=>$report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reports $report)
    {
        $report->ime_i_prezime_vlasnika = $request->ime_i_prezime_vlasnika;
        $report->adresa_vlasnika = $request->adresa_vlasnika;
        $report->telefon_vlasnika = $request->telefon_vlasnika;
        $report->vrsta_pacijenta = $request->vrsta_pacijenta;
        $report->rasa_pacijenta = $request->rasa_pacijenta;
        $report->pol_pacijenta = $request->pol_pacijenta;
        $report->ime_pacijenta = $request->ime_pacijenta;
        $report->datum_rodjenja_pacijenta = $request->datum_rodjenja_pacijenta;
        $report->id_pacijenta = $request->id_pacijenta;
        $report->prethodna_istorija = $request->prethodna_istorija;
        $report->anamneza = $request->anamneza;
        // $report->nervni_i_lokomotorni_sistem_opis_abnormalnosti = 
        // $request->nervni_i_lokomotorni_sistem_opis_abnormalnosti;
        // $report->usi_opis_abnormalnosti = $request->usi_opis_abnormalnosti;
        $report->klinicki_nalaz = $request->klinicki_nalaz;
        $report->dijagnoza = $request->dijagnoza;
        $report->terapija = $request->terapija;
        $report->placeno = isset($request->placeno)?1:0;
        
        $report->user_id = Auth::user()->id;
        
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Izveštaj je uspešno izmenjen!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success','Izveštaj uspešno izbrisan.');
    }
    public function search(Request $request)
    {
        $reports = Reports::where('ime_i_prezime_vlasnika','like','%'.$request->table_search.'%')->get();
        return view('reports.index', ['reports'=>$reports]);
    }

    public function datatable(){
        return datatables(Reports::all())
            ->editColumn('user_id',function($report){
                return $report->user->name;
            })
            ->editColumn('placeno',function($report){
                return ($report->placeno==1)?"Plaćeno":"Nije plaćeno";
            })
            ->addColumn('opcije',function($report){
                return 
                    '<a href="'.route('reports.show',['report'=>$report->id]).'" class="btn btn-info btn-xs"> Pregled </a>'.
                    '<a href="'.route('reports.edit',['report'=>$report->id]).'" class="btn btn-warning btn-xs"> Izmena </a>'.
                    '<a href="'.route('reports.destroy.get',['report'=>$report->id]).'" class="btn btn-danger btn-xs"> Brisanje </a>';
            })
            ->rawColumns(['opcije'])
            ->toJson();
    }
    public function updateInfo(Request $request){
        $reports = Reports::where('id_pacijenta',$request->id_pacijenta)->orderBy('id','asc')->get();
        $report = new Reports;
        $newLine = "";
        foreach($reports as $r){
            $report->ime_i_prezime_vlasnika = $r->ime_i_prezime_vlasnika;
            $report->adresa_vlasnika = $r->adresa_vlasnika;
            $report->telefon_vlasnika = $r->telefon_vlasnika;
            $report->vrsta_pacijenta = $r->vrsta_pacijenta;
            $report->rasa_pacijenta = $r->rasa_pacijenta;
            $report->pol_pacijenta = $r->pol_pacijenta;
            $report->ime_pacijenta = $r->ime_pacijenta;
            $report->datum_rodjenja_pacijenta = $r->datum_rodjenja_pacijenta;
            $report->prethodna_istorija .= $newLine.$r->klinicki_nalaz;
            $newLine = "\n";
        }
        return $report;
    }
}
