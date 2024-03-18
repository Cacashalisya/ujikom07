<?php

namespace App\Http\Controllers;

use App\Models\Kategori_berita;
use App\Models\Berita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan Kategori_berita
        $kategori_berita = Kategori_berita::all();
        return view('kategori_berita.index', [
        'kategori_berita' => $kategori_berita
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan form tambah kategori_berita
        return view('kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data kategori_berita Baru
    $request->validate([
    'kategori_berita' => 'required|unique:kategori_berita,kategori_berita,' ]);
    $array = $request->only([
    'kategori_berita'
    ]);
    $kategori_berita = Kategori_berita::create($array);   
    return redirect()->route('kategori_berita.index')->with('success_message', 'Berhasil menambah kategori berita baru');
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
        $kategori_berita = Kategori_berita::find($id);
        if (!$kategori_berita) return redirect()->route('kategori_berita.index')
        ->with('error_message', 'kategori_berita dengan id'.$id.' tidak
        ditemukan');
        return view('kategori_berita.edit', [
        'kategori_berita' => $kategori_berita
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
        $request->validate([
            'kategori_berita' =>
            'required|unique:kategori_berita,kategori_berita,' . $id
        ]);
        $kategori_berita = Kategori_berita::find($id);
        $kategori_berita->kategori_berita = $request->kategori_berita;
        $kategori_berita->save();
        return redirect()->route('kategori_berita.index')->with('success_message', 'Berhasil mengubah Kategori Wisata');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus kategori_berita
        $kategori_berita = Kategori_berita::find($id);

        // if ($id == $request->kategori_berita()->id) return redirect()->route('kategori_berita.index')->with('error_message', 'Anda tidak dapat menghapus diri
        // sendiri.');
        if ($kategori_berita) $kategori_berita->delete();
        return redirect()->route('kategori_berita.index')->with('success_message', 'Berhasil menghapus kategori_berita');
    }
}