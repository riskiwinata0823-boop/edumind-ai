CREATE DATABASE IF NOT EXISTS edumind_ai CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE edumind_ai;

-- 1. users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'guru', 'siswa') NOT NULL DEFAULT 'siswa',
    status ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. classes
CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(100) NOT NULL,
    academic_year VARCHAR(30) NOT NULL DEFAULT '2026/2027',
    teacher_id INT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 3. class_student
CREATE TABLE IF NOT EXISTS class_student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NOT NULL,
    student_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_class_student (class_id, student_id),
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 4. subjects
CREATE TABLE IF NOT EXISTS subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NULL,
    code VARCHAR(30) NOT NULL,
    name VARCHAR(120) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 5. topics
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

-- 6. learning_materials
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

-- 7. questions
CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic_id INT NOT NULL,
    question_text TEXT NOT NULL,
    difficulty ENUM('mudah', 'sedang', 'sulit') NOT NULL DEFAULT 'sedang',
    explanation TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 8. options
CREATE TABLE IF NOT EXISTS options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    option_label CHAR(1) NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    is_correct TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 9. attempts
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

-- 10. answers
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

-- 11. progress
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

-- 12. recommendations
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

-- Password default untuk semua akun demo: password123
INSERT INTO users (id, name, email, password_hash, role, status) VALUES
(1, 'Administrator EduMind', 'admin@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'aktif'),
(2, 'Razzi Ronaldi (Guru)', 'guru@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'guru', 'aktif'),
(3, 'Riski Winata', 'riski@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif'),
(4, 'Putri Aulia R.', 'putri@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif'),
(5, 'Raffi Aditya H.', 'raffi@edumind.polinela.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'siswa', 'aktif');

INSERT INTO classes (id, class_name, academic_year, teacher_id, description) VALUES
(1, 'MI-3A Adaptif Lab', '2026/2027', 2, 'Kelas praktikum dan uji coba pembelajaran adaptif EduMind AI.');

INSERT INTO class_student (class_id, student_id) VALUES
(1, 3), (1, 4), (1, 5);

INSERT INTO subjects (id, class_id, code, name, description) VALUES
(1, 1, 'MAT-101', 'Matematika', 'Pemahaman konsep bilangan pecahan, operasi hitung, persentase, dan aljabar dasar secara adaptif.'),
(2, 1, 'WEB-201', 'Teknologi Web & Logika Pemrograman', 'Pengembangan aplikasi web modern, struktur data, dan logika evaluasi terstruktur.');

INSERT INTO topics (id, subject_id, prerequisite_topic_id, title, learning_objectives, difficulty_level, mastery_threshold, order_index) VALUES
(1, 1, NULL, 'Konsep Dasar Pecahan', 'Memahami makna pembilang dan penyebut sebagai bagian dari keseluruhan serta representasi visualnya.', 'dasar', 80, 1),
(2, 1, 1, 'Operasi Penjumlahan Pecahan', 'Menyelesaikan penjumlahan pecahan berpenyebut sama maupun berbeda menggunakan kelipatan persekutuan (KPK).', 'menengah', 80, 2),
(3, 1, 2, 'Persentase dan Perbandingan', 'Mengonversi pecahan ke bentuk persentase dan membandingkan nilai antar-topik.', 'lanjut', 80, 3);

INSERT INTO learning_materials (id, topic_id, title, content, summary_notes, estimated_minutes, created_by) VALUES
(1, 1, 'Mengenal Pembilang, Penyebut, dan Bagian Utuh', 'Pecahan ditulis dalam bentuk a/b dengan b tidak sama dengan nol. Angka di bagian atas (pembilang) menunjukkan jumlah bagian yang diperhatikan, sedangkan angka di bagian bawah (penyebut) menunjukkan jumlah total bagian sama besar dari satu kesatuan. Contoh: satu loyang pizza dipotong menjadi 4 bagian sama besar; mengambil 1 potong berarti 1/4 bagian.', 'Pembilang = bagian diambil; Penyebut = total bagian sama besar.', 10, 2),
(2, 2, 'Penjumlahan Pecahan dengan Penyebut Berbeda (KPK)', 'Untuk menjumlahkan dua pecahan seperti 1/2 + 1/4, penyebutnya harus disamakan terlebih dahulu menggunakan KPK dari 2 dan 4, yaitu 4. Ubah 1/2 menjadi 2/4, lalu jumlahkan pembilangnya: 2/4 + 1/4 = 3/4. Kesalahan umum adalah langsung menjumlahkan pembilang dan penyebut sekaligus (1+1)/(2+4) = 2/6, yang tidak tepat secara matematis.', 'Samakan penyebut dengan KPK sebelum menjumlahkan pembilang.', 15, 2),
(3, 3, 'Konversi Pecahan ke Persentase', 'Persentase berarti per seratus (%). Untuk mengubah pecahan menjadi persentase, kalikan nilai pecahan dengan 100%. Contoh: 3/4 x 100% = 75%.', 'Kalikan nilai pecahan dengan 100% untuk memperoleh persentase.', 15, 2);

-- Soal Topik 2 (Operasi Penjumlahan Pecahan - 3 Soal)
INSERT INTO questions (id, topic_id, question_text, difficulty, explanation) VALUES
(1, 2, 'Hasil dari 1/2 + 1/4 adalah...', 'mudah', 'KPK dari 2 dan 4 adalah 4. Jadi 1/2 = 2/4, lalu 2/4 + 1/4 = 3/4.'),
(2, 2, 'Hasil dari 2/3 + 1/6 adalah...', 'sedang', 'KPK dari 3 dan 6 adalah 6. Ubah 2/3 menjadi 4/6, lalu 4/6 + 1/6 = 5/6.'),
(3, 2, 'Mengapa 1/2 + 1/3 tidak sama dengan 2/5?', 'sulit', 'Penyebut harus disamakan terlebih dahulu menggunakan KPK (6): 3/6 + 2/6 = 5/6, bukan menjumlahkan pembilang dan penyebut.');

INSERT INTO options (question_id, option_label, option_text, is_correct) VALUES
(1, 'A', '2/6', 0),
(1, 'B', '3/4', 1),
(1, 'C', '1/8', 0),
(1, 'D', '1/6', 0),
(2, 'A', '5/6', 1),
(2, 'B', '3/9', 0),
(2, 'C', '1/2', 0),
(2, 'D', '3/6', 0),
(3, 'A', 'Karena penyebut harus disamakan lewat KPK menjadi 5/6', 1),
(3, 'B', 'Karena 1 + 1 seharusnya sama dengan 3', 0),
(3, 'C', 'Karena pecahan tidak boleh dijumlahkan', 0),
(3, 'D', 'Karena hasilnya selalu 1/5', 0);

INSERT INTO progress (user_id, topic_id, best_score, latest_score, attempts_count, materials_completed, mastery_status) VALUES
(3, 1, 85, 85, 1, 1, 'menguasai'),
(3, 2, 50, 50, 1, 1, 'belum_menguasai'),
(3, 3, 65, 65, 1, 0, 'perlu_penguatan');

INSERT INTO recommendations (user_id, source_topic_id, recommended_topic_id, recommendation_type, title, reason, action_plan, status, teacher_reviewed) VALUES
(3, 2, 1, 'materi_dasar', 'Ulangi Konsep Dasar Pecahan & Latihan Bertahap', 'Skor pada topik Operasi Penjumlahan Pecahan berada pada rentang 0-59 (Belum Menguasai).', 'Pelajari kembali materi prasyarat pembilang/penyebut dan latihan KPK sebelum mengulang kuis.', 'disarankan', 1);
