@php $sm = $suratMasuk ?? null; @endphp

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
               value="{{ old('nomor_agenda', $sm->nomor_agenda ?? $nomorAgenda ?? '') }}" required>
        @error('nomor_agenda')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Nomor Surat <span class="text-danger">*</span></label>
        <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
               value="{{ old('nomor_surat', $sm->nomor_surat ?? '') }}"
               placeholder="Contoh: B-100/Kemendagri/2025" required>
        @error('nomor_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
               value="{{ old('tanggal_surat', $sm?->tanggal_surat?->format('Y-m-d') ?? '') }}" required>
        @error('tanggal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Tanggal Diterima <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_terima" class="form-control @error('tanggal_terima') is-invalid @enderror"
               value="{{ old('tanggal_terima', $sm?->tanggal_terima?->format('Y-m-d') ?? date('Y-m-d')) }}" required>
        @error('tanggal_terima')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Asal / Instansi Pengirim <span class="text-danger">*</span></label>
        <input type="text" name="asal_surat" class="form-control @error('asal_surat') is-invalid @enderror"
               value="{{ old('asal_surat', $sm->asal_surat ?? '') }}"
               placeholder="Nama instansi pengirim" required>
        @error('asal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Nama Pengirim</label>
        <input type="text" name="nama_pengirim" class="form-control"
               value="{{ old('nama_pengirim', $sm->nama_pengirim ?? '') }}"
               placeholder="Nama pejabat">
    </div>

    <div class="col-12">
        <label class="form-label">Perihal <span class="text-danger">*</span></label>
        <textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror"
                  rows="2" placeholder="Isi perihal surat" required>{{ old('perihal', $sm->perihal ?? '') }}</textarea>
        @error('perihal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Sifat Surat <span class="text-danger">*</span></label>
        <select name="sifat" class="form-select" required>
            @foreach(['Biasa','Penting','Rahasia','Sangat Rahasia'] as $opt)
            <option value="{{ $opt }}" {{ old('sifat', $sm->sifat ?? 'Biasa') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-select" required>
            @foreach(['Diterima','Disposisi','Proses','Selesai'] as $opt)
            <option value="{{ $opt }}" {{ old('status', $sm->status ?? 'Diterima') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Lampiran</label>
        <input type="text" name="lampiran" class="form-control"
               value="{{ old('lampiran', $sm->lampiran ?? '') }}"
               placeholder="Jumlah / jenis lampiran">
    </div>

    <div class="col-md-6">
        <label class="form-label">Disposisi Kepada</label>
        <input type="text" name="disposisi_kepada" class="form-control"
               value="{{ old('disposisi_kepada', $sm->disposisi_kepada ?? '') }}"
               placeholder="Nama pejabat yang mendapat disposisi">
    </div>
    <div class="col-md-6">
        <label class="form-label">Isi Disposisi</label>
        <input type="text" name="isi_disposisi" class="form-control"
               value="{{ old('isi_disposisi', $sm->isi_disposisi ?? '') }}"
               placeholder="Instruksi disposisi">
    </div>

    <div class="col-md-8">
        <label class="form-label">Catatan</label>
        <textarea name="catatan" class="form-control" rows="2"
                  placeholder="Catatan tambahan">{{ old('catatan', $sm->catatan ?? '') }}</textarea>
    </div>
    <div class="col-md-4">
        <label class="form-label">Upload File Surat</label>
        <input type="file" name="file_surat" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        <small class="text-muted">PDF/JPG/PNG, maks 5MB</small>
        @if($sm?->file_surat)
        <div class="mt-1">
            <a href="{{ Storage::url($sm->file_surat) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-file-earmark"></i> File Saat Ini
            </a>
        </div>
        @endif
    </div>
</div>