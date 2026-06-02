<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('user')) return redirect()->route('dashboard');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role,
            ]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (!session('user')) return redirect()->route('login');
        $totalMasuk = \App\Models\SuratMasuk::count();
        $totalKeluar = \App\Models\SuratKeluar::count();
        return view('dashboard', compact('totalMasuk', 'totalKeluar'));
    }
}