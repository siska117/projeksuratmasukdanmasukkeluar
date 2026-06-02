@php $sk = $suratKeluar ?? null; @endphp

@if($errors->any())
<div class="alert alert-danger py-2 mb-3">
    <ul class="mb-0 ps-3">
        @foreach($errors->all() as $err)
        <li style="font-size:13px">{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nomor Agenda <span class="text-danger">*</span></label>
        <input type="text" name="nomor_agenda" class="form-control @error('nomor_agenda') is-invalid @enderror"
               value="{{ old('nomor_agenda', $sk->nomor_agenda ?? $nomorAgenda ?? '') }}" required>
        @error('nomor_agenda')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Nomor Surat <span class="text-danger">*</span></label>
        <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
               value="{{ old('nomor_surat', $sk->nomor_surat ?? '') }}"
               placeholder="Contoh: 005/Kasbangpol/V/2025" required>
        @error('nomor_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
               value="{{ old('tanggal_surat', $sk?->tanggal_surat?->format('Y-m-d') ?? date('Y-m-d')) }}" required>
        @error('tanggal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Tanggal Kirim</label>
        <input type="date" name="tanggal_kirim" class="form-control @error('tanggal_kirim') is-invalid @enderror"
               value="{{ old('tanggal_kirim', $sk?->tanggal_kirim?->format('Y-m-d') ?? '') }}">
        @error('tanggal_kirim')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Kepada / Instansi Tujuan <span class="text-danger">*</span></label>
        <input type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror"
               value="{{ old('tujuan', $sk->tujuan ?? '') }}"
               placeholder="Nama instansi/pihak tujuan" required>
        @error('tujuan')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Nama Tujuan (Singkat)</label>
        <input type="text" name="nama_tujuan" class="form-control"
               value="{{ old('nama_tujuan', $sk->nama_tujuan ?? '') }}"
               placeholder="Para Camat, Bupati, dll">
    </div>

    <div class="col-12">
        <label class="form-label">Perihal <span class="text-danger">*</span></label>
        <textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror"
                  rows="2" placeholder="Isi perihal surat" required>{{ old('perihal', $sk->perihal ?? '') }}</textarea>
        @error('perihal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Sifat Surat <span class="text-danger">*</span></label>
        <select name="sifat" class="form-select" required>
            @foreach(['Biasa','Penting','Rahasia','Sangat Rahasia'] as $opt)
            <option value="{{ $opt }}" {{ old('sifat', $sk->sifat ?? 'Biasa') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-select" required>
            @foreach(['Konsep','Ditandatangani','Terkirim'] as $opt)
            <option value="{{ $opt }}" {{ old('status', $sk->status ?? 'Konsep') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Penandatangan</label>
        <input type="text" name="penandatangan" class="form-control"
               value="{{ old('penandatangan', $sk->penandatangan ?? '') }}"
               placeholder="Nama pejabat yang TTD">
    </div>
    <div class="col-md-3">
        <label class="form-label">Lampiran</label>
        <input type="text" name="lampiran" class="form-control"
               value="{{ old('lampiran', $sk->lampiran ?? '') }}"
               placeholder="Jumlah / jenis lampiran">
    </div>

    <div class="col-md-8">
        <label class="form-label">Tembusan</label>
        <input type="text" name="tembusan" class="form-control"
               value="{{ old('tembusan', $sk->tembusan ?? '') }}"
               placeholder="Bupati, Sekda, Arsip, dll">
    </div>
    <div class="col-md-4">
        <label class="form-label">Catatan</label>
        <textarea name="catatan" class="form-control" rows="2"
                  placeholder="Catatan tambahan">{{ old('catatan', $sk->catatan ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Upload File Surat</label>
        <input type="file" name="file_surat" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        <small class="text-muted">PDF/JPG/PNG, maks 5MB</small>
        @if($sk?->file_surat)
        <div class="mt-1">
            <a href="{{ Storage::url($sk->file_surat) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-file-earmark"></i> File Saat Ini
            </a>
        </div>
        @endif
    </div>
</div>