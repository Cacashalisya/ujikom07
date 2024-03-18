<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan Penginapan
        $penginapan = Penginapan::all();
        return view('penginapan.index', [
        'penginapan' => $penginapan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan form tambah penginapan
        return view('penginapan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data penginapan Baru
    $request->validate([
    'nama_penginapan' => 'required|unique:penginapan,nama_penginapan',
    'deskripsi' => 'required',
    'fasilitas' => 'required',
    'foto1'=> 'required|image|file|max:2048',
    'foto2'=> 'required|image|file|max:2048',
    'foto3'=> 'required|image|file|max:2048',
    'foto4'=> 'required|image|file|max:2048',
    'foto5'=> 'required|image|file|max:2048',
    ]);

     $array=$request->only([
        'nama_penginapan',
        'deskripsi',
        'fasilitas',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5'
     ]);

       $array['foto1'] = $request->file('foto1')->store('Foto Penginapan');
                $array['foto2'] = $request->file('foto2')->store('Foto Penginapan');
                $array['foto3'] = $request->file('foto3')->store('Foto Penginapan');
                $array['foto4'] = $request->file('foto4')->store('Foto Penginapan');
                $array['foto5'] = $request->file('foto5')->store('Foto Penginapan');
                $tambah=Penginapan::create($array);
                if($tambah) $request->file('foto1')->store('Foto Penginapan');
                if($tambah) $request->file('foto2')->store('Foto Penginapan');
                if($tambah) $request->file('foto3')->store('Foto Penginapan');
                if($tambah) $request->file('foto4')->store('Foto Penginapan');
                if($tambah) $request->file('foto5')->store('Foto Penginapan');
                    return redirect()->route('penginapan.index')->with('success_message', 'Berhasil menambah Paket Penginapan baru');
                }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $penginapan = Penginapan::find($id);
        if (!$penginapan) return redirect()->route('penginapan.index')
        ->with('error_message', 'penginapan dengan id'.$id.' tidak
        ditemukan');
        return view('penginapan.edit', [
        'penginapan' => $penginapan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mengedit Data penginapan
        $request->validate([
            'nama_penginapan' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'foto1'=> 'required|image|file|max:2048',
            'foto2'=> 'required|image|file|max:2048',
            'foto3'=> 'required|image|file|max:2048',
            'foto4'=> 'required|image|file|max:2048',
            'foto5'=> 'required|image|file|max:2048',
            ]);
            $penginapan = Penginapan::find($id);
            $penginapan->nama_penginapan = $request->nama_penginapan;
            $penginapan->deskripsi = $request->deskripsi;
            $penginapan->fasilitas = $request->fasilitas;
            $penginapan->foto1 = $request->file('foto1')->store('Foto Penginapan');
            $penginapan->foto2 = $request->file('foto2')->store('Foto Penginapan');
            $penginapan->foto3 = $request->file('foto3')->store('Foto Penginapan');
            $penginapan->foto4 = $request->file('foto4')->store('Foto Penginapan');
            $penginapan->foto5 = $request->file('foto5')->store('Foto Penginapan');
            $penginapan->save();
            return redirect()->route('penginapan.index')
            ->with('success_message', 'Berhasil mengubah
            penginapan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    //Menghapus 
    $penginapan = Penginapan::find($id);
    if ($penginapan) {
        $hapus = $penginapan->delete();
        if ($hapus) unlink("storage/" . $penginapan->foto1);
        if ($hapus) unlink("storage/" . $penginapan->foto2);
        if ($hapus) unlink("storage/" . $penginapan->foto3);
        if ($hapus) unlink("storage/" . $penginapan->foto4);
        if ($hapus) unlink("storage/" . $penginapan->foto5);
    }
    return redirect()->route('penginapan.index')
    ->with('success_message', 'Berhasil menghapus penginapan');
    }
}