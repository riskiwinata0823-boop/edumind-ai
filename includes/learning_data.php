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
            'description' => 'Pembelajaran adaptif pecahan, operasi penjumlahan & pengurangan/KPK, persentase, desimal, dan perbandingan.'
        ],
        [
            'id' => 2,
            'code' => 'WEB-201',
            'name' => 'Teknologi Web & Logika Pemrograman',
            'description' => 'HTML semantik, CSS responsif, arsitektur API/JSON, HTTP status, RBAC, serta perancangan basis data relasional.'
        ],
        [
            'id' => 3,
            'code' => 'AI-301',
            'name' => 'Dasar Kecerdasan Buatan & Literasi Data',
            'description' => 'Konsep pembelajaran adaptif, aturan rekomendasi, penyusunan prompt berbasis konteks, dan etika privasi data.'
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
            'learning_objectives' => 'Memahami makna pembilang dan penyebut sebagai bagian dari keseluruhan, jenis pecahan, serta penyederhanaan pecahan senilai.',
            'materials' => [
                [
                    'id' => 101,
                    'title' => 'Pembilang, Penyebut, dan Bagian dari Keseluruhan',
                    'estimated_minutes' => 10,
                    'content' => 'Pecahan menyatakan bagian dari keseluruhan yang dibagi sama besar, ditulis dalam bentuk a/b dengan b ≠ 0. Bilangan di atas (a) disebut pembilang yang menunjukkan banyak bagian yang diambil/diperhatikan, sedangkan bilangan di bawah (b) disebut penyebut yang menunjukkan jumlah seluruh potongan sama besar. Misalnya, sebuah kue dipotong menjadi 8 bagian sama besar; jika 3 potong dimakan, bagian yang dimakan bernilai 3/8 dan sisanya 5/8.',
                    'summary' => 'Pembilang = bagian yang diperhatikan | Penyebut = total bagian sama besar (b ≠ 0).'
                ],
                [
                    'id' => 102,
                    'title' => 'Pecahan Senilai dan Penyederhanaan dengan FPB',
                    'estimated_minutes' => 12,
                    'content' => 'Pecahan senilai adalah dua atau lebih pecahan yang memiliki nilai sama meskipun angkanya berbeda, diperoleh dengan mengalikan atau membagi pembilang dan penyebut dengan bilangan yang sama (bukan nol). Untuk menyederhanakan pecahan ke bentuk paling sederhana, bagilah pembilang dan penyebut dengan Faktor Persekutuan Terbesar (FPB). Contoh: pada 12/18, FPB dari 12 dan 18 adalah 6, sehingga 12/18 = (12÷6)/(18÷6) = 2/3.',
                    'summary' => 'Bagi pembilang dan penyebut dengan FPB untuk memperoleh bentuk pecahan paling sederhana.'
                ],
                [
                    'id' => 103,
                    'title' => 'Pecahan Biasa, Pecahan Campuran, dan Pecahan Tidak Murni',
                    'estimated_minutes' => 12,
                    'content' => 'Pecahan biasa murni memiliki pembilang lebih kecil dari penyebut (misal 3/4). Pecahan tidak murni memiliki pembilang lebih besar atau sama dengan penyebut (misal 7/4), yang dapat diubah menjadi pecahan campuran dengan membagi pembilang oleh penyebut: 7 ÷ 4 = 1 sisa 3, sehingga ditulis 1 3/4. Sebaliknya, 1 3/4 = ((1×4)+3)/4 = 7/4.',
                    'summary' => 'Pecahan tidak murni (pembilang ≥ penyebut) dapat diubah menjadi pecahan campuran.'
                ]
            ]
        ],
        [
            'id' => 2,
            'subject_id' => 1,
            'subject_name' => 'Matematika Adaptif',
            'prerequisite_topic_id' => 1,
            'title' => 'Operasi Penjumlahan & Pengurangan Pecahan',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Menyelesaikan penjumlahan dan pengurangan pecahan berpenyebut sama maupun berbeda secara sistematis menggunakan KPK.',
            'materials' => [
                [
                    'id' => 201,
                    'title' => 'Penjumlahan & Pengurangan Berpenyebut Sama',
                    'estimated_minutes' => 10,
                    'content' => 'Apabila penyebut kedua pecahan sudah sama, operasi penjumlahan atau pengurangan hanya dilakukan pada pembilangnya saja, sedangkan penyebut tetap. Contoh: 4/9 + 2/9 = 6/9 (disederhanakan menjadi 2/3), dan 7/10 - 3/10 = 4/10 (disederhanakan menjadi 2/5).',
                    'summary' => 'Jika penyebut sama, operasikan pembilangnya saja lalu sederhanakan hasilnya.'
                ],
                [
                    'id' => 202,
                    'title' => 'Menyamakan Penyebut Berbeda dengan KPK',
                    'estimated_minutes' => 15,
                    'content' => 'Untuk menjumlahkan atau mengurangkan pecahan berpenyebut berbeda seperti 1/2 + 1/4 atau 3/4 - 1/6, tentukan Kelipatan Persekutuan Terkecil (KPK) dari penyebut-penyebutnya terlebih dahulu. Contoh pada 3/4 - 1/6: KPK dari 4 dan 6 adalah 12. Ubah 3/4 = 9/12 dan 1/6 = 2/12, sehingga 9/12 - 2/12 = 7/12. Kesalahan umum yang harus dihindari adalah menjumlahkan penyebut secara langsung.',
                    'summary' => 'Tentukan KPK penyebut -> ubah menjadi pecahan senilai -> jumlahkan/kurangkan pembilang.'
                ],
                [
                    'id' => 203,
                    'title' => 'Operasi Penjumlahan Pecahan Campuran',
                    'estimated_minutes' => 14,
                    'content' => 'Penjumlahan pecahan campuran seperti 1 1/2 + 2 1/4 dapat dikerjakan dengan mengelompokkan bilangan bulat dan bagian pecahannya: (1 + 2) + (1/2 + 1/4) = 3 + (2/4 + 1/4) = 3 3/4, atau dengan mengubah keduanya menjadi pecahan biasa terlebih dahulu (3/2 + 9/4 = 6/4 + 9/4 = 15/4 = 3 3/4).',
                    'summary' => 'Kelompokkan bagian bulat dan pecahan, atau ubah ke pecahan biasa lebih dulu.'
                ]
            ]
        ],
        [
            'id' => 3,
            'subject_id' => 1,
            'subject_name' => 'Matematika Adaptif',
            'prerequisite_topic_id' => 2,
            'title' => 'Persentase, Desimal & Perbandingan',
            'difficulty_level' => 'lanjut',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Mengonversi antar-bentuk pecahan, desimal, dan persentase (%) serta membandingkan nilai pecahan secara akurat.',
            'materials' => [
                [
                    'id' => 301,
                    'title' => 'Konversi Pecahan ke Persentase dan Desimal',
                    'estimated_minutes' => 12,
                    'content' => 'Persentase berarti per seratus (%). Mengubah pecahan ke persentase dilakukan dengan mengalikan pecahan tersebut dengan 100%, misalnya 3/4 × 100% = 75% dan 3/5 × 100% = 60%. Untuk mengubah ke bentuk desimal, bagi pembilang dengan penyebut: 3/4 = 0,75 dan 1/8 = 0,125.',
                    'summary' => 'Pecahan × 100% = Persentase | Pembilang ÷ Penyebut = Desimal.'
                ],
                [
                    'id' => 302,
                    'title' => 'Strategi Membandingkan dan Mengurutkan Pecahan',
                    'estimated_minutes' => 14,
                    'content' => 'Untuk membandingkan pecahan berpenyebut berbeda (seperti 3/5, 2/3, dan 7/10), samakan penyebut ke KPK (30): 3/5 = 18/30, 2/3 = 20/30, dan 7/10 = 21/30. Dari hasil tersebut terlihat urutan dari terkecil ke terbesar adalah 3/5 < 2/3 < 7/10.',
                    'summary' => 'Samakan penyebut atau konversi ke persen/desimal agar perbandingan objektif.'
                ]
            ]
        ],
        [
            'id' => 4,
            'subject_id' => 2,
            'subject_name' => 'Teknologi Web & Logika Pemrograman',
            'prerequisite_topic_id' => null,
            'title' => 'Dasar HTML Semantik & CSS Responsif',
            'difficulty_level' => 'dasar',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami struktur dokumen HTML semantik, model kotak (box model), Flexbox/Grid, serta tata letak responsif.',
            'materials' => [
                [
                    'id' => 401,
                    'title' => 'Struktur Dokumen HTML5 & Elemen Semantik',
                    'estimated_minutes' => 12,
                    'content' => 'Dokumen HTML5 diawali dengan <!DOCTYPE html>, diikuti elemen root <html>, bagian <head> untuk metadata/judul/CSS, serta <body> untuk konten yang tampil. Elemen semantik seperti <header>, <nav>, <main>, <section>, <article>, dan <footer> memberi makna struktur yang jelas bagi pengembang, mesin pencari, dan pembaca layar.',
                    'summary' => 'Elemen semantik meningkatkan keterbacaan kode, aksesibilitas, dan struktur halaman.'
                ],
                [
                    'id' => 402,
                    'title' => 'CSS Box Model, Flexbox/Grid & Desain Responsif',
                    'estimated_minutes' => 15,
                    'content' => 'Setiap elemen HTML dirender sebagai kotak yang terdiri dari content, padding (jarak dalam), border (garis tepi), dan margin (jarak luar). Untuk tata letak modern dan responsif di desktop maupun ponsel, digunakan Flexbox, CSS Grid, satuan relatif (%, rem, vh), serta media queries atau grid system seperti Bootstrap.',
                    'summary' => 'Box Model mengatur jarak elemen; Flexbox/Grid dan media queries menjaga responsivitas.'
                ]
            ]
        ],
        [
            'id' => 5,
            'subject_id' => 2,
            'subject_name' => 'Teknologi Web & Logika Pemrograman',
            'prerequisite_topic_id' => 4,
            'title' => 'Arsitektur API, JSON & Status HTTP',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami alur komunikasi klien-server melalui JSON API, kode status HTTP, validasi sisi server, dan pembatasan hak akses (RBAC).',
            'materials' => [
                [
                    'id' => 501,
                    'title' => 'Komunikasi Klien-Server, Metode HTTP & Format JSON',
                    'estimated_minutes' => 15,
                    'content' => 'Aplikasi web modern memisahkan antarmuka dan pemrosesan data melalui endpoint API yang bertukar data berformat JSON (JavaScript Object Notation). Metode GET digunakan untuk mengambil data, POST untuk mengirim atau mengevaluasi data baru (seperti pengiriman jawaban kuis), PUT/PATCH untuk pembaruan, dan DELETE untuk penghapusan.',
                    'summary' => 'JSON menjadi standar pertukaran data terstruktur yang ringan antara frontend dan backend.'
                ],
                [
                    'id' => 502,
                    'title' => 'Kode Status HTTP, Validasi Server & Otorisasi RBAC',
                    'estimated_minutes' => 15,
                    'content' => 'Kode status HTTP memberi sinyal hasil eksekusi: 200 (OK), 201 (Created), 400/422 (Input tidak valid), 401 (Belum terautentikasi), dan 403 (Forbidden/tidak punya hak akses). Validasi sisi server dan Role-Based Access Control (RBAC) wajib diterapkan agar pengguna tidak bisa melompati batasan peran lewat URL atau request manual.',
                    'summary' => 'Gunakan status HTTP yang tepat dan terapkan validasi + RBAC di sisi server.'
                ]
            ]
        ],
        [
            'id' => 6,
            'subject_id' => 2,
            'subject_name' => 'Teknologi Web & Logika Pemrograman',
            'prerequisite_topic_id' => 5,
            'title' => 'Perancangan Basis Data Relasional & Normalisasi',
            'difficulty_level' => 'lanjut',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Merancang skema tabel relasional dengan Primary Key, Foreign Key, indeks unik, dan normalisasi 1NF–3NF.',
            'materials' => [
                [
                    'id' => 601,
                    'title' => 'Primary Key, Foreign Key & Integritas Referensial',
                    'estimated_minutes' => 15,
                    'content' => 'Primary Key (PK) menjamin setiap baris rekaman bersifat unik dan tidak bernilai NULL. Foreign Key (FK) menghubungkan tabel anak ke PK pada tabel induk—misalnya tabel progress memiliki user_id (FK ke users) dan topic_id (FK ke topics)—sehingga mencegah data yatim (orphan records) dan menjaga konsistensi relasi.',
                    'summary' => 'PK mengidentifikasi baris secara unik; FK menjaga keterhubungan dan integritas antar-tabel.'
                ],
                [
                    'id' => 602,
                    'title' => 'Normalisasi Basis Data (1NF, 2NF, dan 3NF)',
                    'estimated_minutes' => 16,
                    'content' => 'Normalisasi mengurangi redundansi data dan mencegah anomali insert, update, maupun delete. Pada 1NF setiap kolom bernilai atomik (tidak berulang dalam satu sel); pada 2NF atribut non-kunci bergantung penuh pada seluruh Primary Key; dan pada 3NF tidak terdapat ketergantungan transitif antar-atribut non-kunci.',
                    'summary' => '1NF (nilai atomik) -> 2NF (bergantung penuh pada PK) -> 3NF (bebas ketergantungan transitif).'
                ]
            ]
        ],
        [
            'id' => 7,
            'subject_id' => 3,
            'subject_name' => 'Dasar Kecerdasan Buatan & Literasi Data',
            'prerequisite_topic_id' => null,
            'title' => 'Konsep Dasar AI & Pembelajaran Adaptif',
            'difficulty_level' => 'dasar',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami cara kerja sistem pembelajaran adaptif, pemetaan kompetensi berbasis aturan skor, serta peran pengawasan manusia.',
            'materials' => [
                [
                    'id' => 701,
                    'title' => 'Perbedaan Pembelajaran Statis dan Pembelajaran Adaptif',
                    'estimated_minutes' => 12,
                    'content' => 'Pada sistem pembelajaran statis, seluruh siswa menerima urutan materi dan latihan yang identik tanpa memperhatikan perbedaan pemahaman awal. Sebaliknya, sistem pembelajaran adaptif menganalisis hasil evaluasi, tingkat kesulitan, dan riwayat percobaan untuk merekomendasikan jalur belajar yang sesuai kebutuhan individu.',
                    'summary' => 'Pembelajaran adaptif menyesuaikan materi dan latihan berdasarkan bukti capaian tiap siswa.'
                ],
                [
                    'id' => 702,
                    'title' => 'Sistem Berbasis Aturan (Rule-Based) & Human-in-the-Loop',
                    'estimated_minutes' => 14,
                    'content' => 'Pada tahap awal pengembangan, klasifikasi berbasis ambang batas skor (misal 0–59 Belum Menguasai, 60–79 Perlu Penguatan, 80–100 Menguasai) memberikan transparansi penuh dan mudah diaudit. Prinsip Human-in-the-Loop memastikan rekomendasi AI berperan sebagai saran pendukung yang tetap dapat ditinjau oleh guru.',
                    'summary' => 'Aturan skor transparan memudahkan evaluasi awal; guru tetap memegang kendali keputusan.'
                ]
            ]
        ],
        [
            'id' => 8,
            'subject_id' => 3,
            'subject_name' => 'Dasar Kecerdasan Buatan & Literasi Data',
            'prerequisite_topic_id' => 7,
            'title' => 'Prompt Engineering, Konteks Kurikulum & Etika AI',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Menyusun prompt instruksional berbasis konteks materi kurikulum, mencegah jawaban di luar topik, dan menjaga privasi data siswa.',
            'materials' => [
                [
                    'id' => 801,
                    'title' => 'Grounding Konteks Kurikulum pada Asisten Belajar AI',
                    'estimated_minutes' => 14,
                    'content' => 'Asisten Belajar AI yang efektif perlu dibatasi pada konteks materi yang disusun guru (curriculum grounding) serta dilengkapi mode bantuan terstruktur seperti menjelaskan konsep, menyederhanakan bahasa, memberi contoh soal, dan membahas kesalahan umum agar jawaban tetap akurat dan relevan.',
                    'summary' => 'Pembatasan konteks kurikulum menjaga jawaban AI tetap selaras dengan tujuan pembelajaran.'
                ],
                [
                    'id' => 802,
                    'title' => 'Privasi Data Siswa & Pencegahan Ketergantungan AI',
                    'estimated_minutes' => 14,
                    'content' => 'Dalam penerapan AI di pendidikan, data identitas sensitif siswa (seperti email, kata sandi, atau informasi pribadi yang tidak relevan) tidak boleh dikirim ke layanan AI eksternal. Selain itu, asisten AI diarahkan membimbing langkah berpikir siswa, bukan sekadar memberikan jawaban instan tanpa pemahaman.',
                    'summary' => 'Minimalkan pengiriman data pribadi dan arahkan AI untuk membimbing proses berpikir siswa.'
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
    $subjectName = match ($subjectId) {
        2 => 'Teknologi Web & Logika Pemrograman',
        3 => 'Dasar Kecerdasan Buatan & Literasi Data',
        default => 'Matematika Adaptif',
    };

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
                    'D' => ['text' => 'Bilangan bulat', 'correct' => false],
                ],
                'explanation' => 'Angka di bagian bawah (5) adalah penyebut yang menunjukkan jumlah total bagian sama besar.'
            ],
            [
                'id' => 102,
                'question' => 'Pada pecahan 4/9, angka 4 berperan sebagai...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Penyebut', 'correct' => false],
                    'B' => ['text' => 'Pembilang', 'correct' => true],
                    'C' => ['text' => 'Faktor persekutuan', 'correct' => false],
                    'D' => ['text' => 'Kelipatan', 'correct' => false],
                ],
                'explanation' => 'Angka di bagian atas (4) adalah pembilang yang menyatakan banyak bagian yang diperhatikan.'
            ],
            [
                'id' => 103,
                'question' => 'Satu loyang kue dipotong 8 bagian sama besar. Jika 3 potong dimakan, bagian yang dimakan adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '3/8', 'correct' => true],
                    'B' => ['text' => '5/8', 'correct' => false],
                    'C' => ['text' => '8/3', 'correct' => false],
                    'D' => ['text' => '3/5', 'correct' => false],
                ],
                'explanation' => '3 bagian yang dimakan dari total 8 potongan sama besar ditulis 3/8.'
            ],
            [
                'id' => 104,
                'question' => 'Dari sebuah semangka yang dibagi 10 potong sama besar, 7 potong dibagikan. Sisa semangka yang belum dibagikan adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '7/10', 'correct' => false],
                    'B' => ['text' => '3/10', 'correct' => true],
                    'C' => ['text' => '10/3', 'correct' => false],
                    'D' => ['text' => '3/7', 'correct' => false],
                ],
                'explanation' => '10/10 - 7/10 = 3/10 bagian.'
            ],
            [
                'id' => 105,
                'question' => 'Syarat nilai penyebut b pada bentuk pecahan a/b adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'b tidak boleh sama dengan 0', 'correct' => true],
                    'B' => ['text' => 'b harus selalu lebih kecil dari a', 'correct' => false],
                    'C' => ['text' => 'b harus bilangan prima', 'correct' => false],
                    'D' => ['text' => 'b harus bernilai negatif', 'correct' => false],
                ],
                'explanation' => 'Pembagian dengan nol tidak terdefinisi, sehingga b ≠ 0.'
            ],
            [
                'id' => 106,
                'question' => 'Pecahan yang senilai dengan 1/2 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '1/4', 'correct' => false],
                    'B' => ['text' => '3/6', 'correct' => true],
                    'C' => ['text' => '2/5', 'correct' => false],
                    'D' => ['text' => '3/4', 'correct' => false],
                ],
                'explanation' => 'Mengalikan pembilang dan penyebut 1/2 dengan 3 menghasilkan 3/6.'
            ],
            [
                'id' => 107,
                'question' => 'Pecahan yang senilai dengan 2/3 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '4/9', 'correct' => false],
                    'B' => ['text' => '6/9', 'correct' => true],
                    'C' => ['text' => '3/6', 'correct' => false],
                    'D' => ['text' => '2/6', 'correct' => false],
                ],
                'explanation' => '2/3 dikalikan 3/3 menghasilkan 6/9.'
            ],
            [
                'id' => 108,
                'question' => 'Bentuk paling sederhana dari pecahan 12/18 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '6/9', 'correct' => false],
                    'B' => ['text' => '2/3', 'correct' => true],
                    'C' => ['text' => '3/4', 'correct' => false],
                    'D' => ['text' => '4/6', 'correct' => false],
                ],
                'explanation' => 'Membagi pembilang dan penyebut 12/18 dengan FPB-nya (6) menghasilkan 2/3.'
            ],
            [
                'id' => 109,
                'question' => 'Bentuk paling sederhana dari pecahan 15/25 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/5', 'correct' => true],
                    'B' => ['text' => '5/3', 'correct' => false],
                    'C' => ['text' => '1/5', 'correct' => false],
                    'D' => ['text' => '3/10', 'correct' => false],
                ],
                'explanation' => 'FPB dari 15 dan 25 adalah 5; 15÷5 = 3 dan 25÷5 = 5, sehingga 3/5.'
            ],
            [
                'id' => 110,
                'question' => 'Bentuk paling sederhana dari pecahan 16/24 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '4/6', 'correct' => false],
                    'B' => ['text' => '2/3', 'correct' => true],
                    'C' => ['text' => '8/12', 'correct' => false],
                    'D' => ['text' => '3/4', 'correct' => false],
                ],
                'explanation' => 'FPB dari 16 dan 24 adalah 8; 16÷8 = 2 dan 24÷8 = 3, sehingga 2/3.'
            ],
            [
                'id' => 111,
                'question' => 'FPB yang digunakan untuk menyederhanakan pecahan 18/27 ke bentuk paling sederhana adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3', 'correct' => false],
                    'B' => ['text' => '6', 'correct' => false],
                    'C' => ['text' => '9', 'correct' => true],
                    'D' => ['text' => '18', 'correct' => false],
                ],
                'explanation' => 'FPB dari 18 dan 27 adalah 9, menghasilkan 2/3.'
            ],
            [
                'id' => 112,
                'question' => 'Nilai n yang memenuhi kesamaan pecahan senilai 3/4 = n/20 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '12', 'correct' => false],
                    'B' => ['text' => '15', 'correct' => true],
                    'C' => ['text' => '16', 'correct' => false],
                    'D' => ['text' => '9', 'correct' => false],
                ],
                'explanation' => 'Penyebut dikali 5 (4×5=20), maka pembilang juga dikali 5: 3×5 = 15.'
            ],
            [
                'id' => 113,
                'question' => 'Nilai k yang memenuhi kesamaan pecahan senilai 5/8 = 25/k adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '32', 'correct' => false],
                    'B' => ['text' => '40', 'correct' => true],
                    'C' => ['text' => '45', 'correct' => false],
                    'D' => ['text' => '35', 'correct' => false],
                ],
                'explanation' => 'Pembilang dikali 5 (5×5=25), maka penyebut juga dikali 5: 8×5 = 40.'
            ],
            [
                'id' => 114,
                'question' => 'Manakah di antara pecahan berikut yang termasuk pecahan murni (pembilang < penyebut)?',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '7/4', 'correct' => false],
                    'B' => ['text' => '5/5', 'correct' => false],
                    'C' => ['text' => '4/7', 'correct' => true],
                    'D' => ['text' => '9/2', 'correct' => false],
                ],
                'explanation' => '4/7 memiliki pembilang 4 yang lebih kecil daripada penyebut 7.'
            ],
            [
                'id' => 115,
                'question' => 'Manakah di antara pecahan berikut yang termasuk pecahan tidak murni?',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '2/5', 'correct' => false],
                    'B' => ['text' => '3/8', 'correct' => false],
                    'C' => ['text' => '9/4', 'correct' => true],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => '9/4 memiliki pembilang lebih besar dari penyebutnya.'
            ],
            [
                'id' => 116,
                'question' => 'Pecahan tidak murni 7/4 jika diubah menjadi pecahan campuran menjadi...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '1 3/4', 'correct' => true],
                    'B' => ['text' => '2 1/4', 'correct' => false],
                    'C' => ['text' => '1 1/4', 'correct' => false],
                    'D' => ['text' => '3 1/4', 'correct' => false],
                ],
                'explanation' => '7 ÷ 4 = 1 sisa 3, sehingga ditulis 1 3/4.'
            ],
            [
                'id' => 117,
                'question' => 'Pecahan tidak murni 11/3 jika diubah menjadi pecahan campuran adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3 2/3', 'correct' => true],
                    'B' => ['text' => '2 5/3', 'correct' => false],
                    'C' => ['text' => '3 1/3', 'correct' => false],
                    'D' => ['text' => '4 1/3', 'correct' => false],
                ],
                'explanation' => '11 ÷ 3 = 3 sisa 2, sehingga menjadi 3 2/3.'
            ],
            [
                'id' => 118,
                'question' => 'Pecahan tidak murni 17/5 dalam bentuk pecahan campuran adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3 2/5', 'correct' => true],
                    'B' => ['text' => '2 7/5', 'correct' => false],
                    'C' => ['text' => '3 3/5', 'correct' => false],
                    'D' => ['text' => '4 2/5', 'correct' => false],
                ],
                'explanation' => '17 ÷ 5 = 3 sisa 2, sehingga menjadi 3 2/5.'
            ],
            [
                'id' => 119,
                'question' => 'Bentuk pecahan biasa dari pecahan campuran 2 3/5 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '11/5', 'correct' => false],
                    'B' => ['text' => '13/5', 'correct' => true],
                    'C' => ['text' => '10/5', 'correct' => false],
                    'D' => ['text' => '8/5', 'correct' => false],
                ],
                'explanation' => '((2 × 5) + 3) / 5 = 13/5.'
            ],
            [
                'id' => 120,
                'question' => 'Bentuk pecahan biasa dari pecahan campuran 3 1/4 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '13/4', 'correct' => true],
                    'B' => ['text' => '7/4', 'correct' => false],
                    'C' => ['text' => '12/4', 'correct' => false],
                    'D' => ['text' => '9/4', 'correct' => false],
                ],
                'explanation' => '((3 × 4) + 1) / 4 = 13/4.'
            ],
            [
                'id' => 121,
                'question' => 'Bentuk pecahan biasa dari pecahan campuran 4 2/7 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '30/7', 'correct' => true],
                    'B' => ['text' => '28/7', 'correct' => false],
                    'C' => ['text' => '14/7', 'correct' => false],
                    'D' => ['text' => '26/7', 'correct' => false],
                ],
                'explanation' => '((4 × 7) + 2) / 7 = 30/7.'
            ],
            [
                'id' => 122,
                'question' => 'Sebuah kelas berisi 32 siswa, terdiri dari 12 siswa laki-laki dan 20 siswa perempuan. Pecahan paling sederhana untuk siswa laki-laki adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/8', 'correct' => true],
                    'B' => ['text' => '12/20', 'correct' => false],
                    'C' => ['text' => '5/8', 'correct' => false],
                    'D' => ['text' => '3/5', 'correct' => false],
                ],
                'explanation' => '12/32 disederhanakan dengan membagi FPB (4) menjadi 3/8.'
            ],
            [
                'id' => 123,
                'question' => 'Bentuk paling sederhana dari pecahan 36/48 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/4', 'correct' => true],
                    'B' => ['text' => '6/8', 'correct' => false],
                    'C' => ['text' => '9/12', 'correct' => false],
                    'D' => ['text' => '2/3', 'correct' => false],
                ],
                'explanation' => 'FPB dari 36 dan 48 adalah 12; 36÷12 = 3 dan 48÷12 = 4.'
            ],
            [
                'id' => 124,
                'question' => 'Jika pembilang dan penyebut suatu pecahan dikalikan bilangan bulat positif yang sama, maka nilai pecahan tersebut...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Tetap / senilai', 'correct' => true],
                    'B' => ['text' => 'Selalu bertambah besar', 'correct' => false],
                    'C' => ['text' => 'Selalu berkurang', 'correct' => false],
                    'D' => ['text' => 'Berubah menjadi nol', 'correct' => false],
                ],
                'explanation' => 'Mengalikan pembilang dan penyebut dengan bilangan sama (≠ 0) menghasilkan pecahan senilai.'
            ],
            [
                'id' => 125,
                'question' => 'Pecahan 45/60 jika disederhanakan sampai bentuk paling sederhana menjadi...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/4', 'correct' => true],
                    'B' => ['text' => '9/12', 'correct' => false],
                    'C' => ['text' => '15/20', 'correct' => false],
                    'D' => ['text' => '4/5', 'correct' => false],
                ],
                'explanation' => 'FPB dari 45 dan 60 adalah 15; 45÷15 = 3 dan 60÷15 = 4.'
            ],
        ],
        2 => [
            [
                'id' => 201,
                'question' => 'Hasil dari 2/7 + 3/7 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '5/14', 'correct' => false],
                    'B' => ['text' => '5/7', 'correct' => true],
                    'C' => ['text' => '6/7', 'correct' => false],
                    'D' => ['text' => '1/7', 'correct' => false],
                ],
                'explanation' => 'Penyebut sudah sama (7), sehingga pembilang dijumlahkan: 2 + 3 = 5, hasil 5/7.'
            ],
            [
                'id' => 202,
                'question' => 'Hasil dari 7/10 - 3/10 dalam bentuk paling sederhana adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '4/10', 'correct' => false],
                    'B' => ['text' => '2/5', 'correct' => true],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '4/20', 'correct' => false],
                ],
                'explanation' => '7/10 - 3/10 = 4/10; disederhanakan bagi 2 menjadi 2/5.'
            ],
            [
                'id' => 203,
                'question' => 'Hasil dari 4/9 + 2/9 dalam bentuk paling sederhana adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '6/18', 'correct' => false],
                    'B' => ['text' => '2/3', 'correct' => true],
                    'C' => ['text' => '6/9', 'correct' => false],
                    'D' => ['text' => '1/3', 'correct' => false],
                ],
                'explanation' => '4/9 + 2/9 = 6/9; dibagi 3 menghasilkan 2/3.'
            ],
            [
                'id' => 204,
                'question' => 'Hasil dari 1/2 + 1/4 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '2/6', 'correct' => false],
                    'B' => ['text' => '3/4', 'correct' => true],
                    'C' => ['text' => '1/8', 'correct' => false],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => 'KPK 2 dan 4 adalah 4: 2/4 + 1/4 = 3/4.'
            ],
            [
                'id' => 205,
                'question' => 'Hasil dari 2/3 + 1/6 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '5/6', 'correct' => true],
                    'B' => ['text' => '3/9', 'correct' => false],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '3/6', 'correct' => false],
                ],
                'explanation' => 'KPK 3 dan 6 adalah 6: 4/6 + 1/6 = 5/6.'
            ],
            [
                'id' => 206,
                'question' => 'Hasil dari 3/5 + 1/10 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '4/15', 'correct' => false],
                    'B' => ['text' => '7/10', 'correct' => true],
                    'C' => ['text' => '4/10', 'correct' => false],
                    'D' => ['text' => '3/50', 'correct' => false],
                ],
                'explanation' => 'KPK 5 dan 10 adalah 10: 6/10 + 1/10 = 7/10.'
            ],
            [
                'id' => 207,
                'question' => 'Mengapa menjumlahkan 1/2 + 1/3 tidak boleh langsung menjadi 2/5?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Penyebut harus disamakan lewat KPK menjadi 5/6', 'correct' => true],
                    'B' => ['text' => 'Karena 1 + 1 seharusnya 3', 'correct' => false],
                    'C' => ['text' => 'Karena pecahan tidak boleh dijumlahkan', 'correct' => false],
                    'D' => ['text' => 'Karena hasilnya selalu 1', 'correct' => false],
                ],
                'explanation' => 'Penyebut disamakan ke KPK 6: 3/6 + 2/6 = 5/6.'
            ],
            [
                'id' => 208,
                'question' => 'KPK dari penyebut 1/4 dan 1/6 yang digunakan untuk menyamakan penyebut adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '10', 'correct' => false],
                    'B' => ['text' => '12', 'correct' => true],
                    'C' => ['text' => '24', 'correct' => false],
                    'D' => ['text' => '6', 'correct' => false],
                ],
                'explanation' => 'Kelipatan persekutuan terkecil dari 4 dan 6 adalah 12.'
            ],
            [
                'id' => 209,
                'question' => 'Hasil dari 1/4 + 1/6 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '2/10', 'correct' => false],
                    'B' => ['text' => '5/12', 'correct' => true],
                    'C' => ['text' => '1/12', 'correct' => false],
                    'D' => ['text' => '2/24', 'correct' => false],
                ],
                'explanation' => 'Dalam per-12: 3/12 + 2/12 = 5/12.'
            ],
            [
                'id' => 210,
                'question' => 'Hasil pengurangan 3/4 - 1/6 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '2/2', 'correct' => false],
                    'B' => ['text' => '7/12', 'correct' => true],
                    'C' => ['text' => '5/12', 'correct' => false],
                    'D' => ['text' => '1/3', 'correct' => false],
                ],
                'explanation' => 'KPK 4 dan 6 adalah 12: 9/12 - 2/12 = 7/12.'
            ],
            [
                'id' => 211,
                'question' => 'Hasil dari 5/6 - 1/3 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '4/3', 'correct' => false],
                    'B' => ['text' => '1/2', 'correct' => true],
                    'C' => ['text' => '2/3', 'correct' => false],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => '5/6 - 2/6 = 3/6 = 1/2.'
            ],
            [
                'id' => 212,
                'question' => 'Hasil dari 2/5 + 1/3 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/8', 'correct' => false],
                    'B' => ['text' => '11/15', 'correct' => true],
                    'C' => ['text' => '7/15', 'correct' => false],
                    'D' => ['text' => '2/15', 'correct' => false],
                ],
                'explanation' => 'KPK 5 dan 3 adalah 15: 6/15 + 5/15 = 11/15.'
            ],
            [
                'id' => 213,
                'question' => 'Hasil dari 4/5 - 1/2 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/3', 'correct' => false],
                    'B' => ['text' => '3/10', 'correct' => true],
                    'C' => ['text' => '3/7', 'correct' => false],
                    'D' => ['text' => '7/10', 'correct' => false],
                ],
                'explanation' => 'KPK 5 dan 2 adalah 10: 8/10 - 5/10 = 3/10.'
            ],
            [
                'id' => 214,
                'question' => 'Hasil dari 1 1/2 + 2 1/4 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3 3/4', 'correct' => true],
                    'B' => ['text' => '3 2/6', 'correct' => false],
                    'C' => ['text' => '4 1/4', 'correct' => false],
                    'D' => ['text' => '3 1/2', 'correct' => false],
                ],
                'explanation' => '(1 + 2) + (2/4 + 1/4) = 3 3/4.'
            ],
            [
                'id' => 215,
                'question' => 'Hasil dari 2 1/3 + 1 1/6 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3 1/2', 'correct' => true],
                    'B' => ['text' => '3 2/9', 'correct' => false],
                    'C' => ['text' => '3 1/6', 'correct' => false],
                    'D' => ['text' => '4 1/2', 'correct' => false],
                ],
                'explanation' => '(2 + 1) + (2/6 + 1/6) = 3 3/6 = 3 1/2.'
            ],
            [
                'id' => 216,
                'question' => 'Hasil pengurangan 3 3/4 - 1 1/2 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '2 1/4', 'correct' => true],
                    'B' => ['text' => '2 2/2', 'correct' => false],
                    'C' => ['text' => '1 1/4', 'correct' => false],
                    'D' => ['text' => '2 1/2', 'correct' => false],
                ],
                'explanation' => '(3 - 1) + (3/4 - 2/4) = 2 1/4.'
            ],
            [
                'id' => 217,
                'question' => 'Hasil dari 1 - 3/8 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '5/8', 'correct' => true],
                    'B' => ['text' => '3/8', 'correct' => false],
                    'C' => ['text' => '2/8', 'correct' => false],
                    'D' => ['text' => '7/8', 'correct' => false],
                ],
                'explanation' => '1 = 8/8, sehingga 8/8 - 3/8 = 5/8.'
            ],
            [
                'id' => 218,
                'question' => 'Hasil dari 2 - 3/5 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '1 2/5', 'correct' => true],
                    'B' => ['text' => '1 3/5', 'correct' => false],
                    'C' => ['text' => '2/5', 'correct' => false],
                    'D' => ['text' => '7/5', 'correct' => false],
                ],
                'explanation' => '2 = 1 5/5; 1 5/5 - 3/5 = 1 2/5.'
            ],
            [
                'id' => 219,
                'question' => 'Hasil dari 1/2 + 1/3 + 1/6 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '1', 'correct' => true],
                    'B' => ['text' => '3/11', 'correct' => false],
                    'C' => ['text' => '5/6', 'correct' => false],
                    'D' => ['text' => '2/3', 'correct' => false],
                ],
                'explanation' => 'Dalam per-6: 3/6 + 2/6 + 1/6 = 6/6 = 1.'
            ],
            [
                'id' => 220,
                'question' => 'Hasil dari 5/8 + 1/4 - 1/2 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/8', 'correct' => true],
                    'B' => ['text' => '5/8', 'correct' => false],
                    'C' => ['text' => '1/8', 'correct' => false],
                    'D' => ['text' => '7/8', 'correct' => false],
                ],
                'explanation' => 'Dalam per-8: 5/8 + 2/8 - 4/8 = 3/8.'
            ],
            [
                'id' => 221,
                'question' => 'Ibu membeli 3/4 kg gula dan menggunakan 2/5 kg untuk membuat kue. Sisa gula ibu adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '7/20 kg', 'correct' => true],
                    'B' => ['text' => '1/1 kg', 'correct' => false],
                    'C' => ['text' => '5/9 kg', 'correct' => false],
                    'D' => ['text' => '11/20 kg', 'correct' => false],
                ],
                'explanation' => 'KPK 4 dan 5 adalah 20: 15/20 - 8/20 = 7/20 kg.'
            ],
            [
                'id' => 222,
                'question' => 'Pita sepanjang 5/6 meter disambung dengan pita 1/4 meter. Panjang total pita adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '1 1/12 meter', 'correct' => true],
                    'B' => ['text' => '6/10 meter', 'correct' => false],
                    'C' => ['text' => '11/12 meter', 'correct' => false],
                    'D' => ['text' => '1 1/6 meter', 'correct' => false],
                ],
                'explanation' => 'KPK 6 dan 4 adalah 12: 10/12 + 3/12 = 13/12 = 1 1/12 meter.'
            ],
            [
                'id' => 223,
                'question' => 'Hasil dari 2 2/3 - 1 3/4 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '11/12', 'correct' => true],
                    'B' => ['text' => '1 1/12', 'correct' => false],
                    'C' => ['text' => '5/12', 'correct' => false],
                    'D' => ['text' => '7/12', 'correct' => false],
                ],
                'explanation' => '8/3 - 7/4 = 32/12 - 21/12 = 11/12.'
            ],
            [
                'id' => 224,
                'question' => 'Nilai n yang memenuhi persamaan n + 1/3 = 5/6 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '1/2', 'correct' => true],
                    'B' => ['text' => '4/3', 'correct' => false],
                    'C' => ['text' => '2/3', 'correct' => false],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => 'n = 5/6 - 1/3 = 5/6 - 2/6 = 3/6 = 1/2.'
            ],
            [
                'id' => 225,
                'question' => 'Hasil dari 7/12 + 5/18 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '31/36', 'correct' => true],
                    'B' => ['text' => '12/30', 'correct' => false],
                    'C' => ['text' => '19/36', 'correct' => false],
                    'D' => ['text' => '29/36', 'correct' => false],
                ],
                'explanation' => 'KPK 12 dan 18 adalah 36: 21/36 + 10/36 = 31/36.'
            ],
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
                'question' => 'Bentuk persentase dari pecahan 1/2 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '25%', 'correct' => false],
                    'B' => ['text' => '50%', 'correct' => true],
                    'C' => ['text' => '75%', 'correct' => false],
                    'D' => ['text' => '100%', 'correct' => false],
                ],
                'explanation' => '1/2 × 100% = 50%.'
            ],
            [
                'id' => 304,
                'question' => 'Bentuk persentase dari pecahan 3/5 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '35%', 'correct' => false],
                    'B' => ['text' => '60%', 'correct' => true],
                    'C' => ['text' => '65%', 'correct' => false],
                    'D' => ['text' => '75%', 'correct' => false],
                ],
                'explanation' => '3/5 × 100% = 60%.'
            ],
            [
                'id' => 305,
                'question' => 'Bentuk persentase dari pecahan 7/10 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '7%', 'correct' => false],
                    'B' => ['text' => '70%', 'correct' => true],
                    'C' => ['text' => '17%', 'correct' => false],
                    'D' => ['text' => '75%', 'correct' => false],
                ],
                'explanation' => '7/10 × 100% = 70%.'
            ],
            [
                'id' => 306,
                'question' => 'Bentuk desimal dari pecahan 3/4 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '0,34', 'correct' => false],
                    'B' => ['text' => '0,75', 'correct' => true],
                    'C' => ['text' => '0,25', 'correct' => false],
                    'D' => ['text' => '0,43', 'correct' => false],
                ],
                'explanation' => '3 ÷ 4 = 0,75.'
            ],
            [
                'id' => 307,
                'question' => 'Bentuk desimal dari pecahan 1/8 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '0,125', 'correct' => true],
                    'B' => ['text' => '0,18', 'correct' => false],
                    'C' => ['text' => '0,25', 'correct' => false],
                    'D' => ['text' => '0,8', 'correct' => false],
                ],
                'explanation' => '1 ÷ 8 = 0,125.'
            ],
            [
                'id' => 308,
                'question' => 'Bentuk desimal dari pecahan 3/8 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '0,375', 'correct' => true],
                    'B' => ['text' => '0,38', 'correct' => false],
                    'C' => ['text' => '0,625', 'correct' => false],
                    'D' => ['text' => '0,25', 'correct' => false],
                ],
                'explanation' => '3 ÷ 8 = 0,375.'
            ],
            [
                'id' => 309,
                'question' => 'Bentuk desimal dari pecahan 2/5 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '0,2', 'correct' => false],
                    'B' => ['text' => '0,4', 'correct' => true],
                    'C' => ['text' => '0,25', 'correct' => false],
                    'D' => ['text' => '0,5', 'correct' => false],
                ],
                'explanation' => '2 ÷ 5 = 0,4.'
            ],
            [
                'id' => 310,
                'question' => 'Bentuk pecahan paling sederhana dari 40% adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '2/5', 'correct' => true],
                    'B' => ['text' => '4/5', 'correct' => false],
                    'C' => ['text' => '1/4', 'correct' => false],
                    'D' => ['text' => '3/5', 'correct' => false],
                ],
                'explanation' => '40/100 dibagi 20 = 2/5.'
            ],
            [
                'id' => 311,
                'question' => 'Bentuk pecahan paling sederhana dari 25% adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '1/4', 'correct' => true],
                    'B' => ['text' => '1/5', 'correct' => false],
                    'C' => ['text' => '2/5', 'correct' => false],
                    'D' => ['text' => '1/2', 'correct' => false],
                ],
                'explanation' => '25/100 dibagi 25 = 1/4.'
            ],
            [
                'id' => 312,
                'question' => 'Bentuk pecahan paling sederhana dari 65% adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '13/20', 'correct' => true],
                    'B' => ['text' => '6/10', 'correct' => false],
                    'C' => ['text' => '3/5', 'correct' => false],
                    'D' => ['text' => '15/20', 'correct' => false],
                ],
                'explanation' => '65/100 dibagi 5 = 13/20.'
            ],
            [
                'id' => 313,
                'question' => 'Bentuk pecahan paling sederhana dari desimal 0,6 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/5', 'correct' => true],
                    'B' => ['text' => '6/100', 'correct' => false],
                    'C' => ['text' => '2/3', 'correct' => false],
                    'D' => ['text' => '1/6', 'correct' => false],
                ],
                'explanation' => '0,6 = 6/10 = 3/5.'
            ],
            [
                'id' => 314,
                'question' => 'Bentuk pecahan paling sederhana dari desimal 0,125 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '1/8', 'correct' => true],
                    'B' => ['text' => '1/4', 'correct' => false],
                    'C' => ['text' => '1/5', 'correct' => false],
                    'D' => ['text' => '3/8', 'correct' => false],
                ],
                'explanation' => '0,125 = 125/1000 = 1/8.'
            ],
            [
                'id' => 315,
                'question' => 'Manakah perbandingan yang tepat antara 3/5 dan 2/3?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '3/5 < 2/3', 'correct' => true],
                    'B' => ['text' => '3/5 > 2/3', 'correct' => false],
                    'C' => ['text' => '3/5 = 2/3', 'correct' => false],
                    'D' => ['text' => 'Tidak dapat dibandingkan', 'correct' => false],
                ],
                'explanation' => '9/15 < 10/15, sehingga 3/5 < 2/3.'
            ],
            [
                'id' => 316,
                'question' => 'Manakah perbandingan yang tepat antara 4/7 dan 3/5?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '4/7 < 3/5', 'correct' => true],
                    'B' => ['text' => '4/7 > 3/5', 'correct' => false],
                    'C' => ['text' => '4/7 = 3/5', 'correct' => false],
                    'D' => ['text' => 'Tidak terdefinisi', 'correct' => false],
                ],
                'explanation' => 'Dalam per-35: 20/35 < 21/35, sehingga 4/7 < 3/5.'
            ],
            [
                'id' => 317,
                'question' => 'Manakah perbandingan yang tepat antara 5/6 dan 4/5?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '5/6 > 4/5', 'correct' => true],
                    'B' => ['text' => '5/6 < 4/5', 'correct' => false],
                    'C' => ['text' => '5/6 = 4/5', 'correct' => false],
                    'D' => ['text' => 'Keduanya bernilai 1', 'correct' => false],
                ],
                'explanation' => 'Dalam per-30: 25/30 > 24/30.'
            ],
            [
                'id' => 318,
                'question' => 'Urutan pecahan 3/5, 2/3, dan 7/10 dari yang terkecil ke terbesar adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/5, 2/3, 7/10', 'correct' => true],
                    'B' => ['text' => '7/10, 2/3, 3/5', 'correct' => false],
                    'C' => ['text' => '2/3, 3/5, 7/10', 'correct' => false],
                    'D' => ['text' => '3/5, 7/10, 2/3', 'correct' => false],
                ],
                'explanation' => 'Dalam per-30: 18/30 < 20/30 < 21/30.'
            ],
            [
                'id' => 319,
                'question' => 'Urutan bilangan 0,65 ; 3/5 ; 70% dari yang terbesar ke terkecil adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '70%, 0,65, 3/5', 'correct' => true],
                    'B' => ['text' => '0,65, 70%, 3/5', 'correct' => false],
                    'C' => ['text' => '3/5, 0,65, 70%', 'correct' => false],
                    'D' => ['text' => '70%, 3/5, 0,65', 'correct' => false],
                ],
                'explanation' => '70% (0,70) > 0,65 > 3/5 (0,60).'
            ],
            [
                'id' => 320,
                'question' => 'Jika 4/5 bagian dari 100 soal telah selesai dikerjakan, persentase soal yang sudah selesai adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '45%', 'correct' => false],
                    'B' => ['text' => '80%', 'correct' => true],
                    'C' => ['text' => '60%', 'correct' => false],
                    'D' => ['text' => '90%', 'correct' => false],
                ],
                'explanation' => '4/5 × 100% = 80%.'
            ],
            [
                'id' => 321,
                'question' => 'Nilai dari 25% dari 80 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '15', 'correct' => false],
                    'B' => ['text' => '20', 'correct' => true],
                    'C' => ['text' => '25', 'correct' => false],
                    'D' => ['text' => '40', 'correct' => false],
                ],
                'explanation' => '1/4 × 80 = 20.'
            ],
            [
                'id' => 322,
                'question' => 'Nilai dari 3/8 dalam bentuk persentase adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '37,5%', 'correct' => true],
                    'B' => ['text' => '38%', 'correct' => false],
                    'C' => ['text' => '35%', 'correct' => false],
                    'D' => ['text' => '62,5%', 'correct' => false],
                ],
                'explanation' => '3/8 × 100% = 37,5%.'
            ],
            [
                'id' => 323,
                'question' => 'Sebuah toko memberi diskon 20% untuk barang seharga Rp150.000. Besar potongan harganya adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Rp30.000', 'correct' => true],
                    'B' => ['text' => 'Rp20.000', 'correct' => false],
                    'C' => ['text' => 'Rp15.000', 'correct' => false],
                    'D' => ['text' => 'Rp45.000', 'correct' => false],
                ],
                'explanation' => '20/100 × 150.000 = Rp30.000.'
            ],
            [
                'id' => 324,
                'question' => 'Di antara bilangan 5/8, 60%, dan 0,65, bilangan yang nilainya paling kecil adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '60%', 'correct' => true],
                    'B' => ['text' => '5/8', 'correct' => false],
                    'C' => ['text' => '0,65', 'correct' => false],
                    'D' => ['text' => 'Semuanya sama', 'correct' => false],
                ],
                'explanation' => '60% = 0,60; 5/8 = 0,625; 0,65 = 0,65. Jadi 60% paling kecil.'
            ],
            [
                'id' => 325,
                'question' => 'Bentuk persentase dari 1 1/4 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '125%', 'correct' => true],
                    'B' => ['text' => '114%', 'correct' => false],
                    'C' => ['text' => '75%', 'correct' => false],
                    'D' => ['text' => '150%', 'correct' => false],
                ],
                'explanation' => '5/4 × 100% = 125%.'
            ],
        ],
        4 => [
            [
                'id' => 401,
                'question' => 'Deklarasi yang wajib ditulis pada baris pertama dokumen HTML5 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<!DOCTYPE html>', 'correct' => true],
                    'B' => ['text' => '<html5>', 'correct' => false],
                    'C' => ['text' => '<head>', 'correct' => false],
                    'D' => ['text' => '<meta>', 'correct' => false],
                ],
                'explanation' => '<!DOCTYPE html> memberi tahu browser bahwa dokumen menggunakan standar HTML5.'
            ],
            [
                'id' => 402,
                'question' => 'Bagian dokumen HTML yang memuat metadata, judul tab, dan tautan stylesheet adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<head>', 'correct' => true],
                    'B' => ['text' => '<footer>', 'correct' => false],
                    'C' => ['text' => '<hr>', 'correct' => false],
                    'D' => ['text' => '<br>', 'correct' => false],
                ],
                'explanation' => 'Elemen <head> menyimpan metadata dan impor file CSS/JS.'
            ],
            [
                'id' => 403,
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
                'id' => 404,
                'question' => 'Elemen semantik HTML5 yang digunakan untuk membungkus konten utama unik pada suatu halaman adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '<main>', 'correct' => true],
                    'B' => ['text' => '<meta>', 'correct' => false],
                    'C' => ['text' => '<link>', 'correct' => false],
                    'D' => ['text' => '<title>', 'correct' => false],
                ],
                'explanation' => '<main> menandai konten inti utama dari dokumen.'
            ],
            [
                'id' => 405,
                'question' => 'Elemen semantik yang cocok untuk bagian kepala/banner atas halaman atau artikel adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<header>', 'correct' => true],
                    'B' => ['text' => '<footer>', 'correct' => false],
                    'C' => ['text' => '<aside>', 'correct' => false],
                    'D' => ['text' => '<hr>', 'correct' => false],
                ],
                'explanation' => '<header> menampung konten pengantar atau navigasi atas.'
            ],
            [
                'id' => 406,
                'question' => 'Elemen semantik yang digunakan untuk bagian bawah halaman (hak cipta, info kontak) adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '<footer>', 'correct' => true],
                    'B' => ['text' => '<head>', 'correct' => false],
                    'C' => ['text' => '<section>', 'correct' => false],
                    'D' => ['text' => '<nav>', 'correct' => false],
                ],
                'explanation' => '<footer> merepresentasikan bagian penutup dokumen atau bagian halaman.'
            ],
            [
                'id' => 407,
                'question' => 'Tag HTML semantik untuk konten mandiri yang dapat didistribusikan ulang seperti postingan berita adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '<article>', 'correct' => true],
                    'B' => ['text' => '<span>', 'correct' => false],
                    'C' => ['text' => '<div>', 'correct' => false],
                    'D' => ['text' => '<br>', 'correct' => false],
                ],
                'explanation' => '<article> merepresentasikan konten independen dan utuh.'
            ],
            [
                'id' => 408,
                'question' => 'Elemen semantik yang tepat untuk konten sampingan seperti sidebar informasi tambahan adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '<aside>', 'correct' => true],
                    'B' => ['text' => '<main>', 'correct' => false],
                    'C' => ['text' => '<caption>', 'correct' => false],
                    'D' => ['text' => '<thead>', 'correct' => false],
                ],
                'explanation' => '<aside> digunakan untuk konten yang berhubungan secara tidak langsung dengan konten utama.'
            ],
            [
                'id' => 409,
                'question' => 'Manfaat utama penggunaan elemen semantik selain kerapian kode adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Meningkatkan aksesibilitas (screen reader) dan pemahaman struktur oleh mesin pencari', 'correct' => true],
                    'B' => ['text' => 'Membuat koneksi internet lebih cepat', 'correct' => false],
                    'C' => ['text' => 'Menghapus kebutuhan autentikasi pengguna', 'correct' => false],
                    'D' => ['text' => 'Mengubah PHP menjadi bahasa rakitan', 'correct' => false],
                ],
                'explanation' => 'Screen reader dan mesin pencari memanfaatkan tag semantik untuk memahami hierarki halaman.'
            ],
            [
                'id' => 410,
                'question' => 'Pada CSS Box Model, properti yang memberi jarak di dalam batas border elemen adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'padding', 'correct' => true],
                    'B' => ['text' => 'margin', 'correct' => false],
                    'C' => ['text' => 'href', 'correct' => false],
                    'D' => ['text' => 'charset', 'correct' => false],
                ],
                'explanation' => 'Padding memberi ruang di dalam border, sedangkan margin memberi ruang di luar border.'
            ],
            [
                'id' => 411,
                'question' => 'Pada CSS Box Model, properti yang mengatur jarak di luar garis tepi (border) antar-elemen adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'margin', 'correct' => true],
                    'B' => ['text' => 'padding', 'correct' => false],
                    'C' => ['text' => 'border-radius', 'correct' => false],
                    'D' => ['text' => 'font-size', 'correct' => false],
                ],
                'explanation' => 'Margin mengatur jarak luar di sekitar border elemen.'
            ],
            [
                'id' => 412,
                'question' => 'Urutan lapisan CSS Box Model dari bagian paling dalam ke paling luar adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Content -> Padding -> Border -> Margin', 'correct' => true],
                    'B' => ['text' => 'Margin -> Border -> Padding -> Content', 'correct' => false],
                    'C' => ['text' => 'Border -> Content -> Margin -> Padding', 'correct' => false],
                    'D' => ['text' => 'Padding -> Content -> Margin -> Border', 'correct' => false],
                ],
                'explanation' => 'Urutan Box Model dari dalam ke luar adalah content, padding, border, lalu margin.'
            ],
            [
                'id' => 413,
                'question' => 'Properti CSS yang digunakan untuk mengaktifkan tata letak Flexbox pada kontainer adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'display: flex;', 'correct' => true],
                    'B' => ['text' => 'position: flex;', 'correct' => false],
                    'C' => ['text' => 'float: flex;', 'correct' => false],
                    'D' => ['text' => 'align: flex;', 'correct' => false],
                ],
                'explanation' => 'display: flex mengubah kontainer menjadi flex container.'
            ],
            [
                'id' => 414,
                'question' => 'Properti CSS Grid yang mengatur jumlah dan lebar kolom dalam grid adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'grid-template-columns', 'correct' => true],
                    'B' => ['text' => 'flex-direction', 'correct' => false],
                    'C' => ['text' => 'text-align', 'correct' => false],
                    'D' => ['text' => 'border-collapse', 'correct' => false],
                ],
                'explanation' => 'grid-template-columns mendefinisikan struktur kolom pada CSS Grid.'
            ],
            [
                'id' => 415,
                'question' => 'Aturan CSS yang digunakan untuk menerapkan gaya berbeda berdasarkan lebar layar perangkat adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '@media (media queries)', 'correct' => true],
                    'B' => ['text' => '@import', 'correct' => false],
                    'C' => ['text' => '@keyframes', 'correct' => false],
                    'D' => ['text' => '@charset', 'correct' => false],
                ],
                'explanation' => 'Media queries (@media) memungkinkan penyesuaian tampilan responsif sesuai ukuran viewport.'
            ],
            [
                'id' => 416,
                'question' => 'Tag meta di dalam <head> yang penting agar halaman tampil proporsional di layar ponsel adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '<meta name="viewport" content="width=device-width, initial-scale=1.0">', 'correct' => true],
                    'B' => ['text' => '<meta name="author" content="admin">', 'correct' => false],
                    'C' => ['text' => '<meta http-equiv="refresh">', 'correct' => false],
                    'D' => ['text' => '<meta name="keywords">', 'correct' => false],
                ],
                'explanation' => 'Meta viewport mengatur skala lebar halaman mengikuti lebar layar perangkat.'
            ],
            [
                'id' => 417,
                'question' => 'Satuan panjang relatif pada CSS yang mengacu pada ukuran font elemen root (<html>) adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'rem', 'correct' => true],
                    'B' => ['text' => 'px', 'correct' => false],
                    'C' => ['text' => 'cm', 'correct' => false],
                    'D' => ['text' => 'pt', 'correct' => false],
                ],
                'explanation' => '1rem setara dengan ukuran font pada elemen root <html>.'
            ],
            [
                'id' => 418,
                'question' => 'Mengapa pemisahan struktur HTML, gaya CSS, dan logika JS dianjurkan dalam proyek web?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Memudahkan pemeliharaan, debugging, dan kolaborasi tim', 'correct' => true],
                    'B' => ['text' => 'Agar browser tidak perlu me-render halaman', 'correct' => false],
                    'C' => ['text' => 'Karena HTML tidak mendukung warna', 'correct' => false],
                    'D' => ['text' => 'Agar file tidak dapat dibuka di editor', 'correct' => false],
                ],
                'explanation' => 'Separation of concerns menjaga kode rapi dan mudah dikembangkan.'
            ],
            [
                'id' => 419,
                'question' => 'Atribut HTML yang wajib diberikan pada tag <img> untuk aksesibilitas dan teks alternatif gambar adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'alt', 'correct' => true],
                    'B' => ['text' => 'href', 'correct' => false],
                    'C' => ['text' => 'method', 'correct' => false],
                    'D' => ['text' => 'action', 'correct' => false],
                ],
                'explanation' => 'Atribut alt menyediakan deskripsi teks jika gambar gagal dimuat atau dibaca screen reader.'
            ],
            [
                'id' => 420,
                'question' => 'Selector CSS yang menargetkan elemen berdasarkan atribut id unik diawali dengan simbol...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '#', 'correct' => true],
                    'B' => ['text' => '.', 'correct' => false],
                    'C' => ['text' => '*', 'correct' => false],
                    'D' => ['text' => '@', 'correct' => false],
                ],
                'explanation' => 'Selector ID diawali tanda pagar (#), sedangkan class diawali titik (.).'
            ],
            [
                'id' => 421,
                'question' => 'Selector CSS yang menargetkan banyak elemen dengan nama class yang sama diawali dengan simbol...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '. (titik)', 'correct' => true],
                    'B' => ['text' => '# (pagar)', 'correct' => false],
                    'C' => ['text' => '$ (dolar)', 'correct' => false],
                    'D' => ['text' => '& (ampersand)', 'correct' => false],
                ],
                'explanation' => 'Selector class pada CSS diawali dengan titik (.).'
            ],
            [
                'id' => 422,
                'question' => 'Pada sistem grid Bootstrap 5, jumlah total kolom dalam satu baris (.row) adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '12 kolom', 'correct' => true],
                    'B' => ['text' => '8 kolom', 'correct' => false],
                    'C' => ['text' => '10 kolom', 'correct' => false],
                    'D' => ['text' => '16 kolom', 'correct' => false],
                ],
                'explanation' => 'Bootstrap 5 menggunakan sistem grid fleksibel 12 kolom.'
            ],
            [
                'id' => 423,
                'question' => 'Properti CSS box-sizing: border-box berfungsi agar...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Lebar dan tinggi elemen sudah mencakup padding dan border', 'correct' => true],
                    'B' => ['text' => 'Margin elemen otomatis menjadi nol', 'correct' => false],
                    'C' => ['text' => 'Semua teks berubah menjadi huruf kapital', 'correct' => false],
                    'D' => ['text' => 'Gambar tidak dapat diperkecil', 'correct' => false],
                ],
                'explanation' => 'border-box membuat perhitungan width/height mencakup padding dan border.'
            ],
            [
                'id' => 424,
                'question' => 'Tag HTML semantik yang tepat untuk menampilkan judul/keterangan gambar di dalam <figure> adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '<figcaption>', 'correct' => true],
                    'B' => ['text' => '<thead>', 'correct' => false],
                    'C' => ['text' => '<legend>', 'correct' => false],
                    'D' => ['text' => '<label>', 'correct' => false],
                ],
                'explanation' => '<figcaption> memberikan keterangan pada elemen <figure>.'
            ],
            [
                'id' => 425,
                'question' => 'Tujuan utama perancangan antarmuka responsif di CSS adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Agar tampilan tetap rapi dan nyaman dibaca di berbagai ukuran layar (laptop & ponsel)', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh elemen gambar', 'correct' => false],
                    'C' => ['text' => 'Menonaktifkan JavaScript di browser', 'correct' => false],
                    'D' => ['text' => 'Mengganti database menjadi file teks', 'correct' => false],
                ],
                'explanation' => 'Desain responsif beradaptasi terhadap berbagai resolusi perangkat.'
            ],
        ],
        5 => [
            [
                'id' => 501,
                'question' => 'Format data teks ringan berbasis pasangan key-value yang umum dipakai pada API web modern adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'JSON', 'correct' => true],
                    'B' => ['text' => 'MP4', 'correct' => false],
                    'C' => ['text' => 'WAV', 'correct' => false],
                    'D' => ['text' => 'ICO', 'correct' => false],
                ],
                'explanation' => 'JSON (JavaScript Object Notation) merupakan standar pertukaran data terstruktur pada REST API.'
            ],
            [
                'id' => 502,
                'question' => 'Metode HTTP yang digunakan untuk mengambil/membaca data dari server tanpa mengubahnya adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'GET', 'correct' => true],
                    'B' => ['text' => 'POST', 'correct' => false],
                    'C' => ['text' => 'DELETE', 'correct' => false],
                    'D' => ['text' => 'PATCH', 'correct' => false],
                ],
                'explanation' => 'GET bersifat aman (safe) dan digunakan untuk mengambil representasi sumber daya.'
            ],
            [
                'id' => 503,
                'question' => 'Metode HTTP yang paling tepat untuk mengirim jawaban kuis ke endpoint evaluasi adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'POST', 'correct' => true],
                    'B' => ['text' => 'HEAD', 'correct' => false],
                    'C' => ['text' => 'OPTIONS', 'correct' => false],
                    'D' => ['text' => 'TRACE', 'correct' => false],
                ],
                'explanation' => 'POST mengirim payload data dalam body request untuk diproses server.'
            ],
            [
                'id' => 504,
                'question' => 'Metode HTTP yang digunakan untuk menghapus sumber daya tertentu pada server adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'DELETE', 'correct' => true],
                    'B' => ['text' => 'GET', 'correct' => false],
                    'C' => ['text' => 'CONNECT', 'correct' => false],
                    'D' => ['text' => 'OPTIONS', 'correct' => false],
                ],
                'explanation' => 'DELETE meminta penghapusan sumber daya yang ditunjuk URI.'
            ],
            [
                'id' => 505,
                'question' => 'Metode HTTP yang digunakan untuk memperbarui sebagian atribut dari data yang sudah ada adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'PATCH', 'correct' => true],
                    'B' => ['text' => 'GET', 'correct' => false],
                    'C' => ['text' => 'HEAD', 'correct' => false],
                    'D' => ['text' => 'TRACE', 'correct' => false],
                ],
                'explanation' => 'PATCH melakukan pembaruan parsial pada sumber daya.'
            ],
            [
                'id' => 506,
                'question' => 'Kode status HTTP 200 menandakan bahwa permintaan...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Berhasil diproses oleh server (OK)', 'correct' => true],
                    'B' => ['text' => 'Ditolak karena tidak punya izin', 'correct' => false],
                    'C' => ['text' => 'Halaman tidak ditemukan', 'correct' => false],
                    'D' => ['text' => 'Server mengalami kerusakan internal', 'correct' => false],
                ],
                'explanation' => '200 OK menunjukkan request berhasil dieksekusi.'
            ],
            [
                'id' => 507,
                'question' => 'Kode status HTTP 201 umumnya dikembalikan ketika...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Sumber daya baru berhasil dibuat (Created)', 'correct' => true],
                    'B' => ['text' => 'Pengguna belum login', 'correct' => false],
                    'C' => ['text' => 'Format JSON salah sintaks', 'correct' => false],
                    'D' => ['text' => 'URL tidak ditemukan', 'correct' => false],
                ],
                'explanation' => '201 Created menandakan entitas baru sukses disimpan.'
            ],
            [
                'id' => 508,
                'question' => 'Kode status HTTP 400 Bad Request menunjukkan...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Permintaan klien tidak valid atau sintaks payload keliru', 'correct' => true],
                    'B' => ['text' => 'Server berhasil mengirim seluruh data', 'correct' => false],
                    'C' => ['text' => 'Pengguna berhasil logout', 'correct' => false],
                    'D' => ['text' => 'Koneksi database terenkripsi', 'correct' => false],
                ],
                'explanation' => '400 menandakan kesalahan format permintaan dari sisi klien.'
            ],
            [
                'id' => 509,
                'question' => 'Kode status HTTP 401 berbeda dengan 403 karena 401 berarti...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Pengguna belum terautentikasi / kredensial login tidak valid', 'correct' => true],
                    'B' => ['text' => 'Server berhasil memproses seluruh query', 'correct' => false],
                    'C' => ['text' => 'Halaman sedang dalam perbaikan', 'correct' => false],
                    'D' => ['text' => 'Data berhasil dihapus', 'correct' => false],
                ],
                'explanation' => '401 Unauthorized berkaitan dengan autentikasi, sedangkan 403 Forbidden berkaitan dengan otorisasi peran.'
            ],
            [
                'id' => 510,
                'question' => 'Kode status HTTP 403 umumnya menunjukkan...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Akses ditolak / tidak memiliki hak akses (Forbidden)', 'correct' => true],
                    'B' => ['text' => 'Halaman berhasil dibuat', 'correct' => false],
                    'C' => ['text' => 'Koneksi internet terputus', 'correct' => false],
                    'D' => ['text' => 'File CSS berhasil dimuat', 'correct' => false],
                ],
                'explanation' => '403 Forbidden berarti server mengenali pengguna tetapi menolak izin aksesnya.'
            ],
            [
                'id' => 511,
                'question' => 'Kode status HTTP 404 Not Found berarti...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Endpoint atau sumber daya yang diminta tidak ditemukan di server', 'correct' => true],
                    'B' => ['text' => 'Password pengguna salah', 'correct' => false],
                    'C' => ['text' => 'Token autentikasi masih aktif', 'correct' => false],
                    'D' => ['text' => 'Query SQL berhasil', 'correct' => false],
                ],
                'explanation' => '404 menandakan URI/resource tidak tersedia pada server.'
            ],
            [
                'id' => 512,
                'question' => 'Kode status HTTP 422 Unprocessable Entity sering digunakan ketika...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Sintaks JSON benar tetapi gagal lolos aturan validasi data bisnis', 'correct' => true],
                    'B' => ['text' => 'Gambar berhasil diunggah', 'correct' => false],
                    'C' => ['text' => 'Server mati total', 'correct' => false],
                    'D' => ['text' => 'Koneksi Wi-Fi terputus', 'correct' => false],
                ],
                'explanation' => '422 menandakan kesalahan validasi semantik pada input yang dikirim.'
            ],
            [
                'id' => 513,
                'question' => 'Kode status HTTP 500 Internal Server Error menunjukkan...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Terjadi kesalahan tak terduga pada sisi server saat memproses permintaan', 'correct' => true],
                    'B' => ['text' => 'Klien lupa mengisi kolom email', 'correct' => false],
                    'C' => ['text' => 'Token bearer sudah kedaluwarsa', 'correct' => false],
                    'D' => ['text' => 'Browser menggunakan mode gelap', 'correct' => false],
                ],
                'explanation' => 'Kelompok kode 5xx menandakan kegagalan di sisi server.'
            ],
            [
                'id' => 514,
                'question' => 'Header HTTP yang dikirim klien saat mengirim body berformat JSON adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Content-Type: application/json', 'correct' => true],
                    'B' => ['text' => 'Content-Type: image/png', 'correct' => false],
                    'C' => ['text' => 'Cache-Control: no-css', 'correct' => false],
                    'D' => ['text' => 'Accept-Language: binary', 'correct' => false],
                ],
                'explanation' => 'Header Content-Type memberi tahu server format payload request.'
            ],
            [
                'id' => 515,
                'question' => 'Header HTTP yang umum digunakan untuk mengirimkan token autentikasi API adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Authorization: Bearer <token>', 'correct' => true],
                    'B' => ['text' => 'Content-Disposition: inline', 'correct' => false],
                    'C' => ['text' => 'User-Agent: Mozilla', 'correct' => false],
                    'D' => ['text' => 'Refresh: 5', 'correct' => false],
                ],
                'explanation' => 'Skema Bearer pada header Authorization membawa token akses klien.'
            ],
            [
                'id' => 516,
                'question' => 'Apa kepanjangan dan fungsi dari RBAC pada sistem autentikasi aplikasi web?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Role-Based Access Control — membatasi hak akses berdasarkan peran pengguna', 'correct' => true],
                    'B' => ['text' => 'Random Backup And Cache — menghapus sesi pengguna setiap detik', 'correct' => false],
                    'C' => ['text' => 'Relational Browser Auto Compiler — mengubah CSS menjadi SQL', 'correct' => false],
                    'D' => ['text' => 'Remote Binary Access Channel — mematikan server lokal', 'correct' => false],
                ],
                'explanation' => 'RBAC memetakan izin fitur ke peran seperti admin, guru, dan siswa.'
            ],
            [
                'id' => 517,
                'question' => 'Mengapa validasi input di sisi server tetap penting meski sudah ada validasi di frontend?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Input frontend dapat dilewati atau dimodifikasi langsung oleh klien', 'correct' => true],
                    'B' => ['text' => 'Karena JavaScript tidak dapat membaca form', 'correct' => false],
                    'C' => ['text' => 'Agar database tidak perlu menyimpan data', 'correct' => false],
                    'D' => ['text' => 'Karena server hanya menerima biner', 'correct' => false],
                ],
                'explanation' => 'Klien dapat mengirim request langsung lewat Postman/cURL tanpa melalui UI browser.'
            ],
            [
                'id' => 518,
                'question' => 'Fungsi PHP yang digunakan untuk mengubah array asosiatif menjadi string JSON adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'json_encode()', 'correct' => true],
                    'B' => ['text' => 'json_decode()', 'correct' => false],
                    'C' => ['text' => 'serialize()', 'correct' => false],
                    'D' => ['text' => 'implode()', 'correct' => false],
                ],
                'explanation' => 'json_encode() mengonversi struktur data PHP ke format JSON.'
            ],
            [
                'id' => 519,
                'question' => 'Fungsi PHP yang digunakan untuk menguraikan string JSON masuk menjadi array/objek PHP adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'json_decode()', 'correct' => true],
                    'B' => ['text' => 'json_encode()', 'correct' => false],
                    'C' => ['text' => 'explode()', 'correct' => false],
                    'D' => ['text' => 'htmlspecialchars()', 'correct' => false],
                ],
                'explanation' => 'json_decode($raw, true) mengubah teks JSON menjadi array asosiatif.'
            ],
            [
                'id' => 520,
                'question' => 'Pada JavaScript modern, API bawaan browser yang digunakan untuk mengirim request HTTP asinkron adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'fetch()', 'correct' => true],
                    'B' => ['text' => 'alert()', 'correct' => false],
                    'C' => ['text' => 'prompt()', 'correct' => false],
                    'D' => ['text' => 'console.log()', 'correct' => false],
                ],
                'explanation' => 'fetch() mengembalikan Promise untuk komunikasi jaringan HTTP.'
            ],
            [
                'id' => 521,
                'question' => 'Tipe data yang sah di dalam spesifikasi JSON adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'String, Number, Boolean, Null, Object, dan Array', 'correct' => true],
                    'B' => ['text' => 'Hanya String dan Integer', 'correct' => false],
                    'C' => ['text' => 'Function dan Undefined', 'correct' => false],
                    'D' => ['text' => 'Class dan Pointer', 'correct' => false],
                ],
                'explanation' => 'JSON mendukung 6 tipe nilai dasar tersebut.'
            ],
            [
                'id' => 522,
                'question' => 'Pada JSON, tanda kutip yang wajib digunakan untuk membungkus nama key dan nilai string adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Tanda kutip ganda ("...")', 'correct' => true],
                    'B' => ['text' => 'Tanda kutip tunggal (\'...\')', 'correct' => false],
                    'C' => ['text' => 'Tanda backtick (`...`)', 'correct' => false],
                    'D' => ['text' => 'Tanpa tanda kutip', 'correct' => false],
                ],
                'explanation' => 'Standar RFC 8259 mewajibkan tanda kutip ganda untuk key dan string JSON.'
            ],
            [
                'id' => 523,
                'question' => 'Prinsip \'stateless\' pada arsitektur REST API berarti...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Setiap permintaan klien membawa informasi lengkap tanpa bergantung pada state sesi tersembunyi di server', 'correct' => true],
                    'B' => ['text' => 'Server tidak boleh terhubung ke database', 'correct' => false],
                    'C' => ['text' => 'Klien hanya boleh mengirim 1 request per hari', 'correct' => false],
                    'D' => ['text' => 'Semua endpoint harus menggunakan metode GET', 'correct' => false],
                ],
                'explanation' => 'Stateless memudahkan skalabilitas server karena setiap request berdiri sendiri.'
            ],
            [
                'id' => 524,
                'question' => 'Fungsi HTTP status code 405 Method Not Allowed adalah memberi tahu klien bahwa...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Metode HTTP (misal GET) tidak didukung oleh endpoint yang hanya menerima POST', 'correct' => true],
                    'B' => ['text' => 'Akun pengguna telah dihapus', 'correct' => false],
                    'C' => ['text' => 'Kapasitas harddisk penuh', 'correct' => false],
                    'D' => ['text' => 'Sertifikat SSL valid', 'correct' => false],
                ],
                'explanation' => '405 terjadi ketika metode HTTP tidak diizinkan pada route tersebut.'
            ],
            [
                'id' => 525,
                'question' => 'Tujuan penggunaan prepared statement (PDO) saat memproses parameter API ke database adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Mencegah serangan SQL Injection dengan memisahkan perintah SQL dan data parameter', 'correct' => true],
                    'B' => ['text' => 'Mempercepat rendering animasi CSS', 'correct' => false],
                    'C' => ['text' => 'Menghapus kebutuhan indeks tabel', 'correct' => false],
                    'D' => ['text' => 'Mengubah JSON menjadi file ZIP', 'correct' => false],
                ],
                'explanation' => 'Prepared statement mencegah manipulasi kueri SQL melalui input pengguna.'
            ],
        ],
        6 => [
            [
                'id' => 601,
                'question' => 'Syarat utama kolom yang dijadikan Primary Key pada tabel relasional adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Bernilai unik untuk setiap baris dan tidak boleh NULL', 'correct' => true],
                    'B' => ['text' => 'Boleh duplikat asalkan bertipe teks', 'correct' => false],
                    'C' => ['text' => 'Selalu bernilai kosong pada baris pertama', 'correct' => false],
                    'D' => ['text' => 'Hanya boleh digunakan pada tabel sementara', 'correct' => false],
                ],
                'explanation' => 'Primary Key menjamin keunikan setiap rekaman (Entity Integrity).'
            ],
            [
                'id' => 602,
                'question' => 'Fungsi utama Foreign Key pada tabel relasional adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menghubungkan relasi antar-tabel dan menjaga integritas referensi data', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh isi tabel secara otomatis saat SELECT', 'correct' => false],
                    'C' => ['text' => 'Mengganti nama browser pengguna', 'correct' => false],
                    'D' => ['text' => 'Mengompres ukuran gambar', 'correct' => false],
                ],
                'explanation' => 'Foreign Key mereferensikan Primary Key pada tabel induk (Referential Integrity).'
            ],
            [
                'id' => 603,
                'question' => 'Pada skema EduMind AI, tabel penghubung antara kelas (classes) dan siswa (users) adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'class_student', 'correct' => true],
                    'B' => ['text' => 'options', 'correct' => false],
                    'C' => ['text' => 'answers', 'correct' => false],
                    'D' => ['text' => 'subjects', 'correct' => false],
                ],
                'explanation' => 'Tabel class_student memetakan relasi many-to-many antara kelas dan siswa.'
            ],
            [
                'id' => 604,
                'question' => 'Relasi antara satu mata pelajaran (subjects) dengan banyak topik (topics) disebut relasi...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'One-to-Many (1:N)', 'correct' => true],
                    'B' => ['text' => 'One-to-One (1:1)', 'correct' => false],
                    'C' => ['text' => 'Many-to-Many (M:N) tanpa tabel perantara', 'correct' => false],
                    'D' => ['text' => 'Self-Join', 'correct' => false],
                ],
                'explanation' => 'Satu subjek dapat memiliki banyak topik, sedangkan satu topik milik satu subjek.'
            ],
            [
                'id' => 605,
                'question' => 'Syarat utama agar sebuah tabel memenuhi Bentuk Normal Pertama (1NF) adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Setiap kolom bernilai atomik (tunggal) dan tidak ada grup berulang dalam satu sel', 'correct' => true],
                    'B' => ['text' => 'Seluruh tabel digabung menjadi satu tabel besar', 'correct' => false],
                    'C' => ['text' => 'Menghapus semua Primary Key dari tabel', 'correct' => false],
                    'D' => ['text' => 'Menyimpan daftar nilai dipisahkan koma di satu kolom', 'correct' => false],
                ],
                'explanation' => '1NF mewajibkan setiap sel menyimpan nilai atomik tunggal.'
            ],
            [
                'id' => 606,
                'question' => 'Contoh pelanggaran 1NF pada tabel siswa adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menyimpan beberapa nomor telepon dipisahkan koma dalam satu kolom no_hp', 'correct' => true],
                    'B' => ['text' => 'Memiliki kolom id AUTO_INCREMENT', 'correct' => false],
                    'C' => ['text' => 'Menggunakan tipe data VARCHAR(120) untuk nama', 'correct' => false],
                    'D' => ['text' => 'Menambahkan kolom created_at', 'correct' => false],
                ],
                'explanation' => 'Multi-valued attribute dalam satu kolom melanggar prinsip atomisitas 1NF.'
            ],
            [
                'id' => 607,
                'question' => 'Bentuk Normal Kedua (2NF) mensyaratkan tabel sudah 1NF dan...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Tidak ada ketergantungan parsial atribut non-kunci terhadap sebagian Primary Key komposit', 'correct' => true],
                    'B' => ['text' => 'Semua kolom harus bertipe VARCHAR(255)', 'correct' => false],
                    'C' => ['text' => 'Tidak boleh memiliki Foreign Key', 'correct' => false],
                    'D' => ['text' => 'Jumlah baris maksimal 100 data', 'correct' => false],
                ],
                'explanation' => 'Pada 2NF setiap atribut non-kunci harus bergantung penuh pada keseluruhan Primary Key.'
            ],
            [
                'id' => 608,
                'question' => 'Bentuk Normal Ketiga (3NF) bertujuan menghilangkan...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Ketergantungan transitif antar-atribut non-kunci', 'correct' => true],
                    'B' => ['text' => 'Seluruh indeks unik pada tabel', 'correct' => false],
                    'C' => ['text' => 'Relasi one-to-many antar-tabel', 'correct' => false],
                    'D' => ['text' => 'Tipe data TIMESTAMP', 'correct' => false],
                ],
                'explanation' => '3NF memastikan atribut non-kunci hanya bergantung pada Primary Key, bukan pada atribut non-kunci lain.'
            ],
            [
                'id' => 609,
                'question' => 'Contoh ketergantungan transitif yang melanggar 3NF pada tabel attempts adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Menyimpan kolom subject_name padahal sudah ada topic_id yang menentukan subject_id dan subject_name', 'correct' => true],
                    'B' => ['text' => 'Menyimpan kolom score bertipe INT', 'correct' => false],
                    'C' => ['text' => 'Menyimpan kolom submitted_at', 'correct' => false],
                    'D' => ['text' => 'Menyimpan kolom user_id sebagai Foreign Key', 'correct' => false],
                ],
                'explanation' => 'subject_name bergantung pada subject_id/topic_id (non-key), bukan langsung pada id attempt.'
            ],
            [
                'id' => 610,
                'question' => 'Tujuan pemberian constraint UNIQUE (user_id, topic_id) pada tabel progress adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Memastikan setiap siswa hanya memiliki satu rekaman ringkasan progres per topik', 'correct' => true],
                    'B' => ['text' => 'Membatasi siswa hanya boleh mengerjakan 1 soal seumur hidup', 'correct' => false],
                    'C' => ['text' => 'Menghapus nilai terbaik siswa secara otomatis', 'correct' => false],
                    'D' => ['text' => 'Mencegah guru melihat dashboard kelas', 'correct' => false],
                ],
                'explanation' => 'Composite unique key mencegah duplikasi baris progres untuk pasangan siswa-topik yang sama.'
            ],
            [
                'id' => 611,
                'question' => 'Anomali basis data yang terjadi ketika menghapus satu baris data ikut menghilangkan informasi penting lain yang tidak terkait disebut...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Deletion Anomaly (Anomali Penghapusan)', 'correct' => true],
                    'B' => ['text' => 'Insertion Anomaly', 'correct' => false],
                    'C' => ['text' => 'Update Anomaly', 'correct' => false],
                    'D' => ['text' => 'Syntax Error', 'correct' => false],
                ],
                'explanation' => 'Deletion anomaly muncul akibat penggabungan entitas berbeda dalam satu tabel belum ternormalisasi.'
            ],
            [
                'id' => 612,
                'question' => 'Anomali ketika pembaruan satu fakta harus dilakukan berulang di banyak baris dan berisiko tidak konsisten disebut...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Update Anomaly (Anomali Pembaruan)', 'correct' => true],
                    'B' => ['text' => 'Deletion Anomaly', 'correct' => false],
                    'C' => ['text' => 'Buffer Overflow', 'correct' => false],
                    'D' => ['text' => 'Deadlock', 'correct' => false],
                ],
                'explanation' => 'Redundansi data menyebabkan perubahan di satu tempat tidak otomatis memperbarui salinan lainnya.'
            ],
            [
                'id' => 613,
                'question' => 'Tipe data SQL yang paling tepat untuk menyimpan nilai pilihan terdefinisi seperti (\'admin\', \'guru\', \'siswa\') adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'ENUM', 'correct' => true],
                    'B' => ['text' => 'BLOB', 'correct' => false],
                    'C' => ['text' => 'FLOAT', 'correct' => false],
                    'D' => ['text' => 'DATE', 'correct' => false],
                ],
                'explanation' => 'ENUM membatasi nilai kolom hanya pada daftar konstanta yang diizinkan.'
            ],
            [
                'id' => 614,
                'question' => 'Opsi referensi ON DELETE CASCADE pada Foreign Key berarti...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Jika baris induk dihapus, baris anak yang mereferensikannya ikut terhapus otomatis', 'correct' => true],
                    'B' => ['text' => 'Baris induk tidak pernah bisa dihapus selamanya', 'correct' => false],
                    'C' => ['text' => 'Kolom Foreign Key berubah menjadi nol', 'correct' => false],
                    'D' => ['text' => 'Seluruh database di-reset', 'correct' => false],
                ],
                'explanation' => 'ON DELETE CASCADE menjaga integritas referensial dengan menghapus rekaman turunan terkait.'
            ],
            [
                'id' => 615,
                'question' => 'Opsi referensi ON DELETE SET NULL pada Foreign Key (misal teacher_id pada tabel classes) berarti...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Jika akun guru dihapus, data kelas tetap ada dengan teacher_id bernilai NULL', 'correct' => true],
                    'B' => ['text' => 'Data kelas ikut terhapus seluruhnya', 'correct' => false],
                    'C' => ['text' => 'Nilai teacher_id diisi angka acak', 'correct' => false],
                    'D' => ['text' => 'Tabel classes terkunci', 'correct' => false],
                ],
                'explanation' => 'SET NULL mempertahankan rekaman kelas meski referensi guru dihapus.'
            ],
            [
                'id' => 616,
                'question' => 'Perintah SQL untuk mengambil data gabungan dari tabel topics dan subjects berdasarkan subject_id adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'INNER JOIN', 'correct' => true],
                    'B' => ['text' => 'DROP TABLE', 'correct' => false],
                    'C' => ['text' => 'TRUNCATE', 'correct' => false],
                    'D' => ['text' => 'ALTER USER', 'correct' => false],
                ],
                'explanation' => 'INNER JOIN menggabungkan baris dari dua tabel yang memenuhi kondisi relasi.'
            ],
            [
                'id' => 617,
                'question' => 'Fungsi utama pembuatan INDEX pada kolom yang sering dipakai dalam klausa WHERE atau JOIN adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Mempercepat proses pencarian dan pengambilan data kueri', 'correct' => true],
                    'B' => ['text' => 'Mengurangi jumlah kolom tabel', 'correct' => false],
                    'C' => ['text' => 'Menghapus duplikat password', 'correct' => false],
                    'D' => ['text' => 'Mengubah mesin penyimpanan ke CSV', 'correct' => false],
                ],
                'explanation' => 'Indeks mempercepat pencarian tanpa harus memindai seluruh baris tabel (full table scan).'
            ],
            [
                'id' => 618,
                'question' => 'Engine penyimpanan standar MySQL yang mendukung transaksi ACID dan Foreign Key adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'InnoDB', 'correct' => true],
                    'B' => ['text' => 'MyISAM', 'correct' => false],
                    'C' => ['text' => 'MEMORY', 'correct' => false],
                    'D' => ['text' => 'CSV', 'correct' => false],
                ],
                'explanation' => 'InnoDB mendukung transaksi (COMMIT/ROLLBACK) dan referential integrity.'
            ],
            [
                'id' => 619,
                'question' => 'Klausa SQL yang digunakan pada tabel progress untuk memperbarui skor jika kombinasi (user_id, topic_id) sudah ada adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'ON DUPLICATE KEY UPDATE', 'correct' => true],
                    'B' => ['text' => 'GROUP BY HAVING', 'correct' => false],
                    'C' => ['text' => 'UNION ALL', 'correct' => false],
                    'D' => ['text' => 'CROSS JOIN', 'correct' => false],
                ],
                'explanation' => 'ON DUPLICATE KEY UPDATE melakukan upsert ketika terjadi benturan unique key.'
            ],
            [
                'id' => 620,
                'question' => 'Fungsi agregat SQL untuk menghitung rata-rata nilai siswa pada suatu topik adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'AVG()', 'correct' => true],
                    'B' => ['text' => 'COUNT()', 'correct' => false],
                    'C' => ['text' => 'SUM()', 'correct' => false],
                    'D' => ['text' => 'MIN()', 'correct' => false],
                ],
                'explanation' => 'AVG(score) menghitung nilai rata-rata kolom score.'
            ],
            [
                'id' => 621,
                'question' => 'Fungsi agregat SQL untuk menghitung jumlah total percobaan kuis yang dilakukan siswa adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'COUNT()', 'correct' => true],
                    'B' => ['text' => 'MAX()', 'correct' => false],
                    'C' => ['text' => 'AVG()', 'correct' => false],
                    'D' => ['text' => 'ROUND()', 'correct' => false],
                ],
                'explanation' => 'COUNT(*) menghitung banyaknya baris rekaman.'
            ],
            [
                'id' => 622,
                'question' => 'Pada perancangan ERD, atribut yang terdiri dari beberapa sub-bagian (misal alamat lengkap menjadi jalan, kota, provinsi) disebut...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Atribut Komposit (Composite Attribute)', 'correct' => true],
                    'B' => ['text' => 'Atribut Kunci', 'correct' => false],
                    'C' => ['text' => 'Atribut Turunan', 'correct' => false],
                    'D' => ['text' => 'Entitas Lemah', 'correct' => false],
                ],
                'explanation' => 'Atribut komposit dapat dipecah menjadi komponen-komponen yang lebih kecil.'
            ],
            [
                'id' => 623,
                'question' => 'Atribut yang nilainya diperoleh dari hasil perhitungan atribut lain (misal jumlah percobaan dari tabel attempts) disebut...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Atribut Turunan (Derived Attribute)', 'correct' => true],
                    'B' => ['text' => 'Primary Key', 'correct' => false],
                    'C' => ['text' => 'Foreign Key', 'correct' => false],
                    'D' => ['text' => 'Atribut Atomik', 'correct' => false],
                ],
                'explanation' => 'Derived attribute dihitung dari data lain yang tersimpan.'
            ],
            [
                'id' => 624,
                'question' => 'Kardinalitas hubungan antara tabel questions dan options pada EduMind AI adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Satu pertanyaan memiliki banyak opsi jawaban (1:N)', 'correct' => true],
                    'B' => ['text' => 'Satu opsi memiliki banyak pertanyaan (N:1)', 'correct' => false],
                    'C' => ['text' => 'Satu pertanyaan hanya boleh punya 1 opsi (1:1)', 'correct' => false],
                    'D' => ['text' => 'Tidak memiliki relasi', 'correct' => false],
                ],
                'explanation' => 'Setiap soal pilihan ganda memiliki beberapa opsi (A, B, C, D).'
            ],
            [
                'id' => 625,
                'question' => 'Tujuan utama normalisasi basis data hingga 3NF dalam pengembangan aplikasi web adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Mengurangi redundansi data dan menjaga konsistensi integritas data jangka panjang', 'correct' => true],
                    'B' => ['text' => 'Membuat kueri SQL tidak memerlukan WHERE', 'correct' => false],
                    'C' => ['text' => 'Menghapus semua relasi tabel', 'correct' => false],
                    'D' => ['text' => 'Mengubah semua tipe data menjadi TEXT', 'correct' => false],
                ],
                'explanation' => 'Normalisasi mencegah redundansi berlebih dan anomali manipulasi data.'
            ],
        ],
        7 => [
            [
                'id' => 701,
                'question' => 'Perbedaan utama platform pembelajaran adaptif dibandingkan pembelajaran digital statis adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menyesuaikan rekomendasi materi dan latihan berdasarkan hasil evaluasi tiap siswa', 'correct' => true],
                    'B' => ['text' => 'Menampilkan materi yang sama persis tanpa mempedulikan nilai kuis', 'correct' => false],
                    'C' => ['text' => 'Menghilangkan seluruh evaluasi pembelajaran', 'correct' => false],
                    'D' => ['text' => 'Hanya dapat digunakan oleh satu pengguna saja', 'correct' => false],
                ],
                'explanation' => 'Pembelajaran adaptif mempersonalisasi jalur belajar sesuai capaian dan kesulitan masing-masing siswa.'
            ],
            [
                'id' => 702,
                'question' => 'Pada aturan klasifikasi skor awal EduMind AI, nilai 0–59 dikategorikan sebagai...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Belum Menguasai (disarankan mengulang materi dasar/prasyarat)', 'correct' => true],
                    'B' => ['text' => 'Menguasai (langsung ke topik lanjutan)', 'correct' => false],
                    'C' => ['text' => 'Lulus Tanpa Evaluasi', 'correct' => false],
                    'D' => ['text' => 'Perlu Penguatan Lanjut', 'correct' => false],
                ],
                'explanation' => 'Rentang skor 0–59 menandakan konsep dasar belum dikuasai sehingga perlu pengulangan materi prasyarat.'
            ],
            [
                'id' => 703,
                'question' => 'Jika seorang siswa memperoleh nilai 70 pada kuis EduMind AI, status penguasaannya adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Perlu Penguatan (rentang 60–79)', 'correct' => true],
                    'B' => ['text' => 'Belum Menguasai (rentang 0–59)', 'correct' => false],
                    'C' => ['text' => 'Menguasai (rentang 80–100)', 'correct' => false],
                    'D' => ['text' => 'Tidak Terdaftar', 'correct' => false],
                ],
                'explanation' => 'Skor 60–79 masuk kategori Perlu Penguatan untuk memperdalam konsep yang masih keliru.'
            ],
            [
                'id' => 704,
                'question' => 'Siswa yang mencapai skor 85 pada suatu topik akan mendapatkan rekomendasi berupa...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Lanjutkan ke topik berikutnya atau tingkat tantangan lebih tinggi', 'correct' => true],
                    'B' => ['text' => 'Mengulang dari awal seluruh mata pelajaran', 'correct' => false],
                    'C' => ['text' => 'Menghapus akun dari kelas', 'correct' => false],
                    'D' => ['text' => 'Menonaktifkan Asisten Belajar AI', 'correct' => false],
                ],
                'explanation' => 'Skor 80–100 dikategorikan Menguasai sehingga siswa diarahkan ke topik lanjutan.'
            ],
            [
                'id' => 705,
                'question' => 'Batas nilai minimal (mastery threshold) standar pada topik EduMind AI untuk dikategorikan Menguasai adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '80', 'correct' => true],
                    'B' => ['text' => '50', 'correct' => false],
                    'C' => ['text' => '60', 'correct' => false],
                    'D' => ['text' => '100', 'correct' => false],
                ],
                'explanation' => 'Nilai 80–100 ditetapkan sebagai ambang batas penguasaan kompetensi.'
            ],
            [
                'id' => 706,
                'question' => 'Jika seorang siswa mendapat skor tepat 59, status penguasaannya menurut aturan klasifikasi adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Belum Menguasai', 'correct' => true],
                    'B' => ['text' => 'Perlu Penguatan', 'correct' => false],
                    'C' => ['text' => 'Menguasai', 'correct' => false],
                    'D' => ['text' => 'Lulus Sempurna', 'correct' => false],
                ],
                'explanation' => 'Rentang 0–59 masuk dalam kategori Belum Menguasai.'
            ],
            [
                'id' => 707,
                'question' => 'Jika seorang siswa mendapat skor tepat 60, status penguasaannya adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Perlu Penguatan', 'correct' => true],
                    'B' => ['text' => 'Belum Menguasai', 'correct' => false],
                    'C' => ['text' => 'Menguasai', 'correct' => false],
                    'D' => ['text' => 'Tidak Aktif', 'correct' => false],
                ],
                'explanation' => 'Rentang 60–79 masuk kategori Perlu Penguatan.'
            ],
            [
                'id' => 708,
                'question' => 'Jika seorang siswa mendapat skor tepat 80, status penguasaannya adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menguasai', 'correct' => true],
                    'B' => ['text' => 'Perlu Penguatan', 'correct' => false],
                    'C' => ['text' => 'Belum Menguasai', 'correct' => false],
                    'D' => ['text' => 'Perlu Remedial Dasar', 'correct' => false],
                ],
                'explanation' => 'Nilai 80 sudah memenuhi batas bawah kategori Menguasai (80–100).'
            ],
            [
                'id' => 709,
                'question' => 'Mengapa aturan berbasis ambang batas skor dipilih pada tahap awal (MVP) EduMind AI?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Transparan, mudah diuji, dan jelas alasan rekomendasinya bagi siswa maupun guru', 'correct' => true],
                    'B' => ['text' => 'Karena komputer tidak bisa menghitung persentase', 'correct' => false],
                    'C' => ['text' => 'Agar guru tidak perlu memantau perkembangan kelas', 'correct' => false],
                    'D' => ['text' => 'Karena data kuis tidak perlu disimpan', 'correct' => false],
                ],
                'explanation' => 'Rule-based threshold mudah diaudit dan divalidasi sebelum beralih ke model kompleks.'
            ],
            [
                'id' => 710,
                'question' => 'Makna prinsip Human-in-the-Loop pada sistem rekomendasi EduMind AI adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Rekomendasi AI bersifat saran pendukung dan tetap dapat ditinjau oleh guru', 'correct' => true],
                    'B' => ['text' => 'AI menggantikan peran guru sepenuhnya tanpa pengawasan', 'correct' => false],
                    'C' => ['text' => 'Siswa dilarang bertanya kepada guru', 'correct' => false],
                    'D' => ['text' => 'Nilai siswa diubah secara acak oleh sistem', 'correct' => false],
                ],
                'explanation' => 'Keputusan pembelajaran dan peninjauan akhir tetap berada pada kendali guru dan siswa.'
            ],
            [
                'id' => 711,
                'question' => 'Komponen data apa saja yang mendukung pemetaan kompetensi pada tabel progress?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'best_score, latest_score, attempts_count, materials_completed, dan mastery_status', 'correct' => true],
                    'B' => ['text' => 'Hanya warna tema browser pengguna', 'correct' => false],
                    'C' => ['text' => 'Ukuran layar monitor dan merek keyboard', 'correct' => false],
                    'D' => ['text' => 'Password plaintext pengguna', 'correct' => false],
                ],
                'explanation' => 'Tabel progress merekam skor terbaik, skor terbaru, jumlah percobaan, materi selesai, dan status penguasaan.'
            ],
            [
                'id' => 712,
                'question' => 'Tujuan pencatatan kolom prerequisite_topic_id pada tabel topics adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menentukan topik prasyarat dasar yang perlu dikuasai sebelum mempelajari topik lanjutan', 'correct' => true],
                    'B' => ['text' => 'Menyimpan password admin', 'correct' => false],
                    'C' => ['text' => 'Menghapus soal kuis lama', 'correct' => false],
                    'D' => ['text' => 'Mengatur warna tombol login', 'correct' => false],
                ],
                'explanation' => 'Topik prasyarat membantu sistem mengarahkan siswa mengulang pondasi yang tepat saat skor rendah.'
            ],
            [
                'id' => 713,
                'question' => 'Pada sistem pembelajaran adaptif, siklus umpan balik (feedback loop) belajar terdiri dari...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Belajar materi -> Evaluasi kuis -> Analisis skor & kesalahan -> Rekomendasi jalur berikutnya', 'correct' => true],
                    'B' => ['text' => 'Login -> Logout tanpa aktivitas', 'correct' => false],
                    'C' => ['text' => 'Menghapus database -> Instal ulang', 'correct' => false],
                    'D' => ['text' => 'Mencetak brosur -> Menutup browser', 'correct' => false],
                ],
                'explanation' => 'Siklus adaptif menghubungkan aktivitas belajar, asesmen, diagnostik, dan tindak lanjut.'
            ],
            [
                'id' => 714,
                'question' => 'Manfaat analitik topik tersulit pada dashboard guru adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Membantu guru mengidentifikasi materi mana yang paling banyak gagal dipahami siswa di kelas', 'correct' => true],
                    'B' => ['text' => 'Menghapus akun siswa yang nilainya rendah', 'correct' => false],
                    'C' => ['text' => 'Menonaktifkan kuis secara permanen', 'correct' => false],
                    'D' => ['text' => 'Mengganti mata pelajaran secara acak', 'correct' => false],
                ],
                'explanation' => 'Guru dapat segera memberikan intervensi atau penjelasan tambahan pada topik yang tingkat kesulitannya tinggi.'
            ],
            [
                'id' => 715,
                'question' => 'Apa perbedaan antara penilaian sumatif tradisional dan penilaian diagnostik adaptif?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Penilaian adaptif memetakan titik lemah konsep dan langsung memberi rekomendasi belajar lanjutan', 'correct' => true],
                    'B' => ['text' => 'Penilaian adaptif tidak menghitung skor sama sekali', 'correct' => false],
                    'C' => ['text' => 'Penilaian sumatif dilakukan setiap 1 menit', 'correct' => false],
                    'D' => ['text' => 'Penilaian adaptif hanya menggunakan pertanyaan lisan', 'correct' => false],
                ],
                'explanation' => 'Penilaian adaptif berorientasi pada perbaikan proses belajar individu, bukan sekadar angka akhir.'
            ],
            [
                'id' => 716,
                'question' => 'Data riwayat percobaan kuis (attempts) berguna untuk menganalisis...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Perkembangan peningkatan skor siswa dari percobaan pertama hingga percobaan berikutnya', 'correct' => true],
                    'B' => ['text' => 'Jenis kartu grafis laptop siswa', 'correct' => false],
                    'C' => ['text' => 'Alamat rumah orang tua siswa', 'correct' => false],
                    'D' => ['text' => 'Warna favorit pengguna', 'correct' => false],
                ],
                'explanation' => 'Tracking lintas attempt memperlihatkan kurva belajar dan efektivitas materi penguatan.'
            ],
            [
                'id' => 717,
                'question' => 'Dalam sistem berbasis aturan (Rule-Based AI), komponen utama yang menentukan keputusan adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Kumpulan kondisi IF-THEN yang dirumuskan berdasarkan pengetahuan pakar/kurikulum', 'correct' => true],
                    'B' => ['text' => 'Jaringan saraf tiruan tanpa aturan apa pun', 'correct' => false],
                    'C' => ['text' => 'Pengundian angka acak', 'correct' => false],
                    'D' => ['text' => 'Kecepatan mengetik pengguna', 'correct' => false],
                ],
                'explanation' => 'Sistem berbasis aturan menggunakan logika kondisi eksplisit seperti rentang nilai.'
            ],
            [
                'id' => 718,
                'question' => 'Keterbatasan utama sistem berbasis aturan statis yang memotivasi pengembangan tahap lanjut (seperti IRT atau BKT) adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Belum memperhitungkan bobot tingkat kesulitan tiap butir soal dan probabilitas menebak', 'correct' => true],
                    'B' => ['text' => 'Tidak bisa berjalan di browser modern', 'correct' => false],
                    'C' => ['text' => 'Tidak mendukung bahasa Indonesia', 'correct' => false],
                    'D' => ['text' => 'Membutuhkan superkomputer untuk penjumlahan sederhana', 'correct' => false],
                ],
                'explanation' => 'Model lanjutan seperti Item Response Theory (IRT) memodelkan tingkat kesulitan tiap butir soal secara lebih halus.'
            ],
            [
                'id' => 719,
                'question' => 'Fungsi kolom duration_seconds pada tabel attempts adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Mencatat lama waktu pengerjaan kuis untuk membantu mendeteksi apakah siswa terburu-buru atau kesulitan', 'correct' => true],
                    'B' => ['text' => 'Menentukan batas waktu sesi login admin', 'correct' => false],
                    'C' => ['text' => 'Mengatur kecepatan animasi grafik', 'correct' => false],
                    'D' => ['text' => 'Menghitung ukuran file SQL', 'correct' => false],
                ],
                'explanation' => 'Durasi pengerjaan memberi konteks tambahan terhadap kualitas hasil kuis siswa.'
            ],
            [
                'id' => 720,
                'question' => 'Mengapa transparansi alasan rekomendasi (explainability) penting dalam AI pendidikan?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Agar siswa dan guru memahami mengapa suatu materi disarankan sehingga menumbuhkan kepercayaan', 'correct' => true],
                    'B' => ['text' => 'Supaya kode sumber PHP terlihat di halaman login', 'correct' => false],
                    'C' => ['text' => 'Agar siswa bisa menebak kunci jawaban tanpa belajar', 'correct' => false],
                    'D' => ['text' => 'Untuk memperbesar ukuran file CSS', 'correct' => false],
                ],
                'explanation' => 'Explainable recommendation menjelaskan dasar keputusan (misal: nilai 57 berada pada rentang 0–59).'
            ],
            [
                'id' => 721,
                'question' => 'Peran kolom teacher_reviewed pada tabel recommendations adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menandai apakah saran rekomendasi sistem sudah ditinjau/diverifikasi oleh guru', 'correct' => true],
                    'B' => ['text' => 'Menyimpan nilai rata-rata nasional', 'correct' => false],
                    'C' => ['text' => 'Mengunci akun siswa', 'correct' => false],
                    'D' => ['text' => 'Menghitung jumlah huruf pada soal', 'correct' => false],
                ],
                'explanation' => 'Kolom ini mendukung mekanisme pengawasan guru (Human-in-the-Loop).'
            ],
            [
                'id' => 722,
                'question' => 'Jika seorang siswa sudah menguasai Topik 1 (skor 90) tetapi mendapat skor 55 pada Topik 2, tindakan adaptif terbaik adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Mengulang materi dasar Topik 2 dan berlatih bertahap sebelum melanjutkan ke Topik 3', 'correct' => true],
                    'B' => ['text' => 'Mengulang dari awal seluruh sistem', 'correct' => false],
                    'C' => ['text' => 'Melompat langsung ke ujian akhir', 'correct' => false],
                    'D' => ['text' => 'Menghapus nilai Topik 1', 'correct' => false],
                ],
                'explanation' => 'Topik 1 sudah dikuasai, sehingga fokus penguatan diarahkan pada konsep inti Topik 2.'
            ],
            [
                'id' => 723,
                'question' => 'Salah satu indikator keberhasilan penerapan platform pembelajaran adaptif di kelas adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Meningkatnya proporsi siswa yang mencapai kategori Menguasai setelah mengikuti rekomendasi belajar', 'correct' => true],
                    'B' => ['text' => 'Berkurangnya jumlah materi yang tersedia', 'correct' => false],
                    'C' => ['text' => 'Tidak ada siswa yang mengerjakan kuis', 'correct' => false],
                    'D' => ['text' => 'Semua siswa mendapat nilai 0', 'correct' => false],
                ],
                'explanation' => 'Efektivitas sistem diukur dari kenaikan ketuntasan belajar siswa setelah mengikuti jalur adaptif.'
            ],
            [
                'id' => 724,
                'question' => 'Dalam arsitektur EduMind AI, komponen yang bertugas memetakan skor kuis ke status penguasaan berada pada...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Backend API evaluasi (api/evaluate_quiz.php & fungsi classifyScore)', 'correct' => true],
                    'B' => ['text' => 'File CSS style.css', 'correct' => false],
                    'C' => ['text' => 'Halaman logout.php', 'correct' => false],
                    'D' => ['text' => 'Ikon favicon browser', 'correct' => false],
                ],
                'explanation' => 'Logika penilaian dan pemetaan status dieksekusi secara konsisten di sisi server.'
            ],
            [
                'id' => 725,
                'question' => 'Prinsip \'personalisasi pembelajaran\' berarti...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menyesuaikan kecepatan, tingkat kesulitan, dan dukungan belajar sesuai kebutuhan masing-masing peserta didik', 'correct' => true],
                    'B' => ['text' => 'Memberikan soal yang berbeda tanpa tujuan kurikulum', 'correct' => false],
                    'C' => ['text' => 'Menghapus peran guru di kelas', 'correct' => false],
                    'D' => ['text' => 'Mewajibkan semua siswa belajar di jam yang sama persis', 'correct' => false],
                ],
                'explanation' => 'Personalisasi mengakomodasi perbedaan kesiapan dan gaya belajar setiap individu.'
            ],
        ],
        8 => [
            [
                'id' => 801,
                'question' => 'Apa tujuan pembatasan konteks kurikulum (curriculum grounding) pada Asisten Belajar AI?',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menjaga agar jawaban AI tetap selaras dengan materi ajar guru dan tidak melantur', 'correct' => true],
                    'B' => ['text' => 'Membuat AI menjawab topik hiburan di luar pelajaran', 'correct' => false],
                    'C' => ['text' => 'Menghapus isi materi yang dibuat guru', 'correct' => false],
                    'D' => ['text' => 'Memperlambat waktu muat halaman', 'correct' => false],
                ],
                'explanation' => 'Curriculum grounding mengarahkan respons AI pada materi topik yang sedang dipelajari.'
            ],
            [
                'id' => 802,
                'question' => 'Mode bantuan Asisten AI yang tepat ketika siswa belum memahami istilah teknis adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Sederhanakan dengan Bahasa Sehari-hari', 'correct' => true],
                    'B' => ['text' => 'Hapus Riwayat Belajar', 'correct' => false],
                    'C' => ['text' => 'Logout Otomatis', 'correct' => false],
                    'D' => ['text' => 'Reset Database', 'correct' => false],
                ],
                'explanation' => 'Mode penyederhanaan menjelaskan konsep menggunakan analogi sehari-hari.'
            ],
            [
                'id' => 803,
                'question' => 'Manfaat mode \'Bahas Kesalahan Umum\' pada Asisten Belajar AI adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Membantu siswa mengenali miskonsepsi yang sering terjadi dan cara memperbaikinya', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh soal yang pernah dijawab salah', 'correct' => false],
                    'C' => ['text' => 'Mengganti mata pelajaran siswa secara otomatis', 'correct' => false],
                    'D' => ['text' => 'Menonaktifkan grafik Chart.js', 'correct' => false],
                ],
                'explanation' => 'Membahas miskonsepsi umum mencegah siswa mengulangi kesalahan yang sama.'
            ],
            [
                'id' => 804,
                'question' => 'Mode bantuan Asisten AI yang digunakan ketika siswa ingin berlatih penerapan konsep sebelum kuis adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Berikan Contoh Soal', 'correct' => true],
                    'B' => ['text' => 'Ganti Password', 'correct' => false],
                    'C' => ['text' => 'Export SQL', 'correct' => false],
                    'D' => ['text' => 'Tutup Sesi', 'correct' => false],
                ],
                'explanation' => 'Mode contoh soal menyajikan ilustrasi soal beserta langkah penyelesaiannya.'
            ],
            [
                'id' => 805,
                'question' => 'Praktik perlindungan privasi data yang wajib diterapkan saat menghubungkan Asisten AI ke API eksternal adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Tidak mengirimkan data identitas pribadi siswa (email, kata sandi, NIK) yang tidak diperlukan', 'correct' => true],
                    'B' => ['text' => 'Mengirim seluruh isi tabel users beserta password_hash ke prompt AI', 'correct' => false],
                    'C' => ['text' => 'Menampilkan API key secara terbuka di halaman publik', 'correct' => false],
                    'D' => ['text' => 'Menyimpan kata sandi dalam bentuk teks biasa', 'correct' => false],
                ],
                'explanation' => 'Prinsip minimisasi data melindungi privasi peserta didik.'
            ],
            [
                'id' => 806,
                'question' => 'Bagaimana seharusnya Asisten Belajar AI merespons ketika siswa meminta jawaban kuis secara instan?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Membimbing langkah penyelesaian dan konsep dasarnya agar siswa memahami prosesnya', 'correct' => true],
                    'B' => ['text' => 'Langsung memberikan kunci jawaban tanpa penjelasan apa pun', 'correct' => false],
                    'C' => ['text' => 'Menutup akun siswa secara permanen', 'correct' => false],
                    'D' => ['text' => 'Mengubah nilai siswa menjadi 100 otomatis', 'correct' => false],
                ],
                'explanation' => 'Asisten AI berperan sebagai tutor pembimbing berpikir, bukan alat menyontek instan.'
            ],
            [
                'id' => 807,
                'question' => 'Apa yang dimaksud dengan \'halusinasi\' pada model bahasa (LLM) dalam konteks pendidikan?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'AI menghasilkan penjelasan yang terdengar meyakinkan tetapi keliru secara faktual/konsep', 'correct' => true],
                    'B' => ['text' => 'Layar monitor berkedip karena kabel longgar', 'correct' => false],
                    'C' => ['text' => 'Database MySQL melakukan backup otomatis', 'correct' => false],
                    'D' => ['text' => 'Browser membuka dua tab sekaligus', 'correct' => false],
                ],
                'explanation' => 'Halusinasi AI terjadi ketika model mengarang informasi yang tidak akurat.'
            ],
            [
                'id' => 808,
                'question' => 'Mengapa API key layanan model bahasa eksternal harus disimpan di variabel lingkungan (.env) pada sisi server?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Agar kunci rahasia tidak terekspos di kode frontend browser maupun repositori publik GitHub', 'correct' => true],
                    'B' => ['text' => 'Supaya file CSS dapat membaca variabel PHP', 'correct' => false],
                    'C' => ['text' => 'Agar siswa dapat menyalin API key dengan mudah', 'correct' => false],
                    'D' => ['text' => 'Karena server lokal tidak mendukung file konfigurasi', 'correct' => false],
                ],
                'explanation' => 'Menyimpan API key di sisi server mencegah pencurian kuota dan penyalahgunaan akses.'
            ],
            [
                'id' => 809,
                'question' => 'Dalam prompt engineering untuk tutor AI, peran \'System Prompt\' adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menetapkan peran, batasan kurikulum, gaya bahasa, dan aturan pedagogis AI sebelum menjawab siswa', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh riwayat chat siswa', 'correct' => false],
                    'C' => ['text' => 'Mengubah warna latar belakang halaman web', 'correct' => false],
                    'D' => ['text' => 'Mengganti struktur tabel MySQL', 'correct' => false],
                ],
                'explanation' => 'System prompt mengendalikan perilaku dan batas ruang lingkup jawaban model AI.'
            ],
            [
                'id' => 810,
                'question' => 'Teknik menyertakan cuplikan materi ajar guru ke dalam prompt sebelum model menjawab pertanyaan siswa dikenal sebagai...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Retrieval-Augmented Generation (RAG) / Context Grounding', 'correct' => true],
                    'B' => ['text' => 'Brute Force Attack', 'correct' => false],
                    'C' => ['text' => 'Overclocking', 'correct' => false],
                    'D' => ['text' => 'Minification', 'correct' => false],
                ],
                'explanation' => 'Menyuntikkan konteks materi relevan menurunkan risiko halusinasi AI.'
            ],
            [
                'id' => 811,
                'question' => 'Mengapa siswa tetap perlu memverifikasi penjelasan dari AI terhadap buku ajar atau penjelasan guru?',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Karena AI dapat membuat kekeliruan konsep dan tanggung jawab pemahaman tetap pada pembelajar', 'correct' => true],
                    'B' => ['text' => 'Karena AI tidak pernah bisa membaca teks', 'correct' => false],
                    'C' => ['text' => 'Karena buku ajar tidak memiliki daftar isi', 'correct' => false],
                    'D' => ['text' => 'Karena browser selalu memblokir jawaban AI', 'correct' => false],
                ],
                'explanation' => 'Literasi AI menuntut sikap kritis dan verifikasi silang terhadap sumber belajar resmi.'
            ],
            [
                'id' => 812,
                'question' => 'Risiko ketergantungan berlebihan (over-reliance) terhadap AI dalam proses belajar adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Menurunnya kemampuan berpikir kritis dan pemecahan masalah mandiri siswa', 'correct' => true],
                    'B' => ['text' => 'Meningkatnya kapasitas penyimpanan server', 'correct' => false],
                    'C' => ['text' => 'Bertambahnya jumlah soal di database', 'correct' => false],
                    'D' => ['text' => 'Mempercepat koneksi jaringan kampus', 'correct' => false],
                ],
                'explanation' => 'Penggunaan AI tanpa proses berpikir mandiri menghambat penguasaan kompetensi jangka panjang.'
            ],
            [
                'id' => 813,
                'question' => 'Langkah mitigasi ketika siswa mengajukan pertanyaan di luar topik mata pelajaran kepada Asisten AI adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Mengarahkan percakapan kembali ke topik pembelajaran yang sedang dipelajari secara santun', 'correct' => true],
                    'B' => ['text' => 'Menjawab gosip selebriti secara panjang lebar', 'correct' => false],
                    'C' => ['text' => 'Menghapus akun siswa', 'correct' => false],
                    'D' => ['text' => 'Menampilkan pesan error database', 'correct' => false],
                ],
                'explanation' => 'Guardrail topik menjaga fokus sesi belajar tetap pada tujuan instruksional.'
            ],
            [
                'id' => 814,
                'question' => 'Contoh instruksi (prompt) siswa yang efektif saat berdiskusi dengan Asisten Belajar AI adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '\'Jelaskan langkah menyamakan penyebut pada 3/4 - 1/6 menggunakan KPK\'', 'correct' => true],
                    'B' => ['text' => '\'Kasih semua kunci jawaban sekarang\'', 'correct' => false],
                    'C' => ['text' => '\'asdfghjkl\'', 'correct' => false],
                    'D' => ['text' => '\'Ubah nilai saya jadi 100\'', 'correct' => false],
                ],
                'explanation' => 'Prompt spesifik yang menanyakan proses membantu AI memberi bimbingan bertahap.'
            ],
            [
                'id' => 815,
                'question' => 'Fungsi pembatasan laju permintaan (rate limiting) pada endpoint api/ai_tutor.php adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Mencegah penyalahgunaan request berlebih (spam) dan menjaga stabilitas serta biaya layanan', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh materi matematika', 'correct' => false],
                    'C' => ['text' => 'Membuat tampilan font menjadi miring', 'correct' => false],
                    'D' => ['text' => 'Menonaktifkan login guru', 'correct' => false],
                ],
                'explanation' => 'Rate limiting melindungi endpoint API dari lonjakan permintaan tidak wajar.'
            ],
            [
                'id' => 816,
                'question' => 'Apa yang dimaksud dengan \'bias algoritmik\' dalam sistem AI pendidikan?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Ketidakadilan atau kecenderungan keliru dalam rekomendasi akibat data latih atau aturan yang tidak seimbang', 'correct' => true],
                    'B' => ['text' => 'Kecepatan prosesor dalam mengeksekusi kode PHP', 'correct' => false],
                    'C' => ['text' => 'Ukuran resolusi gambar pada halaman beranda', 'correct' => false],
                    'D' => ['text' => 'Jumlah kolom pada tabel users', 'correct' => false],
                ],
                'explanation' => 'Sistem AI perlu dievaluasi secara berkala agar adil bagi seluruh kelompok siswa.'
            ],
            [
                'id' => 817,
                'question' => 'Prinsip \'Data Minimization\' dalam tata kelola data pendidikan berarti...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Hanya mengumpulkan dan memproses data yang benar-benar relevan dengan tujuan pembelajaran', 'correct' => true],
                    'B' => ['text' => 'Menyimpan seluruh file pribadi siswa dari perangkat mereka', 'correct' => false],
                    'C' => ['text' => 'Membagikan nilai siswa ke media sosial publik', 'correct' => false],
                    'D' => ['text' => 'Menghapus seluruh data nilai setiap hari', 'correct' => false],
                ],
                'explanation' => 'Minimisasi data mengurangi risiko kebocoran privasi pengguna.'
            ],
            [
                'id' => 818,
                'question' => 'Dalam pengembangan EduMind AI, mengapa integrasi LLM eksternal ditempatkan setelah fondasi CRUD, kuis, dan RBAC siap?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Agar sistem inti tetap andal, aman, terukur, dan memiliki mekanisme fallback jika API eksternal bermasalah', 'correct' => true],
                    'B' => ['text' => 'Karena LLM tidak bisa dipanggil dari bahasa PHP', 'correct' => false],
                    'C' => ['text' => 'Karena database MySQL melarang penggunaan AI', 'correct' => false],
                    'D' => ['text' => 'Karena HTML tidak mendukung tombol kirim', 'correct' => false],
                ],
                'explanation' => 'Arsitektur bertahap memastikan aplikasi tetap berjalan stabil meski layanan AI eksternal sedang gangguan.'
            ],
            [
                'id' => 819,
                'question' => 'Ketika API model bahasa eksternal mengalami timeout atau gagal dihubungi, perilaku aplikasi yang baik (graceful fallback) adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Memberikan jawaban panduan berbasis ringkasan materi lokal atau pesan ramah tanpa membuat halaman crash', 'correct' => true],
                    'B' => ['text' => 'Menampilkan stack trace password database ke layar siswa', 'correct' => false],
                    'C' => ['text' => 'Menghapus seluruh sesi login pengguna', 'correct' => false],
                    'D' => ['text' => 'Menutup tab browser secara paksa', 'correct' => false],
                ],
                'explanation' => 'Graceful degradation menjaga pengalaman pengguna tetap aman dan informatif.'
            ],
            [
                'id' => 820,
                'question' => 'Mengapa catatan tata kelola (\'Rekomendasi awal bersifat saran belajar dan dapat ditinjau guru\') ditampilkan pada hasil evaluasi?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Untuk menegaskan bahwa sistem berperan sebagai pendukung keputusan, bukan penentu mutlak tanpa manusia', 'correct' => true],
                    'B' => ['text' => 'Untuk memperpanjang teks halaman agar penuh', 'correct' => false],
                    'C' => ['text' => 'Karena browser mewajibkan catatan kaki di setiap kotak', 'correct' => false],
                    'D' => ['text' => 'Untuk menyembunyikan nilai kuis siswa', 'correct' => false],
                ],
                'explanation' => 'Transparansi batas sistem penting dalam penerapan AI yang bertanggung jawab.'
            ],
            [
                'id' => 821,
                'question' => 'Manakah tindakan yang melanggar etika akademik saat memanfaatkan Asisten Belajar AI?',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menyalin mentah jawaban AI untuk ujian tanpa memahami proses pengerjaannya', 'correct' => true],
                    'B' => ['text' => 'Meminta penjelasan analogi konsep yang belum dipahami', 'correct' => false],
                    'C' => ['text' => 'Meminta latihan soal tambahan untuk persiapan kuis', 'correct' => false],
                    'D' => ['text' => 'Mengecek letak kesalahan langkah perhitungan sendiri', 'correct' => false],
                ],
                'explanation' => 'Integritas akademik menuntut kejujuran dan pemahaman nyata atas tugas yang dikerjakan.'
            ],
            [
                'id' => 822,
                'question' => 'Parameter \'temperature\' yang rendah (misal 0.2) saat mengonfigurasi LLM untuk tutor pendidikan bertujuan untuk...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Menghasilkan jawaban yang lebih konsisten, faktual, dan fokus pada materi dibanding jawaban acak/kreatif berlebih', 'correct' => true],
                    'B' => ['text' => 'Membuat server menjadi lebih dingin secara fisik', 'correct' => false],
                    'C' => ['text' => 'Menghapus tanda baca pada jawaban', 'correct' => false],
                    'D' => ['text' => 'Memperbesar ukuran font jawaban', 'correct' => false],
                ],
                'explanation' => 'Temperature rendah mengurangi variasi acak sehingga jawaban lebih akurat dan terarah.'
            ],
            [
                'id' => 823,
                'question' => 'Format keluaran terstruktur dari endpoint api/ai_tutor.php menggunakan JSON bertujuan agar...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Antarmuka frontend dapat menampilkan balasan AI secara dinamis tanpa me-reload seluruh halaman', 'correct' => true],
                    'B' => ['text' => 'File CSS dapat mengedit isi database', 'correct' => false],
                    'C' => ['text' => 'Siswa bisa mengunduh video MP4', 'correct' => false],
                    'D' => ['text' => 'Browser menonaktifkan JavaScript', 'correct' => false],
                ],
                'explanation' => 'Pertukaran JSON asinkron membuat interaksi percakapan berjalan mulus.'
            ],
            [
                'id' => 824,
                'question' => 'Sanitasi atau escaping output balasan AI sebelum ditampilkan di DOM HTML penting untuk mencegah serangan...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Cross-Site Scripting (XSS)', 'correct' => true],
                    'B' => ['text' => 'DDoS Layer 1', 'correct' => false],
                    'C' => ['text' => 'ARP Spoofing', 'correct' => false],
                    'D' => ['text' => 'Overvoltage', 'correct' => false],
                ],
                'explanation' => 'Menyaring teks sebelum dirender ke HTML mencegah injeksi skrip berbahaya.'
            ],
            [
                'id' => 825,
                'question' => 'Tujuan akhir dari kolaborasi antara guru, siswa, dan Asisten Belajar AI pada EduMind AI adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Menciptakan proses belajar yang personal, terukur, etis, dan meningkatkan penguasaan kompetensi siswa', 'correct' => true],
                    'B' => ['text' => 'Menggantikan seluruh interaksi manusia di sekolah', 'correct' => false],
                    'C' => ['text' => 'Menghilangkan evaluasi pembelajaran', 'correct' => false],
                    'D' => ['text' => 'Mengurangi jumlah mata pelajaran', 'correct' => false],
                ],
                'explanation' => 'Teknologi AI hadir untuk memperkuat efektivitas pembelajaran manusia.'
            ],
        ],
    ];

    if (isset($bank[$topicId])) {
        return $bank[$topicId];
    }

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
