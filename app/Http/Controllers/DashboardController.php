<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bulanIni   = Carbon::now()->month;
        $tahunIni   = Carbon::now()->year;

        $stats = [
            'total_masuk'        => SuratMasuk::count(),
            'total_keluar'       => SuratKeluar::count(),
            'masuk_bulan_ini'    => SuratMasuk::whereMonth('tanggal_terima', $bulanIni)
                                               ->whereYear('tanggal_terima', $tahunIni)->count(),
            'keluar_bulan_ini'   => SuratKeluar::whereMonth('tanggal_surat', $bulanIni)
                                                ->whereYear('tanggal_surat', $tahunIni)->count(),
            'masuk_proses'       => SuratMasuk::whereIn('status', ['Diterima', 'Disposisi', 'Proses'])->count(),
            'keluar_konsep'      => SuratKeluar::whereIn('status', ['Konsep', 'Ditandatangani'])->count(),
        ];

        // Rekap 6 bulan terakhir
        $rekapBulanan = [];
        for ($i = 5; $i >= 0; $i--) {
            $tgl    = Carbon::now()->subMonths($i);
            $masuk  = SuratMasuk::whereMonth('tanggal_terima', $tgl->month)
                                 ->whereYear('tanggal_terima', $tgl->year)->count();
            $keluar = SuratKeluar::whereMonth('tanggal_surat', $tgl->month)
                                  ->whereYear('tanggal_surat', $tgl->year)->count();
            $rekapBulanan[] = [
                'bulan'  => $tgl->translatedFormat('M Y'),
                'masuk'  => $masuk,
                'keluar' => $keluar,
            ];
        }

        // Surat masuk terbaru
        $suratMasukTerbaru = SuratMasuk::with('pembuat')
                                        ->latest()
                                        ->take(5)
                                        ->get();

        // Surat keluar terbaru
        $suratKeluarTerbaru = SuratKeluar::with('pembuat')
                                          ->latest()
                                          ->take(5)
                                          ->get();

        // Status surat masuk
        $statusMasuk = SuratMasuk::select('status', DB::raw('count(*) as total'))
                                   ->groupBy('status')
                                   ->pluck('total', 'status');

        return view('dashboard.index', compact(
            'stats', 'rekapBulanan', 'suratMasukTerbaru', 'suratKeluarTerbaru', 'statusMasuk'
        ));
    }
}