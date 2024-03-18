<?php

namespace App\Http\Controllers;

use App\Models\Kategori_wisata;
use App\Models\Obyek_wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ObyekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obyek_wisata = Obyek_wisata::all();
        return view('obyek_wisata.index', [
            'obyek_wisata' => $obyek_wisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obyek_wisata.create', [
            'kategori_wisata' => Kategori_wisata::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|unique:obyek_wisata,nama_wisata',
            'deskripsi_wisata' => 'required',
            'id_kategori_wisata' => 'required',
            'foto1' => 'required|image',
            'foto2' => 'required|image',
            'foto3' => 'required|image',
            'foto4' => 'required|image',
            'foto5' => 'required|image',
        ]);

        $array = $request->only([
            'nama_wisata',
            'deskripsi_wisata',
            'id_kategori_wisata',
            'fasilitas',
        ]);

        $array['foto1'] = $request->file('foto1')->store('Foto obyek wisata');
        $array['foto2'] = $request->file('foto2')->store('Foto obyek wisata');
        $array['foto3'] = $request->file('foto3')->store('Foto obyek wisata');
        $array['foto4'] = $request->file('foto4')->store('Foto obyek wisata');
        $array['foto5'] = $request->file('foto5')->store('Foto obyek wisata');

        $tambah = Obyek_wisata::create($array);

        if ($tambah) {
            $request->file('foto1')->store('Foto obyek wisata');
            $request->file('foto2')->store('Foto obyek wisata');
            $request->file('foto3')->store('Foto obyek wisata');
            $request->file('foto4')->store('Foto obyek wisata');
            $request->file('foto5')->store('Foto obyek wisata');
        }

        return redirect()->route('obyek_wisata.index')
            ->with('success_message', 'Berhasil Menambahkan Obyek Wisata Baru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obyek_wisata  $obyek_wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obyek_wisata = Obyek_wisata::find($id);

        if (!$obyek_wisata) {
            return redirect()->route('obyek_wisata.index')->with('error_message', 'Obyek Wisata dengan id = ' . $id . ' tidak ditemukan');
        }

        return view('obyek_wisata.edit', [
            'obyek_wisata' => $obyek_wisata,
            'kategoriWisata' => Kategori_wisata::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obyek_wisata  $obyek_wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = ['nama_wisata', 'deskripsi_wisata', 'fasilitas', 'id_kategori_wisata'];

        $obyek_wisata = Obyek_wisata::findOrFail($id);

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $request->validate([$field => 'required']);

                $obyek_wisata->$field = $request->$field;
            }
        }

        $fotoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];

        foreach ($fotoFields as $fotoField) {
            if ($request->has($fotoField)) {
                $request->validate([$fotoField => 'required|image']);

                $oldFoto = $obyek_wisata->$fotoField;
                if ($oldFoto) {
                    Storage::delete($oldFoto);
                }

                $obyek_wisata->$fotoField = $request->file($fotoField)->store('Foto obyek wisata');
            }
        }

        $obyek_wisata->save();

        return redirect()->route('obyek_wisata.index')
            ->with('success_message', 'Berhasil Mengubah Obyek Wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obyek_wisata  $obyek_wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obyek_wisata = Obyek_wisata::find($id);

        if ($obyek_wisata) {
            $fotoFields = ['foto1', 'foto2', 'foto3', 'foto4', 'foto5'];

            foreach ($fotoFields as $fotoField) {
                $foto = $obyek_wisata->$fotoField;

                if ($foto) {
                    Storage::delete($foto);
                }
            }

            $obyek_wisata->delete();

            return redirect()->route('obyek_wisata.index')->with('success_message', 'Berhasil menghapus obyek wisata "' . $obyek_wisata->nama_wisata . '" !');
        }

        return redirect()->route('obyek_wisata.index')->with('error_message', 'Obyek Wisata dengan id = ' . $id . ' tidak ditemukan');
    }
}
