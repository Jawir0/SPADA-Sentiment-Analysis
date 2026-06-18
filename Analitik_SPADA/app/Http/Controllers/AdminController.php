<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin() { return view('admin.login'); }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        
        // Cek login. Catatan: Password harus di-hash di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Login gagal!']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    // 1. Menampilkan tabel daftar ulasan
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.dashboard', compact('reviews'));
    }

    // 2. Fungsi untuk mengubah label sentimen secara manual
    public function updateSentiment(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->sentiment_label = $request->sentiment_label;
        $review->save();

        return redirect()->back()->with('success', 'Label berhasil diperbarui!');
    }

    // 3. Fungsi untuk menghapus data spam
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}