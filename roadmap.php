<?php
require_once __DIR__ . '/includes/auth.php';
$user = currentUser();

$phases = [
    ['fase' => 'Fase 0 – 2', 'judul' => 'Perencanaan Arsitektur, Basis Data & Autentikasi RBAC', 'status' => 'Selesai', 'badge' => 'success', 'detail' => 'Perancangan skema 12 tabel MySQL (edumind_ai.sql), autentikasi multi-role (Admin, Guru, Siswa), dan proteksi halaman berbasis Role-Based Access Control (RBAC).'],
    ['fase' => 'Fase 3 – 5', 'judul' => 'Manajemen Kurikulum, Topik Prasyarat & Modul Materi', 'status' => 'Selesai', 'badge' => 'success', 'detail' => 'Penyusunan 3 mata pelajaran (Matematika Adaptif, Teknologi Web, Dasar AI), 8 topik berjenjang (dasar, menengah, lanjut), dan 18 materi terstruktur.'],
    ['fase' => 'Fase 6 – 8', 'judul' => 'Sistem Kuis Adaptif & Mesin Pemetaan Kompetensi', 'status' => 'Selesai', 'badge' => 'success', 'detail' => 'Implementasi 200 soal pilihan ganda (25 soal per topik), timer pengerjaan, endpoint API evaluasi (api/evaluate_quiz.php), serta klasifikasi aturan skor (0–59 Belum Menguasai, 60–79 Perlu Penguatan, 80–100 Menguasai).'],
    ['fase' => 'Fase 9 – 11', 'judul' => 'Asisten Belajar AI Terarah Kurikulum (Curriculum Grounding)', 'status' => 'Selesai', 'badge' => 'success', 'detail' => 'Integrasi endpoint api/ai_tutor.php dengan 4 mode bantuan terstruktur: Jelaskan Materi, Sederhanakan Bahasa, Contoh Soal, dan Bahas Kesalahan Umum.'],
    ['fase' => 'Fase 12 – 14', 'judul' => 'Dashboard Analitik Visual, Human-in-the-Loop & Evaluasi', 'status' => 'Selesai', 'badge' => 'primary', 'detail' => 'Visualisasi grafik capaian siswa dan rata-rata kelas menggunakan Chart.js, peninjauan rekomendasi oleh guru, serta pengujian fungsional lintas peran.'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roadmap Pengembangan — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">EduMind AI</a>
        <div class="ms-auto d-flex gap-2">
            <a href="index.php" class="btn btn-sm btn-outline-light">Kembali ke Beranda</a>
            <?php if ($user): ?>
                <a href="<?= htmlspecialchars(dashboardUrlForRole($user['role'])) ?>" class="btn btn-sm btn-success">Dashboard</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-sm btn-primary">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="mb-4">
        <span class="badge bg-info text-dark mb-2">Dokumentasi Sistem</span>
        <h2 class="fw-bold mb-1">Roadmap Pengembangan Aplikasi EduMind AI (Fase 0 – Fase 14)</h2>
        <p class="text-muted mb-0">Proyek Pengembangan Aplikasi Web — Politeknik Negeri Lampung</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card border-0 shadow-sm"><div class="card-body"><div class="small text-muted">Mata Pelajaran</div><h4 class="fw-bold mb-0">3 Mapel</h4></div></div></div>
        <div class="col-md-3"><div class="card border-0 shadow-sm"><div class="card-body"><div class="small text-muted">Topik Berjenjang</div><h4 class="fw-bold text-primary mb-0">8 Topik</h4></div></div></div>
        <div class="col-md-3"><div class="card border-0 shadow-sm"><div class="card-body"><div class="small text-muted">Materi Pembelajaran</div><h4 class="fw-bold text-success mb-0">18 Materi</h4></div></div></div>
        <div class="col-md-3"><div class="card border-0 shadow-sm"><div class="card-body"><div class="small text-muted">Bank Soal Kuis</div><h4 class="fw-bold text-warning mb-0">200 Soal (25/Topik)</h4></div></div></div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">Tahapan Implementasi Sistem</div>
        <div class="card-body">
            <?php foreach ($phases as $p): ?>
                <div class="border rounded p-3 mb-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h6 class="fw-bold mb-0 text-primary"><?= htmlspecialchars($p['fase']) ?>: <?= htmlspecialchars($p['judul']) ?></h6>
                        <span class="badge bg-<?= $p['badge'] ?>"><?= htmlspecialchars($p['status']) ?></span>
                    </div>
                    <p class="small text-muted mb-0"><?= htmlspecialchars($p['detail']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
