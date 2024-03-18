@extends('adminlte::page')
@section('title', 'Edit Berita')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Berita</h1>
@stop
@section('content')
    <form action="{{ route('berita.update', $berita) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputjudul">JUDUL</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="exampleInputjudul" placeholder="Judul" name="judul"
                                value="{{ $berita->judul ?? old('judul') }}">
                            @error('judul')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputberita">BERITA</label>
                            <textarea class="form-control @error('berita') is-invalid @enderror" id="exampleInputberita"
                                placeholder="Berita" name="berita" rows="5">{{ $berita->berita ?? old('berita') }}</textarea>
                            @error('berita')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputtgl_post">TANGGAL POST</label>
                            <input type="datetime-local" class="form-control @error('tgl_post') is-invalid @enderror"
                                id="exampleInputtgl_post" placeholder="Tanggal Post" name="tgl_post"
                                value="{{ $berita->tgl_post ? date('Y-m-d\TH:i', strtotime($berita->tgl_post)) : old('tgl_post') }}">
                            @error('tgl_post')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-label">Foto Berita</label>
                            <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="15%"
                                id="tampil">
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
                                name="foto">
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_kategori_berita">Kategori Berita</label>
                            <div class="input-group">
                                <input type="hidden" name="id_kategori_berita" id="id_kategori_berita"
                                    value="{{ old('id_kategori_berita') }}">
                                <input type="text" class="form-control @error('kategori_berita') is-invalid @enderror"
                                    placeholder="Kategori Berita" id="kategori_berita" name="kategori_berita"
                                    value="{{ old('kategori_berita') }}" aria-label="Kategori Berita" aria-describedby="cari"
                                    readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i> Cari Data Kategori Berita</button>
                            </div>

                            </div>
                        @error('id_kategori_berita') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('berita.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori Berita</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori_berita as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$user->kategori_berita}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->kategori_berita}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih(id, kategori_berita) {
            document.getElementById('id_kategori_berita').value = id
            document.getElementById('kategori_berita').value = kategori_berita
        }



        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto").change(function () {
            readURL(this);
        });
    </script>
    @endpush