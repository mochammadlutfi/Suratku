<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;

class NotifikasiController extends Controller
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
    public function masuk()
    {
        $notif = Auth::user()->notifications()->where('type','App\Notifications\SuratMasukNotif')->get(['data']);
        //dd($notif);
    
        return view('notifikasi.masuk')->with('data',$notif);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function keluar()
    {
        $notif = Auth::user()->notifications()->where('type','App\Notifications\SuratKeluarBaruNotification')->get(['data']);
        // dd($notif);
        return view('notifikasi.keluar')->with('data',$notif);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function disposisi()
    {
        $notif = Auth::user()->notifications()->where('type','App\Notifications\DisposisiNotif')->get(['data']);
        //dd($notif);
        return view('notifikasi.disposisi')->with('data',$notif);
    }
}
