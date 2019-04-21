@extends('layouts/master')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Notifikasi</h1>
                        <h2 class="h4 font-w400 text-white-op">Notifikasi Surat Disposisi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- Message List -->
            <div class="block block-rounded">
                <div class="block-content">
                    <table class="js-table-checkable table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th>Sifat Surat</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Tanggal Disposisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)    
                                <tr>
                                    <td> {{ $item->data['sifat'] }} </td>
                                    <td> {{ $item->data['catatan'] }} </td>
                                    <td> {{ $item->data['status'] }} </td>
                                    {{-- <td> {{ $item->data['tgl_disposisi'] }} </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- END Messages -->
                </div>
            </div>
            <!-- END Message List -->
        </div>
    </div>
</div>

@endsection
