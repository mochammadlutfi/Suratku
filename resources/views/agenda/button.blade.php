@role('admin')
<a class="btn btn-rounded btn-alt-secondary mr-10" href="{{ url('agenda/edit/'.$data->id) }}">
    <i class="si si-note mx-5"></i>
    <span class="d-none d-sm-inline"> Edit Agenda</span>
</a>
<form action="{{ route('agenda.delete',[$data->id]) }}">
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<a class="btn btn-rounded btn-alt-secondary" href="">
    <i class="si si-trash mx-5"></i>
    <span class="d-none d-sm-inline"> Hapus Agenda</span>
</a>
</form>
@endrole
