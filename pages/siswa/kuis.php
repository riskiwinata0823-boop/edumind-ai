<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['siswa'], '../../');
$user = currentUser();
$topics = getTopicsData();
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 2;
$questions = getQuizQuestionsByTopic($topicId);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Adaptif — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Sistem Kuis & Penilaian Adaptif</span>
    <div class="d-flex gap-2 flex-wrap">
        <a href="dashboard.php" class="btn btn-sm btn-outline-light">Dashboard</a>
        <a href="materi.php?topic_id=<?= $topicId ?>" class="btn btn-sm btn-light">Materi</a>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<div class="container py-4">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <span class="small fw-bold text-muted">Pilih Topik Kuis:</span>
                <?php foreach ($topics as $t): ?>
                    <a href="kuis.php?topic_id=<?= (int)$t['id'] ?>" class="btn btn-sm <?= (int)$t['id'] === $topicId ? 'btn-primary' : 'btn-outline-secondary' ?>">
                        <?= htmlspecialchars($t['title']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <span class="badge bg-secondary" id="timerBadge">00:00</span>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    <span>Latihan Kuis Pilihan Ganda (<?= count($questions) ?> Soal)</span>
                </div>
                <div class="card-body">
                    <form id="quizForm">
                        <?php foreach ($questions as $idx => $q): ?>
                            <div class="mb-4 pb-3 border-bottom">
                                <p class="fw-bold mb-2"><?= ($idx + 1) . '. ' . htmlspecialchars($q['question']) ?> <span class="badge bg-light text-dark border"><?= htmlspecialchars($q['difficulty']) ?></span></p>
                                <?php foreach ($q['options'] as $label => $opt): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q_<?= $q['id'] ?>" id="q<?= $q['id'] ?>_<?= $label ?>" value="<?= $label ?>">
                                        <label class="form-check-label" for="q<?= $q['id'] ?>_<?= $label ?>">
                                            <strong><?= $label ?>.</strong> <?= htmlspecialchars($opt['text']) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary w-100">Kirim Jawaban, Hitung Nilai & Pemetaan Kompetensi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Hasil Evaluasi, Pemetaan & Rekomendasi</div>
                <div class="card-body" id="resultPanel">
                    <p class="text-muted small mb-0">Kerjakan soal di sebelah kiri lalu kirim jawaban untuk melihat skor, status penguasaan, pembahasan tiap soal, dan rekomendasi jalur belajar.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let seconds = 0;
setInterval(() => {
    seconds++;
    const m = String(Math.floor(seconds / 60)).padStart(2, '0');
    const s = String(seconds % 60).padStart(2, '0');
    document.getElementById('timerBadge').textContent = `${m}:${s}`;
}, 1000);

document.getElementById('quizForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const answers = {};
    <?php foreach ($questions as $q): ?>
        const checked_<?= $q['id'] ?> = document.querySelector('input[name="q_<?= $q['id'] ?>"]:checked');
        answers['<?= $q['id'] ?>'] = checked_<?= $q['id'] ?> ? checked_<?= $q['id'] ?>.value : '';
    <?php endforeach; ?>

    const res = await fetch('../../api/evaluate_quiz.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ topic_id: <?= $topicId ?>, answers })
    });
    const data = await res.json();

    let detailHtml = '';
    data.details.forEach((d, i) => {
        const icon = d.is_correct ? '<span class="badge bg-success">Benar</span>' : '<span class="badge bg-danger">Salah</span>';
        detailHtml += `
            <div class="border rounded p-2 mb-2 small bg-white">
                <div class="d-flex justify-content-between"><strong>Soal ${i + 1}</strong>${icon}</div>
                <div>Jawaban Anda: <strong>${d.chosen}</strong> | Kunci: <strong>${d.correct_option}</strong></div>
                <div class="text-muted mt-1">${d.explanation}</div>
            </div>
        `;
    });

    document.getElementById('resultPanel').innerHTML = `
        <div class="alert alert-${data.mastery.badge_class}">
            <h5 class="fw-bold mb-1">Nilai: ${data.score} (${data.mastery.status_label})</h5>
            <div class="small mb-2">Benar: ${data.correct_count} dari ${data.total_questions} soal</div>
            <div class="small"><strong>Rekomendasi:</strong> ${data.mastery.recommendation_title}</div>
            <div class="small mt-1">${data.mastery.action_plan}</div>
        </div>
        <div class="mb-2"><strong class="small">Pembahasan Jawaban:</strong></div>
        ${detailHtml}
        <div class="text-muted small mt-2">${data.governance_note}</div>
    `;
});
</script>
</body>
</html>
