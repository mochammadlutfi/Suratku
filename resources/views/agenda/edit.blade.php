@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Agenda</h1>
                        <h2 class="h4 font-w400 text-white-op">Edit Agenda</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
               
                    <form action="{{ route('agenda.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dataedit->id }}">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                            <div class="form-group row {{ $errors->has('acara') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="acara" name="acara" placeholder="Masukan No Indeks" value="{{$dataedit->acara}}">
                                            <label for="no_indeks">Nama Acara</label>
                                        </div>
                                        @if ($errors->has('acara'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('acara') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('tgl_awal') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Masukan Tanggal Awal" value="{{$dataedit->tgl_awal}}">
                                            <label for="tgl_awal">Tanggal Awal</label>
                                        </div>
                                        @if ($errors->has('tgl_awal'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('tgl_awal') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('tgl_akhir') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value = "{{$dataedit->tgl_akhir}}" placeholder="Masukan Tanggal Surat">
                                            <label for="tgl_akhir">Tanggal Akhir</label>
                                        </div>
                                        @if ($errors->has('tgl_akhir'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('tgl_akhir') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('warna') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="color" class="form-control" id="warna" name="warna" placeholder="Masukan Sumber Surat" value ="{{$dataedit->warna}}">
                                            <label for="warna">Warna</label>
                                        </div>
                                        @if ($errors->has('warna'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('warna') }}</strong>
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
