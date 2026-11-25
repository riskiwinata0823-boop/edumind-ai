<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getSubjectsData(): array {
    return [
        [
            'id' => 1,
            'code' => 'MAT-101',
            'name' => 'Matematika Adaptif',
            'description' => 'Pembelajaran adaptif pecahan, operasi penjumlahan/KPK, persentase, dan perbandingan.'
        ],
        [
            'id' => 2,
            'code' => 'WEB-201',
            'name' => 'Teknologi Web & Logika Pemrograman',
            'description' => 'Struktur aplikasi web modern, tata letak responsif, alur API/HTTP, dan basis data relasional.'
        ]
    ];
}

function getTopicsData(): array {
    $defaultTopics = [
        [
            'id' => 1,
            'subject_id' => 1,
            'subject_name' => 'Matematika Adaptif',
            'prerequisite_topic_id' => null,
            'title' => 'Konsep Dasar Pecahan',
            'difficulty_level' => 'dasar',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami makna pembilang dan penyebut sebagai bagian dari keseluruhan serta mengidentifikasi pecahan senilai.',
            'materials' => [
                [
                    'id' => 101,
                    'title' => 'Pembilang, Penyebut, dan Bagian Utuh',
                    'estimated_minutes' => 10,
                    'content' => 'Pecahan ditulis dalam bentuk a/b dengan b ≠ 0. Angka di bagian atas (pembilang) menunjukkan jumlah bagian yang diperhatikan, sedangkan angka di bagian bawah (penyebut) menunjukkan jumlah total bagian sama besar dari satu kesatuan. Contoh: satu loyang pizza dibagi menjadi 4 potong sama besar; jika diambil 1 potong maka nilainya 1/4.',
                    'summary' => 'Pembilang = jumlah bagian diambil | Penyebut = total bagian sama besar.'
                ],
                [
                    'id' => 102,
                    'title' => 'Pecahan Senilai dan Penyederhanaan',
                    'estimated_minutes' => 12,
                    'content' => 'Pecahan senilai adalah pecahan yang berbeda penulisan tetapi memiliki nilai yang sama. Mengalikan atau membagi pembilang dan penyebut dengan bilangan bulat yang sama (bukan nol) menghasilkan pecahan senilai. Contoh: 1/2 senilai dengan 2/4 dan 3/6, sedangkan 6/8 dapat disederhanakan dengan membagi pembilang dan penyebut dengan FPB-nya (2) menjadi 3/4.',
                    'summary' => 'Kalikan atau bagi pembilang & penyebut dengan angka sama untuk mendapat pecahan senilai.'
                ]
            ]
        ],
        [
            'id' => 2,
            'subject_id' => 1,
            'subject_name' => 'Matematika Adaptif',
            'prerequisite_topic_id' => 1,
            'title' => 'Operasi Penjumlahan Pecahan',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Menyelesaikan penjumlahan pecahan berpenyebut sama maupun berbeda menggunakan Kelipatan Persekutuan Terkecil (KPK).',
            'materials' => [
                [
                    'id' => 201,
                    'title' => 'Penjumlahan Pecahan Berpenyebut Sama',
                    'estimated_minutes' => 10,
                    'content' => 'Apabila dua pecahan sudah memiliki penyebut yang sama, cukup jumlahkan pembilangnya sementara penyebutnya tetap. Contoh: 2/7 + 3/7 = 5/7.',
                    'summary' => 'Penyebut sama -> jumlahkan pembilang saja, penyebut tetap.'
                ],
                [
                    'id' => 202,
                    'title' => 'Menyamakan Penyebut Menggunakan KPK',
                    'estimated_minutes' => 15,
                    'content' => 'Untuk menjumlahkan pecahan berpenyebut berbeda seperti 1/2 + 1/4, cari KPK dari 2 dan 4 yaitu 4. Ubah 1/2 menjadi 2/4, lalu jumlahkan pembilangnya: 2/4 + 1/4 = 3/4. Jangan menjumlahkan pembilang dan penyebut secara langsung (1/2 + 1/4 ≠ 2/6).',
                    'summary' => 'Cari KPK penyebut -> sesuaikan pembilang -> jumlahkan pembilang.'
                ]
            ]
        ],
        [
            'id' => 3,
            'subject_id' => 1,
            'subject_name' => 'Matematika Adaptif',
            'prerequisite_topic_id' => 2,
            'title' => 'Persentase dan Perbandingan',
            'difficulty_level' => 'lanjut',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Mengonversi pecahan menjadi bentuk persentase (%) dan membandingkan nilai pecahan secara tepat.',
            'materials' => [
                [
                    'id' => 301,
                    'title' => 'Konversi Pecahan ke Persentase',
                    'estimated_minutes' => 12,
                    'content' => 'Persentase berarti per seratus (%). Untuk mengubah pecahan menjadi persentase, kalikan nilai pecahan dengan 100%. Contoh: 3/4 × 100% = 75% dan 1/5 × 100% = 20%.',
                    'summary' => 'Nilai pecahan × 100% = Persentase (%).'
                ],
                [
                    'id' => 302,
                    'title' => 'Membandingkan Dua Pecahan',
                    'estimated_minutes' => 12,
                    'content' => 'Untuk membandingkan dua pecahan dengan penyebut berbeda (misalnya 3/5 dan 2/3), samakan terlebih dahulu penyebutnya menjadi KPK (15): 3/5 = 9/15 dan 2/3 = 10/15. Karena 9/15 < 10/15, maka 3/5 lebih kecil dari 2/3.',
                    'summary' => 'Samakan penyebut atau ubah ke bentuk desimal/persen sebelum membandingkan.'
                ]
            ]
        ],
        [
            'id' => 4,
            'subject_id' => 2,
            'subject_name' => 'Teknologi Web & Logika Pemrograman',
            'prerequisite_topic_id' => null,
            'title' => 'Dasar HTML, CSS & Struktur Web',
            'difficulty_level' => 'dasar',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami struktur halaman web semantik, penggunaan grid/layout responsif, dan pemisahan gaya visual.',
            'materials' => [
                [
                    'id' => 401,
                    'title' => 'Struktur Dokumen HTML & Elemen Semantik',
                    'estimated_minutes' => 12,
                    'content' => 'Dokumen HTML terstruktur mulai dari deklarasi <!DOCTYPE html>, elemen <html>, <head> untuk metadata/stylesheet, dan <body> untuk konten yang tampil di browser. Elemen semantik seperti <nav>, <main>, <section>, dan <article> memperjelas struktur informasi.',
                    'summary' => 'Gunakan struktur HTML yang jelas dan elemen semantik agar mudah dirawat.'
                ],
                [
                    'id' => 402,
                    'title' => 'CSS Layout, Flexbox/Grid & Responsivitas',
                    'estimated_minutes' => 14,
                    'content' => 'CSS mengatur tampilan warna, tipografi, spasi, dan tata letak responsif di berbagai ukuran layar (desktop maupun ponsel). Sistem grid membagi lebar layar menjadi kolom adaptif agar kartu dan navigasi tidak bertumpuk.',
                    'summary' => 'Desain responsif memastikan tampilan tetap rapi di layar laptop dan smartphone.'
                ]
            ]
        ],
        [
            'id' => 5,
            'subject_id' => 2,
            'subject_name' => 'Teknologi Web & Logika Pemrograman',
            'prerequisite_topic_id' => 4,
            'title' => 'Logika Pemrograman, API & Basis Data',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami alur request-response JSON, validasi input, kode status HTTP, dan relasi primary-foreign key.',
            'materials' => [
                [
                    'id' => 501,
                    'title' => 'Alur API, Format JSON & Status HTTP',
                    'estimated_minutes' => 15,
                    'content' => 'Komunikasi klien dan server sering menggunakan format JSON melalui metode HTTP (seperti GET dan POST). Status HTTP membantu mengidentifikasi hasil permintaan, misalnya 200 untuk sukses, 401/403 untuk autentikasi/otorisasi, dan 422 untuk validasi data.',
                    'summary' => 'Pastikan validasi input dan format respons JSON konsisten pada setiap endpoint.'
                ],
                [
                    'id' => 502,
                    'title' => 'Relasi Tabel Basis Data (PK & FK)',
                    'estimated_minutes' => 15,
                    'content' => 'Dalam basis data relasional, Primary Key (PK) mengidentifikasi tiap baris secara unik, sedangkan Foreign Key (FK) menghubungkan antar-tabel (misalnya users ke progress dan recommendations) agar integritas data terjaga.',
                    'summary' => 'Gunakan Primary Key & Foreign Key agar data antar-tabel saling terhubung konsisten.'
                ]
            ]
        ]
    ];

    $custom = $_SESSION['custom_topics'] ?? [];
    return array_merge($defaultTopics, $custom);
}

function addCustomTopic(array $topicInput): array {
    if (!isset($_SESSION['custom_topics'])) {
        $_SESSION['custom_topics'] = [];
    }
    $existing = getTopicsData();
    $maxId = 0;
    foreach ($existing as $t) {
        if ((int)$t['id'] > $maxId) {
            $maxId = (int)$t['id'];
        }
    }
    $newId = $maxId + 1;
    $subjectId = (int)($topicInput['subject_id'] ?? 1);
    $subjectName = $subjectId === 2 ? 'Teknologi Web & Logika Pemrograman' : 'Matematika Adaptif';

    $newTopic = [
        'id' => $newId,
        'subject_id' => $subjectId,
        'subject_name' => $subjectName,
        'prerequisite_topic_id' => null,
        'title' => trim($topicInput['title']),
        'difficulty_level' => trim($topicInput['difficulty_level'] ?? 'menengah'),
        'mastery_threshold' => 80,
        'learning_objectives' => trim($topicInput['learning_objectives'] ?: 'Memahami kompetensi inti topik pembelajaran.'),
        'materials' => [
            [
                'id' => $newId * 100 + 1,
                'title' => trim($topicInput['material_title'] ?: $topicInput['title']),
                'estimated_minutes' => (int)($topicInput['estimated_minutes'] ?? 15),
                'content' => trim($topicInput['material_content'] ?: 'Materi pembelajaran baru yang ditambahkan oleh guru.'),
                'summary' => trim($topicInput['summary_notes'] ?: 'Pelajari konsep inti dan kerjakan kuis evaluasi.')
            ]
        ]
    ];

    $_SESSION['custom_topics'][] = $newTopic;
    return $newTopic;
}

function getQuizQuestionsByTopic(int $topicId): array {
    $bank = [
        1 => [
            [
                'id' => 101,
                'question' => 'Pada pecahan 3/5, angka 5 disebut sebagai...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Pembilang', 'correct' => false],
                    'B' => ['text' => 'Penyebut', 'correct' => true],
                    'C' => ['text' => 'Hasil bagi', 'correct' => false],
                    'D' => ['text' => 'Selisih', 'correct' => false],
                ],
                'explanation' => 'Angka di bagian bawah (5) adalah penyebut yang menunjukkan jumlah total bagian sama besar.'
            ],
            [
                'id' => 102,
                'question' => 'Satu loyang kue dipotong 4 bagian sama besar. Jika diambil 1 potong, nilainya adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '1/4', 'correct' => true],
                    'B' => ['text' => '4/1', 'correct' => false],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '3/4', 'correct' => false],
                ],
                'explanation' => '1 bagian dari 4 bagian sama besar ditulis 1/4.'
            ],
            [
                'id' => 103,
                'question' => 'Pecahan yang senilai dengan 1/2 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '1/4', 'correct' => false],
                    'B' => ['text' => '3/6', 'correct' => true],
                    'C' => ['text' => '2/5', 'correct' => false],
                    'D' => ['text' => '3/4', 'correct' => false],
                ],
                'explanation' => 'Mengalikan pembilang dan penyebut 1/2 dengan 3 menghasilkan 3/6.'
            ],
            [
                'id' => 104,
                'question' => 'Bentuk paling sederhana dari pecahan 6/8 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '2/4', 'correct' => false],
                    'B' => ['text' => '3/4', 'correct' => true],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '4/3', 'correct' => false],
                ],
                'explanation' => 'Membagi pembilang dan penyebut 6/8 dengan FPB-nya (2) menghasilkan 3/4.'
            ],
            [
                'id' => 105,
                'question' => 'Syarat nilai penyebut b pada bentuk pecahan a/b adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'b tidak boleh sama dengan 0', 'correct' => true],
                    'B' => ['text' => 'b harus selalu lebih kecil dari a', 'correct' => false],
                    'C' => ['text' => 'b harus selalu genap', 'correct' => false],
                    'D' => ['text' => 'b harus bernilai negatif', 'correct' => false],
                ],
                'explanation' => 'Pembagian dengan nol tidak terdefinisi, sehingga penyebut b ≠ 0.'
            ]
        ],
        2 => [
            [
                'id' => 201,
                'question' => 'Hasil dari 1/2 + 1/4 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '2/6', 'correct' => false],
                    'B' => ['text' => '3/4', 'correct' => true],
                    'C' => ['text' => '1/8', 'correct' => false],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => 'KPK dari 2 dan 4 adalah 4. Ubah 1/2 menjadi 2/4, lalu 2/4 + 1/4 = 3/4.'
            ],
            [
                'id' => 202,
                'question' => 'Hasil dari 2/3 + 1/6 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '5/6', 'correct' => true],
                    'B' => ['text' => '3/9', 'correct' => false],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '3/6', 'correct' => false],
                ],
                'explanation' => 'KPK dari 3 dan 6 adalah 6. Ubah 2/3 menjadi 4/6, lalu 4/6 + 1/6 = 5/6.'
            ],
            [
                'id' => 203,
                'question' => 'Mengapa menjumlahkan 1/2 + 1/3 tidak boleh langsung menjadi 2/5?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Penyebut harus disamakan lewat KPK menjadi 5/6', 'correct' => true],
                    'B' => ['text' => 'Karena 1 + 1 seharusnya bernilai 3', 'correct' => false],
                    'C' => ['text' => 'Karena pecahan tidak boleh dijumlahkan', 'correct' => false],
                    'D' => ['text' => 'Karena hasilnya selalu 1/5', 'correct' => false],
                ],
                'explanation' => 'Penyebut harus disamakan dahulu menggunakan KPK (6): 3/6 + 2/6 = 5/6.'
            ],
            [
                'id' => 204,
                'question' => 'Hasil dari 2/7 + 3/7 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '5/14', 'correct' => false],
                    'B' => ['text' => '5/7', 'correct' => true],
                    'C' => ['text' => '6/7', 'correct' => false],
                    'D' => ['text' => '1/7', 'correct' => false],
                ],
                'explanation' => 'Karena penyebut sudah sama (7), cukup jumlahkan pembilangnya: 2 + 3 = 5, jadi 5/7.'
            ],
            [
                'id' => 205,
                'question' => 'KPK dari penyebut 1/4 dan 1/6 yang digunakan untuk menyamakan penyebut adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '10', 'correct' => false],
                    'B' => ['text' => '12', 'correct' => true],
                    'C' => ['text' => '24', 'correct' => false],
                    'D' => ['text' => '6', 'correct' => false],
                ],
                'explanation' => 'Kelipatan 4: 4, 8, 12... dan kelipatan 6: 6, 12... sehingga KPK-nya adalah 12.'
            ]
        ],
        3 => [
            [
                'id' => 301,
                'question' => 'Bentuk persentase dari pecahan 3/4 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '50%', 'correct' => false],
                    'B' => ['text' => '75%', 'correct' => true],
                    'C' => ['text' => '25%', 'correct' => false],
                    'D' => ['text' => '80%', 'correct' => false],
                ],
                'explanation' => '3/4 × 100% = 75%.'
            ],
            [
                'id' => 302,
                'question' => 'Bentuk persentase dari pecahan 1/5 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '20%', 'correct' => true],
                    'B' => ['text' => '15%', 'correct' => false],
                    'C' => ['text' => '25%', 'correct' => false],
                    'D' => ['text' => '50%', 'correct' => false],
                ],
                'explanation' => '1/5 × 100% = 20%.'
            ],
            [
                'id' => 303,
                'question' => 'Manakah perbandingan yang tepat antara 3/5 dan 2/3?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/5 < 2/3', 'correct' => true],
                    'B' => ['text' => '3/5 > 2/3', 'correct' => false],
                    'C' => ['text' => '3/5 = 2/3', 'correct' => false],
                    'D' => ['text' => 'Tidak dapat dibandingkan', 'correct' => false],
                ],
                'explanation' => 'Dengan penyebut 15: 3/5 = 9/15 dan 2/3 = 10/15, sehingga 9/15 < 10/15.'
            ],
            [
                'id' => 304,
                'question' => 'Jika 4/5 bagian dari 100 soal telah selesai dikerjakan, berapa persentase yang sudah selesai?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '45%', 'correct' => false],
                    'B' => ['text' => '80%', 'correct' => true],
                    'C' => ['text' => '60%', 'correct' => false],
                    'D' => ['text' => '90%', 'correct' => false],
                ],
                'explanation' => '4/5 × 100% = 80%.'
            ],
            [
                'id' => 305,
                'question' => 'Pecahan mana yang nilainya paling besar di antara berikut ini?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '1/2 (50%)', 'correct' => false],
                    'B' => ['text' => '7/8 (87,5%)', 'correct' => true],
                    'C' => ['text' => '3/5 (60%)', 'correct' => false],
                    'D' => ['text' => '2/3 (66,7%)', 'correct' => false],
                ],
                'explanation' => '7/8 = 87,5% merupakan nilai terbesar dibandingkan opsi lainnya.'
            ]
        ],
        4 => [
            [
                'id' => 401,
                'question' => 'Bagian dokumen HTML yang memuat metadata dan tautan stylesheet adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<head>', 'correct' => true],
                    'B' => ['text' => '<footer>', 'correct' => false],
                    'C' => ['text' => '<hr>', 'correct' => false],
                    'D' => ['text' => '<br>', 'correct' => false],
                ],
                'explanation' => 'Elemen <head> menyimpan informasi metadata, judul halaman, dan impor CSS/JS.'
            ],
            [
                'id' => 402,
                'question' => 'Elemen semantik HTML yang tepat untuk bagian navigasi utama adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<nav>', 'correct' => true],
                    'B' => ['text' => '<style>', 'correct' => false],
                    'C' => ['text' => '<script>', 'correct' => false],
                    'D' => ['text' => '<code>', 'correct' => false],
                ],
                'explanation' => '<nav> merepresentasikan blok tautan navigasi.'
            ],
            [
                'id' => 403,
                'question' => 'Tujuan utama perancangan antarmuka responsif di CSS adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Agar tampilan tetap rapi di berbagai ukuran layar (laptop & ponsel)', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh elemen gambar', 'correct' => false],
                    'C' => ['text' => 'Menonaktifkan JavaScript di browser', 'correct' => false],
                    'D' => ['text' => 'Mengganti database menjadi file teks', 'correct' => false],
                ],
                'explanation' => 'Tata letak responsif menyesuaikan elemen agar nyaman dibaca pada berbagai perangkat.'
            ],
            [
                'id' => 404,
                'question' => 'Properti CSS yang digunakan untuk memberi jarak di dalam batas border elemen adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'padding', 'correct' => true],
                    'B' => ['text' => 'href', 'correct' => false],
                    'C' => ['text' => 'method', 'correct' => false],
                    'D' => ['text' => 'charset', 'correct' => false],
                ],
                'explanation' => 'Padding memberi ruang kosong di bagian dalam antara konten dan border elemen.'
            ],
            [
                'id' => 405,
                'question' => 'Mengapa pemisahan struktur HTML, gaya CSS, dan logika JS dianjurkan dalam proyek web?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Memudahkan pemeliharaan, debugging, dan kolaborasi tim', 'correct' => true],
                    'B' => ['text' => 'Agar browser tidak perlu me-render halaman', 'correct' => false],
                    'C' => ['text' => 'Karena HTML tidak mendukung warna', 'correct' => false],
                    'D' => ['text' => 'Agar file tidak dapat dibuka di editor kode', 'correct' => false],
                ],
                'explanation' => 'Pemisahan tanggung jawab membuat kode lebih terstruktur dan mudah dikembangkan bersama tim.'
            ]
        ],
        5 => [
            [
                'id' => 501,
                'question' => 'Format data teks ringan yang umum dipakai pada komunikasi API web modern adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'JSON', 'correct' => true],
                    'B' => ['text' => 'MP4', 'correct' => false],
                    'C' => ['text' => 'WAV', 'correct' => false],
                    'D' => ['text' => 'ICO', 'correct' => false],
                ],
                'explanation' => 'JSON (JavaScript Object Notation) banyak digunakan untuk pertukaran data terstruktur pada REST/JSON API.'
            ],
            [
                'id' => 502,
                'question' => 'Kode status HTTP 403 umumnya menunjukkan...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Akses ditolak / tidak memiliki hak akses (Forbidden)', 'correct' => true],
                    'B' => ['text' => 'Halaman berhasil dibuat', 'correct' => false],
                    'C' => ['text' => 'Koneksi internet terputus', 'correct' => false],
                    'D' => ['text' => 'File CSS berhasil dimuat', 'correct' => false],
                ],
                'explanation' => 'Status 403 menandakan pengguna terautentikasi namun tidak memiliki izin untuk sumber daya tersebut.'
            ],
            [
                'id' => 503,
                'question' => 'Fungsi utama Foreign Key pada tabel relasional adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menghubungkan relasi antar-tabel dan menjaga integritas referensi data', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh isi tabel secara otomatis saat SELECT', 'correct' => false],
                    'C' => ['text' => 'Mengganti nama browser pengguna', 'correct' => false],
                    'D' => ['text' => 'Mengompres ukuran gambar', 'correct' => false],
                ],
                'explanation' => 'Foreign Key mengaitkan kolom pada tabel anak ke Primary Key pada tabel induk.'
            ],
            [
                'id' => 504,
                'question' => 'Mengapa validasi input di sisi server tetap penting meski sudah ada validasi di frontend?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Input frontend dapat dilewati atau dimodifikasi langsung oleh klien', 'correct' => true],
                    'B' => ['text' => 'Karena JavaScript tidak dapat membaca form', 'correct' => false],
                    'C' => ['text' => 'Agar database tidak perlu menyimpan data', 'correct' => false],
                    'D' => ['text' => 'Karena server hanya menerima angka biner', 'correct' => false],
                ],
                'explanation' => 'Validasi sisi server melindungi integritas data dan keamanan aplikasi dari permintaan tidak valid.'
            ],
            [
                'id' => 505,
                'question' => 'Pada sistem rekomendasi adaptif EduMind AI, prinsip utama rekomendasi AI adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Menjadi saran belajar pendukung dan dapat ditinjau oleh guru', 'correct' => true],
                    'B' => ['text' => 'Menggantikan peran guru sepenuhnya tanpa peninjauan', 'correct' => false],
                    'C' => ['text' => 'Mengirim data pribadi siswa ke pihak luar tanpa batas', 'correct' => false],
                    'D' => ['text' => 'Menghapus riwayat belajar siswa setelah kuis', 'correct' => false],
                ],
                'explanation' => 'Rekomendasi AI berperan sebagai pendukung saran belajar yang tetap dapat ditinjau oleh guru.'
            ]
        ]
    ];

    if (isset($bank[$topicId])) {
        return $bank[$topicId];
    }

    // Pertanyaan generik untuk topik tambahan yang dibuat guru
    return [
        [
            'id' => $topicId * 10 + 1,
            'question' => 'Langkah pertama sebelum mengerjakan latihan lanjutan pada topik baru adalah...',
            'difficulty' => 'mudah',
            'options' => [
                'A' => ['text' => 'Memahami tujuan pembelajaran dan materi inti topik', 'correct' => true],
                'B' => ['text' => 'Melewati materi dan menebak jawaban', 'correct' => false],
                'C' => ['text' => 'Menutup aplikasi tanpa menyimpan progres', 'correct' => false],
                'D' => ['text' => 'Menghapus catatan belajar', 'correct' => false],
            ],
            'explanation' => 'Membaca materi dan tujuan pembelajaran membantu membangun pemahaman konsep dasar.'
        ],
        [
            'id' => $topicId * 10 + 2,
            'question' => 'Jika nilai kuis berada di bawah batas penguasaan, langkah yang disarankan sistem adalah...',
            'difficulty' => 'sedang',
            'options' => [
                'A' => ['text' => 'Mengulang materi dasar/prasyarat dan latihan bertahap', 'correct' => true],
                'B' => ['text' => 'Mengabaikan pembahasan soal', 'correct' => false],
                'C' => ['text' => 'Menghentikan proses belajar', 'correct' => false],
                'D' => ['text' => 'Mengubah batas nilai menjadi nol', 'correct' => false],
            ],
            'explanation' => 'Rekomendasi adaptif mengarahkan siswa pada penguatan materi sebelum melanjutkan.'
        ]
    ];
}

function classifyScore(int $score): array {
    if ($score <= 59) {
        return [
            'status_key' => 'belum_menguasai',
            'status_label' => 'Belum Menguasai',
            'badge_class' => 'danger',
            'recommendation_type' => 'materi_dasar',
            'recommendation_title' => 'Ulangi Materi Dasar & Prasyarat',
            'action_plan' => 'Pelajari kembali materi dasar dan kerjakan latihan bertahap dari tingkat mudah sebelum mencoba lagi.',
            'reason' => "Nilai $score berada pada rentang 0–59 (Belum Menguasai)."
        ];
    }
    if ($score <= 79) {
        return [
            'status_key' => 'perlu_penguatan',
            'status_label' => 'Perlu Penguatan',
            'badge_class' => 'warning',
            'recommendation_type' => 'materi_penguatan',
            'recommendation_title' => 'Pelajari Materi Penguatan',
            'action_plan' => 'Lakukan penguatan konsep melalui pembahasan soal yang kurang tepat dan latihan tambahan.',
            'reason' => "Nilai $score berada pada rentang 60–79 (Perlu Penguatan)."
        ];
    }
    return [
        'status_key' => 'menguasai',
        'status_label' => 'Menguasai',
        'badge_class' => 'success',
        'recommendation_type' => 'topik_lanjutan',
        'recommendation_title' => 'Lanjutkan ke Topik Berikutnya',
        'action_plan' => 'Kompetensi pada topik ini sudah memenuhi target; lanjutkan ke topik berikutnya atau tingkat tantangan lebih tinggi.',
        'reason' => "Nilai $score berada pada rentang 80–100 (Menguasai)."
    ];
}
