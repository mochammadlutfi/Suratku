@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="block">
                <div class="block-content pb-20">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Agenda</h3>
                    <a href="javascript:void(0)" onclick="tambah()" class="btn btn-rounded btn-alt-primary float-right"><i class="si si-plus mr-5"></i> Tambah Agenda</a>
                </div>
                <div class="block-content">
                    <!-- Search -->
                    <form action="{{ url()->current() }}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Cari Agenda..">
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
                <div class="block-content pb-20 pt-0">
                    <ul class="list list-events">
                        @foreach($agenda_data as $data)
                        <li style="background-color: {{ $data->warna }} !important;" onclick="edit({{ $data->id }})">
                            {{ $data->acara }}
                            <br>
                            {{ date("d-m-Y", strtotime($data->tgl_awal)) }} - {{ date("d-m-Y", strtotime($data->tgl_akhir)) }}
                        </li>
                        @endforeach
                        {{ $agenda_data->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="modal_title">Form Agenda</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form_agenda" class="form-horizontal">
                        @csrf
                        <input type="hidden" value="" name="id_agenda"/>
                        <div class="form-group" id="field-acara">
                            <div class="form-material form-material-primary">
                                <input type="text" class="form-control" id="acara" name="acara" placeholder="Masukan Nama Agenda">
                                <label for="acara">Nama Agenda</label>
                            </div>
                            <div id="error-acara" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group" id="field-tgl_awal">
                            <div class="form-material form-material-primary">
                                <input type="text" class="js-datepicker form-control" id="tgl_awal" name="tgl_awal" placeholder="Masukan Tanggal Awal Agenda" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" data-language="id" >
                                <label for="tgl_awal">Tanggal Awal Agenda</label>
                            </div>
                            <div id="error-tgl_awal" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group" id="field-tgl_akhir">
                            <div class="form-material form-material-primary">
                                <input type="text" class="js-datepicker form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Masukan Tanggal Akhir Agenda" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" data-language="id" >
                                <label for="tgl_akhir">Tanggal Akhir Agenda</label>
                            </div>
                            <div id="error-tgl_akhir" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Warna Agenda</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-warna">
                                    <select name="warna" id="warna" class="form-control">
                                        <option value="#c8e2f8">Blue Light</option>
                                        <option value="#f8f9fa">Gray Light</option>
                                        <option value="#edc1f4">Purple Light</option>
                                        <option value="#f3a8a0">Red Light</option>
                                        <option value="#cde4dc">Flat Light</option>
                                        <option value="#d3f2f3">Green Mint Light</option>
                                        <option value="#e4f0de">Green Light</option>
                                        <option value="#fcf7e6">Orange Light</option>
                                        <option value="#fae9e8">Blood Red Light</option>
                                    </select>
                                </div>
                            </div>
                            <div id="error-nama_golongan" class="invalid-feedback"></div>
                        </div>
                    </form>
                    <div class="form-group row" id="rowSimpan">
                        <div class="col-md-12">
                            <button type="button" id="btnSave" class="btn bg-primary-light btn-block text-white" onclick="simpan()"></i>Simpan Agenda</button>
                        </div>
                    </div>
                    <div class="form-group row" id="rowDetail">
                        <div class="col-md-6">
                            <button type="button" id="btnUpdate" class="btn bg-primary-light btn-block text-white" onclick="simpan()"></i>Perbaharui Agenda</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" id="btnHapus" class="btn bg-pulse-light btn-block text-white" onclick="hapus()"></i>Hapus Agenda</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')

{!! $calendar->script()!!}
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

    function tambah(){
        save_method = 'tambah';
        $('#form_agenda')[0].reset();
        $('#modal_form').modal({backdrop: 'static', keyboard: false});
        $('#modal_form').modal('show')
        $('#modal_title').text('Tambah Agenda');
        $('#warna').simplecolorpicker({theme: 'fontawesome'});
        $('#rowSimpan').show();
        $('#rowDetail').hide();
        Codebase.loader('show', 'bg-primary');
        setTimeout(function () {
            Codebase.loader('hide');
        }, 1000);
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function edit(id){
        save_method = 'update';
        $('#form_agenda')[0].reset();
        $('#modal_form').modal({backdrop: 'static', keyboard: false});
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_title').text('Perbaharui Agenda');
        $('#rowSimpan').hide();
        $('#rowDetail').show();
        Codebase.loader('show', 'bg-primary');
        setTimeout(function () {
            Codebase.loader('hide');
        }, 1000);
        $.ajax({
            url : "<?= url('agenda/edit') ?>/"+ id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_agenda"]').val(data.id);
                $('[name="acara"]').val(data.acara);
                $('[name="tgl_awal"]').val(data.tgl_awal);
                $('[name="tgl_akhir"]').val(data.tgl_akhir);
                $('.form-warna option[value="'+ data.warna +'"]').attr("selected", "selected");
                $('#warna').simplecolorpicker({theme: 'fontawesome'});
                $('#modal_form').modal('show');
                $('#modal_title').text('Perbaharui Data Departemen');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }

    function simpan(){
        var url;
        var pesan;
        if(save_method == 'tambah') {
            url = "<?= route('agenda.tambah'); ?>";
            pesan = "Agenda Berhasil Ditambahkan";
        } else {
            url = "<?= route('agenda.update'); ?>/";
            pesan = "Agenda Berhasil Diperbaharui";
        }
        var formData = new FormData($('#form_agenda')[0]);
        $.ajax({
            url : url,
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data){
                $('.is-invalid').removeClass('is-invalid');
                if(data.fail == false) {
                    swal({
                        title: "Berhasil",
                        text: pesan,
                        timer: 3000,
                        buttons: false,
                        icon: 'success'
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                }else{
                    for (control in data.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSimpan').text('Simpan');
                $('#btnSimpan').attr('disabled',false);

            }
        });
    }

    function hapus() {
        id =  $('[name="id_agenda"]').val();
        swal({
            title: "Anda Yakin?",
            text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
            icon: "warning",
            buttons: ["Batal", "Hapus"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            $.ajax({
                url: "<?= url('agenda/hapus') ?>/" + id,
                type: "post",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    swal({
                        title: "Berhasil",
                        text: "Agenda Berhasil Dihapus",
                        timer: 3000,
                        buttons: false,
                        icon: 'success'
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
            } else {
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
            }
        });
    }

</script>
@endpush
