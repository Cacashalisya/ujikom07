@extends('adminlte::page')
@section('title', 'List Obyek Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Obyek Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <a href="{{route('obyek_wisata.create')}}" class="btn btn-primary mb-2">
                    Tambah Obyek Wisata
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA WISATA</th>
                            <th>DESKRIPSI WISATA</th>
                            <th>FASILITAS</th>
                            <th>FOTO1</th>
                            <th>FOTO2</th>
                            <th>FOTO3</th>
                            <th>FOTO4</th>
                            <th>FOTO5</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obyek_wisata as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->nama_wisata}}</td>
                            <td>{{$data->deskripsi_wisata}}</td>
                            <td>{{$data->fasilitas}}</td>
                            <td>
                                <img src="storage/{{$data->foto1}}" alt="{{$data->foto1}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$data->foto2}}" alt="{{$data->foto2}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$data->foto3}}" alt="{{$data->fot3}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$data->foto4}}" alt="{{$data->foto4}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/{{$data->foto5}}" alt="{{$data->foto5}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('obyek_wisata.edit',
$data)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('obyek_wisata.destroy',
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
        if (confirm('Apakah anda yakin akan menghapus data obyek_wisata \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush