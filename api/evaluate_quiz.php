<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/learning_data.php';

$input = json_decode(file_get_contents('php://input'), true);
$topicId = isset($input['topic_id']) ? (int)$input['topic_id'] : 2;
$selectedAnswers = is_array($input['answers'] ?? null) ? $input['answers'] : [];

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

echo json_encode([
    'success' => true,
    'topic_id' => $topicId,
    'score' => $score,
    'correct_count' => $correctCount,
    'wrong_count' => $totalQuestions - $correctCount,
    'total_questions' => $totalQuestions,
    'mastery' => $rule,
    'details' => $details,
    'governance_note' => 'Rekomendasi awal bersifat saran belajar berbasis aturan skor dan dapat ditinjau oleh guru.'
]);
