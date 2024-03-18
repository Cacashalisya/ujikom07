@extends('adminlte::page')
@section('title', 'Edit Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.update', $karyawan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputnama_karyawan">NAMA LENGKAP KARYAWAN</label>
                        <input type="text" class="form-control
    @error('nama_karyawan') is-invalid @enderror" id="exampleInputnama_karyawan" placeholder="nama_karyawan" name="nama_karyawan" value="{{$karyawan->nama_karyawan ??
    old('nama_karyawan')}}">
                        @error('nama_karyawan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputalamat">ALAMAT</label>
                        <input type="alamat" class="form-control
    @error('alamat') is-invalid @enderror" id="exampleInputalamat" placeholder="Masukkan alamat" name="alamat" value="{{$karyawan->alamat ??
    old('alamat')}}">
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputno_hp">NOMOR TELEPON</label>
                        <input type="no_hp" class="form-control
    @error('no_hp') is-invalid @enderror" id="exampleInputno_hp" placeholder="Masukkan no_hp" name="no_hp" value="{{$karyawan->no_hp ??
    old('no_hp')}}">
                        @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">JABATAN</label>
                        <select class="form-select @error('jabatan') isinvalid @enderror" id="jabatan" name="jabatan">
                            <option value="administrasi" @if(old('jabatan')=='administrasi' )selected @endif>administrasi</option>
                            <option value="bendahara" @if(old('jabatan')=='bendahara' )selected @endif>bendahara</option>
                            <option value="pemilik" @if(old('jabatan')=='pemilik' )selected @endif>pemilik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAktif">Aktif</label>
                        <select class="form-control @error('aktif') isinvalid @enderror" id="exampleInputAktif"
                            name="aktif">
                            <option value="1" @if($karyawan->aktif == '1'
                                || old('aktif') == '1')selected @endif>Ya</option>
                            <option value="0" @if($karyawan->aktif == '0' ||
                                old('aktif') == '0')selected @endif>Tidak</option>
                        </select>
                        @error('level') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
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
                                <a href="{{ route('karyawan.index') }}" class="btn btn-danger">Batal</a>
                                
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