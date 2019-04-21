@extends('layouts.master')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"></h3>
            <div class="block-options">
                {{-- Button --}}
            </div>
        </div>
        <div class="block-content">
            <div class="row my-20">
                <div class="col-12">
                    <h3 style="text-align: center;"> KARTU DISPOSISI</h3>
                    <hr style="border-color: black">
                    <table style="width: 100%; margin: auto;" cellpadding="8px">
                        <tr>
                            <td>INDEKS</td>
                            <td>: <?= $data->no_indeks; ?></td>
                            <td class="text-right" width="20%"> </td>
                            <td width="40%"> </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><hr style="border-style: dotted; border-color: #000"></td>
                            <td>
                                <table class="table table-bordered-black table-vcenter" style="border: 1px solid black;">
                                    <tr>
                                        <td colspan="2" style="border-top: 1px solid black;"><center>Yth. Bapak KABAN</center></td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: 1px solid black;border-right: 1px solid black">Tgl. {{ date("Y-m-d", strtotime($data->disposisi->tgl_disposisi)) }}</td>
                                        <td style="border-top: 1px solid black;">Paraf. <img src="{{ asset($data->disposisi->ttd_kasubbag) }}" width="40px"> <img src="{{ asset($data->disposisi->ttd_sekretaris) }}" width="40px"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <hr style="border-color: black">
                </div>
            </div>
            <div class="row my-20">
                <div class="col-12">
                    <table style="width: 100%; margin: auto;">
                        <tr>
                            <td style="width: 40%">DARI</td>
                            <td>: {{ $data->dari }}</td>
                        </tr>
                        <tr>
                            <td>PERIHAL</td>
                            <td>: {{ $data->perihal }}</td>
                        </tr>
                        <tr>
                            <td>TANGGAL NASKAH DINAS/BADAN</td>
                            <td>: {{ date("d-m-Y", strtotime($data->tgl_surat)) }}</td>
                        </tr>
                        <tr>
                            <td>No. NASKAH DINAS/BADAN</td>
                            <td>: {{ $data->nomor }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Table -->
            <table style="width: 100%; margin: auto;text-align: center;" cellspacing=0 cellpadding="6px">
                <tr>
                    <td style="width: 50%; border-right: 1px solid black; border-top: 1px solid;">INSTRUKSI / INFORMASI</td>
                    <td style="border-top: 1px solid black;">DITERUSKAN KEPADA</td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid black; text-align: left; top: 0;">
                        <address>
                            {{ $data->disposisi->catatan }}<br>
                        </address>
                    </td>
                    <td>
                        <table cellpadding="3px" style="width: 100%;">
                        <?php
                        $no = 2;
                        foreach ($role_data as $role){?>
                        <tr>
                            <td><?= $no++.'.'; ?></td>
                            <td style="border:1px solid black;">
                                <?php foreach ($tujuan as $t){
                                    if($t->role_id == $role->id){ echo "<i class='fa fa-check'></i>"; }
                                } ?>

                            </td>
                            <td></td>
                            <td style="border:1px solid black; text-align: left;">{{ $role->name }}</td>
                        </tr>
                        <?php
                                } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 1px solid black">
                        <table cellspacing="0" cellpadding="8px" style="width: 100%">
                            <tr>
                                <td></td>
                                <td width="50%"><center><img src="{{ asset($data->disposisi->ttd_kaban) }}" width="90%"></center></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><center>Kepala Badan - </center></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table table-bordered-black" cellpadding="5px" style="float: right; border: 1px solid black; width: 50%">
                            <tr>
                                <td style="border-top: 1px solid black; border-right: 1px solid black"></td>
                                <td style="border-top: 1px solid black; border-right: 1px solid black">Sangat Rahasia</td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid black; border-right: 1px solid black"></td>
                                <td style="border-top: 1px solid black; border-right: 1px solid black">Biasa</td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid black; border-right: 1px solid black"></td>
                                <td style="border-top: 1px solid black; border-right: 1px solid black">Segera</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- END Table -->
        </div>
    </div>
    <!-- END Invoice -->
</div>
@endsection
