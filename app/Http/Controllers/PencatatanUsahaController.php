<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanUsaha;

class PencatatanUsahaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kode_nama_usaha' => 'required|exists:nama_usaha,kode_nama_usaha',
            'status_usaha' => 'required|in:tidak_ditemukan,ditemukan,tutup,ganda',
            'photo'          => 'required|image|max:2048',
            'latitude'       => 'required',
            'longitude'      => 'required',
            'nama_petugas'   => 'required',
        ]);

        // upload foto
        $path = $request->file('photo')->store('foto-usaha', 'public');

        PencatatanUsaha::create([
            'kode_nama_usaha' => $request->kode_nama_usaha,
            'status_usaha'    => $request->status_usaha,
            'photo_path'      => $path,
            'latitude'        => $request->latitude,
            'longitude'       => $request->longitude,
            'nama_petugas'    => $request->nama_petugas,
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }
}
