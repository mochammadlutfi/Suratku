@extends('layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Surat Keluar</h1>
                        <h2 class="h4 font-w400 text-white-op">Detail Surat Keluar</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Detail Surat Keluar</h3>
                    @include('keluar.button')
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
                                        <span><strong>{{ $data->kepada }}</strong></span>
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
                                        <span><strong>{{ $data->created_at }}</strong></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4">Keterangan</label>
                                    <span class="col-1"><strong>:</strong></span>
                                    <div class="col-6">
                                        <span><strong>{{ $data->keterangan }}</strong></span>
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
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
<div class="modal fade" id="paraf_kasubbag" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="block block-rounded mb-0">
                    <div class="modal-header block-header bg-gd-sea">
                        <h3 class="modal-title block-title text-white">Form Terusan Disposisi</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option text-white" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="form_ttd" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div id="signArea">
                                        <label>Tanda Tangan</label>
                                        <a class="float-right badge badge-danger clearButton mb-5 text-white" href="javascript:void(0)">Reset Tanda Tangan</a>
                                        <div class="sig sigWrapper" style="height:auto;">
                                            <div class="typed"></div>
                                            <canvas class="sign-pad" id="sign-pad" width="460" height="100"></canvas>
                                        </div>
                                        <input type="hidden" name="output" class="output">
                                        <div class="invalid-feedback animated fadeInDown"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSimpan" onclick="simpan()" class="btn btn-primary btn-lg btn-block">Simpan</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@stop
@push('scripts')
<script type="text/javascript">

function paraf_kasubbag(id){
    save_method = 'ditambahkan';
    $('#paraf_kasubbag').modal({backdrop: 'static', keyboard: false});
    $('#paraf_kasubbag').modal('show');
    $('.modal-title').text('Disposisi Surat');

    id_surat = id;
}

$(document).ready(function() {
    $('#signArea').signaturePad({
        drawOnly:true,
        drawBezierCurves:true,
        lineTop:110,
        bgColour:"#ffffff",
    });
});


function simpan(){
    html2canvas([document.getElementById('sign-pad')], {
        onrendered: function (canvas) {
            var formData = new FormData($('#form_ttd')[0]);

            var canvas_img_data = canvas.toDataURL('image/png');
            formData.append('img_data', canvas_img_data.replace(/^data:image\/(png|jpg);base64,/,""));

            var url = "" + id_surat;

            $('#btnSimpan').text('Menyimpan...');
            $('#btnSimpan').attr('disabled',true);

            $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData:false,
                success: function (response) {
                    if (response.success == true) {
                        $('.form-group').removeClass('is-invalid')
                                        .removeClass('is-valid');
                        $('.invalid-feedback').remove();

                        $('#disposisi-surat')[0].reset();

                        $('#btnSimpan').text('Simpan');
                        $('#btnSimpan').attr('disabled',false);
                        swal({
                            title: "Berhasil",
                            text : "Surat Masuk Berhasil Ditambahkan!",
                            icon: "success",
                            buttons: {
                                cancel: "Index Surat Masuk!",
                                tambah: {
                                    text: "Tambahkan Surat Masuk Lain!",
                                    value: "tambah",
                                },
                            },
                            closeModal: false,
                            })
                            .then((value) => {
                                switch (value) {
                                case "tambah":
                                    window.location.href = "surat/masuk/tambah";
                                    break;
                                default:
                                    window.location.href = "surat/masuk";
                            }
                        });
                    }
                    else {
                        $.each(response.messages, function(key, value) {
                            var element = $('[name="'+ key +'"]');

                                element.parents('.form-group > div')
                                .removeClass('is-invalid')
                                .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                                .find('.invalid-feedback')
                                .text();

                                element.parents('.form-group > div')
                                .removeClass('is-invalid')
                                .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
                                .find('.invalid-feedback')
                                .text();

                                element.parents('.form-group > div').find('.invalid-feedback').text(value);

                        });
                        $('#btnSimpan').text('Simpan');
                        $('#btnSimpan').attr('disabled',false);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#paraf_kasubbag').modal('hide');
                    swal({
                        title: "Berhasil",
                        text: "Surat Berhasil Diparaf!",
                        timer: 3000,
                        buttons: false,
                        icon: 'success'
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                }
            });
        }
    });
}

</script>
@endpush
