@extends('adminlte::page')
@section('title', 'Edit kategori berita')
@section('content_header')
<h1 class="m-0 text-dark">Edit kategori berita</h1>
@stop
@section('content')
<form action="{{route('kategori_berita.update', $kategori_berita)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputkategori_berita">Kategori Berita</label>
                        <input type="text" class="form-control
    @error('kategori_berita') is-invalid @enderror" id="exampleInputkategori_berita" placeholder="masukan kategori berita" name="kategori_berita"
                            value="{{old('kategori_berita')}}">
                        @error('kategori_berita') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btnprimary">Simpan</button>
                    <a href="{{route('kategori_berita.index')}}" class="btn btndefault">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop