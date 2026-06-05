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
               value="{{ old('nomor_agenda', $sm->nomor_agenda ?? '') }}" required>
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

    <div class="col-md-12">
        <label class="form-label">Asal / Instansi Pengirim <span class="text-danger">*</span></label>
        <input type="text" name="asal_surat" class="form-control @error('asal_surat') is-invalid @enderror"
               value="{{ old('asal_surat', $sm->asal_surat ?? '') }}"
               placeholder="Nama instansi pengirim" required>
        @error('asal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-12">
        <label class="form-label">Perihal <span class="text-danger">*</span></label>
        <textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror"
                  rows="2" required>{{ old('perihal', $sm->perihal ?? '') }}</textarea>
        @error('perihal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-12">
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