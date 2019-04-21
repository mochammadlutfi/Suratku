<script type="text/javascript">
    function paraf(id){
        save_method = 'ditambahkan';
        $('#paraf_kasubbag').modal({backdrop: 'static', keyboard: false});
        $('#paraf_kasubbag').modal('show');
        $('.modal-title').text('Paraf Surat Disposisi');

        $('#surat_id').val(id);
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

                var url = "<?= route('surat.masuk.paraf') ?>";

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
                                text: "Surat Disposisi Berhasil Diparaf",
                                timer: 3000,
                                buttons: false,
                                icon: 'success'
                            });
                            window.setTimeout(function(){
                                location.reload();
                            } ,1500);
                        }else{
                            for (control in data.errors) {
                                $('input[name=' + control + ']').addClass('is-invalid');
                                $('#error-' + control).html(data.errors[control]);
                            }
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
