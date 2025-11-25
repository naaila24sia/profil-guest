<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchableColumns = ['judul', 'slug', 'isi_html', 'penulis', 'status', 'terbit_at'];

        $data['berita'] = Berita::with('kategori')->search($request, $searchableColumns)
            ->paginate(9)
            ->withQueryString();
        return view('pages.berita.index', $data);
    }

    public function create()
    {
        $data['kategori'] = KategoriBerita::all();
        return view('pages.berita.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'judul'       => 'required|string|max:200',
            'slug'        => 'nullable|unique:berita,slug',
            'isi_html'    => 'required',
            'penulis'     => 'nullable|string|max:100',
            'status'      => 'required|in:draft,published',
            'terbit_at'   => 'nullable|date',
        ]);

        $data['kategori_id'] = $request->kategori_id;
        $data['judul']       = $request->judul;
        $data['slug']        = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul);
        $data['isi_html']    = $request->isi_html;
        $data['penulis']     = $request->penulis;
        $data['status']      = $request->status;
        $data['terbit_at']   = $request->terbit_at;

        Berita::create($data);

        return redirect()->route('berita.index')->with('create', 'Berita berhasil ditambahkan!');
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
        $data['berita']   = Berita::findOrFail($id);
        $data['kategori'] = KategoriBerita::all();
        return view('pages.berita.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'judul'       => 'required|string|max:200',
            'slug'        => 'nullable|unique:berita,slug,' . $berita->berita_id . ',berita_id',
            'isi_html'    => 'required',
            'penulis'     => 'nullable|string|max:100',
            'status'      => 'required|in:draft,published',
            'terbit_at'   => 'nullable|date',
        ]);

        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->slug        = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul);
        $berita->isi_html    = $request->isi_html;
        $berita->penulis     = $request->penulis;
        $berita->status      = $request->status;
        $berita->terbit_at   = $request->terbit_at;

        $berita->save();

        return redirect()->route('berita.index')->with('update', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('delete', 'Berita berhasil dihapus!');
    }

}
