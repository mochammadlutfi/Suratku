@extends('layouts/master')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Notifikasi</h1>
                        <h2 class="h4 font-w400 text-white-op">Notifikasi Surat Masuk</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- Message List -->
            <div class="block block-rounded">
                <div class="block-content">
                 
                    <!-- Products Table -->
                    <table class="js-table-checkable table table-hover js-table-checkable-enabled">
                        <thead>
                            <tr>
                                <th style="width: 100px;">No. Indeks</th>
                                <th class="d-none d-sm-table-cell">Perihal</th>
                                <th class="d-none d-sm-table-cell">Tujuan Surat</th>
                                <th class="d-none d-sm-table-cell">Keterangan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)     
                                <tr>
                                    <td>
                                        {{ $item->data['indeks'] }}
                                    </td>
                                    <td>
                                        {{ $item->data['perihal'] }}
                                    </td>
                                    <td>
                                        {{ $item->data['kepada'] }}
                                    </td>
                                    <th>
                                        @if ($item->data['keterangan'] == null || $item->data['keterangan'] == '')
                                            Tidak ada keterangan tambahan
                                        @else
                                            {{ $item->data['keterangan'] }}
                                        @endif
                                    </th>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <!-- END Message List -->
        </div>
    </div>
</div>

@endsection
