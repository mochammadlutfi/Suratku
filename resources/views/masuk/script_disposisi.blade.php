<script type="text/javascript">

    function disposisi(id){
        save_method = 'ditambahkan';
        $('#disposisi_surat').modal({backdrop: 'static', keyboard: false});
        $('#disposisi_surat').modal('show');
        $('.modal-title').text('Paraf Surat Disposisi');

        $('#surat_id').val(id);
    }

    $(document).ready(function() {
        $('#signArea').signaturePad({
            drawOnly:true,
            drawBezierCurves:true,
            lineTop:160,
            bgColour:"#ffffff",
        });
    });


    function simpan(){
        html2canvas([document.getElementById('sign-pad')], {
            onrendered: function (canvas) {
                var formData = new FormData($('#form_disposisi')[0]);

                var canvas_img_data = canvas.toDataURL('image/png');
                formData.append('img_data', canvas_img_data.replace(/^data:image\/(png|jpg);base64,/,""));

                var url = "<?= route('surat.disposisi.tambah') ?>";

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
                    success: function (data) {
                        $('.is-invalid').removeClass('is-invalid');
                        if(data.fail == false) {
                            swal({
                                title: "Berhasil",
                                text: "Surat Disposisi Berhasil Dibuat",
                                timer: 3000,
                                buttons: false,
                                icon: 'success'
                            });
                            window.setTimeout(function(){
                                location.reload();
                            } ,1500);
                        }else{
                            for (control in data.errors) {
                                $('#form-' + control).addClass('is-invalid');
                                $('#error-' + control).html(data.errors[control]);
                            }
                            $('#btnSimpan').text('Simpan');
                            $('#btnSimpan').attr('disabled',false);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                        $('#btnSimpan').text('Simpan');
                        $('#btnSimpan').attr('disabled',false);
                    }
                });
            }
        });
    }

    </script>
