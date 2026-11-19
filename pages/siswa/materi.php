<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['siswa'], '../../');
$user = currentUser();
$subjects = getSubjectsData();
$topics = getTopicsData();
$selectedTopicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 2;
$activeTopic = $topics[1];
foreach ($topics as $t) {
    if ((int)$t['id'] === $selectedTopicId) {
        $activeTopic = $t;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Pelajaran & Materi — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Materi Pembelajaran</span>
    <div class="d-flex gap-2">
        <a href="dashboard.php" class="btn btn-sm btn-outline-light">Dashboard</a>
        <a href="kuis.php?topic_id=<?= (int)$activeTopic['id'] ?>" class="btn btn-sm btn-warning">Kerjakan Kuis Topik Ini</a>
        <a href="asisten_ai.php?topic_id=<?= (int)$activeTopic['id'] ?>" class="btn btn-sm btn-info">Tanya Asisten AI</a>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Mata Pelajaran & Topik</div>
                <div class="list-group list-group-flush">
                    <?php foreach ($topics as $t): ?>
                        <a href="materi.php?topic_id=<?= (int)$t['id'] ?>" class="list-group-item list-group-item-action <?= (int)$t['id'] === (int)$activeTopic['id'] ? 'active' : '' ?>">
                            <div class="fw-bold"><?= htmlspecialchars($t['title']) ?></div>
                            <small class="<?= (int)$t['id'] === (int)$activeTopic['id'] ? 'text-light' : 'text-muted' ?>">
                                <?= htmlspecialchars($t['subject_name']) ?> • Level: <?= htmlspecialchars($t['difficulty_level']) ?>
                            </small>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <span class="badge bg-primary mb-2"><?= htmlspecialchars($activeTopic['subject_name']) ?></span>
                    <h3 class="fw-bold"><?= htmlspecialchars($activeTopic['material_title']) ?></h3>
                    <p class="text-muted"><strong>Tujuan Pembelajaran:</strong> <?= htmlspecialchars($activeTopic['learning_objectives']) ?></p>
                    <hr>
                    <p style="line-height:1.75"><?= htmlspecialchars($activeTopic['material_content']) ?></p>
                    <div class="alert alert-info mt-3 mb-4">
                        <strong>Ringkasan Kunci:</strong> <?= htmlspecialchars($activeTopic['summary_notes']) ?>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="kuis.php?topic_id=<?= (int)$activeTopic['id'] ?>" class="btn btn-primary">Lanjut ke Kuis Topik Ini</a>
                        <a href="asisten_ai.php?topic_id=<?= (int)$activeTopic['id'] ?>" class="btn btn-outline-success">Diskusikan dengan Asisten AI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
