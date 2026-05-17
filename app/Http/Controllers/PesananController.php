<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Checkout: simpan pesanan dari keranjang ke database.
     * Dipanggil saat user klik "Bayar Sekarang" di halaman formulir.
     * Status awal: belum_bayar
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'items'       => 'required|array|min:1',
            'items.*.id_alat'  => 'nullable|integer',
            'items.*.nama'     => 'nullable|string|max:255',
            'items.*.jumlah'   => 'required|integer|min:1',
            'items.*.harga'    => 'required|numeric|min:0',
            'tgl_sewa'    => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_sewa',
            'durasi'      => 'required|integer|min:1',
            'nama_penyewa'  => 'nullable|string|max:255',
            'email_penyewa' => 'nullable|email|max:255',
            'whatsapp'      => 'nullable|string|max:20',
        ]);

        $userId = Auth::id();
        $pesananIds = [];

        DB::beginTransaction();
        try {
            $subtotal = 0;

            foreach ($request->items as $item) {
                $harga = (int) $item['harga'];
                $jumlah = (int) $item['jumlah'];
                $durasi = (int) $request->durasi;
                $totalItem = $harga * $jumlah * $durasi;
                $subtotal += $totalItem;

                // Cari alat: pertama by ID, lalu by nama
                $idAlat = $item['id_alat'] ?? 0;
                $alat = null;

                if ($idAlat > 0) {
                    $alat = Alat::find($idAlat);
                }

                // Fallback: cari by nama jika id_alat tidak ditemukan
                if (!$alat && !empty($item['nama'])) {
                    $alat = Alat::where('nama_alat', $item['nama'])->first();
                }

                // Jika alat tetap tidak ditemukan, buat baru
                if (!$alat) {
                    $alat = Alat::create([
                        'nama_alat'     => $item['nama'] ?? 'Produk Tidak Dikenal',
                        'harga'         => $harga,
                        'harga_perhari' => $harga,
                        'stok'          => 99,
                    ]);
                }

                // Buat pemesanan per item
                $pemesanan = Pemesanan::create([
                    'id_user'     => $userId,
                    'id_alat'     => $alat->id_alat,
                    'tgl_sewa'    => $request->tgl_sewa,
                    'tgl_kembali' => $request->tgl_kembali,
                    'jumlah_alat' => $jumlah,
                    'status'      => 'belum_bayar',
                ]);

                // Buat transaksi untuk setiap pesanan
                Transaksi::create([
                    'id_pesanan'   => $pemesanan->id_pesanan,
                    'total_biaya'  => $totalItem,
                    'status_bayar' => 'belum_bayar',
                ]);

                $pesananIds[] = $pemesanan->id_pesanan;
            }

            DB::commit();

            return response()->json([
                'message'      => 'Checkout berhasil!',
                'pesanan_ids'  => $pesananIds,
                'subtotal'     => $subtotal,
                'total'        => $subtotal + 5000 + 100000,
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Checkout gagal: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Bayar: update status pesanan menjadi menunggu_konfirmasi.
     * Dipanggil saat user klik "Bayar Sekarang" di halaman pembayaran.
     */
    public function bayar(Request $request)
    {
        $request->validate([
            'pesanan_ids' => 'required|array|min:1',
            'pesanan_ids.*' => 'required|integer|exists:pemesanan,id_pesanan',
        ]);

        $userId = Auth::id();

        DB::beginTransaction();
        try {
            foreach ($request->pesanan_ids as $id) {
                $pemesanan = Pemesanan::where('id_pesanan', $id)
                    ->where('id_user', $userId)
                    ->where('status', 'belum_bayar')
                    ->firstOrFail();

                $pemesanan->status = 'menunggu_konfirmasi';
                $pemesanan->save();

                // Update transaksi
                if ($pemesanan->transaksi) {
                    $pemesanan->transaksi->status_bayar = 'menunggu_konfirmasi';
                    $pemesanan->transaksi->save();
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Pembayaran berhasil! Menunggu konfirmasi admin.',
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Pembayaran gagal: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Halaman pesanan user: ambil dari database.
     */
    public function index()
    {
        $pesanans = collect();
        if (Auth::check()) {
            $pesanans = Pemesanan::where('id_user', Auth::id())
                ->with(['alat', 'transaksi'])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('pesanan', compact('pesanans'));
    }

    /**
     * Halaman pembayaran: ambil pesanan yang belum dibayar.
     */
    public function pembayaran()
    {
        $pesanansBelumBayar = collect();
        if (Auth::check()) {
            $pesanansBelumBayar = Pemesanan::where('id_user', Auth::id())
                ->where('status', 'belum_bayar')
                ->with(['alat', 'transaksi'])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('pembayaran', compact('pesanansBelumBayar'));
    }
}
