<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::with('logo')->first();
        return view('pages.profil.index', compact('profil'));
    }

    public function create()
    {
        // hanya boleh 1 profil
        if (Profil::exists()) {
            return redirect()->route('profil.index')
                ->with('error', 'Profil sudah ada dan hanya boleh satu data.');
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
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // simpan profil
        $profil = Profil::create($request->except('logo'));

        // simpan logo jika ada
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();

            // simpan ke public/storage/uploads/profil
            $file->storeAs('uploads/profil', $fileName, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => $fileName,
            ]);
        }

        return redirect()->route('profil.index')
            ->with('success', 'Profil berhasil dibuat.');
    }

    public function edit()
    {
        $profil = Profil::with('logo')->firstOrFail();
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
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update profil
        $profil->update($request->except('logo'));

        // jika upload logo baru
        if ($request->hasFile('logo')) {

            // ambil logo lama
            $oldLogo = Media::where('ref_table', 'profil')
                ->where('ref_id', $profil->profil_id)
                ->first();

            // hapus logo lama (file + db)
            if ($oldLogo && $oldLogo->file_name) {
                Storage::disk('public')->delete('uploads/profil/' . $oldLogo->file_name);
                $oldLogo->delete();
            }

            // simpan logo baru
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('uploads/profil', $fileName, 'public');

            Media::create([
                'ref_table' => 'profil',
                'ref_id'    => $profil->profil_id,
                'file_name' => $fileName,
            ]);
        }

        return redirect()->route('profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);

        // hapus logo
        $logo = Media::where('ref_table', 'profil')
            ->where('ref_id', $profil->profil_id)
            ->first();

        if ($logo && $logo->file_name) {
            Storage::disk('public')->delete('uploads/profil/' . $logo->file_name);
            $logo->delete();
        }

        $profil->delete();

        return redirect()->route('profil.index')
            ->with('success', 'Profil berhasil dihapus.');
    }
}
