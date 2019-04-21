@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Surat Masuk</h1>
                        <h2 class="h4 font-w400 text-white-op">Detail Surat Masuk</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Detail Surat Masuk</h3>
                    @include('masuk.button')
                </div>
                <div class="block-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-4">No. Indeks</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->no_indeks }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">No. Surat</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->nomor }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Tgl. Surat</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->tgl_surat }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Tgl. Surat Diterima</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->created_at }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Pengirim</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->dari }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Kepada</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ ucfirst($data->role->name) }}</strong></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-4">Perihal</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->perihal }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Sifat Surat</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->sifat_surat }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Media Surat</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->media }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Status Disposisi</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        @if($data->disposisi->status == 0)
                                            <span class="badge badge-danger">Belum</span>
                                        @elseif($data->disposisi->status == 1)
                                            <span class="badge badge-warning">Kasubbag</span>
                                        @elseif($data->disposisi->status == 2)
                                            <span class="badge badge-info">Sekretaris</span>
                                        @else
                                            <span class="badge badge-success">Disposisi</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Keterangan</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        @if($data->keterangan == null || $data->keterangan == '')
                                            <p class="font-w600 mb-10">Tidak Ada Keterangan Tambahan</p>
                                        @else
                                            <p class="font-w600 mb-10">{{ $data->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="content-heading text-black">Lampiran Surat</h4>
                                @if($lampiran_data)
                                    <table class="table table-striped table-vcenter" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Nama Lampiran</th>
                                                <th class="d-none d-sm-table-cell" style="width: 15%;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($lampiran_data as $u) { ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?= $no++; ?></th>
                                                <td><?= $u->path; ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ url($u->path) }}" class="btn btn-sm btn-secondary" target="_blank" data-toggle="tooltip" title="Download">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                @else

                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
    @role('kepala badan')
        @include('masuk.modal_disposisi')
    @else
        @include('masuk.modal_paraf')
    @endrole
@stop
@push('scripts')
    @role('kepala badan')
        @include('masuk.script_disposisi')
    @else
        @include('masuk.script_paraf')
    @endrole
@endpush
