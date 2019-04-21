@extends('layouts.master')

@section('content')
<div class="bg-body-dark">
    <div class="content">
        <div class="row">
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('surat.masuk.data') }}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-envelope-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-envelope-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Kelola Surat Masuk</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('surat.keluar.data') }}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="si si-direction text-gray fa-2x d-xl-none"></i>
                            <i class="si si-direction text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Kelola Surat Keluar</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('surat.disposisi.data') }}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="si si-note text-gray fa-2x d-xl-none"></i>
                            <i class="si si-note text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Kelola Surat Disposisi</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('surat.masuk.tambah') }}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Tambah Surat Masuk</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('surat.keluar.tambah') }}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Tambah Surat Keluar</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="javascript:void(0)">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Tambah Agenda Kegiatan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row invisible" data-toggle="appear">
        <!-- Row #2 -->
        <div class="col-md-12">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default border-b">
                    <h3 class="block-title">
                        Grafik Surat <small>2019</small>
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="pull-all pt-50">
                        <!-- Lines Chart Container -->
                        <canvas id="grafik-surat"></canvas>
                    </div>
                </div>
                <div class="block-content">

                </div>
            </div>
        </div>
        <!-- END Row #2 -->
    </div>
</div>
@stop
@push('scripts')
<script>
var ctx = document.getElementById("grafik-surat").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
            {
                label: 'Surat Masuk',
                fill: true,
                backgroundColor: 'rgba(66,165,245,.75)',
                borderColor: 'rgba(66,165,245,1)',
                pointBackgroundColor: 'rgba(66,165,245,1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(66,165,245,1)',
                data: <?php echo json_encode($chart_masuk); ?>
            },
            {
                label: 'Surat Keluar',
                fill: true,
                backgroundColor: 'rgba(66,165,245,.25)',
                borderColor: 'rgba(66,165,245,1)',
                pointBackgroundColor: 'rgba(66,165,245,1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(66,165,245,1)',
                data: <?php echo json_encode($chart_keluar); ?>
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endpush
