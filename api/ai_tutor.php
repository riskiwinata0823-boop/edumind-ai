<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/learning_data.php';

$input = json_decode(file_get_contents('php://input'), true);
$message = trim((string)($input['message'] ?? ''));
$mode = trim((string)($input['mode'] ?? 'jelaskan'));
$topicId = isset($input['topic_id']) ? (int)$input['topic_id'] : 2;

$topics = getTopicsData();
$activeTopic = $topics[0];
foreach ($topics as $t) {
    if ((int)$t['id'] === $topicId) {
        $activeTopic = $t;
        break;
    }
}

$firstMaterial = $activeTopic['materials'][0] ?? [
    'title' => $activeTopic['title'],
    'content' => $activeTopic['learning_objectives'],
    'summary' => $activeTopic['learning_objectives']
];

$lower = strtolower($message);
$prefix = "[Konteks Materi: {$activeTopic['subject_name']} — {$activeTopic['title']}]\n";

if ($mode === 'sederhana' || str_contains($lower, 'sederhana') || str_contains($lower, 'analogi')) {
    if ((int)$activeTopic['subject_id'] === 1) {
        $body = "Penjelasan sederhana: Bayangkan 1 loyang pizza dibagi menjadi 4 potong sama besar (penyebut = 4). Mengambil 1 potong berarti 1/4. Jika ingin menjumlahkan 1/2 + 1/4, samakan ukuran potongannya menjadi per-4 (1/2 = 2/4), sehingga 2/4 + 1/4 = 3/4.";
    } elseif ((int)$activeTopic['subject_id'] === 2) {
        $body = "Penjelasan sederhana: Bayangkan aplikasi web seperti restoran. HTML adalah kerangka bangunannya, CSS adalah dekorasi tata ruangnya, API JSON adalah pelayan yang mengantar pesanan data antara pengunjung (browser) dan dapur (server/database MySQL).";
    } else {
        $body = "Penjelasan sederhana: Sistem adaptif bekerja seperti pelatih pribadi—jika kamu masih kesulitan pada materi dasar, pelatih memberi latihan pondasi dulu; jika sudah mahir, pelatih menaikkan tantangan ke tahap berikutnya.";
    }
} elseif ($mode === 'contoh_soal' || str_contains($lower, 'contoh') || str_contains($lower, 'soal')) {
    $qs = getQuizQuestionsByTopic((int)$activeTopic['id']);
    $sample = $qs[0] ?? null;
    if ($sample) {
        $body = "Contoh soal latihan: " . $sample['question'] . "\nPembahasan: " . $sample['explanation'];
    } else {
        $body = "Contoh latihan: Pelajari ringkasan materi berikut lalu uji pemahaman Anda pada menu Kuis Adaptif.";
    }
} elseif ($mode === 'bahas_salah' || str_contains($lower, 'salah') || str_contains($lower, 'keliru')) {
    if ((int)$activeTopic['subject_id'] === 1) {
        $body = "Kesalahan umum yang sering terjadi: Menjumlahkan pembilang dengan pembilang dan penyebut dengan penyebut (misal 1/2 + 1/4 = 2/6). Langkah yang benar adalah menyamakan penyebut lewat KPK terlebih dahulu menjadi 2/4 + 1/4 = 3/4.";
    } elseif ((int)$activeTopic['subject_id'] === 2) {
        $body = "Kesalahan umum yang sering terjadi: Mengandalkan validasi hanya di frontend atau tidak memisahkan Primary Key dan Foreign Key dengan benar, sehingga berisiko menimbulkan anomali data atau celah akses.";
    } else {
        $body = "Kesalahan umum yang sering terjadi: Menganggap jawaban AI sebagai kebenaran mutlak tanpa memeriksa kesesuaiannya dengan materi kurikulum atau mengirim data pribadi siswa ke layanan eksternal.";
    }
} else {
    $body = $firstMaterial['content'] . "\nRingkasan Kunci: " . $firstMaterial['summary'];
}

echo json_encode([
    'success' => true,
    'reply' => $prefix . $body,
    'curriculum_aligned' => true
]);
