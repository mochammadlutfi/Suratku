
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
                        @csrf
                        <input type="hidden" name="surat_id" id="surat_id">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div id="signArea">
                                    <label>Tanda Tangan</label>
                                    <a class="float-right badge badge-danger clearButton mb-5 text-white" href="javascript:void(0)">Reset Tanda Tangan</a>
                                    <div class="sig sigWrapper" style="height:auto;">
                                        <div class="typed"></div>
                                        <canvas class="sign-pad" id="sign-pad" width="456" height="100"></canvas>
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
    </div>
</div>
