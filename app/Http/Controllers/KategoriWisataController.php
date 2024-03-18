<?php

namespace App\Http\Controllers;

use App\Models\Kategori_wisata;
use App\Models\Obyek_wisata;
use Illuminate\Http\Request;

class KategoriwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan Kategori_wisata
        $kategori_wisata = Kategori_wisata::all();
        return view('kategori_wisata.index', [
        'kategori_wisata' => $kategori_wisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan form tambah kategori_wisata
        return view('kategori_wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data kategori_wisata Baru
    $request->validate([
    'kategori_wisata' => 'required'
    ]);
    $array = $request->only([
    'kategori_wisata'
    ]);
    $kategori_wisata = Kategori_wisata::create($array);   
    return redirect()->route('kategori_wisata.index')->with('success_message', 'Berhasil menambah kategori wisata baru');
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
        $kategori_wisata = Kategori_wisata::find($id);
        if (!$kategori_wisata) return redirect()->route('kategori_wisata.index')
        ->with('error_message', 'kategori_wisata dengan id'.$id.' tidak
        ditemukan');
        return view('kategori_wisata.edit', [
        'kategori_wisata' => $kategori_wisata
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
        //Mengedit Data kategori_wisata
        $request->validate([
            'kategori_wisata' => 'required',
            ]);
            $kategori_wisata = Kategori_wisata::find($id);
            $kategori_wisata->kategori_wisata = $request->kategori_wisata;
            $kategori_wisata->save();
            return redirect()->route('kategori_wisata.index')
            ->with('success_message', 'Berhasil mengubah kategori_wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus kategori_wisata
        $kategori_wisata = Kategori_wisata::find($id);

        // if ($id == $request->kategori_wisata()->id) return redirect()->route('kategori_wisata.index')->with('error_message', 'Anda tidak dapat menghapus diri
        // sendiri.');
        if ($kategori_wisata) $kategori_wisata->delete();
        return redirect()->route('kategori_wisata.index')->with('success_message', 'Berhasil menghapus kategori_wisata');
    }
}