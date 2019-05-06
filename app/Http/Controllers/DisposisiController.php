<?php

namespace App\Http\Controllers;

use App\TujuanDisposisi;
use App\SuratMasuk;
use App\Disposisi;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Notifications\DisposisiNotif;
use Notification;
class DisposisiController extends Controller
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
    public function index()
    {

        $total_surat = SuratMasuk::whereHas('disposisi', function ($query) {
            $query->where('status', '>=', '3');
        })->count();
        $surat_data = SuratMasuk::whereHas('disposisi', function ($query) {
            $query->where('status', '>=', '3');
        })->paginate(5);

        return view('disposisi.index', compact('total_surat', 'surat_data'));
    }

    public function tambah(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();

            return view('disposisi.tambah', compact('role_data'));
        }else {
            $rules = [
                'tujuan' => 'required',
                'instruksi' => 'required',
                'sifat' => 'required',
                'tgl_disposisi' => 'required',
                'output' => 'required',
            ];
            $pesan = [
                'tujuan.required' => 'No. Indeks Tidak Boleh Kosong',
                'instruksi.required'  => 'Instruksi / Catatan Tidak Boleh Kosong',
                'sifat.required'  => 'Sifat Disposisi Tidak Boleh Kosong',
                'tgl_disposisi.required' => 'Tanggal Disposisi Tidak Boleh Kosong',
                'output.required' => 'Tanda Tangan Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return response()->json([
                    'fail' => true,
                    'errors' => $v->errors()
                ]);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{
                //upload ttd
                $imagedata = base64_decode($request->img_data);
                $filename = md5(date("dmYhisA"));
                $paraf = '../public/uploads/paraf/kepala-badan/'.$filename.'.png';
                file_put_contents($paraf,$imagedata);

                $disposisi = Disposisi::find($request->get('surat_id'));
                $disposisi->catatan = $request->get('instruksi');
                $disposisi->sifat = $request->get('sifat');
                $disposisi->ttd_kaban = 'uploads/paraf/kepala-badan/'.$filename.'.png';
                $disposisi->tgl_disposisi = date("Y-m-d", strtotime($request->tgl_disposisi));
                $disposisi->status = '3';
                if($disposisi->save()){
                        $id_disposisi = $disposisi->id;
                        if(count($request->tujuan) > 0){
                            foreach($request->tujuan as $item=>$t){
                                $tujuan = array(
                                    'disposisi_id' => $id_disposisi,
                                    'role_id' => $request->tujuan[$item],
                                );
                                TujuanDisposisi::insert($tujuan);

                                $id_tujuan = $request->tujuan[$item];
                                

                                $user = User::whereHas('roles',function($q) use($id_tujuan) {
                                    $q->where('id', $id_tujuan);
                                })->get();
                                //dd($user);
                                Notification::send($user,new DisposisiNotif($disposisi));
                            }
                            
                        }

                    // return redirect('surat/masuk/detail/',$request->id);

                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    public function detail($id)
    {
        $dispo = Disposisi::find($id);
        $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();
        $data = SuratMasuk::find($id);
        $tujuan = TujuanDisposisi::where('disposisi_id', '=', $dispo->id)
                                    ->get();
        return view('disposisi.detail', compact('role_data', 'data', 'tujuan'));
        // dd($tujuan);
    }
    public function cari(Request $request){
        $dispo = Disposisi::when($request->cari,function($query) use ($request){
            $query->where('surat_id','like',"%{$request->cari}%")
                ->orwhere('sifat','like',"%{$request->cari}%")
                ->orwhere('catatan','like',"%{$request->cari}%");
        })->paginate();
        return view('disposisi.index',['dispo' => $dispo])->with('total_surat','surat_data');
    }
}
