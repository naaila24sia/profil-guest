<?php
namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil profil pertama (karena hanya 1 data)
        $profil = Profil::first();
        return view('pages.profil.index', compact('profil'));
    }

    public function create()
    {
        // Jika sudah ada profil, tidak boleh tambah lagi
        if (Profil::exists()) {
            return redirect()->route('profil.index')
                ->with('error', 'Profil sudah ada dan hanya boleh 1 data.');
        }

        return view('pages.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_desa'     => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'alamat_kantor' => 'required',
            'email'         => 'required|email',
            'telepon'       => 'required',
            'visi'          => 'required',
            'misi'          => 'required',
        ]);

        Profil::create($request->all());

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dibuat.');
    }

    public function edit()
    {
        $profil = Profil::firstOrFail();
        return view('pages.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::firstOrFail();

        $request->validate([
            'nama_desa'     => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'alamat_kantor' => 'required',
            'email'         => 'required|email',
            'telepon'       => 'required',
            'visi'          => 'required',
            'misi'          => 'required',
        ]);

        $profil->update($request->all());

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data profil berdasarkan ID
        $profil = Profil::findOrFail($id);

        // Hapus data
        $profil->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }

}
