<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['profil_id']     = 1;
        $data['nama_desa']     = 'Bina Desa';
        $data['kecamatan']     = 'Cibubur';
        $data['kabupaten']     = 'Bogor';
        $data['provinsi']      = 'Jawa Barat';
        $data['alamat_kantor'] = 'Jl. Utama Desa No. 10, RT 01/RW 03';
        $data['email']         = 'bina.desa@gmail.com';
        $data['telepon']       = '0251-87654321';

        $data['visi']          = 'Mewujudkan Masyarakat Desa yang Sejahtera dan Mandiri melalui Inovasi dan Gotong Royong.';
        $data['misi']          = [
            'Meningkatkan Pertanian Lokal dengan Teknologi Tepat Guna',
            'Mengembangkan UMKM Desa dan Ekowisata',
            'Memperkuat Kualitas Pendidikan dan Sumber Daya Manusia',
            'Pelayanan Publik yang Cepat, Transparan, dan Ramah'
        ];

        $data['logo_path']     = 'images/profil/logo_desa.png';

        $data['tanggal_akses'] = date('d F Y H:i:s');

        // Mengirim semua data ($data) ke tampilan (view) profil-desa
        return view('profil-desa', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
