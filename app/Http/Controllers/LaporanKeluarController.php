<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

use DB;


class LaporanKeluarController extends Controller
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

        $result = SuratKeluar::get();

        if($input1 && $input2){
            $result = SuratKeluar::whereBetween('tgl_surat',[$input1,$input2])->get();
        }
        return view('laporan.keluar',['result' => $result]);
    }
}
