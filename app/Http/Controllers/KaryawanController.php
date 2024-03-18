<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('karyawan.index', [
        'karyawan' => $karyawan
        ]);
        }

        public function create(){
            return view(
                'karyawan.create', [
                'users' => User::all()
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data Karyawan
            $request->validate([ 
                'nama_karyawan'=> 'required|unique:karyawan,nama_karyawan',
                'alamat'=> 'required',
                'no_hp'=> 'required',
                'jabatan'=> 'required',
                'id_user'=> 'required'
                ]);

            $array=$request->only([ 
                'nama_karyawan',
                'alamat',
                'no_hp',
                'jabatan',
                'id_user'
                ]);

                $karyawan = Karyawan::create($array);  
                return redirect()->route('karyawan.index') ->with('success_message', 'Berhasil menambah Karyawan baru');
        }
        

        public function destroy($id)
        {
            //Menghapus User
            $karyawan = Karyawan::find($id);
    
            // if ($id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Anda tidak dapat menghapus diri
            // sendiri.');
            if ($karyawan) $karyawan->delete();
            return redirect()->route('karyawan.index')->with('success_message', 'Berhasil menghapus karyawan');
        }

        public function edit($id)
        {
        //Menampilkan Form Edit
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')
        ->with('error_message', 'karyawan dengan id = '.$id.'
        tidak ditemukan');
        return view('karyawan.edit', [
        'karyawan' => $karyawan,
        'users' => User::all()
        //Mengirimkan semua data Users ke Modal pada halaman edit
        ]);
        }

        public function update(Request $request, $id)
        {
        $request->validate([
        'nama_karyawan' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'jabatan' => 'required'
        
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->id_user = $request->id_user;
        $karyawan->save();
        return redirect()->route('karyawan.index')
        ->with('success_message', 'Berhasil mengubah
        karyawan');
        } 
        
}