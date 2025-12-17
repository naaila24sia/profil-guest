<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Media;
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
            ->latest('terbit_at')
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
            'files.*'     => 'nullable|file|max:2048',
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->judul),
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->terbit_at,
        ];

        $berita = Berita::create($data);

        // === MULTIPLE FILE UPLOAD ===
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();
                $mime     = $file->getClientMimeType();

                $file->storeAs('uploads/berita/', $fileName, 'public');

                Media::create([
                    'ref_table'  => 'berita',
                    'ref_id'     => $berita->berita_id,
                    'file_name'  => $fileName,
                    'mime_type'  => $mime,
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('berita.index')->with('create', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slugOrId)
    {
        $berita = Berita::where('slug', $slugOrId)
            ->orWhere('berita_id', $slugOrId)
            ->firstOrFail();

        $media = Media::where('ref_table', 'berita')
            ->where('ref_id', $berita->berita_id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.berita.show', compact('berita', 'media'));
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
            'files.*'     => 'nullable|file|max:2048',
        ]);

        $berita->update([
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'slug'        => $request->slug ? Str::slug($request->slug) : Str::slug($request->judul),
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->terbit_at,
        ]);

        // === MULTIPLE FILE UPLOAD ===
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();
                $mime     = $file->getClientMimeType();

                $file->storeAs('uploads/berita/', $fileName, 'public');

                Media::create([
                    'ref_table'  => 'berita',
                    'ref_id'     => $berita->berita_id,
                    'file_name'  => $fileName,
                    'mime_type'  => $mime,
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('berita.index')->with('update', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('delete', 'Berita berhasil dihapus!');
    }

    public function uploadMedia(Request $request, $id)
    {
        $request->validate([
            'media.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4000',
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $filename = time() . '-' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/berita', $filename);

                \App\Models\Media::create([
                    'ref_table'  => 'berita',
                    'ref_id'     => $id,
                    'file_name'  => $filename,
                    'mime_type'  => $file->getMimeType(),
                    'sort_order' => 0,
                ]);
            }
        }

        return back()->with('create', 'Media berhasil ditambahkan!');
    }

    public function deleteMedia(\App\Models\Media $media)
    {
        $path = storage_path('app/public/uploads/berita/' . $media->file_name);

        if (file_exists($path)) {
            unlink($path);
        }

        $media->delete();

        return back()->with('delete', 'Media berhasil dihapus!');
    }

}
