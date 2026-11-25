<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['guru'], '../../');
$user = currentUser();
$topics = getTopicsData();
$totalQuestions = 0;
foreach ($topics as $t) {
    $totalQuestions += count(getQuizQuestionsByTopic((int)$t['id']));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-success px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Portal Guru</span>
    <div class="d-flex align-items-center gap-3 text-white small">
        <span><?= htmlspecialchars($user['name']) ?></span>
        <a href="materi.php" class="btn btn-sm btn-light">Kelola Materi & Topik</a>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Dashboard Perkembangan & Analitik Kelas</h3>
        <a href="materi.php" class="btn btn-success">+ Tambah / Kelola Topik & Materi</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Jumlah Siswa</div><h4 class="fw-bold">3 Siswa</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Topik & Bank Soal</div><h4 class="fw-bold text-primary"><?= count($topics) ?> Topik / <?= $totalQuestions ?> Soal</h4></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Topik Paling Sulit</div><h6 class="fw-bold text-danger mt-1">Operasi Penjumlahan & Pengurangan Pecahan</h6></div></div></div>
        <div class="col-md-3"><div class="card shadow-sm border-0"><div class="card-body"><div class="text-muted small">Butuh Penguatan</div><h4 class="fw-bold text-warning">1 Siswa</h4></div></div></div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Grafik Rata-rata Nilai per Topik</div>
                <div class="card-body">
                    <canvas id="classChart" height="170"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Pemantauan Siswa & Rekomendasi</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>Riski Winata</strong><br><span class="text-muted">Topik: Operasi Penjumlahan Pecahan (Skor 50)</span></div>
                            <span class="badge bg-danger">Belum Menguasai</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>Putri Aulia R.</strong><br><span class="text-muted">Topik: Konsep Dasar Pecahan (Skor 86)</span></div>
                            <span class="badge bg-success">Menguasai</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>Raffi Aditya H.</strong><br><span class="text-muted">Topik: Persentase & Perbandingan (Skor 72)</span></div>
                            <span class="badge bg-warning text-dark">Perlu Penguatan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new Chart(document.getElementById('classChart'), {
    type: 'bar',
    data: {
        labels: ['Konsep Pecahan', 'Penjumlahan Pecahan', 'Persentase & Desimal', 'HTML & CSS', 'API & HTTP', 'Basis Data & 3NF', 'Konsep AI Adaptif', 'Prompt & Etika AI'],
        datasets: [{
            label: 'Rata-rata Nilai Kelas',
            data: [86, 58, 72, 84, 76, 68, 82, 78],
            backgroundColor: ['#198754', '#dc3545', '#ffc107', '#198754', '#ffc107', '#ffc107', '#198754', '#ffc107']
        }]
    },
    options: { scales: { y: { beginAtZero: true, max: 100 } } }
});
</script>
</body>
</html>
