@extends('adminlte::page')
@section('title', 'Edit Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.update', $pelanggan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputnama_lengkap">NAMA LENGKAP PELANGGAN</label>
                        <input type="text" class="form-control
    @error('nama_lengkap') is-invalid @enderror" id="exampleInputnama_lengkap" placeholder="nama_lengkap" name="nama_lengkap" value="{{$pelanggan->nama_lengkap ??
    old('nama_lengkap')}}">
                        @error('nama_lengkap') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputnotelp">NOMOR TELEPON</label>
                        <input type="notelp" class="form-control
    @error('notelp') is-invalid @enderror" id="exampleInputnotelp" placeholder="Masukkan notelp" name="notelp" value="{{$pelanggan->notelp ??
    old('notelp')}}">
                        @error('notelp') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputalamat">ALAMAT</label>
                        <input type="alamat" class="form-control
    @error('alamat') is-invalid @enderror" id="exampleInputalamat" placeholder="Masukkan alamat" name="alamat" value="{{$pelanggan->alamat ??
    old('alamat')}}">
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto" class="formlabel">Foto pelanggan</label>
                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%"
                            id="tampil">
                        <input class="form-control @error('foto') isinvalid @enderror" type="file" id="foto"
                            name="foto">
                        @error('foto') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                
                    <div class="form-group">
                        <label for="id_user">User</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control @error('users')  is-invalid  @enderror"
                                placeholder="Users" id="users" name="users"
                                value="{{old('users')}}" aria- label="Users" aria-describedby="cari"
                                readonly>
                            <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i> Cari Data Users</button>
                        </div>

                        <!--  Modal  -->
                        <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5"id="staticBackdropLabel">Pencarian Data Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <table class="table table-hover table-bordered tablestripped" id="example2">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Email</th>
                                                    <th>Level</th>
                                                    <th>Aktif</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td id={{$key+1}}>{{$user->email}}</td>
                                                    <td id={{$key+1}}>{{$user->level}}</td>
                                                    <td id={{$key+1}}>{{$user->aktif}}</td>
                                                    <td>
                                                        <button type="button" class="btn  btn-primary btn-xs"
                                                            onclick="pilih('{{$user->id}}',  '{{$user->name}}', '{{$user->email}}', '{{$user->level}}','{{$user->aktif}}')" data-bs-dismiss="modal">
                                                            Pilih
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                            </div>
                                            </div>
                                            </div>
                                            </div>

                                              <!--  Modal  -->
                     

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">Batal</a>
                                
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @stop
                @push('js') 

 <script> 
 $('#example2').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
 function pilih(id, usr){
 document.getElementById('id_user').value = id
 document.getElementById('users').value = usr
 } 

 </script> 
@endpush