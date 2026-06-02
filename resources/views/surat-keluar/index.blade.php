{{-- =====================================================================
   resources/views/surat-keluar/index.blade.php
   ===================================================================== --}}

@extends('layout.app')
@section('title', 'Agenda Surat Keluar')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="fw-bold mb-0">📤 Agenda Surat Keluar</h6>
        <div class="d-flex gap-2">
            <form method="GET" action="{{ route('surat-keluar.index') }}" class="d-flex gap-2">
                <input type="text" name="search" class="form-control form-control-sm"
                       placeholder="Cari perihal / no surat..." value="{{ request('search') }}">
                <button class="btn btn-sm btn-outline-secondary">Cari</button>
            </form>
            @if(session('user_role') === 'admin')
            <a href="{{ route('surat-keluar.create') }}" class="btn btn-sm btn-primary">
                + Tambah
            </a>
            @endif
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">#</th>
                        <th>No. Surat</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Sifat</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($surats as $i => $s)
                    <tr>
                        <td>{{ $surats->firstItem() + $i }}</td>
                        <td><code class="text-dark">{{ $s->no_surat }}</code></td>
                        <td>{{ \Carbon\Carbon::parse($s->tanggal_surat)->format('d/m/Y') }}</td>
                        <td>{{ $s->tujuan_surat }}</td>
                        <td>{{ Str::limit($s->perihal, 40) }}</td>
                        <td>
                            <span class="badge
                                {{ $s->sifat === 'Rahasia' ? 'bg-danger' : ($s->sifat === 'Penting' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                {{ $s->sifat }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('surat-keluar.show', $s) }}" class="btn btn-xs btn-outline-info btn-sm">Detail</a>
                            @if(session('user_role') === 'admin')
                            <a href="{{ route('surat-keluar.edit', $s) }}" class="btn btn-xs btn-outline-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('surat-keluar.destroy', $s) }}" class="d-inline"
                                  onsubmit="return confirm('Hapus surat ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-xs btn-outline-danger btn-sm">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data surat keluar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($surats->hasPages())
    <div class="card-footer bg-white">
        {{ $surats->links() }}
    </div>
    @endif
</div>
@endsection