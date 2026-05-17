<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alat;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['nama_alat'=>'Tenda Dome 4P','harga'=>50000,'harga_perhari'=>50000,'stok'=>8,'gambar'=>null,'deskripsi'=>'Tenda dome kapasitas 4 orang dari Eiger yang dirancang praktis dan ringan untuk kegiatan camping maupun pendakian. Dilengkapi material waterproof dengan lapisan double layer untuk perlindungan optimal dari hujan dan angin.','brand'=>'Eiger','berat'=>'3.5 kg','material'=>'Polyester + PU Coating','kategori'=>'tenda'],
            ['nama_alat'=>'Sleeping Bag Polar','harga'=>25000,'harga_perhari'=>25000,'stok'=>15,'gambar'=>null,'deskripsi'=>'Sleeping bag dengan bahan polar tebal yang nyaman dan hangat, cocok untuk suhu dingin di pegunungan. Ringan dan mudah dilipat untuk dibawa dalam carrier.','brand'=>'Consina','berat'=>'1.2 kg','material'=>'Polar Fleece 280gsm','kategori'=>'tenda'],
            ['nama_alat'=>'Matras Gulung','harga'=>15000,'harga_perhari'=>15000,'stok'=>20,'gambar'=>null,'deskripsi'=>'Matras gulung EVA foam dengan ketebalan 8mm. Ringan, tahan air, dan nyaman sebagai alas tidur saat camping maupun pendakian.','brand'=>'Naturehike','berat'=>'400 gram','material'=>'EVA Foam','kategori'=>'tenda'],
            ['nama_alat'=>'Tenda Tunnel 5-6P','harga'=>70000,'harga_perhari'=>70000,'stok'=>5,'gambar'=>null,'deskripsi'=>'Tenda dome kapasitas 4 orang dari Eiger yang dirancang praktis dan ringan untuk kegiatan camping maupun pendakian. Dilengkapi material waterproof dengan lapisan double layer untuk perlindungan optimal dari hujan dan angin.','brand'=>'Eiger','berat'=>'4.2 kg','material'=>'Polyester dan PU Coating','kategori'=>'tenda'],
            ['nama_alat'=>'Carrier 40L Pro-Series','harga'=>45000,'harga_perhari'=>45000,'stok'=>10,'gambar'=>null,'deskripsi'=>'Carrier 40L Pro-Series yang dirancang ergonomis dan nyaman digunakan untuk pendakian jarak pendek hingga menengah.','brand'=>'ARei','berat'=>'900 Gram','material'=>'Rip Nylon Water Resistant','kategori'=>'tas'],
            ['nama_alat'=>'Carrier 60L Pro-Series','harga'=>55000,'harga_perhari'=>55000,'stok'=>10,'gambar'=>null,'deskripsi'=>'Carrier 60L Pro-Series yang dirancang ergonomis dan nyaman digunakan untuk pendakian jarak pendek hingga menengah.','brand'=>'ARei','berat'=>'1.5 Kg','material'=>'Rip Nylon Water Resistant','kategori'=>'tas'],
            ['nama_alat'=>'Jaket Outdoor Credifox Shield Series','harga'=>30000,'harga_perhari'=>30000,'stok'=>9,'gambar'=>null,'deskripsi'=>'Jaket outdoor Credifox Shield Series, ringan dan nyaman, dilengkapi fitur water repellent untuk melindungi dari angin dan suhu dingin saat aktivitas luar ruang.','brand'=>'Credifox','berat'=>'800 gram','material'=>'Polyester Taslan + Water Repellent','kategori'=>'pakaian'],
            ['nama_alat'=>'Sepatu Tracking Waterproof','harga'=>40000,'harga_perhari'=>40000,'stok'=>5,'gambar'=>null,'deskripsi'=>'Sepatu tracking waterproof Keen dengan desain kokoh dan perlindungan maksimal untuk aktivitas outdoor di berbagai medan.','brand'=>'Keen','berat'=>'1.5 Kg','material'=>'Upper sintetis + mesh breathable','kategori'=>'pakaian'],
            ['nama_alat'=>'Kompor Portable','harga'=>35000,'harga_perhari'=>35000,'stok'=>5,'gambar'=>null,'deskripsi'=>'Kompor Gas Portable Niko NK-268C dirancang untuk memberikan fleksibilitas.','brand'=>'Niko','berat'=>'950 Gram','material'=>'Material plate berenamel + Pemantik Piezoelectric','kategori'=>'tenda'],
            ['nama_alat'=>'Headlamp LED Outdoor','harga'=>10000,'harga_perhari'=>10000,'stok'=>8,'gambar'=>null,'deskripsi'=>'Headlamp LED outdoor yang praktis dan ringan digunakan untuk aktivitas malam hari seperti pendakian dan camping.','brand'=>'Eiger','berat'=>'150 gram','material'=>'ABS Plastic + Elastic Strap','kategori'=>'aksesoris'],
            ['nama_alat'=>'Trekking Pole Adjustable','harga'=>20000,'harga_perhari'=>20000,'stok'=>7,'gambar'=>null,'deskripsi'=>'Trekking pole adjustable yang membantu menjaga keseimbangan saat berjalan di medan menanjak maupun menurun.','brand'=>'Haoyang','berat'=>'300 gram','material'=>'Aluminium Alloy','kategori'=>'aksesoris'],
            ['nama_alat'=>'Bucket Hat Outdoor','harga'=>10000,'harga_perhari'=>10000,'stok'=>20,'gambar'=>null,'deskripsi'=>'Bucket hat outdoor yang ringan dan nyaman digunakan untuk melindungi dari sinar matahari saat aktivitas di luar ruangan.','brand'=>'The North Face','berat'=>'100 gram','material'=>'Cotton Twill','kategori'=>'pakaian'],
            ['nama_alat'=>'Kompas Outdoor','harga'=>10000,'harga_perhari'=>10000,'stok'=>30,'gambar'=>null,'deskripsi'=>'Kompas outdoor yang praktis dan akurat untuk membantu navigasi saat pendakian maupun kegiatan alam terbuka.','brand'=>'Brunton','berat'=>'150 gram','material'=>'Akrilik + Magnet Presisi','kategori'=>'aksesoris'],
            ['nama_alat'=>'Celana Cargo Pria','harga'=>25000,'harga_perhari'=>25000,'stok'=>30,'gambar'=>null,'deskripsi'=>'Celana cargo pria untuk aktivitas outdoor dan pendakian gunung.','brand'=>'Eiger','berat'=>'350 gram','material'=>'Cotton Canvas','kategori'=>'pakaian'],
        ];

        foreach ($items as $item) {
            Alat::updateOrCreate(
                ['nama_alat' => $item['nama_alat']],
                $item
            );
        }
    }
}
