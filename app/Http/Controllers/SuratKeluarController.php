<?php
// File: app/Http/Controllers/SuratKeluarController.php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    private function cekLogin()
    {
        if (!session('user')) return redirect()->route('login');
        return null;
    }

    private function cekAdmin()
    {
        if (session('user_role') !== 'admin') abort(403, 'Akses ditolak.');
        return null;
    }

    public function index(Request $request)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $query = SuratKeluar::latest();
        if ($request->search) {
            $query->where('perihal', 'like', '%'.$request->search.'%')
                  ->orWhere('no_surat', 'like', '%'.$request->search.'%')
                  ->orWhere('tujuan_surat', 'like', '%'.$request->search.'%');
        }
        $surats = $query->paginate(10);
        return view('surat-keluar.index', compact('surats'));
    }

    public function create()
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();
        $validated = $request->validate([
            'no_surat'      => 'required|string|max:100',
            'tanggal_surat' => 'required|date',
            'tujuan_surat'  => 'required|string|max:200',
            'perihal'       => 'required|string|max:255',
            'sifat'         => 'required|in:Biasa,Penting,Rahasia',
            'keterangan'    => 'nullable|string',
            'file_surat'    => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')
                ->store('surat-keluar', 'public');
        }

        SuratKeluar::create($validated);
        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show(SuratKeluar $suratKeluar)
    {
        if ($redir = $this->cekLogin()) return $redir;
        return view('surat-keluar.show', compact('suratKeluar'));
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();
        $validated = $request->validate([
            'no_surat'      => 'required|string|max:100',
            'tanggal_surat' => 'required|date',
            'tujuan_surat'  => 'required|string|max:200',
            'perihal'       => 'required|string|max:255',
            'sifat'         => 'required|in:Biasa,Penting,Rahasia',
            'keterangan'    => 'nullable|string',
            'file_surat'    => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')
                ->store('surat-keluar', 'public');
        }

        $suratKeluar->update($validated);
        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();
        $suratKeluar->delete();
        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}