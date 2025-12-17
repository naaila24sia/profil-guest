<?php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Media;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $searchableColumns = ['judul', 'lokasi', 'penyelenggara', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'];

        $agenda = Agenda::with('media')
            ->search($request, $searchableColumns)
            ->latest('tanggal_mulai')
            ->paginate(9)
            ->withQueryString();
        return view('pages.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('pages.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'           => 'required',
            'lokasi'          => 'required',
            'penyelenggara'   => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'deskripsi'       => 'required',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $agenda = Agenda::create([
            'judul'           => $request->judul,
            'lokasi'          => $request->lokasi,
            'penyelenggara'   => $request->penyelenggara,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi'       => $request->deskripsi,
        ]);

        // Upload FOTO COVER (SINGLE)
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $mime     = $file->getMimeType();

            // Simpan file fisik
            $file->storeAs('uploads/agenda', $filename, 'public');

            // Simpan ke tabel media
            Media::create([
                'ref_id'     => $agenda->agenda_id,
                'ref_table'  => 'agenda',
                'file_name'  => $filename,
                'mime_type'  => $mime,
                'sort_order' => 1,
                'caption'    => null,
            ]);
        }

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        $media  = Media::where('ref_table', 'agenda')
            ->where('ref_id', $id)
            ->first();

        return view('pages.agenda.edit', compact('agenda', 'media'));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'judul'           => 'required',
            'lokasi'          => 'required',
            'penyelenggara'   => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'deskripsi'       => 'required',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $agenda->update([
            'judul'           => $request->judul,
            'lokasi'          => $request->lokasi,
            'penyelenggara'   => $request->penyelenggara,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi'       => $request->deskripsi,
        ]);

        $media = Media::where('ref_table', 'agenda')->where('ref_id', $id)->first();

        // Jika upload foto baru
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $mime     = $file->getMimeType();

            // Simpan file baru
            $file->storeAs('uploads/agenda', $filename, 'public');

            if ($media) {
                // Update media lama
                $media->update([
                    'file_name' => $filename,
                    'mime_type' => $mime,
                ]);
            } else {
                // Buat media baru
                Media::create([
                    'ref_id'     => $id,
                    'ref_table'  => 'agenda',
                    'file_name'  => $filename,
                    'mime_type'  => $mime,
                    'sort_order' => 1,
                ]);
            }
        }

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        // hapus media jika ada
        Media::where('ref_table', 'agenda')->where('ref_id', $id)->delete();

        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
