CREATE DATABASE IF NOT EXISTS edumind_ai CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE edumind_ai;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'guru', 'siswa') NOT NULL DEFAULT 'siswa',
    status ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(100) NOT NULL,
    academic_year VARCHAR(30) NOT NULL DEFAULT '2026/2027',
    teacher_id INT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS class_student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NOT NULL,
    student_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_class_student (class_id, student_id),
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NULL,
    code VARCHAR(30) NOT NULL,
    name VARCHAR(120) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT NOT NULL,
    prerequisite_topic_id INT NULL,
    title VARCHAR(160) NOT NULL,
    learning_objectives TEXT NOT NULL,
    difficulty_level ENUM('dasar', 'menengah', 'lanjut') NOT NULL DEFAULT 'menengah',
    mastery_threshold INT NOT NULL DEFAULT 80,
    order_index INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    FOREIGN KEY (prerequisite_topic_id) REFERENCES topics(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS learning_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic_id INT NOT NULL,
    title VARCHAR(180) NOT NULL,
    content LONGTEXT NOT NULL,
    summary_notes TEXT NULL,
    estimated_minutes INT NOT NULL DEFAULT 15,
    created_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic_id INT NOT NULL,
    question_text TEXT NOT NULL,
    difficulty ENUM('mudah', 'sedang', 'sulit') NOT NULL DEFAULT 'sedang',
    explanation TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    option_label CHAR(1) NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    is_correct TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    topic_id INT NOT NULL,
    score INT NOT NULL DEFAULT 0,
    correct_count INT NOT NULL DEFAULT 0,
    total_questions INT NOT NULL DEFAULT 0,
    duration_seconds INT NOT NULL DEFAULT 0,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attempt_id INT NOT NULL,
    question_id INT NOT NULL,
    selected_option_id INT NULL,
    is_correct TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (attempt_id) REFERENCES attempts(id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE,
    FOREIGN KEY (selected_option_id) REFERENCES options(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    topic_id INT NOT NULL,
    best_score INT NOT NULL DEFAULT 0,
    latest_score INT NOT NULL DEFAULT 0,
    attempts_count INT NOT NULL DEFAULT 0,
    materials_completed INT NOT NULL DEFAULT 0,
    mastery_status ENUM('belum_menguasai', 'perlu_penguatan', 'menguasai') NOT NULL DEFAULT 'belum_menguasai',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_user_topic (user_id, topic_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS recommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    source_topic_id INT NULL,
    recommended_topic_id INT NULL,
    recommendation_type ENUM('materi_dasar', 'materi_penguatan', 'topik_lanjutan') NOT NULL,
    title VARCHAR(180) NOT NULL,
    reason TEXT NOT NULL,
    action_plan TEXT NOT NULL,
    status ENUM('disarankan', 'diikuti', 'selesai') NOT NULL DEFAULT 'disarankan',
    teacher_reviewed TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (source_topic_id) REFERENCES topics(id) ON DELETE SET NULL,
    FOREIGN KEY (recommended_topic_id) REFERENCES topics(id) ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT IGNORE INTO users (id, name, email, password_hash, role, status) VALUES
(1, 'Administrator EduMind', 'admin@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'aktif'),
(2, 'Razzi Ronaldi (Guru)', 'guru@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'guru', 'aktif'),
(3, 'Riski Winata', 'riski@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif'),
(4, 'Putri Aulia R.', 'putri@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif'),
(5, 'Raffi Aditya H.', 'raffi@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif');

INSERT IGNORE INTO classes (id, class_name, academic_year, teacher_id, description) VALUES
(1, 'MI-2A Adaptif Lab', '2026/2027', 2, 'Kelas praktikum dan uji coba pembelajaran adaptif EduMind AI.');

INSERT IGNORE INTO class_student (class_id, student_id) VALUES
(1, 3), (1, 4), (1, 5);

INSERT IGNORE INTO subjects (id, class_id, code, name, description) VALUES
(1, 1, 'MAT-101', 'Matematika Adaptif', 'Pemahaman konsep bilangan pecahan, operasi hitung, persentase, perbandingan, dan aljabar dasar secara adaptif.'),
(2, 1, 'WEB-201', 'Teknologi Web & Logika Pemrograman', 'Pengembangan aplikasi web modern, struktur HTML/CSS, alur HTTP/API, autentikasi RBAC, dan basis data relasional.'),
(3, 1, 'AI-301', 'Dasar Kecerdasan Buatan & Literasi Data', 'Pengenalan konsep pembelajaran mesin, aturan adaptif, pemrosesan bahasa alami, dan etika privasi data.');

INSERT IGNORE INTO topics (id, subject_id, prerequisite_topic_id, title, learning_objectives, difficulty_level, mastery_threshold, order_index) VALUES
(1, 1, NULL, 'Konsep Dasar Pecahan', 'Memahami makna pembilang dan penyebut sebagai bagian dari keseluruhan serta mengidentifikasi pecahan senilai.', 'dasar', 80, 1),
(2, 1, 1, 'Operasi Penjumlahan & Pengurangan Pecahan', 'Menyelesaikan operasi penjumlahan dan pengurangan pecahan berpenyebut sama maupun berbeda menggunakan KPK.', 'menengah', 80, 2),
(3, 1, 2, 'Persentase, Desimal & Perbandingan', 'Mengonversi pecahan ke bentuk persentase maupun desimal serta membandingkan nilai antar-pecahan.', 'lanjut', 80, 3),
(4, 2, NULL, 'Dasar HTML Semantik & CSS Responsif', 'Memahami struktur dokumen HTML semantik, tata letak Flexbox/Grid, dan desain responsif lintas perangkat.', 'dasar', 80, 1),
(5, 2, 4, 'Arsitektur API, JSON & Status HTTP', 'Memahami alur request-response JSON, metode HTTP, validasi sisi server, dan pembatasan hak akses (RBAC).', 'menengah', 80, 2),
(6, 2, 5, 'Perancangan Basis Data Relasional & Normalisasi', 'Memahami Primary Key, Foreign Key, relasi antar-tabel, dan bentuk normalisasi 1NF–3NF untuk mencegah anomali data.', 'lanjut', 80, 3),
(7, 3, NULL, 'Konsep Dasar AI & Pembelajaran Adaptif', 'Memahami perbedaan sistem statis dan adaptif, klasifikasi aturan skor, serta peran pendampingan guru.', 'dasar', 80, 1),
(8, 3, 7, 'Prompt Engineering, Konteks Kurikulum & Etika AI', 'Menerapkan penyusunan prompt berbasis konteks materi ajar, mitigasi halusinasi, serta perlindungan privasi data siswa.', 'menengah', 80, 2);
