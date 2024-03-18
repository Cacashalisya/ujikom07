@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <a href="{{route('paket_wisata.create')}}" class="btn btn-primary mb-2">
                    Tambah Paket wisata
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA PAKET WISATA</th>
                            <th>DESKRIPSI</th>
                            <th>FASILITAS</th>
                            <th>HARGA PER PACK</th>
                            <th>DISKON</th>
                            <th>FOTO1</th>
                            <th>FOTO2</th>
                            <th>FOTO3</th>
                            <th>FOTO4</th>
                            <th>FOTO5</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paket_wisata as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->nama_paket}}</td>
                            <td>{{$data->deskripsi}}</td>
                            <td>{{$data->fasilitas}}</td>
                            <td>{{$data->harga_per_pack}}</td>
                            <td>{{$data->diskon}}</td>
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
                                <a href="{{route('paket_wisata.edit',
$data)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('paket_wisata.destroy',
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
        if (confirm('Apakah anda yakin akan menghapus data Paket Wisata \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush