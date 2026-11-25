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
                'id' => 105,
                'question' => 'Syarat nilai penyebut b pada bentuk pecahan a/b adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'b tidak boleh sama dengan 0', 'correct' => true],
                    'B' => ['text' => 'b harus selalu lebih kecil dari a', 'correct' => false],
                    'C' => ['text' => 'b harus selalu bilangan genap', 'correct' => false],
                    'D' => ['text' => 'b harus bernilai negatif', 'correct' => false],
                ],
                'explanation' => 'Pembagian dengan nol tidak terdefinisi, sehingga penyebut b ≠ 0.'
            ],
            [
                'id' => 106,
                'question' => 'Pecahan tidak murni 7/4 jika diubah menjadi pecahan campuran menjadi...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '1 3/4', 'correct' => true],
                    'B' => ['text' => '2 1/4', 'correct' => false],
                    'C' => ['text' => '1 1/4', 'correct' => false],
                    'D' => ['text' => '3 1/4', 'correct' => false],
                ],
                'explanation' => '7 dibagi 4 menghasilkan 1 dengan sisa 3, sehingga bentuk campurannya adalah 1 3/4.'
            ],
            [
                'id' => 107,
                'question' => 'Bentuk pecahan biasa dari pecahan campuran 2 3/5 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '11/5', 'correct' => false],
                    'B' => ['text' => '13/5', 'correct' => true],
                    'C' => ['text' => '10/5', 'correct' => false],
                    'D' => ['text' => '8/5', 'correct' => false],
                ],
                'explanation' => '((2 × 5) + 3) / 5 = (10 + 3) / 5 = 13/5.'
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
                'question' => 'Hasil dari 2/7 + 3/7 adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '5/14', 'correct' => false],
                    'B' => ['text' => '5/7', 'correct' => true],
                    'C' => ['text' => '6/7', 'correct' => false],
                    'D' => ['text' => '1/7', 'correct' => false],
                ],
                'explanation' => 'Karena penyebut sudah sama (7), jumlahkan pembilangnya: 2 + 3 = 5, jadi 5/7.'
            ],
            [
                'id' => 203,
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
                'id' => 204,
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
                'id' => 205,
                'question' => 'Hasil pengurangan 3/4 - 1/6 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '2/2', 'correct' => false],
                    'B' => ['text' => '7/12', 'correct' => true],
                    'C' => ['text' => '5/12', 'correct' => false],
                    'D' => ['text' => '1/3', 'correct' => false],
                ],
                'explanation' => 'KPK dari 4 dan 6 adalah 12. 9/12 - 2/12 = 7/12.'
            ],
            [
                'id' => 206,
                'question' => 'Hasil dari 1 1/2 + 2 1/4 adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3 3/4', 'correct' => true],
                    'B' => ['text' => '3 2/6', 'correct' => false],
                    'C' => ['text' => '4 1/4', 'correct' => false],
                    'D' => ['text' => '3 1/2', 'correct' => false],
                ],
                'explanation' => '(1 + 2) + (2/4 + 1/4) = 3 3/4.'
            ],
            [
                'id' => 207,
                'question' => 'KPK dari penyebut 1/4 dan 1/6 yang digunakan untuk menyamakan penyebut adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '10', 'correct' => false],
                    'B' => ['text' => '12', 'correct' => true],
                    'C' => ['text' => '24', 'correct' => false],
                    'D' => ['text' => '6', 'correct' => false],
                ],
                'explanation' => 'Kelipatan persekutuan terkecil dari 4 dan 6 adalah 12.'
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
                'id' => 304,
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
                'id' => 305,
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
                'id' => 306,
                'question' => 'Urutan pecahan 3/5, 2/3, dan 7/10 dari yang terkecil ke terbesar adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '3/5, 2/3, 7/10', 'correct' => true],
                    'B' => ['text' => '7/10, 2/3, 3/5', 'correct' => false],
                    'C' => ['text' => '2/3, 3/5, 7/10', 'correct' => false],
                    'D' => ['text' => '3/5, 7/10, 2/3', 'correct' => false],
                ],
                'explanation' => 'Dalam per-30: 3/5 = 18/30, 2/3 = 20/30, 7/10 = 21/30.'
            ],
            [
                'id' => 307,
                'question' => 'Bentuk pecahan paling sederhana dari 40% adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '2/5', 'correct' => true],
                    'B' => ['text' => '4/5', 'correct' => false],
                    'C' => ['text' => '1/4', 'correct' => false],
                    'D' => ['text' => '3/5', 'correct' => false],
                ],
                'explanation' => '40% = 40/100; dibagi 20 menghasilkan 2/5.'
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
                'question' => 'Pada CSS Box Model, properti yang memberi jarak di dalam batas border elemen adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'padding', 'correct' => true],
                    'B' => ['text' => 'margin', 'correct' => false],
                    'C' => ['text' => 'href', 'correct' => false],
                    'D' => ['text' => 'charset', 'correct' => false],
                ],
                'explanation' => 'Padding memberi ruang di dalam border, sedangkan margin memberi ruang di luar border.'
            ],
            [
                'id' => 404,
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
                'id' => 405,
                'question' => 'Mengapa pemisahan struktur HTML, gaya CSS, dan logika JS dianjurkan dalam proyek web?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Memudahkan pemeliharaan, debugging, dan kolaborasi tim', 'correct' => true],
                    'B' => ['text' => 'Agar browser tidak perlu me-render halaman', 'correct' => false],
                    'C' => ['text' => 'Karena HTML tidak mendukung warna', 'correct' => false],
                    'D' => ['text' => 'Agar file tidak dapat dibuka di editor kode', 'correct' => false],
                ],
                'explanation' => 'Pemisahan tanggung jawab membuat kode lebih terstruktur dan mudah dikembangkan bersama tim.'
            ],
            [
                'id' => 406,
                'question' => 'Elemen semantik HTML5 yang digunakan untuk membungkus konten utama unik pada suatu halaman adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => '<main>', 'correct' => true],
                    'B' => ['text' => '<meta>', 'correct' => false],
                    'C' => ['text' => '<link>', 'correct' => false],
                    'D' => ['text' => '<title>', 'correct' => false],
                ],
                'explanation' => '<main> menandai konten inti utama dari dokumen.'
            ],
            [
                'id' => 407,
                'question' => 'Manfaat utama penggunaan elemen semantik selain kerapian kode adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Meningkatkan aksesibilitas (screen reader) dan pemahaman struktur oleh mesin pencari', 'correct' => true],
                    'B' => ['text' => 'Membuat koneksi Wi-Fi menjadi lebih cepat', 'correct' => false],
                    'C' => ['text' => 'Menghapus kebutuhan autentikasi pengguna', 'correct' => false],
                    'D' => ['text' => 'Mengubah PHP menjadi bahasa rakitan', 'correct' => false],
                ],
                'explanation' => 'Screen reader dan mesin pencari memanfaatkan tag semantik untuk memahami hierarki halaman.'
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
                'explanation' => 'JSON (JavaScript Object Notation) banyak digunakan untuk pertukaran data terstruktur pada API.'
            ],
            [
                'id' => 502,
                'question' => 'Metode HTTP yang paling tepat untuk mengirim jawaban kuis ke endpoint evaluasi adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'POST', 'correct' => true],
                    'B' => ['text' => 'HEAD', 'correct' => false],
                    'C' => ['text' => 'OPTIONS', 'correct' => false],
                    'D' => ['text' => 'TRACE', 'correct' => false],
                ],
                'explanation' => 'POST digunakan untuk mengirim payload data ke server untuk diproses atau disimpan.'
            ],
            [
                'id' => 503,
                'question' => 'Kode status HTTP 403 umumnya menunjukkan...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Akses ditolak / tidak memiliki hak akses (Forbidden)', 'correct' => true],
                    'B' => ['text' => 'Halaman berhasil dibuat', 'correct' => false],
                    'C' => ['text' => 'Koneksi internet terputus', 'correct' => false],
                    'D' => ['text' => 'File CSS berhasil dimuat', 'correct' => false],
                ],
                'explanation' => 'Status 403 menandakan pengguna tidak memiliki otorisasi untuk mengakses sumber daya tersebut.'
            ],
            [
                'id' => 504,
                'question' => 'Apa kepanjangan dan fungsi dari RBAC pada sistem autentikasi aplikasi web?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Role-Based Access Control — membatasi hak akses berdasarkan peran pengguna', 'correct' => true],
                    'B' => ['text' => 'Random Backup And Cache — menghapus sesi pengguna setiap detik', 'correct' => false],
                    'C' => ['text' => 'Relational Browser Auto Compiler — mengubah CSS menjadi SQL', 'correct' => false],
                    'D' => ['text' => 'Remote Binary Access Channel — mematikan server lokal', 'correct' => false],
                ],
                'explanation' => 'RBAC mengatur izin fitur dan halaman sesuai peran (misalnya admin, guru, siswa).'
            ],
            [
                'id' => 505,
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
                'id' => 506,
                'question' => 'Kode status HTTP 401 berbeda dengan 403 karena 401 berarti...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Pengguna belum terautentikasi / belum login dengan kredensial sah', 'correct' => true],
                    'B' => ['text' => 'Server berhasil memproses seluruh query', 'correct' => false],
                    'C' => ['text' => 'File gambar terlalu kecil', 'correct' => false],
                    'D' => ['text' => 'Database sedang melakukan backup harian', 'correct' => false],
                ],
                'explanation' => '401 Unauthorized berkaitan dengan belum adanya autentikasi valid, sedangkan 403 Forbidden adalah penolakan otorisasi.'
            ],
            [
                'id' => 507,
                'question' => 'Header HTTP yang dikirim klien saat mengirim body berformat JSON adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Content-Type: application/json', 'correct' => true],
                    'B' => ['text' => 'Content-Type: image/png', 'correct' => false],
                    'C' => ['text' => 'Cache-Control: no-css', 'correct' => false],
                    'D' => ['text' => 'Accept-Language: binary', 'correct' => false],
                ],
                'explanation' => 'Content-Type: application/json memberi tahu server bahwa payload body berbentuk JSON.'
            ]
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
                'explanation' => 'Primary Key mengidentifikasi setiap rekaman secara unik dan wajib tidak NULL.'
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
                'explanation' => 'Foreign Key mengaitkan kolom pada tabel anak ke Primary Key pada tabel induk.'
            ],
            [
                'id' => 603,
                'question' => 'Syarat utama agar sebuah tabel memenuhi Bentuk Normal Pertama (1NF) adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Setiap kolom bernilai atomik (tunggal) dan tidak ada grup berulang dalam satu sel', 'correct' => true],
                    'B' => ['text' => 'Seluruh tabel digabung menjadi satu tabel besar', 'correct' => false],
                    'C' => ['text' => 'Menghapus semua Primary Key dari tabel', 'correct' => false],
                    'D' => ['text' => 'Menyimpan daftar nilai dipisahkan koma di satu kolom', 'correct' => false],
                ],
                'explanation' => '1NF mewajibkan setiap atribut memiliki nilai atomik dan tidak mengandung multivalued attribute.'
            ],
            [
                'id' => 604,
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
                'id' => 605,
                'question' => 'Bentuk Normal Ketiga (3NF) bertujuan menghilangkan...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Ketergantungan transitif antar-atribut non-kunci', 'correct' => true],
                    'B' => ['text' => 'Seluruh indeks unik pada tabel', 'correct' => false],
                    'C' => ['text' => 'Relasi one-to-many antar-tabel', 'correct' => false],
                    'D' => ['text' => 'Tipe data TIMESTAMP', 'correct' => false],
                ],
                'explanation' => '3NF memastikan atribut non-kunci tidak bergantung pada atribut non-kunci lainnya.'
            ],
            [
                'id' => 606,
                'question' => 'Pada skema EduMind AI, tabel penghubung antara kelas (classes) dan siswa (users) adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'class_student', 'correct' => true],
                    'B' => ['text' => 'options', 'correct' => false],
                    'C' => ['text' => 'answers', 'correct' => false],
                    'D' => ['text' => 'subjects', 'correct' => false],
                ],
                'explanation' => 'Tabel class_student memetakan relasi many-to-many antara classes dan student_id pada users.'
            ],
            [
                'id' => 607,
                'question' => 'Tujuan pemberian constraint UNIQUE (user_id, topic_id) pada tabel progress adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Memastikan setiap siswa hanya memiliki satu rekaman ringkasan progres per topik', 'correct' => true],
                    'B' => ['text' => 'Membatasi siswa hanya boleh mengerjakan 1 soal seumur hidup', 'correct' => false],
                    'C' => ['text' => 'Menghapus nilai terbaik siswa secara otomatis', 'correct' => false],
                    'D' => ['text' => 'Mencegah guru melihat dashboard kelas', 'correct' => false],
                ],
                'explanation' => 'Composite unique key mencegah duplikasi baris progres untuk pasangan siswa dan topik yang sama.'
            ]
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
                'difficulty' => 'sedang',
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
                'question' => 'Mengapa aturan berbasis ambang batas skor dipilih pada tahap awal (MVP) EduMind AI?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Transparan, mudah diuji, dan jelas alasan rekomendasinya bagi siswa maupun guru', 'correct' => true],
                    'B' => ['text' => 'Karena komputer tidak bisa menghitung persentase', 'correct' => false],
                    'C' => ['text' => 'Agar guru tidak perlu memantau perkembangan kelas', 'correct' => false],
                    'D' => ['text' => 'Karena data kuis tidak perlu disimpan', 'correct' => false],
                ],
                'explanation' => 'Rule-based threshold mudah diaudit dan divalidasi sebelum beralih ke model yang lebih kompleks.'
            ],
            [
                'id' => 705,
                'question' => 'Makna prinsip Human-in-the-Loop pada sistem rekomendasi EduMind AI adalah...',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Rekomendasi AI bersifat saran pendukung dan tetap dapat ditinjau oleh guru', 'correct' => true],
                    'B' => ['text' => 'AI menggantikan peran guru sepenuhnya tanpa pengawasan', 'correct' => false],
                    'C' => ['text' => 'Siswa dilarang bertanya kepada guru', 'correct' => false],
                    'D' => ['text' => 'Nilai siswa diubah secara acak oleh sistem', 'correct' => false],
                ],
                'explanation' => 'Keputusan pembelajaran dan peninjauan tetap berada pada kendali guru dan siswa.'
            ],
            [
                'id' => 706,
                'question' => 'Komponen data apa saja yang mendukung pemetaan kompetensi pada tabel progress?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'best_score, latest_score, attempts_count, materials_completed, dan mastery_status', 'correct' => true],
                    'B' => ['text' => 'Hanya warna tema browser pengguna', 'correct' => false],
                    'C' => ['text' => 'Ukuran layar monitor dan merek keyboard', 'correct' => false],
                    'D' => ['text' => 'Password plaintext pengguna', 'correct' => false],
                ],
                'explanation' => 'Tabel progress menyimpan skor terbaik, skor terbaru, jumlah percobaan, materi selesai, dan status penguasaan.'
            ],
            [
                'id' => 707,
                'question' => 'Siswa yang mencapai skor 85 pada suatu topik akan mendapatkan rekomendasi berupa...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => 'Lanjutkan ke topik berikutnya atau tingkat tantangan lebih tinggi', 'correct' => true],
                    'B' => ['text' => 'Mengulang dari awal seluruh mata pelajaran', 'correct' => false],
                    'C' => ['text' => 'Menghapus akun dari kelas', 'correct' => false],
                    'D' => ['text' => 'Menonaktifkan Asisten Belajar AI', 'correct' => false],
                ],
                'explanation' => 'Skor 80–100 dikategorikan Menguasai sehingga siswa diarahkan ke topik lanjutan.'
            ]
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
                'explanation' => 'Mode penyederhanaan membantu menjelaskan konsep menggunakan analogi sehari-hari yang mudah dipahami.'
            ],
            [
                'id' => 803,
                'question' => 'Praktik perlindungan privasi data yang wajib diterapkan saat menghubungkan Asisten AI ke API eksternal adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Tidak mengirimkan data identitas pribadi siswa (email, kata sandi, NIK) yang tidak diperlukan', 'correct' => true],
                    'B' => ['text' => 'Mengirim seluruh isi tabel users beserta password_hash ke prompt AI', 'correct' => false],
                    'C' => ['text' => 'Menampilkan API key secara terbuka di halaman publik', 'correct' => false],
                    'D' => ['text' => 'Menyimpan kata sandi dalam bentuk teks biasa', 'correct' => false],
                ],
                'explanation' => 'Minimisasi data melindungi privasi siswa dan mencegah kebocoran informasi sensitif.'
            ],
            [
                'id' => 804,
                'question' => 'Bagaimana seharusnya Asisten Belajar AI merespons ketika siswa meminta jawaban kuis secara instan?',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Membimbing langkah penyelesaian dan konsep dasarnya agar siswa memahami prosesnya', 'correct' => true],
                    'B' => ['text' => 'Langsung memberikan kunci jawaban tanpa penjelasan apa pun', 'correct' => false],
                    'C' => ['text' => 'Menutup akun siswa secara permanen', 'correct' => false],
                    'D' => ['text' => 'Mengubah nilai siswa menjadi 100 otomatis', 'correct' => false],
                ],
                'explanation' => 'Asisten AI berfungsi sebagai tutor pembimbing proses berpikir, bukan alat menyontek instan.'
            ],
            [
                'id' => 805,
                'question' => 'Apa yang dimaksud dengan "halusinasi" pada model bahasa (LLM) dalam konteks pendidikan?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'AI menghasilkan penjelasan yang terdengar meyakinkan tetapi keliru secara faktual/konsep', 'correct' => true],
                    'B' => ['text' => 'Layar monitor berkedip karena kabel longgar', 'correct' => false],
                    'C' => ['text' => 'Database MySQL melakukan backup otomatis', 'correct' => false],
                    'D' => ['text' => 'Browser membuka dua tab sekaligus', 'correct' => false],
                ],
                'explanation' => 'Halusinasi AI terjadi saat model menghasilkan informasi tidak akurat, sehingga perlu grounding materi dan peninjauan guru.'
            ],
            [
                'id' => 806,
                'question' => 'Mengapa API key layanan model bahasa eksternal harus disimpan di variabel lingkungan (.env) pada sisi server?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Agar kunci rahasia tidak terekspos di kode frontend browser maupun repositori publik GitHub', 'correct' => true],
                    'B' => ['text' => 'Supaya file CSS dapat membaca variabel PHP', 'correct' => false],
                    'C' => ['text' => 'Agar siswa dapat menyalin API key dengan mudah', 'correct' => false],
                    'D' => ['text' => 'Karena server lokal tidak mendukung file konfigurasi', 'correct' => false],
                ],
                'explanation' => 'Menyimpan kredensial di environment server menjaga keamanan akses API dari penyalahgunaan.'
            ],
            [
                'id' => 807,
                'question' => 'Manfaat mode "Bahas Kesalahan Umum" pada Asisten Belajar AI adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => 'Membantu siswa mengenali miskonsepsi yang sering terjadi dan cara memperbaikinya', 'correct' => true],
                    'B' => ['text' => 'Menghapus seluruh soal yang pernah dijawab salah', 'correct' => false],
                    'C' => ['text' => 'Mengganti mata pelajaran siswa secara otomatis', 'correct' => false],
                    'D' => ['text' => 'Menonaktifkan grafik Chart.js', 'correct' => false],
                ],
                'explanation' => 'Membahas kesalahan umum mencegah siswa mengulangi kekeliruan konsep yang sama.'
            ]
        ]
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
