@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paket_wisata.update', $paket_wisata)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputnama_paket">NAMA PAKET</label>
                        <input type="text" class="form-control
    @error('nama_paket') is-invalid @enderror" id="exampleInputnama_paket" placeholder="nama_paket" name="nama_paket" value="{{$paket_wisata->nama_paket ??
    old('nama_paket')}}">
                        @error('nama_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputndeskripsi">DESKRIPSI</label>
                        <input type="text" class="form-control
    @error('deskripsi') is-invalid @enderror" id="exampleInputdeskripsi" placeholder="deskripsi" name="deskripsi" value="{{$paket_wisata->deskripsi ??
    old('deskripsi')}}">
                        @error('deskripsi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputfasilitas">FASILITAS</label>
                        <input type="text" class="form-control
    @error('fasilitas') is-invalid @enderror" id="exampleInputfasilitas" placeholder="Masukkan fasilitas" name="fasilitas" value="{{$paket_wisata->fasilitas ??
    old('fasilitas')}}">
                        @error('fasilitas') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputharga_per_pack">HARGA PER PACK</label>
                        <input type="text" class="form-control
    @error('harga_per_pack') is-invalid @enderror" id="exampleInputharga_per_pack" placeholder="Masukkan harga per pack" name="harga_per_pack" value="{{$paket_wisata->harga_per_pack ??
    old('harga_per_pack')}}">
                        @error('harga_per_pack') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdiskon">DISKON</label>
                        <input type="decimal" class="form-control
    @error('diskon') is-invalid @enderror" id="exampleInputdiskon" placeholder="Masukkan diskon" name="diskon" value="{{$paket_wisata->diskon ??
    old('diskon')}}">
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto1" class="formlabel">Foto1</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil1" alt="..." width="15%"
                            id="tampil1">
                        <input class="form-control @error('foto1') isinvalid @enderror" type="file" id="foto1"
                            name="foto1">
                        @error('foto1') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto2" class="formlabel">Foto2</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil2" alt="..." width="15%"
                            id="tampil2">
                        <input class="form-control @error('foto2') isinvalid @enderror" type="file" id="foto2"
                            name="foto2">
                        @error('foto2') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto3" class="formlabel">Foto3</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil3" alt="..." width="15%"
                            id="tampil3">
                        <input class="form-control @error('foto3') isinvalid @enderror" type="file" id="foto3"
                            name="foto3">
                        @error('foto3') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto4" class="formlabel">Foto4</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil4" alt="..." width="15%"
                            id="tampil4">
                        <input class="form-control @error('foto4') isinvalid @enderror" type="file" id="foto4"
                            name="foto4">
                        @error('foto4') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto5" class="formlabel">Foto5</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil5" alt="..." width="15%"
                            id="tampil5">
                        <input class="form-control @error('foto5') isinvalid @enderror" type="file" id="foto5"
                            name="foto5">
                        @error('foto5') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('paket_wisata.index') }}" class="btn btn-danger">Batal</a>
                                
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @stop
                @push('js') 
                <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function () {
            readURL1(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function () {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function () {
            readURL3(this);
        });

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function () {
            readURL4(this);
        });

        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function () {
            readURL5(this);
        });

    </script>
 
@endpush