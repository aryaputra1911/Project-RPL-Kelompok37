<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<title>Manajemen Produk - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef] font-[Poppins]">

<!-- NAVBAR ADMIN -->
<nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white border-b">

    <a href="/admin/dashboard" class="text-green-800 font-bold text-lg">
        PeakRent
    </a>

    <div class="hidden md:flex items-center gap-10 text-sm font-medium text-gray-600">
        <a href="/admin/dashboard" class="hover:text-green-800">
            Dashboard
        </a>

        <a href="/admin/produk" class="text-green-800 border-b-2 border-green-800 pb-1">
            Produk
        </a>

        <a href="/admin/pesanan" class="hover:text-green-800">
            Pesanan
        </a>
    </div>

    <a href="/admin/login" class="flex items-center gap-2 text-sm text-gray-600">
        <span>admin</span>
        <svg xmlns="http://www.w3.org/2000/svg" 
            class="w-4 h-4" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor">
            <path stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2"
                d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </a>

</nav>

<!-- HEADER -->
<div class="px-10 py-8 flex justify-between items-start">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">Manajemen Produk</h1>
        <p class="text-sm text-gray-600 mt-2">
            Kelola seluruh data produk dengan mudah sesuai kebutuhan.
        </p>
    </div>

    <a href="/admin/produk/tambah"
       class="bg-green-800 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:bg-green-900">
        + Tambah Produk
    </a>
</div>

<!-- MAIN -->
<div class="px-10 flex gap-8">

    <!-- SIDEBAR -->
    <div class="w-1/4">

        <h3 class="font-semibold mb-4 text-green-800">Kategori</h3>

        <div class="space-y-2 text-sm text-gray-600">
            <label class="flex gap-2">
                <input type="checkbox" value="tenda" onchange="filterProduk()"> Tenda & Camping
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="tas" onchange="filterProduk()"> Tas & Carrier
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="pakaian" onchange="filterProduk()"> Pakaian Gunung
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="aksesoris" onchange="filterProduk()"> Aksesoris & Gear
            </label>
        </div>

        <div class="mt-6 bg-[#eef0ea] p-4 rounded-xl text-sm max-w-[220px]">

            <div class="mb-3 text-[#213B56]">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-5 h-5" 
                    viewBox="0 0 24 24" 
                    fill="currentColor">
                    <path fill-rule="evenodd" 
                        d="M12 2.25l2.1 2.02 2.9-.42 1.3 2.63 2.63 1.3-.42 2.9 2.02 2.1-2.02 2.1.42 2.9-2.63 1.3-1.3 2.63-2.9-.42-2.1 2.02-2.1-2.02-2.9.42-1.3-2.63-2.63-1.3.42-2.9-2.02-2.1 2.02-2.1-.42-2.9 2.63-1.3 1.3-2.63 2.9.42L12 2.25zm3.53 8.03a.75.75 0 00-1.06-1.06l-3.22 3.22-1.47-1.47a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.75-3.75z" 
                        clip-rule="evenodd" />
                </svg>
            </div>

            <h4 class="font-bold text-[#213B56] text-sm mb-2">
                Peralatan Terjamin
            </h4>

            <p class="text-gray-500 text-xs leading-relaxed">
                Semua peralatan dibersihkan dan dicek kualitasnya sebelum disewakan ke pelanggan.
            </p>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="w-3/4">

        <!-- SEARCH -->
        <div class="mb-6">
            <input type="text" placeholder="Cari barang..." 
                class="w-full border p-3 rounded-lg bg-[#EDEFE7] outline-none">
        </div>

        <!-- GRID PRODUK -->
        <div class="grid grid-cols-3 gap-6">

            <!-- PRODUK 1 -->
            <div class="produk-item" data-kategori="tenda">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://img.lazcdn.com/g/p/d88566bf3c14379d779b6e3f8a3ea58d.png_720x720q80.png"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Tenda Dome 4P</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 50.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/1"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Tenda Dome 4P"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 5
                        </p>
                    </div>
                </div>
            </div>

            <!-- PRODUK 2 -->
            <div class="produk-item" data-kategori="tenda">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/11/WhatsApp-Image-2024-02-02-at-09.49.27-2.jpeg"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Tenda Tunnel 5-6P</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 70.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/2"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Tenda Tunnel 5-6P"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 5
                        </p>
                    </div>
                </div>
            </div>

            <!-- PRODUK 3 -->
            <div class="produk-item" data-kategori="tas">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-02-at-12.42.02.jpeg"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Carrier 40L Pro-Series</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 45.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/3"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Carrier 40L Pro-Series"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 10
                        </p>
                    </div>
                </div>
            </div>

            <!-- PRODUK 4 -->
            <div class="produk-item" data-kategori="tas">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://areioutdoorgear.co.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-06-19-at-11.16.56-2.jpeg"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Carrier 60L Pro-Series</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 55.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/4"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Carrier 60L Pro-Series"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 10
                        </p>
                    </div>
                </div>
            </div>

            <!-- PRODUK 5 -->
            <div class="produk-item" data-kategori="pakaian">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://cdn-jpr.jawapos.com/images/27/2025/05/29/N01777-GORPCORE-Jacket-_-Distro-Motif-Parachute-Mountain-Jacket-1611688820.jpeg"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Jaket Outdoor Credifox Shield Series</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 30.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/5"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Jaket Outdoor Credifox Shield Series"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 9
                        </p>
                    </div>
                </div>
            </div>

            <!-- PRODUK 6 -->
            <div class="produk-item" data-kategori="pakaian">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="https://ik.imagekit.io/tvlk/blog/2024/12/shutterstock_2083482538.jpg?tr=q-70,c-at_max,w-1000,h-600"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Sepatu Tracking Waterproof</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp 40.000 <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="/admin/produk/edit/6"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal(this)"
                                    data-nama="Sepatu Tracking Waterproof"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: 5
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- PAGINATION -->
        <div class="flex justify-center items-center gap-2 mt-10 mb-16">
            <button class="w-10 h-10 rounded-lg border bg-white hover:bg-gray-100">
                &lt;
            </button>

            <a href="/admin/produk?page=1" 
            class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-800 text-white font-semibold">
                1
            </a>

            <a href="/admin/produk?page=2" 
            class="w-10 h-10 flex items-center justify-center rounded-lg border bg-white hover:bg-gray-100">
                2
            </a>

            <a href="/admin/produk?page=3" 
            class="w-10 h-10 flex items-center justify-center rounded-lg border bg-white hover:bg-gray-100">
                3
            </a>

            <button class="w-10 h-10 rounded-lg border bg-white hover:bg-gray-100">
                &gt;
            </button>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6">

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">

        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">FITUR ADMIN</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Tambah Produk</li>
                <li>Edit Detail Produk</li>
                <li>Update Stok</li>
                <li>Hapus Produk</li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-3 text-sm text-gray-300">
                <div class="flex items-center gap-3">
                    <span>halo@peakrent.com</span>
                </div>

                <div class="flex items-center gap-3">
                    <span>+62 21 5550 1234</span>
                </div>
            </div>
        </div>

    </div>

    <div class="border-t border-green-700 mt-10 pt-4 flex justify-between text-xs text-gray-300">
        <span>© 2026 PeakRent Editorial. The Modern Explorer.</span>
        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat & Ketentuan</span>
        </div>
    </div>
</footer>

<!-- MODAL HAPUS PRODUK -->
<div id="deleteModal" 
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white w-[360px] rounded-xl p-8 text-center relative shadow-xl">

        <!-- CLOSE -->
        <button onclick="closeDeleteModal()" 
            class="absolute top-4 right-5 text-gray-500 hover:text-gray-800 text-xl">
            ×
        </button>

        <!-- ICON WARNING -->
        <div class="mx-auto mb-5 w-16 h-16 rounded-full border-4 border-red-600 flex items-center justify-center">
            <span class="text-red-600 text-4xl font-bold leading-none">!</span>
        </div>

        <!-- TITLE -->
        <h2 class="text-xl font-bold text-gray-900 mb-3">
            Hapus Produk?
        </h2>

        <!-- DESCRIPTION -->
        <p class="text-sm text-gray-600 leading-relaxed mb-6">
            Kamu yakin ingin menghapus produk ini?
            <br>
            Data yang sudah dihapus tidak dapat dikembalikan.
        </p>

        <!-- BUTTON HAPUS -->
        <button onclick="hapusProduk()"
            class="w-full bg-red-600 text-white py-3 rounded-lg text-sm font-bold hover:bg-red-700 transition">
            Ya, Hapus
        </button>

        <!-- BATAL -->
        <button onclick="closeDeleteModal()"
            class="mt-4 text-sm text-red-600 font-medium hover:underline">
            Batal
        </button>

    </div>
</div>

<script>
function filterProduk() {
    let kategoriDipilih = Array.from(
        document.querySelectorAll('input[type=checkbox]:checked')
    ).map(cb => cb.value);

    document.querySelectorAll('.produk-item').forEach(item => {
        let kategori = item.dataset.kategori;

        if (kategoriDipilih.length === 0 || kategoriDipilih.includes(kategori)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

let produkYangDihapus = null;

function openDeleteModal(button) {
    produkYangDihapus = button.closest('.produk-item');

    const modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function hapusProduk() {
    if (produkYangDihapus) {
        produkYangDihapus.remove();
    }

    closeDeleteModal();
}
</script>

</body>
</html>