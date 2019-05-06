<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
       $total_pengguna = User::count();
       $pengguna_data = User::Paginate(5);

       return view('users.index', compact('total_pengguna', 'pengguna_data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $pengguna = User::find($id);
        return view ('users.detail',compact('pengguna'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.pengaturan',compact('user'));
    }

    public function tambah(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::get();

            return view('users.tambah', compact('role_data'));
        }else {
            $rules = [
                'nik' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
            ];
            $pesan = [
                'nik.required' => 'NIK Tidak Boleh Kosong',
                'nama.required'  => 'Nama Tidak Boleh Kosong',
                'username.required' => 'Username Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'no_hp.required'  => 'No. Handphone Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{


                //upload foto
                if ($request->file('userfile')!=null) {
                    $ext = $request->file('userfile')->getClientOriginalExtension();
                    $dir = public_path().'/uploads/users/';
                    $nama_foto = $request->username.'.'.$ext;
                    $request->file('userfile')->move($dir,$nama_foto);

                }else {
                    $nama_foto = 'default.jpg';
                }

                $user = User::find(Auth::user()->id);
                $user->nik = $request->get('nik');
                $user->nama = $request->get('nama');
                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->no_hp = $request->get('no_hp');
                $user->foto = $nama_foto;
                if($user->save())
                {
                    return redirect('/');
                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    public function update(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::get();

            return view('users.tambah', compact('role_data'));
        }else {
            $rules = [
                'nik' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
            ];
            $pesan = [
                'nik.required' => 'NIK Tidak Boleh Kosong',
                'nama.required'  => 'Nama Tidak Boleh Kosong',
                'username.required' => 'Username Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'no_hp.required'  => 'No. Handphone Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{


                //upload foto
                if ($request->file('userfile')!=null) {
                    $ext = $request->file('userfile')->getClientOriginalExtension();
                    $dir = public_path().'/uploads/users/';
                    $nama_foto = $request->username.'.'.$ext;
                    $request->file('userfile')->move($dir,$nama_foto);

                }else {
                    $nama_foto = 'default.jpg';
                }

                $user = User::find(Auth::user()->id);
                $user->nik = $request->get('nik');
                $user->nama = $request->get('nama');
                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->no_hp = $request->get('no_hp');
                $user->foto = $nama_foto;
                if($user->save())
                {
                    return redirect('/');
                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles(Request $request)
    {
        if ($request->isMethod('get')){

            $id = Auth::user()->id;
            $user = User::find($id);
            return view('users.role', compact('user'));
        }else {
            $rules = [
                'name' => 'required',
            ];
            $pesan = [
                'name.required' => 'Nama Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{

                $role = new Role();
                $role->name = $request->input('name');
                if($role->save())
                {
                    return redirect('/');
                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengaturan(Request $request)
    {
        if ($request->isMethod('get')){

            $id = Auth::user()->id;
            $user = User::find($id);
            return view('users.pengaturan', compact('user'));
        }else {
            $rules = [
                'nik' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
            ];
            $pesan = [
                'nik.required' => 'NIK Tidak Boleh Kosong',
                'nama.required'  => 'Nama Tidak Boleh Kosong',
                'username.required' => 'Username Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'no_hp.required'  => 'No. Handphone Tidak Boleh Kosong',
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }else{


                //upload foto
                if ($request->file('userfile')!=null) {
                    $ext = $request->file('userfile')->getClientOriginalExtension();
                    $dir = public_path().'/uploads/users/';
                    $nama_foto = $request->username.'.'.$ext;
                    $request->file('userfile')->move($dir,$nama_foto);

                }else {
                    $nama_foto = 'default.jpg';
                }

                $user = User::find(Auth::user()->id);
                $user->nik = $request->get('nik');
                $user->nama = $request->get('nama');
                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->no_hp = $request->get('no_hp');
                
                if($user->save())
                {
                    return redirect('/');
                }else{
                    App::abort(500, 'Error');
                }
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ubah_pw(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::get();

            return view('users.ubah_pw', compact('role_data'));
        }else {
            Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
                return Hash::check($value, \Auth::user()->password);
            });
            $rules = [
                'password' => 'required',
                'password_baru' => 'required',
                'password_baru_kf' => 'required',
            ];
            $pesan = [
                'password.required' => 'NIK Tidak Boleh Kosong',
                'password_baru.required'  => 'Nama Tidak Boleh Kosong',
                'password_baru_kf.required' => 'Username Tidak Boleh Kosong',
                
            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return back()->withInput()->withErrors($v);
                // return redirect('surat/masuk/tambah')->withErrors($v)->withInput($request->input());
            }
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt(request('password_baru_kf'));
                $user->save();
                // if()
                // {
                //     return redirect('pengguna/ubah-password');
                // }else{
                //     App::abort(500, 'Error');
                // }
            }
        }
    }

