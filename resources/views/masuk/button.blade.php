@role('admin')
<a class="btn btn-rounded btn-alt-secondary mr-10" href="{{ url('surat/masuk/edit/'.$data->id) }}">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Edit Surat</span>
</a>

<!-- <form action="{{ route('surat.masuk.hapus',$data->id) }}"> -->
<!-- <a class="btn btn-rounded btn-alt-secondary" role ="button" href = "{{ url('surat/masuk/hapus/'.$data->id) }}">
    <i class="si si-trash mx-5"></i>
    <span class="d-none d-sm-inline"> Hapus Surat</span>
</a> -->
<form action="{{url('surat/masuk/hapus/' .$data->id)}}" method="POST">
   {{method_field('DELETE')}}

   <input type="submit" class="btn btn-danger" value="Delete"/>
</form>
@endrole
@role('kasubbag')
@if($data->disposisi->status == '0')
<button class="btn btn-rounded btn-alt-secondary mr-10" onclick="paraf({{ $data->id }})">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Paraf Surat Disposisi</span>
</button>
@endif
@endrole
@role('sekretaris')
@if($data->disposisi->status == '1')
<button class="btn btn-rounded btn-alt-secondary mr-10" onclick="paraf({{ $data->id }})">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Paraf Surat Disposisi</span>
</button>
@endif
@endrole
@role('kepala badan')
@if($data->disposisi->status == '2')
<button class="btn btn-rounded btn-alt-secondary mr-10" onclick="disposisi({{ $data->id }})">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Disposisi Surat Masuk</span>
</button>
@endif
@endrole
@if($data->disposisi->status == '3')
<a class="btn btn-rounded btn-alt-secondary mr-10" href="{{ route('surat.disposisi.detail', $data->id) }}">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Lihat Disposisi</span>
</a>
@endif
