@extends('layouts.app')

@section('title', 'Detail Surat Keluar')
@section('page-title', 'Detail Surat Keluar')
@section('breadcrumb', 'Beranda / Surat Keluar / Detail')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div style="font-weight:600;font-size:15px">
                    <i class="bi bi-file-earmark-text text-success me-2"></i>Detail Surat Keluar
                </div>
                <div class="d-flex gap-2">
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('surat-keluar.edit', $suratKeluar) }}" class="btn btn-sm btn-warning text-white">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <form action="{{ route('surat-keluar.destroy', $suratKeluar) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                data-confirm="Yakin ingin menghapus surat ini?">
                            <i class="bi bi-trash me-1"></i> Hapus
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('surat-keluar.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- Header badge --}}
                <div class="d-flex gap-2 mb-4">
                    <span class="badge bg-success fs-6 px-3 py-2">{{ $suratKeluar->nomor_agenda }}</span>
                    <span class="badge bg-{{ $suratKeluar->sifat_badge_color }}">{{ $suratKeluar->sifat }}</span>
                    <span class="badge bg-{{ $suratKeluar->status_badge_color }}">{{ $suratKeluar->status }}</span>
                </div>

                @php
                $rows = [
                    ['Nomor Surat', $suratKeluar->nomor_surat],
                    ['Tanggal Surat', $suratKeluar->tanggal_surat->translatedFormat('d F Y')],
                    ['Tanggal Kirim', $suratKeluar->tanggal_kirim ? $suratKeluar->tanggal_kirim->translatedFormat('d F Y') : '-'],
                    ['Kepada / Tujuan', $suratKeluar->tujuan],
                    ['Nama Tujuan', $suratKeluar->nama_tujuan ?: '-'],
                    ['Perihal', $suratKeluar->perihal],
                    ['Penandatangan', $suratKeluar->penandatangan ?: '-'],
                    ['Lampiran', $suratKeluar->lampiran ?: '-'],
                    ['Tembusan', $suratKeluar->tembusan ?: '-'],
                    ['Catatan', $suratKeluar->catatan ?: '-'],
                    ['Diinput oleh', $suratKeluar->pembuat?->name ?? '-'],
                    ['Terakhir diubah oleh', $suratKeluar->pengubah?->name ?? '-'],
                ];
                @endphp

                <table class="table table-bordered" style="font-size:13.5px">
                    <tbody>
                        @foreach($rows as [$label, $val])
                        <tr>
                            <th style="width:35%;background:#f8fafc;font-size:12px;color:#475569;text-transform:uppercase;letter-spacing:.3px">{{ $label }}</th>
                            <td>{{ $val }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($suratKeluar->file_surat)
                <div class="mt-3">
                    <a href="{{ Storage::url($suratKeluar->file_surat) }}" target="_blank" class="btn btn-outline-success btn-sm">
                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Download File Surat
                    </a>
                </div>
                @endif
            </div>
            <div class="card-footer text-muted" style="font-size:12px">
                Dibuat: {{ $suratKeluar->created_at->translatedFormat('d F Y H:i') }} ·
                Diperbarui: {{ $suratKeluar->updated_at->translatedFormat('d F Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection