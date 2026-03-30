<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMatcha;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DataMatcha::select([
                'idsbr',
                'nama_usaha',
                'alamat_usaha',
                'nmkec',
                'nmdesa',
                'kdkec',
                'kddesa',
                'kode_wilayah',
                'gc_username',
                'gcs_result',
                'latitude_gc',
                'longitude_gc',
            ]);

           return DataTables::of($query)
    ->addIndexColumn()
    ->filter(function ($query) use ($request) {
    if ($request->search['value'] ?? false) {
        $keyword = $request->search['value'];

        if (strlen($keyword) >= 2) {
            $query->where('nama_usaha', 'like', "{$keyword}%");
        }
    }
}, true)
    ->make(true);
        }

        return view('dashboard.dashboard');
    }
}
