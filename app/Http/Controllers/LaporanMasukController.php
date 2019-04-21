<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

use DB;


class LaporanMasukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

   
    public function index(Request $request)
    {
         
       

        $input1 = $request->tgl_mulai;
        $input2 = $request->tgl_akhir;    

        
        $result=SuratMasuk::get();
        
        
        if ($input1 && $input2) {
            $result = SuratMasuk::whereBetween('tgl_Surat',[$input1, $input2])->get();
        }

    	// dd($result);
        
        return view('laporan.masuk',['result' => $result]);
    }

}
