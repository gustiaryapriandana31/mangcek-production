<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\NamaUsaha;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahController extends Controller
{
    public function kecamatan()
    {
        return DB::table('kecamatan')
            ->select('kode_kecamatan', 'nama_kecamatan')
            ->orderBy('nama_kecamatan')
            ->get();
    }

    public function desa($kode_kecamatan)
    {
        return DB::table('desa')
            ->where('kode_kecamatan', $kode_kecamatan)
            ->select('kode_desa', 'nama_desa')
            ->orderBy('nama_desa')
            ->get();
    }

    // 🔥 LIST USAHA (SELECT2 + INFINITE SCROLL)
    public function listUsahaByDesa(Request $request, $kode_desa) {
        $page  = max((int) $request->get('page', 1), 1);
        $limit = 20;

        $query = DB::table('nama_usaha')
            ->where('kode_desa', $kode_desa)
            ->whereNotExists(function ($q) {
                $q->select(DB::raw(1))
                ->from('pencatatan_usaha')
                ->whereColumn(
                    'pencatatan_usaha.kode_nama_usaha',
                    'nama_usaha.kode_nama_usaha'
                );
            });

        if ($request->filled('q')) {
            $query->where('nama_usaha', 'like', '%' . $request->q . '%');
        }

        $total = (clone $query)->count();

        $results = $query
            ->orderBy('nama_usaha')
            ->forPage($page, $limit)
            ->get()
            ->map(fn ($row) => [
                'id'   => $row->kode_nama_usaha,
                'text' => $row->nama_usaha
            ]);

        return response()->json([
            'results' => $results,
            'pagination' => [
                'more' => ($page * $limit) < $total
            ]
        ]);
    }

    public function detailUsaha($kode_nama_usaha)
{
    $usaha = DB::table('nama_usaha')
        ->where('kode_nama_usaha', $kode_nama_usaha)
        ->first();

    if (!$usaha) {
        return response()->json([], 404);
    }

    return response()->json([
        'alamat' => $usaha->alamat?? '',
        'latitude' => $usaha->latitude ?? '',
        'longitude' => $usaha->longitude ?? '',
        'status_profiling_sbr' => $usaha->status_profiling_sbr ?? '',
    ]);
}

}
