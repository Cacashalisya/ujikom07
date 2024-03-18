@extends('adminlte::page')
@section('title', 'Edit Kategori Wisata')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Kategori Wisata</h1>
@stop
@section('content')
    <form action="{{ route('kategori_wisata.update', $kategori_wisata) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputkategori_wisata">Kategori wisata</label>
                        <input type="text" class="form-control
    @error('kategori_wisata') is-invalid @enderror" id="exampleInputkategori_wisata" placeholder="masukan kategori wisata" name="kategori_wisata"
                            value="{{old('kategori_wisata')}}">
                        @error('kategori_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kategori_wisata.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop