<?php

namespace App\Http\Controllers;

use App\FileKeluar;
use App\SuratKeluar;
use App\User;
use App\Notifications\SuratKeluarBaruNotification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Notification;

class KeluarController extends Controller
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
        $total_surat = SuratKeluar::count();
        $surat_data = SuratKeluar::orderBy('id', 'desc')
                    ->paginate(5);

        return view('keluar.index', compact('total_surat', 'surat_data'));
    }

    public function tambah(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();

            return view('keluar.tambah', compact('role_data'));
        }else {
            $rules = [
                'no_indeks' => 'required',
                'no_surat' => 'required',
                'tgl_surat' => 'required',
                'pengolah' => 'required',
                'tujuan' => 'required',
                'perihal' => 'required',
                'sifat' => 'required',
                'media' => 'required',
            ];
            $pesan = [
                'no_indeks.required' => 'No. Indeks Tidak Boleh Kosong',
                'no_surat.required'  => 'No. Surat Tidak Boleh Kosong',
                'tgl_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'pengolah.required' => 'Pengolah Surat Tidak Boleh Kosong',
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
                $surat = new SuratKeluar();
                $surat->no_indeks = $request->get('no_indeks');
                $surat->nomor = $request->get('no_surat');
                $surat->tgl_surat =  date("Y-m-d", strtotime($request->tgl_surat));
                $surat->perihal = $request->get('perihal');
                $surat->dari = $request->get('pengolah');
                $surat->kepada = $request->get('tujuan');
                $surat->keterangan = $request->get('keterangan');
                $surat->media = $request->get('media');
                $surat->sifat_surat = $request->get('sifat');
                $surat->penerima = Auth::user()->id;

                if($surat->save()){
                    //penentuan role
                    $role = Role::where('id',$request->pengolah)->value('name');
                    $get_surat = SuratKeluar::where('id',$surat->id)->first();

                    Notification::send(User::role($role)->get(),new SuratKeluarBaruNotification($get_surat));

                    if($request->hasfile('fileSurat'))
                    {
                        $id_surat = $surat->id;
                        foreach($request->file('fileSurat') as $f)
                        {

                            $ext = $f->getClientOriginalExtension();
                            $nama_file = md5($request->no_indeks).'.'.$ext;
                            $f->move(public_path().'/uploads/surat/keluar/'.$request->no_indeks, $nama_file);

                            $file = array(
                                'keluar_id' => $id_surat,
                                'path' => '/uploads/surat/keluar/'.$request->no_indeks.'/'.$nama_file,
                            );

                            FileKeluar::insert($file);
                        }
                    }
                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    public function detail($id)
    {
        $data = SuratKeluar::find($id);
        $lampiran_data = FileKeluar::where('keluar_id', '=', $id)->get();
        return view('keluar.detail', compact('data', 'lampiran_data'));
    }

    public function edit($id)
    {
        $data = SuratKeluar::find($id);
        $lampiran_data = FileKeluar::where('keluar_id', '=', $id)->get();
        $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();

        return view('keluar.edit', compact('data', 'lampiran_data', 'role_data'));
    }


    public function update(Request $request)
    {
        $rules = [
            'no_indeks' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'pengolah' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'media' => 'required',
        ];
        $pesan = [
            'no_indeks.required' => 'No. Indeks Tidak Boleh Kosong',
            'no_surat.required'  => 'No. Surat Tidak Boleh Kosong',
            'tgl_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
            'pengolah.required' => 'Pengolah Surat Tidak Boleh Kosong',
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
            $surat = SuratKeluar::find($request->get('id'));
            $surat->no_indeks = $request->get('no_indeks');
            $surat->nomor = $request->get('no_surat');
            $surat->tgl_surat =  date("Y-m-d", strtotime($request->tgl_surat));
            $surat->perihal = $request->get('perihal');
            $surat->dari = $request->get('pengolah');
            $surat->kepada = $request->get('tujuan');
            $surat->keterangan = $request->get('keterangan');
            $surat->media = $request->get('media');
            $surat->sifat_surat = $request->get('sifat');
            $surat->penerima = Auth::user()->id;
            if($surat->save())
            {
                return redirect('surat/keluar/detail/'.$request->id);
            }else{
                App::abort(500, 'Error');
            }
        }
    }

    public function delete($id)
    {
        // SuratKeluar::destroy($id);
        // return redirect('surat/keluar/data/');
        dd($id);
    }
    public function cari(Request $request){
        $data = $request->cari;
        $surat_data = SuratKeluar::where('kepada','LIKE','%' .$data. '%')->paginate();
        // dd($surat_data);
        return view('keluar.index',['surat_data' => $surat_data])->with('total_surat');
    }
}
