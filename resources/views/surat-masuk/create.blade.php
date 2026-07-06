@extends('layout.app')

@section('title', 'Tambah Surat Masuk')

@section('content')

<div class="container">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Surat Masuk</h5>
        </div>

```
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Surat</label>
                    <input
                        type="text"
                        name="no_surat"
                        class="form-control"
                        value="{{ old('no_surat') }}"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Sifat Surat</label>
                    <select name="sifat" class="form-select" required>
                        <option value="">-- Pilih Sifat --</option>
                        <option value="Biasa" {{ old('sifat') == 'Biasa' ? 'selected' : '' }}>
                            Biasa
                        </option>
                        <option value="Penting" {{ old('sifat') == 'Penting' ? 'selected' : '' }}>
                            Penting
                        </option>
                        <option value="Rahasia" {{ old('sifat') == 'Rahasia' ? 'selected' : '' }}>
                            Rahasia
                        </option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Surat</label>
                    <input
                        type="date"
                        name="tanggal_surat"
                        class="form-control"
                        value="{{ old('tanggal_surat') }}"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Terima</label>
                    <input
                        type="date"
                        name="tanggal_terima"
                        class="form-control"
                        value="{{ old('tanggal_terima') }}"
                        required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Asal Surat</label>
                    <input
                        type="text"
                        name="asal_surat"
                        class="form-control"
                        value="{{ old('asal_surat') }}"
                        required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Perihal</label>
                    <input
                        type="text"
                        name="perihal"
                        class="form-control"
                        value="{{ old('perihal') }}"
                        required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea
                        name="keterangan"
                        rows="4"
                        class="form-control">{{ old('keterangan') }}</textarea>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">
                        File Surat (PDF/JPG/JPEG/PNG - Maks 2MB)
                    </label>
                    <input
                        type="file"
                        name="file_surat"
                        class="form-control"
                        accept=".pdf,.jpg,.jpeg,.png">
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('surat-masuk.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>
```

</div>
@endsection
