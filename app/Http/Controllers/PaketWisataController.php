<?php

namespace App\Http\Controllers;

use App\Models\Paket_wisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan paket_wisata
        $paket_wisata = Paket_wisata::all();
        return view('paket_wisata.index', [
        'paket_wisata' => $paket_wisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan form tambah paket_wisata
        return view('paket_wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data paket_wisata Baru
    $request->validate([
    'nama_paket' => 'required|unique:paket_wisata,nama_paket',
    'deskripsi' => 'required',
    'fasilitas' => 'required',
    'harga_per_pack' => 'required',
    'diskon' => 'required',
    'foto1'=> 'required|image|file|max:2048',
    'foto2'=> 'required|image|file|max:2048',
    'foto3'=> 'required|image|file|max:2048',
    'foto4'=> 'required|image|file|max:2048',
    'foto5'=> 'required|image|file|max:2048',
    ]);

     $array=$request->only([
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'harga_per_pack',
        'diskon',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5'
     ]);

       $array['foto1'] = $request->file('foto1')->store('Foto paket_wisata');
                $array['foto2'] = $request->file('foto2')->store('Foto paket_wisata');
                $array['foto3'] = $request->file('foto3')->store('Foto paket_wisata');
                $array['foto4'] = $request->file('foto4')->store('Foto paket_wisata');
                $array['foto5'] = $request->file('foto5')->store('Foto paket_wisata');
                $tambah=paket_wisata::create($array);
                if($tambah) $request->file('foto1')->store('Foto paket_wisata');
                if($tambah) $request->file('foto2')->store('Foto paket_wisata');
                if($tambah) $request->file('foto3')->store('Foto paket_wisata');
                if($tambah) $request->file('foto4')->store('Foto paket_wisata');
                if($tambah) $request->file('foto5')->store('Foto paket_wisata');
                    return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket baru');
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
        $paket_wisata = paket_wisata::find($id);
        if (!$paket_wisata) return redirect()->route('paket_wisata.index')
        ->with('error_message', 'paket_wisata dengan id'.$id.' tidak
        ditemukan');
        return view('paket_wisata.edit', [
        'paket_wisata' => $paket_wisata
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
        //Mengedit Data paket_wisata
        $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'harga_per_pack' => 'required',
            'diskon' => 'required',
            'foto1'=> 'required|image|file|max:2048',
            'foto2'=> 'required|image|file|max:2048',
            'foto3'=> 'required|image|file|max:2048',
            'foto4'=> 'required|image|file|max:2048',
            'foto5'=> 'required|image|file|max:2048',
            ]);
            $paket_wisata = Paket_wisata::find($id);
            $paket_wisata->nama_paket = $request->nama_paket;
            $paket_wisata->deskripsi = $request->deskripsi;
            $paket_wisata->fasilitas = $request->fasilitas;
            $paket_wisata->harga_per_pack = $request->harga_per_pack;
            $paket_wisata->diskon = $request->diskon;
            $paket_wisata->foto1 = $request->file('foto1')->store('Foto paket_wisata');
            $paket_wisata->foto2 = $request->file('foto2')->store('Foto paket_wisata');
            $paket_wisata->foto3 = $request->file('foto3')->store('Foto paket_wisata');
            $paket_wisata->foto4 = $request->file('foto4')->store('Foto paket_wisata');
            $paket_wisata->foto5 = $request->file('foto5')->store('Foto paket_wisata');
            $paket_wisata->save();
            return redirect()->route('paket_wisata.index')
            ->with('success_message', 'Berhasil mengubah
            paket_wisata');
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
    $paket_wisata = Paket_wisata::find($id);
    if ($paket_wisata) {
        $hapus = $paket_wisata->delete();
        if ($hapus) unlink("storage/" . $paket_wisata->foto1);
        if ($hapus) unlink("storage/" . $paket_wisata->foto2);
        if ($hapus) unlink("storage/" . $paket_wisata->foto3);
        if ($hapus) unlink("storage/" . $paket_wisata->foto4);
        if ($hapus) unlink("storage/" . $paket_wisata->foto5);
    }
    return redirect()->route('paket_wisata.index')
    ->with('success_message', 'Berhasil menghapus paket_wisata');
    }
}