@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Beranda / Dashboard')

@section('content')
{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card h-100">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div class="stat-num text-primary">{{ $stats['total_masuk'] }}</div>
                    <div class="stat-lbl">Total Surat Masuk</div>
                </div>
                <div class="stat-icon" style="background:#eff6ff">
                    <i class="bi bi-envelope-open text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card h-100">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div class="stat-num" style="color:#0f6e56">{{ $stats['total_keluar'] }}</div>
                    <div class="stat-lbl">Total Surat Keluar</div>
                </div>
                <div class="stat-icon" style="background:#ecfdf5">
                    <i class="bi bi-send" style="color:#0f6e56"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card h-100">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div class="stat-num" style="color:#b45309">{{ $stats['masuk_bulan_ini'] + $stats['keluar_bulan_ini'] }}</div>
                    <div class="stat-lbl">Surat Bulan Ini</div>
                </div>
                <div class="stat-icon" style="background:#fffbeb">
                    <i class="bi bi-calendar3" style="color:#b45309"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card h-100">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <div class="stat-num text-danger">{{ $stats['masuk_proses'] }}</div>
                    <div class="stat-lbl">Sedang Diproses</div>
                </div>
                <div class="stat-icon" style="background:#fff1f2">
                    <i class="bi bi-hourglass-split text-danger"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    {{-- Surat Masuk Terbaru --}}
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="fw-600" style="font-weight:600;font-size:14px">
                    <i class="bi bi-envelope-open text-primary me-2"></i>Surat Masuk Terbaru
                </div>
                <a href="{{ route('surat-masuk.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No. Agenda</th>
                            <th>Dari</th>
                            <th>Perihal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suratMasukTerbaru as $s)
                        <tr>
                            <td><a href="{{ route('surat-masuk.show', $s) }}" class="text-primary fw-semibold text-decoration-none">{{ $s->nomor_agenda }}</a></td>
                            <td style="max-width:130px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->asal_surat }}</td>
                            <td style="max-width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->perihal }}</td>
                            <td>
                                <span class="badge bg-{{ $s->status_badge_color }}">{{ $s->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">Belum ada surat masuk</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Sidebar info --}}
    <div class="col-lg-5">
        {{-- Status Masuk --}}
        <div class="card mb-3">
            <div class="card-header">
                <div style="font-weight:600;font-size:14px"><i class="bi bi-pie-chart me-2 text-primary"></i>Status Surat Masuk</div>
            </div>
            <div class="card-body">
                @foreach(['Diterima' => 'secondary', 'Disposisi' => 'info', 'Proses' => 'warning', 'Selesai' => 'success'] as $status => $color)
                @php $jumlah = $statusMasuk[$status] ?? 0; $pct = $stats['total_masuk'] > 0 ? round($jumlah / $stats['total_masuk'] * 100) : 0; @endphp
                <div class="mb-2">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-size:12.5px">{{ $status }}</span>
                        <span style="font-size:12px;font-weight:600">{{ $jumlah }}</span>
                    </div>
                    <div class="progress" style="height:6px;border-radius:4px">
                        <div class="progress-bar bg-{{ $color }}" style="width:{{ $pct }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Surat Keluar Terbaru --}}
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div style="font-weight:600;font-size:14px"><i class="bi bi-send me-2" style="color:#0f6e56"></i>Surat Keluar Terbaru</div>
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <tbody>
                        @forelse($suratKeluarTerbaru as $s)
                        <tr>
                            <td>
                                <div class="fw-semibold text-success" style="font-size:12.5px">{{ $s->nomor_agenda }}</div>
                                <div style="font-size:12px;color:#64748b;max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $s->perihal }}</div>
                            </td>
                            <td class="text-end">
                                <span class="badge bg-{{ $s->status_badge_color }}">{{ $s->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td class="text-center text-muted py-3">Belum ada surat keluar</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection