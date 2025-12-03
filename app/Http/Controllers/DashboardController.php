<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Penjualan::query();

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_awal')) {
            $query->where('tanggal_penjualan', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->where('tanggal_penjualan', '<=', $request->tanggal_akhir);
        }

        // Ambil data penjualan
        $penjualan = $query->orderBy('tanggal_penjualan', 'asc')->get();

        // Hitung total penjualan (jumlah * harga)
        $totalPenjualan = $penjualan->sum(function ($item) {
            return $item->jumlah * $item->harga;
        });

        // Data untuk grafik - grouping berdasarkan tanggal
        $chartData = Penjualan::when($request->filled('tanggal_awal'), function ($q) use ($request) {
                $q->where('tanggal_penjualan', '>=', $request->tanggal_awal);
            })
            ->when($request->filled('tanggal_akhir'), function ($q) use ($request) {
                $q->where('tanggal_penjualan', '<=', $request->tanggal_akhir);
            })
            ->select(
                DB::raw('DATE(tanggal_penjualan) as tanggal'),
                DB::raw('SUM(jumlah * harga) as total')
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('dashboard', compact('penjualan', 'totalPenjualan', 'chartData'));
    }
}
