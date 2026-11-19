<?php
function getSubjectsData(): array {
    return [
        [
            'id' => 1,
            'code' => 'MAT-101',
            'name' => 'Matematika',
            'description' => 'Pembelajaran adaptif pecahan, operasi hitung, persentase, dan pemetaan kompetensi.'
        ],
        [
            'id' => 2,
            'code' => 'WEB-201',
            'name' => 'Teknologi Web & Logika Pemrograman',
            'description' => 'Struktur aplikasi web, validasi alur, dan logika rekomendasi berbasis aturan.'
        ]
    ];
}

function getTopicsData(): array {
    return [
        [
            'id' => 1,
            'subject_id' => 1,
            'subject_name' => 'Matematika',
            'prerequisite_topic_id' => null,
            'title' => 'Konsep Dasar Pecahan',
            'difficulty_level' => 'dasar',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Memahami makna pembilang dan penyebut sebagai bagian dari keseluruhan serta representasi visualnya.',
            'material_title' => 'Mengenal Pembilang, Penyebut, dan Bagian Utuh',
            'material_content' => 'Pecahan ditulis dalam bentuk a/b dengan b ≠ 0. Pembilang (angka atas) menyatakan bagian yang diperhatikan, sedangkan penyebut (angka bawah) menyatakan jumlah total bagian sama besar. Contoh: 1 dari 4 potong pizza sama besar bernilai 1/4.',
            'summary_notes' => 'Pembilang = bagian diambil | Penyebut = total bagian sama besar'
        ],
        [
            'id' => 2,
            'subject_id' => 1,
            'subject_name' => 'Matematika',
            'prerequisite_topic_id' => 1,
            'title' => 'Operasi Penjumlahan Pecahan',
            'difficulty_level' => 'menengah',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Menyelesaikan penjumlahan pecahan dengan penyebut sama maupun berbeda menggunakan KPK.',
            'material_title' => 'Menyamakan Penyebut Menggunakan KPK',
            'material_content' => 'Untuk menjumlahkan pecahan berpenyebut berbeda seperti 1/2 + 1/4, cari KPK dari 2 dan 4 yaitu 4. Ubah 1/2 menjadi 2/4, lalu jumlahkan pembilangnya: 2/4 + 1/4 = 3/4. Jangan menjumlahkan pembilang dan penyebut secara langsung.',
            'summary_notes' => 'Samakan penyebut lewat KPK -> sesuaikan pembilang -> jumlahkan pembilang'
        ],
        [
            'id' => 3,
            'subject_id' => 1,
            'subject_name' => 'Matematika',
            'prerequisite_topic_id' => 2,
            'title' => 'Persentase dan Perbandingan',
            'difficulty_level' => 'lanjut',
            'mastery_threshold' => 80,
            'learning_objectives' => 'Mengonversi pecahan ke bentuk persentase dan mengevaluasi penguasaan topik lanjutan.',
            'material_title' => 'Konversi Pecahan ke Persentase (%)',
            'material_content' => 'Persentase berarti per seratus. Untuk mengubah pecahan menjadi persentase, kalikan nilai pecahan dengan 100%. Contoh: 3/4 × 100% = 75%, dan 4/5 × 100% = 80%.',
            'summary_notes' => 'Nilai Pecahan × 100% = Persentase (%)'
        ]
    ];
}

function getQuizQuestionsByTopic(int $topicId): array {
    $all = [
        2 => [
            [
                'id' => 1,
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
                'id' => 2,
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
                'id' => 3,
                'question' => 'Mengapa menjumlahkan 1/2 + 1/3 tidak boleh langsung menjadi 2/5?',
                'difficulty' => 'sulit',
                'options' => [
                    'A' => ['text' => 'Penyebut harus disamakan lewat KPK menjadi 5/6', 'correct' => true],
                    'B' => ['text' => 'Karena 1 + 1 seharusnya bernilai 3', 'correct' => false],
                    'C' => ['text' => 'Karena pecahan tidak memiliki penyebut', 'correct' => false],
                    'D' => ['text' => 'Karena hasilnya selalu 1/5', 'correct' => false],
                ],
                'explanation' => 'Penyebut harus disamakan dahulu menggunakan KPK (6): 3/6 + 2/6 = 5/6.'
            ]
        ],
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
                'question' => 'Satu pizza dipotong 4 bagian sama besar. Jika diambil 1 potong, nilainya adalah...',
                'difficulty' => 'mudah',
                'options' => [
                    'A' => ['text' => '1/4', 'correct' => true],
                    'B' => ['text' => '4/1', 'correct' => false],
                    'C' => ['text' => '1/2', 'correct' => false],
                    'D' => ['text' => '3/4', 'correct' => false],
                ],
                'explanation' => '1 bagian yang diambil dari 4 bagian sama besar ditulis 1/4.'
            ]
        ],
        3 => [
            [
                'id' => 201,
                'question' => 'Bentuk persentase dari pecahan 3/4 adalah...',
                'difficulty' => 'sedang',
                'options' => [
                    'A' => ['text' => '50%', 'correct' => false],
                    'B' => ['text' => '75%', 'correct' => true],
                    'C' => ['text' => '25%', 'correct' => false],
                    'D' => ['text' => '80%', 'correct' => false],
                ],
                'explanation' => '3/4 × 100% = 75%.'
            ]
        ]
    ];

    return $all[$topicId] ?? $all[2];
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
