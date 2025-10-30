<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galeri::all();
        return view('pages.galeri.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto ke storage/public/galeri
        $path = $request->file('foto')->store('galeri', 'public');

        // Simpan data ke database
        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('pages.galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('pages.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);

        // Jika foto baru diupload, hapus foto lama dan simpan baru
        if ($request->hasFile('foto')) {
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }

            $path = $request->file('foto')->store('galeri', 'public');
            $galeri->foto = $path;
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $galeri->foto,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus foto dari storage
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil dihapus!');
    }
}
