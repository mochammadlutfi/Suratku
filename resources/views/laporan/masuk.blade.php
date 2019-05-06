@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Laporan</h1>
                        <h2 class="h4 font-w400 text-white-op">Laporan Surat Masuk</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('laporan.masuk') }}" method="get">
                    @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" >Dari Tanggal</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="js-datepicker form-control" id="tgl_mulai" name="tgl_mulai" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Dari Tanggal">
                                        <div class="form-text text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" >Sampai Tanggal</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="js-datepicker form-control" id="tgl_akhir" name="tgl_akhir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Sampai Tanggal">
                                        <div class="form-text text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </form>
                    <div class="block-content">
                    <!-- Products Table -->
                    @if (! empty($results))
                    <h3 align = "center">Data Surat Masuk Dari Tanggal {{$count}}</h3>
                    
                    <table class="js-table-checkable table table-hover js-table-checkable-enabled">
                        <thead>
                            <tr>
                                <th style="width: 100px;">No. Indeks</th>
                                <th class="d-none d-sm-table-cell">Ringkasan Surat</th>
                                <th class="d-none d-sm-table-cell">Tujuan Surat</th>
                                <th class="d-none d-sm-table-cell">Keterangan</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Tgl Terima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $d)
                                
                            <tr class="clickable-row">
                                <td>{{ $d->no_indeks }}</td>
                                <td>
                                    <p class="font-w600 mb-10">{{ $d->dari }}</p>
                                    <p class="text-muted mb-0">{{ $d->nomor }}</p>
                                    <p class="text-muted mb-0">{{ $d->perihal }}</p>
                                </td>
                                <th class="d-none d-sm-table-cell">{{ $d->role->name }}</th>
                                <td>
                                    @if($d->keterangan == null || $d->keterangan == '')
                                        <p class="font-w600 mb-10">Tidak Ada Keterangan Tambahan</p>
                                    @else
                                        <p class="font-w600 mb-10">{{ $d->keterangan }}</p>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    @if($d->disposisi->status == 0)
                                        <span class="badge badge-danger">Belum</span>
                                    @elseif($d->disposisi->status == 1)
                                        <span class="badge badge-warning">Kasubbag</span>
                                    @elseif($d->disposisi->status == 2)
                                        <span class="badge badge-info">Sekretaris</span>
                                    @else
                                        <span class="badge badge-success">Disposisi</span>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="text-muted">{{ date("Y-m-d", strtotime($d->tgl_surat)) }}</em>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <!-- END Products Table -->

                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>

</script>
@endpush
