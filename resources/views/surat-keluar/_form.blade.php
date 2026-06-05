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

    <!-- Nomor Agenda -->
    <div class="col-md-6">
        <label class="form-label">Nomor Agenda <span class="text-danger">*</span></label>
        <input type="text" name="nomor_agenda"
               class="form-control @error('nomor_agenda') is-invalid @enderror"
               value="{{ old('nomor_agenda', $sk->nomor_agenda ?? $nomorAgenda ?? '') }}"
               required>
        @error('nomor_agenda')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Nomor Surat -->
    <div class="col-md-6">
        <label class="form-label">Nomor Surat <span class="text-danger">*</span></label>
        <input type="text" name="nomor_surat"
               class="form-control @error('nomor_surat') is-invalid @enderror"
               value="{{ old('nomor_surat', $sk->nomor_surat ?? '') }}"
               placeholder="Contoh: 005/Kasbangpol/V/2025"
               required>
        @error('nomor_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Tanggal Surat -->
    <div class="col-md-6">
        <label class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_surat"
               class="form-control @error('tanggal_surat') is-invalid @enderror"
               value="{{ old('tanggal_surat', $sk?->tanggal_surat?->format('Y-m-d') ?? date('Y-m-d')) }}"
               required>
        @error('tanggal_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Tanggal Kirim -->
    <div class="col-md-6">
        <label class="form-label">Tanggal Kirim</label>
        <input type="date" name="tanggal_kirim"
               class="form-control @error('tanggal_kirim') is-invalid @enderror"
               value="{{ old('tanggal_kirim', $sk?->tanggal_kirim?->format('Y-m-d') ?? '') }}">
        @error('tanggal_kirim')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Perihal -->
    <div class="col-12">
        <label class="form-label">Perihal <span class="text-danger">*</span></label>
        <textarea name="perihal"
                  class="form-control @error('perihal') is-invalid @enderror"
                  rows="2"
                  required>{{ old('perihal', $sk->perihal ?? '') }}</textarea>
        @error('perihal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Sifat Surat -->
    <div class="col-md-4">
        <label class="form-label">Sifat Surat <span class="text-danger">*</span></label>
        <select name="sifat" class="form-select" required>
            @foreach(['Biasa','Penting','Rahasia'] as $opt)
            <option value="{{ $opt }}"
                {{ old('sifat', $sk->sifat ?? 'Biasa') == $opt ? 'selected' : '' }}>
                {{ $opt }}
            </option>
            @endforeach
        </select>
    </div>

</div>