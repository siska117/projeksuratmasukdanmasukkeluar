@extends('layouts.app')

@section('title', 'Detail Surat Masuk')
@section('page-title', 'Detail Surat Masuk')
@section('breadcrumb', 'Beranda / Surat Masuk / Detail')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div style="font-weight:600;font-size:15px">
                    <i class="bi bi-file-earmark-text text-primary me-2"></i>Detail Surat Masuk
                </div>
                <div class="d-flex gap-2">
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('surat-masuk.edit', $suratMasuk) }}" class="btn btn-sm btn-warning text-white">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <form action="{{ route('surat-masuk.destroy', $suratMasuk) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                data-confirm="Yakin ingin menghapus surat ini?">
                            <i class="bi bi-trash me-1"></i> Hapus
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('surat-masuk.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- Header badge --}}
                <div class="d-flex gap-2 mb-4">
                    <span class="badge bg-primary fs-6 px-3 py-2">{{ $suratMasuk->nomor_agenda }}</span>
                    <span class="badge bg-{{ $suratMasuk->sifat_badge_color }}">{{ $suratMasuk->sifat }}</span>
                    <span class="badge bg-{{ $suratMasuk->status_badge_color }}">{{ $suratMasuk->status }}</span>
                </div>

                @php
                $rows = [
                    ['Nomor Surat', $suratMasuk->nomor_surat],
                    ['Tanggal Surat', $suratMasuk->tanggal_surat->translatedFormat('d F Y')],
                    ['Tanggal Diterima', $suratMasuk->tanggal_terima->translatedFormat('d F Y')],
                    ['Asal / Instansi Pengirim', $suratMasuk->asal_surat],
                    ['Nama Pengirim', $suratMasuk->nama_pengirim ?: '-'],
                    ['Perihal', $suratMasuk->perihal],
                    ['Lampiran', $suratMasuk->lampiran ?: '-'],
                    ['Disposisi Kepada', $suratMasuk->disposisi_kepada ?: '-'],
                    ['Isi Disposisi', $suratMasuk->isi_disposisi ?: '-'],
                    ['Catatan', $suratMasuk->catatan ?: '-'],
                    ['Diinput oleh', $suratMasuk->pembuat?->name ?? '-'],
                    ['Terakhir diubah oleh', $suratMasuk->pengubah?->name ?? '-'],
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

                @if($suratMasuk->file_surat)
                <div class="mt-3">
                    <a href="{{ Storage::url($suratMasuk->file_surat) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Download File Surat
                    </a>
                </div>
                @endif
            </div>
            <div class="card-footer text-muted" style="font-size:12px">
                Dibuat: {{ $suratMasuk->created_at->translatedFormat('d F Y H:i') }} ·
                Diperbarui: {{ $suratMasuk->updated_at->translatedFormat('d F Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection