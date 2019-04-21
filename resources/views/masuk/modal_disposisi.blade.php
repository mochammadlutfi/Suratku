<div class="modal fade" id="disposisi_surat" role="dialog">
    <div class="modal-dialog modal-lg">
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
                    <form id="form_disposisi" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="surat_id" id="surat_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row" id="form-tujuan">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                                <select class="js-select2 form-control" id="tujuan" name="tujuan[]" style="width: 100%;" data-placeholder="Pilih Tujuan Disposisi.." multiple>
                                                <option value="">Pilih Tujuan Surat</option>
                                                @foreach($role_data as $d)
                                                    <option value="{{ $d->id }}">{{ ucfirst($d->name) }}</option>
                                                @endforeach
                                            </select>
                                            <label for="tujuan">Tujuan Disposisi</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-tujuan"></div>
                                    </div>
                                </div>
                                <div class="form-group row" id="form-instruksi">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <textarea class="form-control" name="instruksi" id="instruksi" placeholder="Masukan Instruksi / Catatan Disposisi" rows="13"></textarea>
                                            <label for="instruksi">Instruksi / Catatan</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-instruksi"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row" id="form-sifat">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <select class="form-control" name="sifat" id="sifat">
                                                <option value="">Pilih Sifat Disposisi</option>
                                                <option value="Amat Segera">Amat Segera</option>
                                                <option value="Segera">Segera</option>
                                                <option value="Biasa">Biasa</option>
                                            </select>
                                            <label for="sifat">Sifat Disposisi</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-sifat"></div>
                                    </div>
                                </div>
                                <div class="form-group row" id="form-tgl_disposisi">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="js-datepicker form-control" id="tgl_disposisi" name="tgl_disposisi" placeholder="Masukan Tanggal Surat" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" data-language="id" >
                                            <label for="tgl_disposisi">Tanggal Disposisi</label>
                                        </div>
                                        <div class="invalid-feedback" id="error-tgl_disposisi"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div id="signArea">
                                            <label>Tanda Tangan</label>
                                            <a class="float-right badge badge-danger clearButton mb-5 text-white" href="javascript:void(0)">Reset Tanda Tangan</a>
                                            <div class="sig sigWrapper" style="height:auto;">
                                                <div class="typed"></div>
                                                <canvas class="sign-pad" id="sign-pad" width="360" height="150"></canvas>
                                            </div>
                                            <input type="hidden" name="output" class="output">
                                            <div class="invalid-feedback" id="error-output"></div>
                                        </div>
                                    </div>
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
    </div>
</div>
