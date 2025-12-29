<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Wisata;
use App\Models\Review;
use App\Models\User;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Air Terjun', 'slug' => 'air-terjun', 'description' => 'Curug dan air terjun alami'],
            ['name' => 'Alam', 'slug' => 'alam', 'description' => 'Wisata alam dan outdoor'],
            ['name' => 'Kuliner', 'slug' => 'kuliner', 'description' => 'Tempat makan dan kuliner lokal'],
            ['name' => 'Budaya', 'slug' => 'budaya', 'description' => 'Wisata budaya dan bersejarah'],
            ['name' => 'Belanja', 'slug' => 'belanja', 'description' => 'Pusat perbelanjaan dan mall'],
            ['name' => 'Rekreasi', 'slug' => 'rekreasi', 'description' => 'Taman rekreasi dan hiburan'],
        ];

        $categoryIds = [];
        foreach ($categories as $cat) {
            $categoryIds[] = Category::create($cat)->id;
        }

        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin BmsTrip',
            'email' => 'admin@bmstrip.local',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create local users
        $users = [
            User::create(['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Siti Nurhaliza', 'email' => 'siti@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Ahmad Wijaya', 'email' => 'ahmad@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Dewi Lestari', 'email' => 'dewi@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Eko Prasetyo', 'email' => 'eko@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Rina Handayani', 'email' => 'rina@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Joko Susilo', 'email' => 'joko@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
            User::create(['name' => 'Fitri Rahmawati', 'email' => 'fitri@example.com', 'password' => bcrypt('password'), 'role' => 'user', 'email_verified_at' => now()]),
        ];

        // Create wisatas
        $wisatas = [
            // AIR TERJUN
            [
                'category_id' => $categoryIds[0],
                'title' => 'Curug Cipendok',
                'slug' => 'curug-cipendok',
                'description' => "Curug Cipendok adalah air terjun tertinggi di Jawa Tengah dengan ketinggian mencapai 92 meter. Air terjun ini memiliki 7 tingkat yang indah dan dikelilingi hutan tropis yang masih asri.\n\nFasilitas:\n✓ Area parkir luas\n✓ Warung makan\n✓ Toilet umum\n✓ Gazebo/saung\n✓ Kolam alami untuk berendam\n✓ Jalur trekking yang aman",
                'location' => 'Desa Karangtengah, Cilongok, Banyumas',
                'price' => 15000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[0],
                'title' => 'Curug Gomblang',
                'slug' => 'curug-gomblang',
                'description' => "Curug Gomblang merupakan air terjun tersembunyi yang menawarkan ketenangan dan keindahan alam yang masih alami. Dengan ketinggian sekitar 20 meter, air terjun ini memiliki kolam alami yang jernih cocok untuk berenang.\n\nKeistimewaan:\n✓ Suasana tenang dan sejuk\n✓ Air yang jernih dan segar\n✓ Pemandangan hutan pinus\n✓ Spot foto instagramable\n✓ Cocok untuk piknik keluarga",
                'location' => 'Desa Ketenger, Baturraden, Banyumas',
                'price' => 10000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[0],
                'title' => 'Curug Ceheng',
                'slug' => 'curug-ceheng',
                'description' => "Curug Ceheng adalah air terjun yang relatif mudah diakses namun tetap memukau. Dengan ketinggian 25 meter, air terjun ini memiliki debit air yang cukup deras dan suara gemuruh yang menenangkan.\n\nDaya tarik:\n✓ Akses mudah dari jalan raya\n✓ Area parkir memadai\n✓ Kolam alami untuk berendam\n✓ Warung makan sekitar lokasi\n✓ Spot foto cantik",
                'location' => 'Desa Pandak, Baturraden, Banyumas',
                'price' => 8000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[0],
                'title' => 'Curug Jenggala',
                'slug' => 'curug-jenggala',
                'description' => "Curug Jenggala merupakan air terjun bertingkat yang eksotis. Terdiri dari 3 tingkat dengan pemandangan yang berbeda di setiap tingkatnya. Cocok untuk petualangan dan fotografi alam.\n\nFasilitas:\n✓ Jalur trekking bertingkat\n✓ Rest area di setiap level\n✓ Toilet\n✓ Mushola\n✓ Warung makanan\n✓ Pemandu lokal (opsional)",
                'location' => 'Desa Ketenger, Baturraden, Banyumas',
                'price' => 12000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[0],
                'title' => 'Curug Bayan',
                'slug' => 'curug-bayan',
                'description' => "Curug Bayan adalah air terjun yang indah dengan ketinggian sekitar 30 meter. Air terjun ini dikelilingi tebing batu dan pepohonan rindang yang menciptakan suasana sejuk dan menenangkan.\n\nKeunggulan:\n✓ Pemandangan spektakuler\n✓ Air jernih dan segar\n✓ Akses jalan sudah baik\n✓ Area luas untuk berkumpul\n✓ Spot foto unik dengan tebing batu",
                'location' => 'Desa Limpakuwus, Sumbang, Banyumas',
                'price' => 10000,
                'published' => true,
            ],

            // WISATA ALAM
            [
                'category_id' => $categoryIds[1],
                'title' => 'Baturraden Adventure Forest',
                'slug' => 'baturraden-adventure-forest',
                'description' => "Kawasan wisata alam lengkap di lereng Gunung Slamet. Menawarkan berbagai aktivitas outdoor dan pemandangan pegunungan yang memukau.\n\nWahana & Aktivitas:\n✓ Flying fox\n✓ Paintball\n✓ Outbound\n✓ Tracking\n✓ Camping ground\n✓ Kolam renang air panas\n✓ Taman bermain anak\n✓ Berkuda",
                'location' => 'Jl. Raya Baturraden, Purwokerto',
                'price' => 25000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[1],
                'title' => 'Telaga Sunyi',
                'slug' => 'telaga-sunyi',
                'description' => "Danau alami yang tenang dan indah dengan pemandangan pegunungan. Tempat yang sempurna untuk relaksasi dan menikmati ketenangan alam.\n\nDaya tarik:\n✓ Pemandangan danau yang jernih\n✓ Udara sejuk pegunungan\n✓ Spot foto romantis\n✓ Area piknik\n✓ Bisa memancing (dengan izin)\n✓ Jalan setapak mengelilingi danau",
                'location' => 'Baturraden, Banyumas',
                'price' => 15000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[1],
                'title' => 'Wana Wisata Baturraden',
                'slug' => 'wana-wisata-baturraden',
                'description' => "Hutan wisata dengan pemandangan alam yang asri. Terdapat berbagai jenis flora dan fauna khas pegunungan. Cocok untuk edukasi alam dan penelitian.\n\nFasilitas:\n✓ Jalur hiking\n✓ Camping area\n✓ Bird watching spot\n✓ Education center\n✓ Rest area\n✓ Toilet\n✓ Warung",
                'location' => 'Baturraden, Banyumas',
                'price' => 10000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[1],
                'title' => 'Kebun Raya Baturraden',
                'slug' => 'kebun-raya-baturraden',
                'description' => "Kebun raya dengan koleksi tanaman tropis yang lengkap. Area hijau yang luas cocok untuk bersantai dan belajar tentang flora Indonesia.\n\nKoleksi:\n✓ Tanaman obat\n✓ Tanaman hias\n✓ Kaktus & sukulen\n✓ Orchid house\n✓ Greenhouse\n✓ Taman bunga",
                'location' => 'Jl. Raya Baturraden KM 4, Purwokerto',
                'price' => 20000,
                'published' => true,
            ],

            // KULINER
            [
                'category_id' => $categoryIds[2],
                'title' => 'Soto Sokaraja Pak Kumis',
                'slug' => 'soto-sokaraja-pak-kumis',
                'description' => "Warung soto legendaris di Banyumas. Soto khas dengan kuah bening, daging empuk, dan bumbu rempah yang pas.\n\nMenu Andalan:\n✓ Soto Daging\n✓ Soto Campur\n✓ Sate Kambing\n✓ Nasi Kuning\n✓ Gorengan\n✓ Es Teh Manis\n\nHarga: Rp 15.000 - Rp 30.000\nJam buka: 07:00 - 15:00 (tutup Senin)",
                'location' => 'Jl. Jenderal Sudirman, Sokaraja, Banyumas',
                'price' => 0,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[2],
                'title' => 'Getuk Goreng Sokaraja',
                'slug' => 'getuk-goreng-sokaraja',
                'description' => "Sentra oleh-oleh khas Banyumas. Getuk goreng dengan berbagai varian rasa yang crispy di luar dan lembut di dalam.\n\nVarian Rasa:\n✓ Original\n✓ Coklat\n✓ Durian\n✓ Keju\n✓ Green tea\n✓ Kacang\n\nHarga: Rp 25.000 - Rp 50.000/box",
                'location' => 'Jl. Raya Sokaraja, Banyumas',
                'price' => 0,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[2],
                'title' => 'Mendoan Cokro',
                'slug' => 'mendoan-cokro',
                'description' => "Tempat makan mendoan paling terkenal di Purwokerto. Mendoan tipis crispy dengan bumbu yang khas.\n\nMenu:\n✓ Mendoan Original (5 pcs)\n✓ Mendoan Jumbo\n✓ Tahu Isi\n✓ Tempe Mendoan\n✓ Teh Hangat/Dingin\n✓ Kopi\n\nHarga: Rp 10.000 - Rp 20.000\nBuka: 15:00 - 22:00",
                'location' => 'Jl. HR Muhammad, Purwokerto',
                'price' => 0,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[2],
                'title' => 'Mie Ongklok Pak Dhe',
                'slug' => 'mie-ongklok-pak-dhe',
                'description' => "Mie khas Wonosobo yang terkenal di Banyumas. Mie dengan kuah kental encer yang unik, dicampur dengan sayuran dan daging.\n\nMenu:\n✓ Mie Ongklok Biasa\n✓ Mie Ongklok Istimewa (extra daging)\n✓ Sate Kikil\n✓ Kerupuk\n✓ Es Jeruk/Teh\n\nHarga: Rp 12.000 - Rp 25.000",
                'location' => 'Jl. Gatot Subroto, Purwokerto',
                'price' => 0,
                'published' => true,
            ],

            // BUDAYA
            [
                'category_id' => $categoryIds[3],
                'title' => 'Museum Wayang Sendang Mas',
                'slug' => 'museum-wayang-sendang-mas',
                'description' => "Museum yang menyimpan koleksi wayang dari berbagai daerah di Indonesia. Tempat yang cocok untuk belajar tentang budaya dan seni wayang.\n\nKoleksi:\n✓ Wayang Kulit\n✓ Wayang Golek\n✓ Wayang Klitik\n✓ Gamelan\n✓ Kostum wayang orang\n✓ Dokumentasi pertunjukan",
                'location' => 'Jl. Dr. Angka, Purwokerto',
                'price' => 10000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[3],
                'title' => 'Benteng Pendem Van Den Bosch',
                'slug' => 'benteng-pendem',
                'description' => "Benteng peninggalan Belanda yang dibangun tahun 1861-1862. Arsitektur khas kolonial yang masih terawat dengan baik.\n\nDaya tarik:\n✓ Arsitektur kolonial\n✓ Lorong-lorong bawah tanah\n✓ Spot foto historis\n✓ Museum mini\n✓ Taman yang asri\n✓ Pemandu wisata tersedia\n\nJam buka: 08:00 - 16:00",
                'location' => 'Desa Karanganyar, Purwokerto Selatan',
                'price' => 15000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[3],
                'title' => 'Pendopo Bupati Banyumas',
                'slug' => 'pendopo-bupati',
                'description' => "Bangunan bersejarah bergaya Jawa yang megah. Sering digunakan untuk acara budaya dan pameran seni.\n\nKeistimewaan:\n✓ Arsitektur Jawa klasik\n✓ Ornamen ukir kayu\n✓ Halaman luas\n✓ Sering ada event budaya\n✓ Spot foto instagramable",
                'location' => 'Jl. Raya Purwokerto, Banyumas',
                'price' => 0,
                'published' => true,
            ],

            // BELANJA
            [
                'category_id' => $categoryIds[4],
                'title' => 'Rita Mall Purwokerto',
                'slug' => 'rita-mall',
                'description' => "Mall modern terbesar di Purwokerto dengan fasilitas lengkap. Pusat perbelanjaan, hiburan, dan kuliner dalam satu tempat.\n\nFasilitas:\n✓ Department store\n✓ Supermarket\n✓ Cinema XXI (6 studio)\n✓ Food court\n✓ Restoran\n✓ Kids playground\n✓ Game center\n✓ ATM center\n✓ Parkir 5 lantai",
                'location' => 'Jl. Jenderal Sudirman, Purwokerto',
                'price' => 0,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[4],
                'title' => 'Plaza Asia Purwokerto',
                'slug' => 'plaza-asia',
                'description' => "Pusat perbelanjaan dengan berbagai tenant lokal dan internasional. Cocok untuk belanja kebutuhan sehari-hari dan fashion.\n\nTenant:\n✓ Fashion & accessories\n✓ Elektronik\n✓ Kosmetik & skincare\n✓ Bookstore\n✓ Cafés\n✓ Fast food",
                'location' => 'Jl. HR Muhammad, Purwokerto',
                'price' => 0,
                'published' => true,
            ],

            // REKREASI
            [
                'category_id' => $categoryIds[5],
                'title' => 'Small World Purwokerto',
                'slug' => 'small-world',
                'description' => "Taman rekreasi keluarga dengan berbagai wahana dan atraksi. Miniatur landmark dunia, taman bunga, dan playground.\n\nWahana:\n✓ Miniatur landmark dunia\n✓ Taman bunga\n✓ Playground\n✓ Kolam ikan\n✓ Food court\n✓ Spot foto unik\n✓ Area piknik",
                'location' => 'Jl. Raya Baturraden, Purwokerto',
                'price' => 20000,
                'published' => true,
            ],
            [
                'category_id' => $categoryIds[5],
                'title' => 'Owabong Waterpark',
                'slug' => 'owabong',
                'description' => "Waterpark terbesar di Jawa Tengah dengan berbagai kolam dan wahana air. Cocok untuk liburan keluarga yang menyenangkan.\n\nWahana:\n✓ Kolam ombak\n✓ Seluncuran spiral\n✓ Lazy river\n✓ Kolam anak\n✓ Ember tumpah\n✓ Fountain garden\n✓ Food court\n✓ Gazebo untuk istirahat",
                'location' => 'Jl. Raya Bojongsari, Banyumas',
                'price' => 50000,
                'published' => true,
            ],
        ];

        // Insert wisatas
        foreach ($wisatas as $wisata) {
            Wisata::create($wisata);
        }

        // Get all wisatas for reviews
        $allWisatas = Wisata::all();

        // Create reviews
        $reviewComments = [
            ['rating' => 5, 'comment' => 'Tempat yang sangat indah! Pemandangannya luar biasa dan udara sangat sejuk. Cocok untuk keluarga dan teman-teman. Sangat merekomendasikan! 👍'],
            ['rating' => 5, 'comment' => 'Pengalaman tak terlupakan. Fasilitas cukup baik dan harganya terjangkau. Akan berkunjung lagi! Terima kasih sudah jaga kebersihan dengan baik.'],
            ['rating' => 5, 'comment' => 'Keren banget! Air terjunnya deras dan kolam alaminya jernih. Anak-anak senang banget main air di sini. Recommended untuk liburan keluarga!'],
            ['rating' => 5, 'comment' => 'Spot foto yang bagus banget! Instagramable pokoknya. Suasana sejuk dan tenang. Perfect buat healing dari hiruk pikuk kota.'],
            ['rating' => 5, 'comment' => 'Pelayanan ramah, fasilitas lengkap. Parkirnya luas dan aman. Harga tiket masuknya worth it dengan apa yang didapat. Mantap!'],
            ['rating' => 4, 'comment' => 'Bagus tapi agak crowded di akhir pekan. Sebaiknya datang pagi atau hari kerja untuk kenyamanan maksimal. Overall oke lah.'],
            ['rating' => 4, 'comment' => 'Tempatnya bersih dan terawat. Cuma akses jalannya agak sempit. Tapi view nya puas banget! Recommended.'],
            ['rating' => 4, 'comment' => 'Enak sih, cuma pas weekend penuh banget. Mungkin perlu diperluas area parkirnya. Tapi tetap worth it untuk dikunjungi!'],
            ['rating' => 4, 'comment' => 'Kulinernya enak-enak, harganya affordable. Porsinya juga pas. Tempatnya bersih. Cuma kadang harus antri lama di jam makan siang.'],
            ['rating' => 3, 'comment' => 'Lumayan, tapi bisa lebih bagus lagi kalau fasilitas toilet ditambah dan dijaga kebersihannya.'],
            ['rating' => 3, 'comment' => 'Oke sih, cuma pas hujan becek dan licin. Perlu perbaikan jalan masuknya. Tapi pemandangannya tetap bagus.'],
            ['rating' => 5, 'comment' => 'Tempatnya sejuk banget! Cocok buat yang pengen refreshing. Air terjunnya cantik dan suaranya bikin tenang. Love it! ❤️'],
            ['rating' => 5, 'comment' => 'Sebagai warga lokal, bangga punya destinasi wisata sekeren ini. Semoga terus dirawat dan dijaga kelestariannya ya!'],
            ['rating' => 4, 'comment' => 'Anak-anak suka banget main di sini. Banyak spot yang aman buat mereka bermain. Orang tuanya juga bisa relax sambil ngopi.'],
            ['rating' => 5, 'comment' => 'Makanannya authentic banget! Resep turun temurun yang rasanya ga pernah berubah. Pasti balik lagi!'],
            ['rating' => 4, 'comment' => 'Tempatnya instagramable, banyak spot foto keren. Harga masih masuk akal. Tapi kadang susah dapat parkir kalau weekend.'],
            ['rating' => 5, 'comment' => 'Buat yang suka adventure, tempat ini recommended banget! Ada banyak aktivitas outdoor yang seru. Mantap jiwa! 🔥'],
            ['rating' => 3, 'comment' => 'Biasa aja sih, mungkin ekspektasi terlalu tinggi. Tapi tetap layak dikunjungi kalau lagi ke Banyumas.'],
        ];

        // Assign reviews
        foreach ($allWisatas as $wisata) {
            $numReviews = rand(3, 6);
            for ($i = 0; $i < $numReviews; $i++) {
                $reviewData = $reviewComments[array_rand($reviewComments)];
                Review::create([
                    'wisata_id' => $wisata->id,
                    'user_id' => $users[array_rand($users)]->id,
                    'rating' => $reviewData['rating'],
                    'comment' => $reviewData['comment'],
                ]);
            }
        }

        echo "\n✅ Database seeding berhasil!\n";
        echo "📊 Data yang ditambahkan:\n";
        echo "   - " . count($categories) . " kategori\n";
        echo "   - " . (count($users) + 1) . " users (1 admin + " . count($users) . " users)\n";
        echo "   - " . count($wisatas) . " destinasi wisata\n";
        echo "   - Reviews untuk semua wisata\n\n";
        echo "🔐 Login credentials:\n";
        echo "   Admin: admin@bmstrip.local / password\n";
        echo "   User: budi@example.com / password\n\n";
    }
}
