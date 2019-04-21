@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Surat Disposisi</h1>
                        <h2 class="h4 font-w400 text-white-op">Kelola Surat Disposisi</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="content-heading pt-5">
                Surat Disposisi ({{ $total_surat }})
            </div>
            <div class="block block-rounded">
                <div class="block-content bg-body-light">
                    <!-- Search -->
                    <form action="be_pages_ecom_products.html" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Surat..">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Search -->
                </div>
                <div class="block-content">

                    @if($surat_data <> null)
                        <!-- Tabel Disposisi -->
                        <table class="js-table-checkable table table-hover js-table-checkable-enabled">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">No. Indeks</th>
                                    <th class="d-none d-sm-table-cell">Ringkasan Surat</th>
                                    <th class="d-none d-sm-table-cell">Instruksi</th>
                                    <th class="d-none d-md-table-cell">Tgl Disposisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat_data as $d)
                                    <?php
                                        if($d->keterangan == null){
                                            $ket = 'Tidak Ada Keterangan Tambahan';
                                        }else{
                                            $ket = $d->keterangan;
                                        }
                                    ?>
                                <tr class="clickable-row" data-href="{{ url('surat/disposisi/detail/'.$d->id) }}">
                                    <td>{{ $d->no_indeks }}</td>
                                    <td>
                                        <p class="font-w600 mb-10">{{ $d->dari }}</p>
                                        <p class="text-muted mb-0">{{ $d->nomor }}</p>
                                        <p class="text-muted mb-0">{{ $d->perihal }}</p>
                                    </td>
                                    <td>
                                        <p class="font-w600 mb-10">{{ $d->disposisi->catatan }}</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">{{ $d->disposisi->tgl_disposisi }}</em>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END Products Table -->

                        <!-- Navigation -->
                        {{$surat_data->links()}}
                        <!-- END Navigation -->
                    @else
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <center>
                                    <img class="text-center" src="{{ asset('assets/img/illustration/no_data.svg') }}" width="70%">
                                    <h3 class="text-center mt-15">Tidak Ada Data Surat Disposisi</h3>
                                </center>
                            </div>
                        </div>
                    @endif
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
