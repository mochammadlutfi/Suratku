@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Agenda</h1>
                        <h2 class="h4 font-w400 text-white-op">Tambah Agenda Baru</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('agenda.tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                            <div class="form-group row {{ $errors->has('no_indeks') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="acara" name="acara" placeholder="Masukan No Indeks">
                                            <label for="no_indeks">Nama Acara</label>
                                        </div>
                                        @if ($errors->has('no_indeks'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('no_indeks') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('no_surat') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Masukan No Surat">
                                            <label for="no_surat">Tanggal Awal</label>
                                        </div>
                                        @if ($errors->has('no_surat'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('no_surat') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('tgl_surat') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Masukan Tanggal Surat">
                                            <label for="tgl_surat">Tanggal Akhir</label>
                                        </div>
                                        @if ($errors->has('tgl_surat'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('tgl_surat') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('sumber') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="color" class="form-control" id="warna" name="warna" placeholder="Masukan Sumber Surat">
                                            <label for="sumber">Warna</label>
                                        </div>
                                        @if ($errors->has('sumber'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('sumber') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center my-15">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-alt-primary btn-block"> Simpan Agenda</button>
                                </div>
                            </div>
                                <!-- <div class="jumbotron">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background: #2e6da4; color : white;">
                                                    Kalender Agenda
                                                </div>
                                                <div class="panel-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     -->
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
    $("#input-ficons-5").fileinput();
</script>

@endpush
