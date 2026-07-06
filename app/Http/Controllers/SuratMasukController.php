<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
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

        $query = SuratMasuk::latest();

        if ($request->search) {
            $query->where('perihal', 'like', '%'.$request->search.'%')
                  ->orWhere('nomor_surat', 'like', '%'.$request->search.'%')
                  ->orWhere('nomor_agenda', 'like', '%'.$request->search.'%')
                  ->orWhere('asal_surat', 'like', '%'.$request->search.'%');
        }

        $surats = $query->paginate(10);

        return view('surat-masuk.index', compact('surats'));
    }

    public function create()
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();

        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();

        $validated = $request->validate([
            'nomor_surat'    => 'required',
            'tanggal_surat'  => 'required|date',
            'tanggal_terima' => 'required|date',
            'asal_surat'     => 'required|string|max:200',
            'perihal'        => 'required|string|max:255',
            'file_surat'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')
                ->store('surat-masuk', 'public');
        }

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        if ($redir = $this->cekLogin()) return $redir;

        return view('surat-masuk.show', compact('suratMasuk'));
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();

        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();

        $validated = $request->validate([
            'nomor_agenda'   => 'required|string|max:100',
            'nomor_surat'    => 'required|string|max:100',
            'tanggal_surat'  => 'required|date',
            'tanggal_terima' => 'required|date',
            'asal_surat'     => 'required|string|max:200',
            'perihal'        => 'required|string|max:255',
            'file_surat'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')
                ->store('surat-masuk', 'public');
        }

        $suratMasuk->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($redir = $this->cekLogin()) return $redir;
        $this->cekAdmin();

        $suratMasuk->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}