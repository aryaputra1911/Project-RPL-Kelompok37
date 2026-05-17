<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Admin;
use App\Models\DetailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ─── LOGIN ──────────────────────────────────────────

    public function showLogin()
    {
        // Kalau sudah login sebagai admin, langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('Frontend Admin.loginadmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah!');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // ─── DASHBOARD ──────────────────────────────────────

    public function dashboard()
    {
        $totalAlat       = Alat::count();
        $totalPesanan    = Pemesanan::count();
        $sewaAktif       = Pemesanan::where('status', 'disewa')->count();
        $pesananTerbaru  = Pemesanan::with(['user', 'detailPemesanan.alat', 'transaksi'])
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // Hitung total pendapatan dari transaksi yang sudah lunas
        $totalPendapatan = Transaksi::where('status_bayar', 'lunas')->sum('total_biaya');

        // Distribusi alat (tanpa kategori, gunakan count total)
        $kategoriDistribusi = collect();

        // Hitung pesanan menunggu konfirmasi
        $menungguKonfirmasi = Pemesanan::where('status', 'menunggu_konfirmasi')->count();

        return view('Frontend Admin.dashboard', compact(
            'totalAlat',
            'totalPesanan',
            'sewaAktif',
            'pesananTerbaru',
            'totalPendapatan',
            'kategoriDistribusi',
            'menungguKonfirmasi'
        ));
    }

    // ─── PRODUK ─────────────────────────────────────────

    public function produk(Request $request)
    {
        $query = Alat::query();

        // Kategori sudah dihapus dari tabel alat

        if ($request->filled('search')) {
            $query->where('nama_alat', 'like', '%' . $request->search . '%');
        }

        $alats = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('Frontend Admin.produk', compact('alats'));
    }

    public function tambahProdukForm()
    {
        return view('Frontend Admin.tambahproduk');
    }

    public function tambahProduk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = [
            'nama_alat'     => $request->nama_produk,
            'harga_per_hari'=> $request->harga,
            'deskripsi'     => $request->deskripsi,
            'stok'          => $request->stok,
        ];

        if ($request->hasFile('gambar')) {
            $data['foto'] = $request->file('gambar')->store('produk', 'public');
        }

        Alat::create($data);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function editProdukForm($id)
    {
        $alat = Alat::findOrFail($id);
        return view('Frontend Admin.editproduk', compact('alat'));
    }

    public function updateProduk(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $alat->nama_alat     = $request->nama_produk;
        $alat->harga_per_hari = $request->harga;
        $alat->deskripsi     = $request->deskripsi;
        $alat->stok          = $request->stok;

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada
            if ($alat->foto && Storage::disk('public')->exists($alat->foto)) {
                Storage::disk('public')->delete($alat->foto);
            }
            $alat->foto = $request->file('gambar')->store('produk', 'public');
        }

        $alat->save();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function hapusProduk($id)
    {
        $alat = Alat::findOrFail($id);

        if ($alat->foto && Storage::disk('public')->exists($alat->foto)) {
            Storage::disk('public')->delete($alat->foto);
        }

        $alat->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus!');
    }

    // ─── PESANAN ────────────────────────────────────────

    public function pesanan(Request $request)
    {
        $query = Pemesanan::with(['user', 'detailPemesanan.alat', 'transaksi']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pesanans = $query->orderBy('created_at', 'desc')->paginate(10);
        $totalPesanan = Pemesanan::count();

        // Hitung per status untuk badge
        $countBelumBayar = Pemesanan::where('status', 'belum_bayar')->count();
        $countMenunggu   = Pemesanan::where('status', 'menunggu_konfirmasi')->count();
        $countDikonfirmasi = Pemesanan::where('status', 'dikonfirmasi')->count();
        $countDisewa     = Pemesanan::where('status', 'disewa')->count();
        $countSelesai    = Pemesanan::where('status', 'selesai')->count();

        return view('Frontend Admin.pesanan', compact(
            'pesanans', 'totalPesanan',
            'countBelumBayar', 'countMenunggu', 'countDikonfirmasi', 'countDisewa', 'countSelesai'
        ));
    }

    public function updateStatusPesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:belum_bayar,menunggu_konfirmasi,dikonfirmasi,disewa,selesai',
        ]);

        $pesanan->status = $request->status;
        $pesanan->save();

        // Update status transaksi juga
        if ($pesanan->transaksi) {
            if ($request->status == 'dikonfirmasi' || $request->status == 'disewa' || $request->status == 'selesai') {
                $pesanan->transaksi->status_bayar = 'lunas';
            } else {
                $pesanan->transaksi->status_bayar = $request->status;
            }
            $pesanan->transaksi->save();
        }

        $statusLabels = [
            'belum_bayar' => 'Belum Dibayar',
            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
            'dikonfirmasi' => 'Dikonfirmasi',
            'disewa' => 'Sedang Disewa',
            'selesai' => 'Selesai',
        ];

        return back()->with('success', 'Status pesanan berhasil diubah ke "' . ($statusLabels[$request->status] ?? $request->status) . '"!');
    }
}
