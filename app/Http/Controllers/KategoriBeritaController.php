<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = KategoriBerita::all();
        return view('pages.kategori.index', $data);
    }

    public function create()
    {
        return view('pages.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'slug'      => 'nullable|unique:kategori_berita,slug',
            'deskripsi' => 'nullable',
        ]);

        $data['nama']      = $request->nama;
        $data['slug']      = $request->slug ? Str::slug($request->slug) : Str::slug($request->nama);
        $data['deskripsi'] = $request->deskripsi;

        KategoriBerita::create($data);

        return redirect()->route('kategori.index')->with('create', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['kategori'] = KategoriBerita::findOrFail($id);
        return view('pages.kategori.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $request->validate([
            'nama'      => 'required',
            'slug'      => 'nullable|unique:kategori_berita,slug,' . $kategori->kategori_id . ',kategori_id',
            'deskripsi' => 'nullable'
        ]);

        $kategori->nama      = $request->nama;
        $kategori->slug      = $request->slug ? Str::slug($request->slug) : Str::slug($request->nama);
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();

        return redirect()->route('kategori.index')->with('update', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('delete', 'Kategori berhasil dihapus!');
    }
}
