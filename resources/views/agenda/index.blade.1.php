@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Surat Masuk</h1>
                        <h2 class="h4 font-w400 text-white-op">Kelola Surat Masuk</h2>
                    </div>
                </div>
            </div>
            <!-- Kalender -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('agenda.data') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                            <!-- <div class = "container">    -->
                                <div class="jumbotron">
                                <div class ="row">
                                <!-- <a href="{{ url('agenda/tambah') }}" class="btn btn-success">Tambah Agenda</a> -->
                                </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background: #2e6da4; color : white;">
                                                    Kalender Agenda
                                                </div>
                                                <div class="panel-body">
                                                    {!! $calendar->calendar()!!}
                                                    {!! $calendar->script()!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div>      -->
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->

            <!-- End Kalender -->
            <!-- Default Elements -->
            <div class="content-heading pt-5">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-products-filter-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-products-filter-drop">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-star text-warning mr-5"></i>Top Sellers
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-warning text-danger mr-5"></i>Out of Stock
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="javascript:void(0)">
                            <i class="fa fa-fw fa-circle-o text-info mr-5"></i>All
                        </a>
                    </div>
                </div>
                <div class="dropdown float-right mr-5">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-products-category-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-products-category-drop">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-gamepad mr-5"></i>Video Games
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-desktop mr-5"></i>Electronics
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-mobile-phone mr-5"></i>Mobile Phones
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-home mr-5"></i>House
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-soccer-ball-o mr-5"></i>Hobby
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-car mr-5"></i>Auto - Moto
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-users mr-5"></i>Kids
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-heartbeat mr-5"></i>Health
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-black-tie mr-5"></i>Fashion
                        </a>
                    </div>
                </div>

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
                    <!-- Products Table -->
                    <table class="js-table-checkable table table-hover js-table-checkable-enabled">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Acara</th>
                                <th class="d-none d-sm-table-cell">Tanggal Awal</th>
                                <th class="d-none d-sm-table-cell">Tanggal Akhir</th>
                                <th class="d-none d-sm-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agenda as $ag)
                            <tr class="clickable-row" data-href="{{ url('agenda/detail/'.$ag->id) }}">
                                <td>{{$ag->acara}}</td>
                                <td>{{$ag->tgl_awal}}</td>
                                <td>{{$ag->tgl_akhir}}</td>
                                <td>



                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- END Products Table -->

                    <!-- Navigation -->

                    <!-- END Navigation -->
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
