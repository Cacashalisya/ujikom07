@extends('adminlte::page')
@section('title', 'List Kategori Berita')
@section('content_header')
<h1 class="m-0 text-dark">List Kategori Berita</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <a href="{{route('kategori_berita.create')}}" class="btn btn-primary mb-2">
                    Tambah kategori berita
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>KATEGORI BERITA</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori_berita as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->kategori_berita}}</td>
                            <td>
                                <a href="{{route('kategori_berita.edit',
$data)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('kategori_berita.destroy',
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
        if (confirm('Apakah anda yakin akan menghapus data kategori berita \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush