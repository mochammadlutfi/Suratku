<?php

namespace App\Http\Controllers;

use Alert;
use App\FileMasuk;
use App\Disposisi;
use App\SuratMasuk;
use App\User;
use App\Notifications\SuratMasukNotif;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Notification;
class MasukController extends Controller
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
        if(Auth::user()->hasrole('admin'))
        {
            $total_surat = SuratMasuk::count();
            $surat_data = SuratMasuk::orderBy('id', 'DESC')->paginate(5);
        }elseif(Auth::user()->hasrole('kasubbag'))
        {
            $total_surat = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '=<', '0');
            })->count();
            $surat_data = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '=<', '0');
            })->paginate(5);
        }elseif(Auth::user()->hasrole('sekretaris'))
        {
            $total_surat = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '=<', '1');
            })->count();
            $surat_data = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '=<', '1');
            })->paginate(5);
        }elseif(Auth::user()->hasrole('kepala badan'))
        {
            $total_surat = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '>=', '2');
            })->count();
            $surat_data = SuratMasuk::whereHas('disposisi', function ($query) {
                $query->where('status', '>=', '2');
            })->paginate(5);
        }elseif(Auth::user()->hasrole('super-admin'))
        {
            $total_surat = SuratMasuk::count();
            $surat_data = SuratMasuk::orderBy('id', 'DESC')->paginate(5);
        }

        return view('masuk.index', compact('total_surat', 'surat_data'));
    }

    public function tambah(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();

            return view('masuk.tambah', compact('role_data'));
        }else {
            $rules = [
                'no_indeks' => 'required',
                'no_surat' => 'required',
                'tgl_surat' => 'required',
                'sumber' => 'required',
                'tujuan' => 'required',
                'perihal' => 'required',
                'sifat' => 'required',
                'media' => 'required',
            ];
            $pesan = [
                'no_indeks.required' => 'No. Indeks Tidak Boleh Kosong',
                'no_surat.required'  => 'No. Surat Tidak Boleh Kosong',
                'tgl_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'sumber.required' => 'Sumber Surat Tidak Boleh Kosong',
                'tujuan.required'  => 'Tujuan Surat Tidak Boleh Kosong',
                'perihal.required' => 'Perihal Surat Tidak Boleh Kosong',
                'sifat.required' => 'Sifat Surat Tidak Boleh Kosong',
                'media.required'  => 'Media Surat Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{
                //upload foto
                $surat = new SuratMasuk();
                $surat->no_indeks = $request->get('no_indeks');
                $surat->nomor = $request->get('no_surat');
                $surat->tgl_surat =  date("Y-m-d", strtotime($request->tgl_surat));
                $surat->perihal = $request->get('perihal');
                $surat->dari = $request->get('sumber');
                $surat->kepada = $request->get('tujuan');
                $surat->keterangan = $request->get('keterangan');
                $surat->media = $request->get('media');
                $surat->sifat_surat = $request->get('sifat');
                $surat->penerima = Auth::user()->id;

                if($surat->save()){
                    $id_surat = $surat->id;

                    $dispo = new Disposisi();
                    $dispo->surat_id = $id_surat;
                    $dispo->status = '0';
                    $dispo->save();

                    //notif
                    $get_surat = SuratMasuk::where('id',$id_surat)->first();
                    Notification::send(User::role('kasubbag')->get(),new SuratMasukNotif($get_surat));
                    
                    if($request->hasfile('fileSurat'))
                    {

                        foreach($request->file('fileSurat') as $f)
                        {

                            $ext = $f->getClientOriginalExtension();
                            $nama_file = md5($request->no_indeks).'.'.$ext;
                            $f->move(public_path().'/uploads/surat/masuk/'.$request->no_indeks, $nama_file);

                            $file = array(
                                'masuk_id' => $id_surat,
                                'path' => '/uploads/surat/masuk/'.$request->no_indeks.'/'.$nama_file,
                            );

                            FileMasuk::insert($file);
                        }
                    }
                    Alert::success('Input Surat Berhasil', 'Judul Pesan');
                    // return redirect('surat/masuk/detail/',$request->id);

                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    public function detail($id)
    {
        $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();
        $data = SuratMasuk::find($id);
        $lampiran_data = FileMasuk::where('masuk_id', '=', $id)->get();
        return view('masuk.detail', compact('data', 'lampiran_data', 'role_data'));
    }

    public function edit(Request $request, $id)
    {
        $dataedit = SuratMasuk::where('id',$id)->get();
        $lampiran_data = FileMasuk::where('masuk_id', '=', $id)->get();
        $role_data = Role::where('name', '!=', 'super-admin')->get();

        return view('masuk.edit', compact('dataedit', 'lampiran_data','role_data'));
    }

    public function update(Request $request,$id)
    {
        {
            if ($request->isMethod('get')){

                $role_data = Role::where('name', '!=', 'super-admin')
                            ->get();

                return view('masuk.edit', compact('role_data'));
            }else {
                $rules = [
                    'no_indeks' => 'required',
                    'no_surat' => 'required',
                    'tgl_surat' => 'required',
                    'sumber' => 'required',
                    'tujuan' => 'required',
                    'perihal' => 'required',
                    'sifat' => 'required',
                    'media' => 'required',
                ];
                $pesan = [
                    'no_indeks.required' => 'No. Indeks Tidak Boleh Kosong',
                    'no_surat.required'  => 'No. Surat Tidak Boleh Kosong',
                    'tgl_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                    'sumber.required' => 'Sumber Surat Tidak Boleh Kosong',
                    'tujuan.required'  => 'Tujuan Surat Tidak Boleh Kosong',
                    'perihal.required' => 'Perihal Surat Tidak Boleh Kosong',
                    'sifat.required' => 'Sifat Surat Tidak Boleh Kosong',
                    'media.required'  => 'Media Surat Tidak Boleh Kosong',
                ];

                $v = Validator::make($request->all(), $rules, $pesan);
                if ($v->fails()) {
                    return back()->withInput()->withErrors($v);
                    // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
                }else{
                    //upload foto
                    $surat = SuratMasuk::find($id);
                    $surat->no_indeks = $request->get('no_indeks');
                    $surat->nomor = $request->get('no_surat');
                    $surat->tgl_surat =  date("Y-m-d", strtotime($request->tgl_surat));
                    $surat->perihal = $request->get('perihal');
                    $surat->dari = $request->get('sumber');
                    $surat->kepada = $request->get('tujuan');
                    $surat->keterangan = $request->get('keterangan');
                    $surat->media = $request->get('media');
                    $surat->sifat_surat = $request->get('sifat');
                    $surat->penerima = Auth::user()->id;
                    if($surat->save())
                    {
                        return redirect('surat/masuk/detail/'.$request->id);
                    }else{
                        App::abort(500, 'Error');
                    }


                        // if($request->hasfile('fileSurat'))
                        // {

                        //     foreach($request->file('fileSurat') as $f)
                        //     {
                        //         $id_surat = $surat->id;
                        //         $ext = $f->getClientOriginalExtension();
                        //         $nama_file = md5($request->no_indeks).'.'.$ext;
                        //         $f->move(public_path().'/uploads/surat/masuk/'.$request->no_indeks, $nama_file);

                        //         $file = array(
                        //             'masuk_id' => $id_surat,
                        //             'path' => '/uploads/surat/masuk/'.$request->no_indeks.'/'.$nama_file,
                        //         );

                        //         FileMasuk::insert($file);
                        //     }
                        // }



                }
            }
        }
    }

    public function delete_surat(Request $request,$id)
    {
        try {
            SuratMasuk::where('id',$id)->delete();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function paraf(Request $request)
    {
        $rules = [
            'output' => 'required',
        ];

        $pesan = [
            'output.required' => 'Tanda Tangan Tidak Boleh Kosong',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            if(Auth::user()->hasrole('kasubbag'))
            {
                $imagedata = base64_decode($request->img_data);
                $filename = md5(date("dmYhisA"));
                $paraf = '../public/uploads/paraf/kasubbag/'.$filename.'.png';
                file_put_contents($paraf,$imagedata);

                $Disposisi = Disposisi::find($request->surat_id);
                $Disposisi->status = '1';
                $Disposisi->ttd_kasubbag = 'uploads/paraf/kasubbag/'.$filename.'.png';
                
                //notifikasi ke sekretaris
                $get_surat = SuratMasuk::where('id',$request->surat_id)->first();
                Notification::send(User::role('sekretaris')->get(),new SuratMasukNotif($get_surat));

                if($Disposisi->save())
                {
                    return response()->json([
                        'fail' => false,
                    ]);
                }
            }else{
                $imagedata = base64_decode($request->img_data);
                $filename = md5(date("dmYhisA"));
                $paraf = '../public/uploads/paraf/sekretaris/'.$filename.'.png';
                file_put_contents($paraf,$imagedata);

                $Disposisi = Disposisi::find($request->surat_id);
                $Disposisi->status = '2';
                $Disposisi->ttd_sekretaris = 'uploads/paraf/sekretaris/'.$filename.'.png';
                
                //notifiasi ke kaban
                $get_surat = SuratMasuk::where('id',$request->surat_id)->first();
                Notification::send(User::role('kepala badan')->get(),new SuratMasukNotif($get_surat));
                if($Disposisi->save())
                {
                    return response()->json([
                        'fail' => false,
                    ]);
                }
            }

        }
    }
    public function cari(Request $request)
    {
        $data = $request->cari;
        $surat_data = SuratMasuk::when($request->cari, function ($query) use ($request) {
            $query->where('no_indeks', 'like', "%{$request->cari}%")
                ->orWhere('kepada', 'like', "%{$request->cari}%")
                ->orWhere('dari', 'like', "%{$request->cari}%")
                ->orWhere('tgl_surat','like',"{$request->cari}");
        })->paginate();
        return view('masuk.index',['surat_data'=>$surat_data])->with('total_surat');
    }
}
