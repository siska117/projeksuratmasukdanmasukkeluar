@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="background:#e8f0fb;border-radius:12px;width:56px;height:56px;
                            display:flex;align-items:center;justify-content:center;font-size:1.8rem">📥</div>
                <div>
                    <div class="text-muted small">Total Surat Masuk</div>
                    <div class="fw-bold fs-3 text-primary">{{ $totalMasuk }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="background:#fef3e2;border-radius:12px;width:56px;height:56px;
                            display:flex;align-items:center;justify-content:center;font-size:1.8rem">📤</div>
                <div>
                    <div class="text-muted small">Total Surat Keluar</div>
                    <div class="fw-bold fs-3 text-warning">{{ $totalKeluar }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h6 class="fw-semibold mb-0">Selamat datang, {{ session('user_name') }}!</h6>
        <p class="text-muted mb-0 small mt-1">
            Anda login sebagai <strong>{{ ucfirst(session('user_role')) }}</strong>.
            @if(session('user_role') === 'admin')
                Anda dapat mengelola surat masuk dan keluar secara penuh.
            @else
                Anda dapat melihat agenda surat masuk dan keluar.
            @endif
        </p>
    </div>
</div>
@endsection