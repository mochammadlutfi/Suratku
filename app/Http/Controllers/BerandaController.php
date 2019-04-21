<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\SuratMasuk;
use App\SuratKeluar;
use function GuzzleHttp\json_encode;
class BerandaController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Role::create(['name'=>'operator']);

        $surat_masuk = SuratMasuk::select(DB::raw('
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=1)AND (YEAR(created_at)=2019) )),0) AS "Januari",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=2)AND (YEAR(created_at)=2019) )),0) AS "Februari",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=3)AND (YEAR(created_at)=2019) )),0) AS "Maret",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=4)AND (YEAR(created_at)=2019) )),0) AS "April",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=5)AND (YEAR(created_at)=2019) )),0) AS "Mei",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=6)AND (YEAR(created_at)=2019) )),0) AS "Juni",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=7)AND (YEAR(created_at)=2019) )),0) AS "Juli",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=8)AND (YEAR(created_at)=2019) )),0) AS "Agustus",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=9)AND (YEAR(created_at)=2019) )),0) AS "September",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=10)AND (YEAR(created_at)=2019) )),0) AS "Oktober",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=11)AND (YEAR(created_at)=2019) )),0) AS "November",
            ifnull( (SELECT count(id) FROM (surat_masuk)WHERE((Month(created_at)=12)AND (YEAR(created_at)=2019) )),0) AS "Desember", YEAR(created_at) AS tahun'))
            ->groupby('tahun')->get();

        $surat_keluar = SuratKeluar::select(DB::raw('
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=1)AND (YEAR(created_at)=2019) )),0) AS "Januari",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=2)AND (YEAR(created_at)=2019) )),0) AS "Februari",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=3)AND (YEAR(created_at)=2019) )),0) AS "Maret",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=4)AND (YEAR(created_at)=2019) )),0) AS "April",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=5)AND (YEAR(created_at)=2019) )),0) AS "Mei",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=6)AND (YEAR(created_at)=2019) )),0) AS "Juni",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=7)AND (YEAR(created_at)=2019) )),0) AS "Juli",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=8)AND (YEAR(created_at)=2019) )),0) AS "Agustus",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=9)AND (YEAR(created_at)=2019) )),0) AS "September",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=10)AND (YEAR(created_at)=2019) )),0) AS "Oktober",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=11)AND (YEAR(created_at)=2019) )),0) AS "November",
            ifnull( (SELECT count(id) FROM (surat_keluar)WHERE((Month(created_at)=12)AND (YEAR(created_at)=2019) )),0) AS "Desember", YEAR(created_at) AS tahun'))
            ->groupby('tahun')->get();

        $chart_masuk = array();
        foreach($surat_masuk as $row){
                $chart_masuk[]= $row->Januari;
                $chart_masuk[]= $row->Februari;
                $chart_masuk[]= $row->Maret;
                $chart_masuk[]= $row->April;
                $chart_masuk[]= $row->Mei;
                $chart_masuk[]= $row->Juni;
                $chart_masuk[]= $row->Juli;
                $chart_masuk[]= $row->Agustus;
                $chart_masuk[]= $row->September;
                $chart_masuk[]= $row->Oktober;
                $chart_masuk[]= $row->November;
                $chart_masuk[]= $row->Desember;
        }

        $chart_keluar = array();
        foreach($surat_keluar as $row){
            $chart_keluar[]= $row->Januari;
            $chart_keluar[]= $row->Februari;
            $chart_keluar[]= $row->Maret;
            $chart_keluar[]= $row->April;
            $chart_keluar[]= $row->Mei;
            $chart_keluar[]= $row->Juni;
            $chart_keluar[]= $row->Juli;
            $chart_keluar[]= $row->Agustus;
            $chart_keluar[]= $row->September;
            $chart_keluar[]= $row->Oktober;
            $chart_keluar[]= $row->November;
            $chart_keluar[]= $row->Desember;
    }

        return view('beranda', compact('chart_masuk', 'chart_keluar'));
    }
}
