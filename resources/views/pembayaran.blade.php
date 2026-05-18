<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>Pembayaran - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef]" style="font-family: 'Poppins', sans-serif;">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-4 bg-white border-b">
    <h1 class="text-green-700 font-bold text-lg"><a href="{{ url('/') }}">PeakRent</a></h1>

    <ul class="flex gap-8 text-gray-600 font-medium">
        <li><a href="{{ url('/') }}" class="hover:text-green-700">Beranda</a></li>
        <li><a href="{{ url('/produk') }}" class="hover:text-green-700">Produk</a></li>
        <li><a href="{{ url('/panduan') }}" class="hover:text-green-700">Panduan Sewa</a></li>
        @auth
        <li><a href="{{ url('/pesanan') }}" class="hover:text-green-700">Pesanan</a></li>
        @endauth
    </ul>

    <div class="flex gap-4 items-center">
        <!-- cart -->
        <a href="{{ url('/keranjang') }}" class="relative cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h14m-6 0a2 2 0 11-4 0m4 0a2 2 0 104 0"/>
            </svg>
            <span id="cartCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 py-[1px] rounded-full" style="display: none;">0</span>
        </a>

        <!-- user -->
        @auth
        <div class="flex items-center gap-3 relative">
            <div onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center gap-3 cursor-pointer">
                <span class="text-sm text-gray-700">{{ Auth::user()->nama }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-700 hover:text-green-900 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <!-- DROPDOWN -->
            <div class="hidden absolute top-10 right-0 w-48 bg-white rounded-2xl shadow-xl p-3 border z-50">
                <div class="flex items-center gap-3 pb-3">
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600">👤</div>
                    <div class="leading-tight">
                        <p class="font-semibold text-[13px] text-gray-800">{{ Auth::user()->nama }}</p>
                        <p class="text-[11px] text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <hr class="mb-2">
                <a href="{{ url('/pesanan') }}" class="flex items-center gap-2 text-sm text-gray-700 py-2 mb-3">↺ Riwayat Pesanan</a>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button class="w-full bg-green-800 hover:bg-green-900 text-white py-2 rounded-lg text-sm font-medium">Keluar</button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ url('/login') }}" class="text-green-700 hover:text-green-900 transition -mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
        @endauth
    </div>
</nav>

<!-- CONTENT -->
<div class="px-10 py-8">

<!-- STATUS -->
<div id="statusBox" class="bg-[#f5e6d3] border-l-4 border-red-500 p-4 rounded mb-6 flex justify-between">
    <div>
        <p class="text-xs text-gray-500">STATUS PESANAN</p>
        <h2 id="statusText" class="text-red-600 font-bold">Belum Dibayar</h2>
    </div>
    <div class="bg-[#F9F9F9] px-4 py-2 rounded-lg text-sm font-medium text-gray-700 border">
        Nomor ID <span id="idText" class="text-red-500 font-semibold">#PR-001</span>
    </div>
</div>

<div class="flex gap-6">

<!-- LEFT -->
<div class="w-2/3 space-y-6">

<!-- BIODATA -->
<div class="bg-[#F3F4ED] p-6 rounded-xl shadow">
    <h3 class="font-semibold mb-4">Biodata Penyewa</h3>

    <div class="grid grid-cols-3 gap-4 text-sm">
        <div>
            <p class="text-gray-500">Nama</p>
            <p class="font-medium" id="lblNama">{{ Auth::user()->nama ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-500">WhatsApp</p>
            <p class="font-medium" id="lblWhatsApp">{{ Auth::user()->no_telp ?? '-' }}</p>
        </div>
        <div>
            <p class="text-gray-500">Email</p>
            <p class="font-medium" id="lblEmail">{{ Auth::user()->email ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-4">
        <p class="text-gray-500 text-sm">Tanggal Sewa</p>
        <p class="font-medium" id="lblTanggalSewa">-</p>
    </div>
</div>

<!-- BARANG -->
<div class="bg-white p-6 rounded-xl shadow space-y-4">
    <h3 class="font-semibold">Rincian Barang</h3>
    <div id="itemsContainer">
        <!-- Diisi oleh JavaScript -->
    </div>
</div>

</div>

<!-- RIGHT -->
<div class="w-1/3 bg-[#F3F4ED] p-6 rounded-xl shadow">

    <h3 class="font-semibold mb-4 text-center">Pembayaran QRIS</h3>

    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PeakRent"
    class="mx-auto mb-4">

    <div class="text-sm space-y-2">
        <div class="flex justify-between">
            <span>Subtotal</span>
            <span id="lblSubtotal">Rp 0</span>
        </div>
        <div class="flex justify-between">
            <span>Biaya Layanan</span>
            <span>Rp 5.000</span>
        </div>
        <div class="flex justify-between">
            <span>Deposit</span>
            <span>Rp 100.000</span>
        </div>
    </div>

    <hr class="my-4">

    <div class="flex justify-between font-bold text-lg mb-4">
        <span>Total</span>
        <span id="lblTotal">Rp 0</span>
    </div>

    <button id="btnBayar" onclick="prosesBayar()"
    class="w-full bg-green-800 text-white py-3 rounded-lg hover:bg-green-900 transition font-semibold">
        Bayar Sekarang
    </button>
    
    <button
    onclick="window.location.href='{{ url('/pesanan') }}'"
    class="w-full border border-green-800 text-green-800 py-3 rounded-lg mt-2 hover:bg-green-50 transition font-semibold">
        Lihat Riwayat Pesanan
    </button>
</div>

</div>
</div>

<!-- POPUP BERHASIL -->
<div id="modalBerhasil" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl text-center w-[400px]">
        <div class="text-green-600 text-4xl mb-2">✔</div>
        <h2 class="font-bold text-lg">Pembayaran Berhasil!</h2>
        <p class="text-sm text-gray-500 mb-4">Pembayaran berhasil diproses. Menunggu konfirmasi admin.</p>

        <button onclick="window.location.href='{{ url('/pesanan') }}'" class="bg-green-800 text-white px-4 py-2 rounded w-full mb-2 hover:bg-green-900 transition">
            Lihat Riwayat
        </button>

        <button onclick="tutupModal()" class="text-sm text-gray-500">
            Tutup
        </button>
    </div>
</div>

<!-- POPUP GAGAL -->
<div id="modalGagal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl text-center w-[400px]">
        <div class="text-red-500 text-4xl mb-2">❗</div>
        <h2 class="font-bold text-lg">Pembayaran Gagal!</h2>
        <p class="text-sm text-gray-500 mb-4">Silakan coba lagi</p>

        <button onclick="tutupModal()" class="bg-red-500 text-white px-4 py-2 rounded w-full mb-2">
            Coba Lagi
        </button>

        <button onclick="tutupModal()" class="text-sm text-gray-500">
            Tutup
        </button>
    </div>
</div>

<script>
function formatRupiahLocal(num) {
    return "Rp " + num.toLocaleString("id-ID");
}

function prosesBayar() {
    let pesananIds = JSON.parse(localStorage.getItem("pesanan_ids_{{ Auth::id() }}"));
    
    if (!pesananIds || pesananIds.length === 0) {
        alert("Tidak ada pesanan untuk dibayar.");
        return;
    }

    let btn = document.getElementById("btnBayar");
    btn.disabled = true;
    btn.innerText = "Memproses...";

    fetch("{{ url('/bayar') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Accept": "application/json"
        },
        body: JSON.stringify({
            pesanan_ids: pesananIds
        })
    })
    .then(res => {
        // Simpan res agar bisa diakses setelah parse JSON
        return res.json().then(data => ({ ok: res.ok, data }));
    })
    .then(({ ok, data }) => {
        if (ok) {
            // Update UI status
            let box = document.getElementById("statusBox");
            let text = document.getElementById("statusText");
            let id = document.getElementById("idText");

            box.classList.remove("bg-[#f5e6d3]", "border-red-500");
            box.classList.add("bg-[#DCEBFF]", "border-[#213B56]");

            text.innerText = "Menunggu Konfirmasi Admin";
            text.classList.remove("text-red-600");
            text.classList.add("text-[#213B56]");

            id.classList.remove("text-red-500");
            id.classList.add("text-[#213B56]");

            btn.innerText = "Simpan Kode QR";
            btn.onclick = function() {
                alert("QR berhasil disimpan");
            };

            // Hapus pesanan_ids dari localStorage
            localStorage.removeItem("pesanan_ids_{{ Auth::id() }}");

            // Tampilkan popup berhasil
            document.getElementById("modalBerhasil").classList.remove("hidden");
            document.getElementById("modalBerhasil").classList.add("flex");
        } else {
            alert(data.message || "Pembayaran gagal!");
            btn.disabled = false;
            btn.innerText = "Bayar Sekarang";

            document.getElementById("modalGagal").classList.remove("hidden");
            document.getElementById("modalGagal").classList.add("flex");
        }
    })
    .catch(err => {
        console.error(err);
        btn.disabled = false;
        btn.innerText = "Bayar Sekarang";

        document.getElementById("modalGagal").classList.remove("hidden");
        document.getElementById("modalGagal").classList.add("flex");
    });
}

function tutupModal() {
    document.getElementById("modalBerhasil").classList.remove("flex");
    document.getElementById("modalGagal").classList.remove("flex");
    document.getElementById("modalBerhasil").classList.add("hidden");
    document.getElementById("modalGagal").classList.add("hidden");
}

document.addEventListener("DOMContentLoaded", function() {
    let userId = "{{ Auth::id() }}";
    let biodata = JSON.parse(localStorage.getItem("biodata_" + userId));
    let pesananIds = JSON.parse(localStorage.getItem("pesanan_ids_" + userId));

    // Fill biodata from localStorage if available
    if (biodata) {
        if (biodata.nama) document.getElementById("lblNama").innerText = biodata.nama;
        if (biodata.whatsapp) document.getElementById("lblWhatsApp").innerText = biodata.whatsapp;
        if (biodata.email) document.getElementById("lblEmail").innerText = biodata.email;
    }

    // Jika ada pesanan_ids, fetch data dari server
    if (pesananIds && pesananIds.length > 0) {
        // Fetch pesanan detail via API (kita buat simple: load pesanan page data)
        // Untuk saat ini, kita baca dari pesanan yang sudah disimpan
        let firstId = pesananIds[0];
        let lastId = pesananIds[pesananIds.length - 1];
        
        document.getElementById("idText").innerText = "#PR-" + String(firstId).padStart(3, '0');

        // Fetch pesanan data
        fetch("{{ url('/pesanan') }}", {
            headers: { "Accept": "text/html" }
        })
        .then(() => {
            // We can't easily parse HTML, so let's just use the IDs we have
            // The data is in the database, we'll show what we can
        });

        // Load items from the database via a simple JSON endpoint
        // For now, show a loading state and use the pesanan_ids
        loadPesananData(pesananIds);
    } else {
        // Tidak ada pesanan baru - cek apakah ada pesanan belum bayar di DB
        document.getElementById("itemsContainer").innerHTML = `
            <p class="text-gray-400 text-sm text-center py-4">Tidak ada pesanan yang perlu dibayar.</p>
        `;
    }
});

function loadPesananData(pesananIds) {
    fetch("{{ url('/pesanan/detail') }}?ids=" + pesananIds.join(','), {
        headers: { "Accept": "application/json" }
    })
    .then(res => res.json())
    .then(data => {
        let container = document.getElementById("itemsContainer");
        let pesanans  = data.pesanans || [];

        if (pesanans.length === 0) {
            container.innerHTML = `<p class="text-gray-400 text-sm text-center py-4">Detail pesanan tidak ditemukan.</p>`;
            return;
        }

        let html = '';
        let totalSubtotal = 0;

        pesanans.forEach(p => {
            // Gunakan total_biaya dari transaksi sebagai subtotal (sudah dihitung server)
            totalSubtotal += p.total_biaya;

            p.items.forEach(item => {
                let imgTag = item.foto
                    ? `<img src="${item.foto}" class="w-12 h-12 object-cover rounded mr-3" onerror="this.src='https://via.placeholder.com/48'">`
                    : `<div class="w-12 h-12 bg-gray-200 rounded mr-3 flex items-center justify-center text-gray-400 text-xs">No Img</div>`;
                html += `
                    <div class="flex items-center justify-between py-2 border-b last:border-0">
                        <div class="flex items-center">
                            ${imgTag}
                            <div>
                                <p class="text-sm font-semibold text-gray-800">${item.nama}</p>
                                <p class="text-xs text-gray-500">${item.jumlah} unit</p>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-gray-700">${formatRupiahLocal(item.subtotal)}</p>
                    </div>`;
            });

            // Update tanggal sewa
            if (p.tgl_sewa) {
                let tgl = new Date(p.tgl_sewa).toLocaleDateString('id-ID', {day:'2-digit', month:'long', year:'numeric'});
                let tglKembali = new Date(p.tgl_kembali).toLocaleDateString('id-ID', {day:'2-digit', month:'long', year:'numeric'});
                document.getElementById("lblTanggalSewa").innerText = tgl + ' – ' + tglKembali;
            }
        });

        container.innerHTML = html;

        // Update subtotal & total
        document.getElementById("lblSubtotal").innerText = formatRupiahLocal(totalSubtotal);
        document.getElementById("lblTotal").innerText    = formatRupiahLocal(totalSubtotal + 5000 + 100000);
    })
    .catch(err => {
        console.error(err);
        document.getElementById("itemsContainer").innerHTML =
            `<p class="text-gray-400 text-sm text-center py-4">Gagal memuat detail pesanan.</p>`;
    });
}
</script>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6 mt-16">
    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
        <!-- LEFT -->
        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>
        <!-- MIDDLE -->
        <div>
            <h3 class="text-white font-semibold mb-3">KATEGORI</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Tenda &amp; Camping</li>
                <li>Tas &amp; Carrier</li>
                <li>Pakaian Gunung</li>
                <li>Aksesoris &amp; Gear</li>
            </ul>
        </div>
        <!-- RIGHT -->
        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-4 text-sm text-gray-300">
                <div class="flex items-center gap-3 group cursor-pointer hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 6.75-9.75-6.75" />
                        </svg>
                    </div>
                    <span>halo@peakrent.com</span>
                </div>
                <div class="flex items-center gap-3 group cursor-pointer hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                    <span>+62 21 5550 1234</span>
                </div>
            </div>
        </div>
    </div>
    <!-- LINE -->
    <div class="border-t border-green-700 mt-10 pt-4 flex justify-between text-xs text-gray-300">
        <span>© 2026 PeakRent Editorial. The Modern Explorer.</span>
        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat &amp; Ketentuan</span>
        </div>
    </div>
</footer>

</body>
</html>