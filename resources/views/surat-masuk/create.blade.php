@extends('layout.app')
@section('title', 'Tambah Surat Masuk')
@section('content')
<div class="card border-0 shadow-sm" style="max-width:700px">
    <div class="card-header bg-white py-3">
        <h6 class="fw-bold mb-0">📥 Tambah Surat Masuk</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('surat-masuk.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">No. Surat <span class="text-danger">*</span></label>
                    <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"
                           value="{{ old('no_surat') }}" required>
                    @error('no_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sifat Surat <span class="text-danger">*</span></label>
                    <select name="sifat" class="form-select @error('sifat') is-invalid @enderror" required>
                        @foreach(['Biasa','Penting','Rahasia'] as $s)
                        <option value="{{ $s }}" {{ old('sifat') == $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    @error('sifat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Surat <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
                           value="{{ old('tanggal_surat') }}" required>
                    @error('tanggal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Terima <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_terima" class="form-control @error('tanggal_terima') is-invalid @enderror"
                           value="{{ old('tanggal_terima') }}" required>
                    @error('tanggal_terima')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Asal Surat <span class="text-danger">*</span></label>
                    <input type="text" name="asal_surat" class="form-control @error('asal_surat') is-invalid @enderror"
                           value="{{ old('asal_surat') }}" required>
                    @error('asal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Perihal <span class="text-danger">*</span></label>
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
                <a href="{{ route('surat-masuk.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection