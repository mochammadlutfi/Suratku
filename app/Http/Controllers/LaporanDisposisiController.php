<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

use DB;


class LaporanDisposisiController extends Controller
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
        $result = [];
        $count = [];
        

        if($input1 && $input2){
            $result = Disposisi::whereBetween('created_at',[$input1,$input2])->get();
            $count = count($result);
        }
        return view('laporan.disposisi',compact('count'),['result' => $result]);
    }
}
