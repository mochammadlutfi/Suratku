@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Pengaturan</h1>
                        <h2 class="h4 font-w400 text-white-op">Ubah Password</h2>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('user.ubah_pw') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row items-push">
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <img src="{{ asset('assets/img/illustration/change_pw.svg') }}" width="50%"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Lama">
                                            <label for="nama">Password Lama</label>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password_baru') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukan Password Baru">
                                            <label for="nama">Password Baru</label>
                                        </div>
                                        @if ($errors->has('password_baru'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_baru') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password_baru_kf') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="password" class="form-control" id="password_baru_kf" name="password_baru_kf" placeholder="Masukan Konfirmasi Password Lama">
                                            <label for="nama">Konfirmas Password Baru</label>
                                        </div>
                                        @if ($errors->has('password_baru_kf'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_baru_kf') }}</strong>
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
@stop

@push('scripts')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endpush
