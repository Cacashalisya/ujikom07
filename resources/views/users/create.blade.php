@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
<form action="{{route('users.store')}}"  method="post" >
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputname">Nama</label>
                        <input type="text" class="form-control
    @error('name') is-invalid @enderror" id="exampleInputname" placeholder="Nama lengkap" name="name"
                            value="{{old('name')}}">
                        @error('name') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email address</label>
                        <input type="email" class="form-control
    @error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Masukkan Email" name="email"
                            value="{{old('email')}}">
                        @error('email') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Password</label>
                        <input type="password" class="form-control
    @error('password') is-invalid @enderror" id="exampleInputpassword" placeholder="Password" name="password">
                        @error('password') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputpassword"
                            placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlevel">Level</label>
                        <select class="form-control @error('level') isinvalid @enderror" id="exampleInputlevel"
                            name="level">
                            <option value="admin" @if(old('level')=='admin' )selected @endif>Admin</option>
                            <option value="bendahara" @if(old('level')=='bendahara' )selected @endif>Bendahara</option>
                            <option value="pelanggan" @if(old('level')=='pelanggan' )selected @endif>Pelanggan</option>
                            <option value="pemilik" @if(old('level')=='pemilik' )selected @endif>Pemilik</option>
                        </select>
                        @error('level') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btnprimary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btndefault">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop