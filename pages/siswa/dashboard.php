<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['siswa'], '../../');
$user = currentUser();
$topics = getTopicsData();
$progressSession = $_SESSION['edumind_progress'] ?? [];

$scores = [];
$labels = [];
foreach ($topics as $t) {
    $tid = (int)$t['id'];
    $labels[] = $t['title'];
    $scores[$tid] = $progressSession[$tid]['score'] ?? match ($tid) {
        1 => 86,
        2 => 57,
        3 => 71,
        4 => 86,
        5 => 71,
        6 => 57,
        7 => 86,
        8 => 71,
        default => 75
    };
}

$activeTopicId = 2;
$latestScore = $scores[$activeTopicId] ?? 57;
$avgScore = count($scores) > 0 ? (int)round(array_sum($scores) / count($scores)) : 0;
$rule = classifyScore($latestScore);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Portal Siswa</span>
    <div class="ms-auto d-flex flex-wrap gap-2 align-items-center text-white small">
        <span><?= htmlspecialchars($user['name']) ?></span>
        <a href="materi.php" class="btn btn-sm btn-light">Mata Pelajaran & Materi</a>
        <a href="kuis.php" class="btn btn-sm btn-warning">Kuis Adaptif</a>
        <a href="asisten_ai.php" class="btn btn-sm btn-info">Asisten AI</a>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Dashboard Perkembangan & Rekomendasi Belajar</h3>
            <small class="text-muted">Pemetaan kompetensi <?= count($topics) ?> topik lintas 3 mata pelajaran secara adaptif</small>
        </div>
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="materi.php" class="btn btn-outline-primary">Buka Materi</a>
            <a href="kuis.php" class="btn btn-primary">Kerjakan Kuis</a>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Total Topik Tersedia</div><h4 class="fw-bold"><?= count($topics) ?> Topik</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Rata-rata Nilai</div><h4 class="fw-bold text-primary"><?= $avgScore ?></h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Status Topik Prioritas</div><span class="badge bg-<?= $rule['badge_class'] ?> fs-6 mt-1"><?= htmlspecialchars($rule['status_label']) ?></span></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Rekomendasi Saat Ini</div><h6 class="fw-bold mt-1 mb-0"><?= htmlspecialchars($rule['recommendation_title']) ?></h6></div></div></div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Grafik Penguasaan Kompetensi per Topik</div>
                <div class="card-body">
                    <canvas id="siswaProgressChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Rekomendasi Belajar Adaptif (Aturan Skor Awal)</div>
                <div class="card-body">
                    <div class="alert alert-<?= $rule['badge_class'] ?>">
                        <h6 class="fw-bold mb-1"><?= htmlspecialchars($rule['recommendation_title']) ?></h6>
                        <p class="small mb-1"><?= htmlspecialchars($rule['reason']) ?></p>
                        <p class="small mb-0"><strong>Rencana Tindak Lanjut:</strong> <?= htmlspecialchars($rule['action_plan']) ?></p>
                    </div>
                    <div class="small text-muted">
                        <strong>Acuan Aturan Awal:</strong> 0–59 (Belum Menguasai / Ulangi materi dasar) • 60–79 (Perlu Penguatan) • 80–100 (Menguasai / Topik berikutnya).
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const chartLabels = <?= json_encode($labels) ?>;
const chartValues = <?= json_encode(array_values($scores)) ?>;
const chartColors = chartValues.map(v => v >= 80 ? '#198754' : (v >= 60 ? '#ffc107' : '#dc3545'));

new Chart(document.getElementById('siswaProgressChart'), {
    type: 'bar',
    data: {
        labels: chartLabels,
        datasets: [{
            label: 'Nilai / Penguasaan (%)',
            data: chartValues,
            backgroundColor: chartColors
        }]
    },
    options: { scales: { y: { beginAtZero: true, max: 100 } } }
});
</script>
</body>
</html>
