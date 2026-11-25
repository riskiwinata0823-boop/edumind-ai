<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/learning_data.php';
$user = currentUser();
$subjects = getSubjectsData();
$topics = getTopicsData();
$totalMaterials = 0;
$totalQuestions = 0;
foreach ($topics as $t) {
    $totalMaterials += count($t['materials']);
    $totalQuestions += count(getQuizQuestionsByTopic((int)$t['id']));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMind AI — Platform Pembelajaran Adaptif Berbasis Kecerdasan Buatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">EduMind AI</a>
        <span class="badge bg-primary d-none d-md-inline">Politeknik Negeri Lampung</span>
        <div class="ms-auto d-flex gap-2">
            <?php if ($user): ?>
                <a href="<?= htmlspecialchars(dashboardUrlForRole($user['role'])) ?>" class="btn btn-sm btn-success">Dashboard (<?= htmlspecialchars($user['role']) ?>)</a>
                <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-sm btn-outline-light">Login</a>
                <a href="register.php" class="btn btn-sm btn-primary">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<header class="hero-section py-5 text-white">
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge rounded-pill bg-info text-dark mb-3">Pembelajaran Adaptif Berbasis AI</span>
                <h1 class="display-5 fw-bold mb-3">Belajar Sesuai Pemahaman dan Progres Nyata Setiap Siswa</h1>
                <p class="lead text-light opacity-90 mb-4">
                    EduMind AI memetakan penguasaan kompetensi pada <?= count($subjects) ?> mata pelajaran dan <?= count($topics) ?> topik (<?= $totalMaterials ?> materi terstruktur & <?= $totalQuestions ?> soal kuis adaptif), menyusun rekomendasi jalur belajar, serta menyediakan Asisten Belajar AI berbasis kurikulum.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="login.php" class="btn btn-primary btn-lg px-4">Masuk ke Platform</a>
                    <a href="register.php" class="btn btn-outline-light btn-lg px-4">Daftar Akun Siswa</a>
                    <a href="docs/ROADMAP_EDUMIND_AI.md" class="btn btn-outline-info btn-lg px-4">Lihat Roadmap</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow border-0 text-dark">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Tiga Peran Utama Sistem</h5>
                        <div class="mb-3">
                            <span class="badge bg-danger me-2">Administrator</span>
                            <span class="small text-muted">Kelola akun, kelas, mata pelajaran, dan konfigurasi hak akses RBAC.</span>
                        </div>
                        <div class="mb-3">
                            <span class="badge bg-success me-2">Guru</span>
                            <span class="small text-muted">Kelola topik, materi, bank soal kuis, dan pantau perkembangan kelas.</span>
                        </div>
                        <div>
                            <span class="badge bg-primary me-2">Siswa</span>
                            <span class="small text-muted">Akses <?= $totalMaterials ?> materi, <?= $totalQuestions ?> soal kuis adaptif, rekomendasi belajar, dan Asisten AI.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">Kurikulum & Fitur Inti EduMind AI</h2>
        <div class="row g-4">
            <?php foreach ($subjects as $sub): ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2"><?= htmlspecialchars($sub['code']) ?></span>
                            <h5 class="fw-bold text-primary"><?= htmlspecialchars($sub['name']) ?></h5>
                            <p class="text-muted small mb-0"><?= htmlspecialchars($sub['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>
