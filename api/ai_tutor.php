<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/learning_data.php';

$input = json_decode(file_get_contents('php://input'), true);
$message = trim((string)($input['message'] ?? ''));
$mode = trim((string)($input['mode'] ?? 'jelaskan'));
$topicId = isset($input['topic_id']) ? (int)$input['topic_id'] : 2;

$topics = getTopicsData();
$activeTopic = $topics[1];
foreach ($topics as $t) {
    if ((int)$t['id'] === $topicId) {
        $activeTopic = $t;
        break;
    }
}

$lower = strtolower($message);
$prefix = "[Konteks Materi: {$activeTopic['title']} — {$activeTopic['material_title']}]\n";

if (str_contains($lower, 'pecahan') || str_contains($lower, 'pizza') || $mode === 'sederhana') {
    $body = "Penjelasan sederhana: Bayangkan 1 loyang pizza dibagi menjadi 4 bagian sama besar (penyebut = 4). Jika kamu mengambil 1 potong, bagianmu adalah 1/4. Untuk menjumlahkan 1/2 + 1/4, samakan dulu potongan menjadi per-4 (1/2 = 2/4), sehingga 2/4 + 1/4 = 3/4.";
} elseif (str_contains($lower, 'kpk') || str_contains($lower, 'penyebut') || str_contains($lower, 'jumlah')) {
    $body = "Untuk menjumlahkan pecahan berpenyebut berbeda: 1) Cari KPK penyebut (misal KPK 2 dan 4 adalah 4). 2) Ubah pecahan agar penyebutnya sama (1/2 menjadi 2/4). 3) Jumlahkan pembilangnya saja (2/4 + 1/4 = 3/4).";
} elseif ($mode === 'contoh_soal') {
    $body = "Contoh soal latihan: Hitunglah 1/3 + 1/6. KPK dari 3 dan 6 adalah 6, maka 1/3 = 2/6. Hasilnya: 2/6 + 1/6 = 3/6 = 1/2.";
} elseif ($mode === 'bahas_salah') {
    $body = "Evaluasi kesalahan umum: Menjumlahkan pembilang dengan pembilang dan penyebut dengan penyebut (seperti 1/2 + 1/4 = 2/6) tidak tepat karena ukuran bagiannya berbeda. Selalu samakan penyebut terlebih dahulu.";
} else {
    $body = $activeTopic['material_content'] . " Ringkasannya: " . $activeTopic['summary_notes'] . ".";
}

echo json_encode([
    'success' => true,
    'reply' => $prefix . $body,
    'curriculum_aligned' => true
]);
