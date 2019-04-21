@role('admin')
<a class="btn btn-rounded btn-alt-secondary mr-10" href="{{ url('surat/keluar/edit/'.$data->id) }}">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Edit Surat</span>
</a>
<a class="btn btn-rounded btn-alt-secondary" href="{{ url('surat/keluar/delete/'.$data->id) }}">
    <i class="si si-trash mx-5"></i>
    <span class="d-none d-sm-inline"> Hapus Surat</span>
</a>
@endrole
