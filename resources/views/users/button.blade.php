@role('super-admin')
<a class="btn btn-rounded btn-alt-secondary mr-10" href="{{ url('pengguna/edit/'.$pengguna->id) }}">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Edit Surat</span>
</a>


@endrole
@role('kasubbag')
<button class="btn btn-rounded btn-alt-secondary mr-10">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Paraf Surat Disposisi</span>
</button>
@endrole
@role('sekretaris')
<button class="btn btn-rounded btn-alt-secondary mr-10">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Paraf Surat Disposisi</span>
</button>
@endrole
@role('kepala badan')
<button class="btn btn-rounded btn-alt-secondary mr-10">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Disposisi Surat Masuk</span>
</button>
@endrole
