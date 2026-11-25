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

$firstMaterial = $activeTopic['materials'][0] ?? [
    'title' => $activeTopic['title'],
    'content' => $activeTopic['learning_objectives'],
    'summary' => $activeTopic['learning_objectives']
];

$lower = strtolower($message);
$prefix = "[Konteks Materi: {$activeTopic['subject_name']} — {$activeTopic['title']}]\n";

if ($mode === 'sederhana' || str_contains($lower, 'sederhana') || str_contains($lower, 'pizza')) {
    $body = "Penjelasan sederhana: Bayangkan 1 loyang pizza dibagi menjadi 4 bagian sama besar (penyebut = 4). Jika kamu mengambil 1 potong, bagianmu adalah 1/4. Untuk menjumlahkan 1/2 + 1/4, samakan dulu potongan menjadi per-4 (1/2 = 2/4), lalu jumlahkan: 2/4 + 1/4 = 3/4.";
} elseif ($mode === 'contoh_soal' || str_contains($lower, 'contoh') || str_contains($lower, 'soal')) {
    $body = "Contoh soal latihan: Hitunglah 1/3 + 1/6. KPK dari 3 dan 6 adalah 6, maka 1/3 = 2/6. Hasilnya: 2/6 + 1/6 = 3/6 = 1/2.";
} elseif ($mode === 'bahas_salah' || str_contains($lower, 'salah') || str_contains($lower, 'keliru')) {
    $body = "Pembahasan kesalahan umum: Menjumlahkan pembilang dengan pembilang dan penyebut dengan penyebut (misal 1/2 + 1/4 = 2/6) tidak tepat karena besar tiap bagian berbeda. Selalu samakan penyebut menggunakan KPK terlebih dahulu.";
} elseif (str_contains($lower, 'kpk') || str_contains($lower, 'penyebut') || str_contains($lower, 'pembilang')) {
    $body = "Pembilang berada di atas (menunjukkan bagian yang diambil) dan penyebut di bawah (menunjukkan total bagian sama besar). Untuk menjumlahkan pecahan berpenyebut berbeda, cari KPK penyebut terlebih dahulu.";
} else {
    $body = $firstMaterial['content'] . " Ringkasannya: " . $firstMaterial['summary'];
}

echo json_encode([
    'success' => true,
    'reply' => $prefix . $body,
    'curriculum_aligned' => true
]);
