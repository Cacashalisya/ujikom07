@extends('adminlte::page')
@section('title', 'List berita')
@section('content_header')
<h1 class="m-0 text-dark">List berita</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <a href="{{route('berita.create')}}" class="btn btn-primary mb-2">
                    Tambah berita
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>JUDUL</th>
                            <th>BERITA</th>
                            <th>TANGGAL POST</th>
                            <th>FOTO</th>
                            <th>KATEGORI</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berita as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->judul}}</td>
                            <td>{{$data->berita}}</td>
                            <td>{{$data->tgl_post}}</td>
                            <td>
                                <img src="storage/{{$data->foto}}" alt="{{$data->foto}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>{{$data->fkata->kategori_berita}}</td>
                            <td>
                                <a href="{{route('berita.edit',
$data)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('berita.destroy',
$data)}}" onclick="notificationBeforeDelete(event, this, <?php echo
                                                            $key + 1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus berita dengan judul \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush
