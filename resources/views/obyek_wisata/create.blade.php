@extends('adminlte::page')
@section('title', 'Tambah Obyek Wisata')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Obyek Wisata</h1>
@stop
@section('content')
    <form action="{{ route('obyek_wisata.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata</label>
                            <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" id="nama_wisata"
                                placeholder="Masukkan Nama Wisata" name="nama_wisata" value="{{ old('nama_wisata') }}">
                            @error('nama_wisata') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_wisata">Deskripsi Wisata</label>
                            <textarea class="form-control @error('deskripsi_wisata') is-invalid @enderror" id="deskripsi_wisata"
                                placeholder="Masukkan Deskripsi Wisata" name="deskripsi_wisata" rows="3">{{ old('deskripsi_wisata') }}</textarea>
                            @error('deskripsi_wisata') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="fasilitas">Fasilitas</label>
                            <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas"
                                placeholder="Masukkan Fasilitas" name="fasilitas" rows="3">{{ old('fasilitas') }}</textarea>
                            @error('fasilitas') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                        <label for="foto1" class="formlabel">Foto1</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%"
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
                        <div class="form-group">
                            <label for="id_kategori_wisata">Id Kategori</label>
                            <div class="input-group">
                                <input type="hidden" name="id_kategori_wisata" id="id_kategori_wisata"
                                    value="{{ old('id_kategori_wisata') }}">
                                <input type="text" class="form-control @error('kategori_wisata') is-invalid @enderror"
                                    placeholder="Temukan id kategori" id="kategori_wisata" name="kategori_wisata"
                                    value="{{ old('kategori_wisata') }}" aria-label="kategori" aria-describedby="cari" readonly>

                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i>
                                    Cari Kategori Wisata</button>
                            </div>
                            @error('id_kategori_wisata') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('obyek_wisata.index') }}" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
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
                                    <th>Kategori Wisata</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori_wisata as $key => $kategori)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $kategori->kategori_wisata }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih('{{ $kategori->id }}', '{{ $kategori->kategori_wisata }}')"
                                                data-bs-dismiss="modal">Pilih</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </form>
@stop

@push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function pilih(id, kategori_wisata) {
            document.getElementById('id_kategori_wisata').value = id
            document.getElementById('kategori_wisata').value = kategori_wisata
        }

        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#' + previewId).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto1").change(function () {
            readURL(this, 'tampil1');
        });

        $("#foto2").change(function () {
            readURL(this, 'tampil2');
        });

        $("#foto3").change(function () {
            readURL(this, 'tampil3');
        });

        $("#foto4").change(function () {
            readURL(this, 'tampil4');
        });

        $("#foto5").change(function () {
            readURL(this, 'tampil5');
        });
    </script>
@endpush

