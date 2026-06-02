
@extends('layout.app')
@section('title', 'Tambah Surat Keluar')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px">
    <div class="card-header bg-white py-3">
        <h6 class="fw-bold mb-0">📤 Tambah Surat Keluar</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('surat-keluar.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">No. Surat *</label>
                    <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"
                           value="{{ old('no_surat') }}" required>
                    @error('no_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sifat Surat *</label>
                    <select name="sifat" class="form-select @error('sifat') is-invalid @enderror" required>
                        @foreach(['Biasa','Penting','Rahasia'] as $opt)
                        <option value="{{ $opt }}" {{ old('sifat') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                    @error('sifat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Surat *</label>
                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
                           value="{{ old('tanggal_surat') }}" required>
                    @error('tanggal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tujuan Surat *</label>
                    <input type="text" name="tujuan_surat" class="form-control @error('tujuan_surat') is-invalid @enderror"
                           value="{{ old('tujuan_surat') }}" required>
                    @error('tujuan_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Perihal *</label>
                    <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"
                           value="{{ old('perihal') }}" required>
                    @error('perihal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">File Surat (PDF/JPG/PNG, maks. 2MB)</label>
                    <input type="file" name="file_surat" class="form-control @error('file_surat') is-invalid @enderror"
                           accept=".pdf,.jpg,.jpeg,.png">
                    @error('file_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
