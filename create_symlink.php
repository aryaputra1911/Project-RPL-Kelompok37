<?php
// Jalankan file ini SEKALI di browser: https://domain-anda/create_symlink.php
// Lalu HAPUS file ini setelah selesai!

$target = __DIR__ . '/storage/app/public';
$link = __DIR__ . '/public/storage';

echo "<h2>PeakRent - Storage Symlink Creator</h2>";

if (file_exists($link)) {
    echo "<p style='color:green'>✅ Symlink sudah ada!</p>";
} else {
    if (@symlink($target, $link)) {
        echo "<p style='color:green'>✅ Symlink berhasil dibuat!</p>";
    } else {
        echo "<p style='color:orange'>⚠️ Symlink gagal (normal di shared hosting).</p>";
        echo "<p>Solusi: Upload gambar produk langsung ke folder <code>public/storage/produk/</code> via FTP.</p>";
    }
}

echo "<br><p style='color:red'><strong>⚠️ HAPUS FILE INI SETELAH SELESAI!</strong></p>";
