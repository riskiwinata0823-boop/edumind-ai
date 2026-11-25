<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/learning_data.php';
requireRole(['siswa'], '../../');
$user = currentUser();
$topics = getTopicsData();
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 2;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asisten Belajar AI — EduMind AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand fw-bold">EduMind AI — Asisten Belajar AI</span>
    <div class="d-flex gap-2">
        <a href="dashboard.php" class="btn btn-sm btn-outline-light">Dashboard</a>
        <a href="materi.php" class="btn btn-sm btn-light">Materi</a>
        <a href="../../logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-bold">Percakapan Asisten Belajar AI (Terarah pada Materi Kurikulum)</div>
        <div class="card-body">
            <div class="row g-2 mb-3">
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Topik Konteks Materi</label>
                    <select id="aiTopic" class="form-select form-select-sm">
                        <?php foreach ($topics as $t): ?>
                            <option value="<?= (int)$t['id'] ?>" <?= (int)$t['id'] === $topicId ? 'selected' : '' ?>>
                                <?= htmlspecialchars($t['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Mode Bantuan AI</label>
                    <select id="aiMode" class="form-select form-select-sm">
                        <option value="jelaskan">Jelaskan Materi</option>
                        <option value="sederhana">Sederhanakan dengan Bahasa Sehari-hari</option>
                        <option value="contoh_soal">Berikan Contoh Soal</option>
                        <option value="bahas_salah">Bahas Kesalahan Umum</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end gap-2 flex-wrap">
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="quickPrompt('Jelaskan dengan bahasa sederhana')">Sederhanakan</button>
                    <button type="button" class="btn btn-sm btn-outline-success" onclick="quickPrompt('Berikan contoh soal dan pembahasan')">Contoh Soal</button>
                </div>
            </div>

            <div id="chatWindow" class="border rounded p-3 mb-3 bg-white" style="height: 300px; overflow-y: auto;">
                <div class="text-muted small">Halo <?= htmlspecialchars($user['name']) ?>! Pilih topik dan mode bantuan, lalu tanyakan materi yang ingin kamu pahami.</div>
            </div>

            <div class="input-group">
                <input type="text" id="promptInput" class="form-control" placeholder="Tulis pertanyaan Anda tentang materi..." onkeypress="if(event.key==='Enter') sendPrompt()">
                <button class="btn btn-primary" onclick="sendPrompt()">Kirim ke Asisten AI</button>
            </div>
        </div>
    </div>
</div>

<script>
function quickPrompt(text) {
    document.getElementById('promptInput').value = text;
    sendPrompt();
}

async function sendPrompt() {
    const input = document.getElementById('promptInput');
    const text = input.value.trim();
    if (!text) return;

    const mode = document.getElementById('aiMode').value;
    const selectedTopic = parseInt(document.getElementById('aiTopic').value);
    const win = document.getElementById('chatWindow');
    win.innerHTML += `<div class="mb-2 text-end"><span class="badge bg-primary text-wrap text-start p-2">Siswa: ${text}</span></div>`;
    input.value = '';

    const res = await fetch('../../api/ai_tutor.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: text, mode: mode, topic_id: selectedTopic })
    });
    const data = await res.json();
    const formattedReply = data.reply.replace(/\n/g, '<br>');
    win.innerHTML += `<div class="mb-3"><div class="p-2 rounded bg-light border"><strong>EduMind AI:</strong><br>${formattedReply}</div></div>`;
    win.scrollTop = win.scrollHeight;
}
</script>
</body>
</html>
