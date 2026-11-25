<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/learning_data.php';

$input = json_decode(file_get_contents('php://input'), true);
$topicId = isset($input['topic_id']) ? (int)$input['topic_id'] : 2;
$selectedAnswers = is_array($input['answers'] ?? null) ? $input['answers'] : [];
$durationSeconds = isset($input['duration_seconds']) ? max(0, (int)$input['duration_seconds']) : 0;

$questions = getQuizQuestionsByTopic($topicId);
$totalQuestions = count($questions);
$correctCount = 0;
$details = [];

foreach ($questions as $q) {
    $qid = (string)$q['id'];
    $chosen = strtoupper((string)($selectedAnswers[$qid] ?? ''));
    $isCorrect = ($chosen !== '' && isset($q['options'][$chosen]) && $q['options'][$chosen]['correct'] === true);
    if ($isCorrect) {
        $correctCount++;
    }
    $correctLabel = null;
    foreach ($q['options'] as $lbl => $opt) {
        if ($opt['correct']) {
            $correctLabel = $lbl;
            break;
        }
    }
    $details[] = [
        'question_id' => $q['id'],
        'question' => $q['question'],
        'chosen' => $chosen ?: '-',
        'correct_option' => $correctLabel,
        'is_correct' => $isCorrect,
        'explanation' => $q['explanation']
    ];
}

$score = $totalQuestions > 0 ? (int)round(($correctCount / $totalQuestions) * 100) : 0;
$rule = classifyScore($score);

$_SESSION['edumind_progress'][$topicId] = [
    'score' => $score,
    'correct_count' => $correctCount,
    'total_questions' => $totalQuestions,
    'status_key' => $rule['status_key'],
    'status_label' => $rule['status_label'],
    'recommendation' => $rule
];

$dbSaved = false;
$user = currentUser();
$pdo = getDBConnection();
if ($pdo && $user && !empty($user['id'])) {
    try {
        $uid = (int)$user['id'];
        $stmtAttempt = $pdo->prepare("INSERT INTO attempts (user_id, topic_id, score, correct_count, total_questions, duration_seconds) VALUES (:uid, :tid, :score, :correct, :total, :dur)");
        $stmtAttempt->execute([
            'uid' => $uid,
            'tid' => $topicId,
            'score' => $score,
            'correct' => $correctCount,
            'total' => $totalQuestions,
            'dur' => $durationSeconds
        ]);

        $stmtProg = $pdo->prepare("
            INSERT INTO progress (user_id, topic_id, best_score, latest_score, attempts_count, materials_completed, mastery_status)
            VALUES (:uid, :tid, :score, :score, 1, 1, :status)
            ON DUPLICATE KEY UPDATE
                best_score = GREATEST(best_score, VALUES(best_score)),
                latest_score = VALUES(latest_score),
                attempts_count = attempts_count + 1,
                mastery_status = VALUES(mastery_status)
        ");
        $stmtProg->execute([
            'uid' => $uid,
            'tid' => $topicId,
            'score' => $score,
            'status' => $rule['status_key']
        ]);

        $stmtRec = $pdo->prepare("INSERT INTO recommendations (user_id, source_topic_id, recommendation_type, title, reason, action_plan) VALUES (:uid, :tid, :rtype, :title, :reason, :plan)");
        $stmtRec->execute([
            'uid' => $uid,
            'tid' => $topicId,
            'rtype' => $rule['recommendation_type'],
            'title' => $rule['recommendation_title'],
            'reason' => $rule['reason'],
            'plan' => $rule['action_plan']
        ]);
        $dbSaved = true;
    } catch (Throwable $e) {
        $dbSaved = false;
    }
}

echo json_encode([
    'success' => true,
    'db_saved' => $dbSaved,
    'topic_id' => $topicId,
    'score' => $score,
    'correct_count' => $correctCount,
    'wrong_count' => $totalQuestions - $correctCount,
    'total_questions' => $totalQuestions,
    'mastery' => $rule,
    'details' => $details,
    'governance_note' => 'Rekomendasi awal bersifat saran belajar berbasis aturan skor dan dapat ditinjau oleh guru.'
]);
