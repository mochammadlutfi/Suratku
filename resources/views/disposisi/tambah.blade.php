@extends('layouts.master')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Disposisi</h1>
                        <h2 class="h4 font-w400 text-white-op">Tambah Disposisi</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="block block-rounded">
                <div class="block-content">
                    <form id="disposisi-surat" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <input type="hidden" name="id_disposisi" value="">
                                <input type="hidden" name="id_surat" value="">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" >Diteruskan Kepada</label>
		                            <div class="col-lg-8">

                                        <div class="invalid-feedback animated fadeInDown"></div>
		                            </div>
		                        </div>
		                        <div class="form-group row">
		                            <label class="col-lg-4 col-form-label" >Tanggal Paraf</label>
		                            <div class="col-lg-8">
	                                   <input type="text" class="js-datepicker form-control" id="tgl_paraf" name="tgl_paraf" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="Tanggal Paraf">
	                                   <div class="invalid-feedback animated fadeInDown"></div>
	                                </div>
		                        </div>
		                        <div class="form-group row">
		                            <label class="col-lg-4 col-form-label" >Instruksi / Informasi</label>
		                            <div class="col-lg-8">
		                                <textarea class="form-control" name="catatan" id="catatan" rows="5" placeholder="Instruksi / Informasi"></textarea>
		                                <div class="invalid-feedback animated fadeInDown"></div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<div class="form-group row">
		                            <label class="col-lg-4 col-form-label" >Sifat Disposisi</label>
		                            <div class="col-lg-8">
		                                <select class="form-control" id="sifat_dispo" name="sifat_dispo">
		                                	<option value="">Pilih</option>
		                                	<option value="Sangat Rahasia">Sangat Rahasia</option>
		                                	<option value="Biasa">Biasa</option>
		                                	<option value="Segera">Segera</option>
		                                </select>
		                                <div class="invalid-feedback animated fadeInDown"></div>
		                            </div>
		                        </div>
		                    	<div class="form-group row">
			                        <label class="col-lg-4 col-form-label" >Tanda Tangan</label>
			                        <div class="col-lg-8">
			                            <div id="signArea">
			                            	<span class="float-right badge badge-danger clearButton mb-5 text-white" style="cursor: pointer;">Reset Tanda Tangan</span>
			                                <div class="sig sigWrapper" style="height:auto;">
			                                    <canvas class="sign-pad" id="sign-pad" style="width: 100%" width="350" height="100"></canvas>
			                                    <input type="hidden" name="output" class="output">
			                                </div>
			                            </div>
			                            <div class="invalid-feedback animated fadeInDown"></div>
			                        </div>
			                    </div>
		                    </div>
	                    </div>
	                    <div class="row justify-content-center my-15">
                            <div class="col-lg-6">
                                <button type="submit" id="btnSimpan" onclick="simpan()" class="btn bg-gd-sea text-white btn-block">Simpan</button>
                            </div>
                            <div class="col-lg-6">
                                <a href="" class="btn btn-danger btn-block">Kembali</a>
                            </div>
	                    </div>
                    </form>
	            </div>
	        </div>
	        <!-- END Default Elements -->
	    </div>
    </div>
</div>
@endsection


