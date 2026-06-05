@extends('layout.app')

@section('title', 'Edit Surat Keluar')
@section('page-title', 'Edit Surat Keluar')
@section('breadcrumb', 'Beranda / Surat Keluar / Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <div style="font-weight:600;font-size:15px">
                    <i class="bi bi-pencil-square text-warning me-2"></i>Edit Surat Keluar — {{ $suratKeluar->nomor_agenda }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('surat-keluar.update', $suratKeluar) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('surat-keluar._form')
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('surat-keluar.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection