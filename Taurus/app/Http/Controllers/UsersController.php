<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class UsersController extends Controller
{
    public function index(){
        return view('users.index',['users'=>User::all()]);
    }
    public function getUsersAjax(Request $request){
        try{
            return datatables()->of(DB::table('users'))
            ->addColumn('opcije',function($report){
                return 
                    //'<a href="'.route('reports.show',['report'=>$report->id]).'" class="btn btn-info btn-xs"> Pregled </a>'.
                    //'<a href="'.route('users.edit',['id'=>$report->id]).'" class="btn btn-warning btn-xs"> Izmena </a>'.
                    '<a href="'.route('users.destroy.get',['id'=>$report->id]).'" class="btn btn-danger btn-xs"> Brisanje </a>';
            }) ->rawColumns(['opcije'])->toJson();
        }catch(\Exception $ex)
        {
            return $ex->message;
        }
        
    }

    public function edit($id)
    {
        return view('auth.register');
    }
    public function destroy($id)
    {
        if($id != Auth::user()->id){
            $user = User::find($id);
            $user->delete();
            return redirect()->route('users.index')->with('success','Korisnik uspešno obrisan!');
        }
        else {
            
            return redirect()->route('users.index')->with('fail','Nije moguće obrisati trenutnog korisnika!');
        }
        
    }

}
