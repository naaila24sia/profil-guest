<?php
namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchableColumns = ['judul', 'deskripsi'];

        $galeris = Galeri::search($request, $searchableColumns)
            ->latest()
            ->paginate(12)
            ->withQueryString();

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
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'files.*'   => 'nullable|file|mimes:jpg,jpeg,png,gif|max:4000',
        ]);

        // simpan data galeri
        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // simpan foto ke tabel media
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $mime     = $file->getClientMimeType();

                $file->storeAs('uploads/galeri', $filename, 'public');

                Media::create([
                    'ref_table'  => 'galeri',
                    'ref_id'     => $galeri->galeri_id,
                    'file_name'  => $filename,
                    'mime_type'  => $mime,
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);

        $media = Media::where('ref_table', 'galeri')
            ->where('ref_id', $galeri->galeri_id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.galeri.show', compact('galeri', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        $media = Media::where('ref_table', 'galeri')
            ->where('ref_id', $galeri->galeri_id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.galeri.edit', compact('galeri', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // upload foto baru
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $key => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/galeri', $filename, 'public');

                Media::create([
                    'ref_table'  => 'galeri',
                    'ref_id'     => $galeri->galeri_id,
                    'file_name'  => $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // hapus semua media terkait
        $mediaFiles = Media::where('ref_table', 'galeri')
            ->where('ref_id', $galeri->galeri_id)
            ->get();

        foreach ($mediaFiles as $m) {
            $path = storage_path('app/public/uploads/galeri/' . $m->file_name);

            if (file_exists($path)) {
                unlink($path);
            }

            $m->delete();
        }

        // hapus data galeri
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil dihapus!');
    }

    /**
     * Hapus satu file media
     */
    public function deleteMedia(Media $media)
    {
        $path = storage_path('app/public/uploads/galeri/' . $media->file_name);

        if (file_exists($path)) {
            unlink($path);
        }

        $media->delete();

        return back()->with('success', 'Media berhasil dihapus!');
    }

    public function uploadMedia(Request $request, $id)
    {
        $request->validate([
            'foto.*' => 'required|file|mimes:jpg,jpeg,png,gif|max:4000',
        ]);

        $galeri = Galeri::findOrFail($id);

        foreach ($request->file('foto') as $key => $file) {

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/galeri', $filename, 'public');

            Media::create([
                'ref_table'  => 'galeri',
                'ref_id'     => $galeri->galeri_id,
                'file_name'  => $filename,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => Media::where('ref_table', 'galeri')
                    ->where('ref_id', $galeri->galeri_id)
                    ->max('sort_order') + 1,
            ]);
        }

        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

}
