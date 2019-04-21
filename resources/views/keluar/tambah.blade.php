@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Surat Keluar</h1>
                        <h2 class="h4 font-w400 text-white-op">Tambah Surat Keluar Baru</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('surat.keluar.tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('no_indeks') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="no_indeks" name="no_indeks" placeholder="Masukan No Indeks">
                                            <label for="no_indeks">No. Indeks</label>
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
                                            <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukan No Surat">
                                            <label for="no_surat">No. Surat</label>
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
                                            <input type="text" class="js-datepicker form-control" id="tgl_surat" name="tgl_surat" placeholder="Masukan Tanggal Surat" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" data-language="id" >
                                            <label for="tgl_surat">Tanggal Surat</label>
                                        </div>
                                        @if ($errors->has('tgl_surat'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('tgl_surat') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('pengolah') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <select class="form-control" name="pengolah" id="pengolah">
                                                <option value="">Pilih Pengolah Surat</option>
                                                @foreach($role_data as $d)
                                                <option value="{{ $d->id }}">{{ ucfirst($d->name) }}</option>
                                                @endforeach
                                            </select>
                                            <label for="pengolah">Pengolah Surat</label>
                                        </div>
                                        @if ($errors->has('pengolah'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('pengolah') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('tujuan') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukan Nama Atau Lembaga Perorangan">
                                            <label for="tujuan">Tujuan Surat</label>
                                        </div>
                                        @if ($errors->has('tujuan'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('tujuan') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('perihal') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukan Perihal Surat">
                                            <label for="perihal">Perihal</label>
                                        </div>
                                        @if ($errors->has('perihal'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('perihal') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('sifat') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <select class="form-control" name="sifat" id="sifat">
                                                <option value="">Pilih Sifat Surat</option>
                                                <option value="Amat Segera">Amat Segera</option>
                                                <option value="Segera">Segera</option>
                                                <option value="Biasa">Biasa</option>
                                            </select>
                                            <label for="sifat">Sifat Surat</label>
                                        </div>
                                        @if ($errors->has('sifat'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('sifat') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('media') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <select class="form-control" name="media" id="media">
                                                <option value="">Pilih Media Surat</option>
                                                <option value="Hardcopy">Hardcopy</option>
                                                <option value="Softcopy">Softcopy</option>
                                            </select>
                                            <label for="media">Media Surat</label>
                                        </div>
                                        @if ($errors->has('media'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('media') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan Surat (Jika Ada)" rows="6"></textarea>
                                            <label for="media">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <input id="input-ficons-5" type="file" name="fileSurat[]" class="file" data-theme="fas" multiple>
                            </div>
                        </div>
                        <div class="row justify-content-center my-15">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-alt-primary btn-block"> Simpan Surat</button>
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
<script>
    $("#input-ficons-5").fileinput();
</script>

@endpush
