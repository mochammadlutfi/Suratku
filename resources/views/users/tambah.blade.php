@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Pengguna</h1>
                        <h2 class="h4 font-w400 text-white-op">Tambah Pengguna</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('user.tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <div class="form-group row py-30 xy-30">
                                    <div class="inputfile inputfile-new col-lg-12" data-provides="inputfile" style="margin-bottom: 0px;">
                                        <div class="row justify-content-center mb-15">
                                            <div class="inputfile-new thumbnail">
                                                <img class="img-avatar img-avatar215 img-avatar-thumb" src="{{ asset('assets/img/avatars/avatar1.jpg') }}" alt="...">
                                            </div>
                                            <div class="inputfile-preview inputfile-exists thumbnail"></div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <span class="btn btn-secondary btn-file">
                                                    <span class="inputfile-new" data-trigger="inputfile">Pilih Foto</span>
                                                    <span class="inputfile-exists" data-trigger="inputfile">Ubah Foto</span>
                                                    <input type="file" name="userfile" accept="image/*" style="max-width:12%">
                                                    @if ($errors->has('userfile'))
                                                        <div class="invalid-feedback">{{ $errors->first('userfile') }}</div>
                                                    @endif
                                                </span>
                                                <a href="#" class="btn btn-danger inputfile-exists" data-dismiss="inputfile">Hapus Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-1">
                                <div class="form-group row {{ $errors->has('nik') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan Nomor Induk Karyawan">
                                            <label for="nik">Nomor Induk Karyawan</label>
                                        </div>
                                        @if ($errors->has('nik'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('nik') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('nama') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        @if ($errors->has('nama'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('username') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                                            <label for="nama">Username</label>
                                        </div>
                                        @if ($errors->has('username'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email">
                                            <label for="email">Alamat Email</label>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('no_hp') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No. Handphone">
                                            <label for="no_hp">No. Handphone</label>
                                        </div>
                                        @if ($errors->has('no_hp'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('no_hp') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                            <label for="password">Password</label>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password_kf') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="password" class="form-control" id="password_kf" name="password_kf" placeholder="Masukan Konfirmasi Password">
                                            <label for="password_kf">Konfirmasi Password</label>
                                        </div>
                                        @if ($errors->has('password_kf'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_kf') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary">Perbaharui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@endsection
