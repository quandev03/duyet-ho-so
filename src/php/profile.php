<?php
$host = 'localhost'; 
$dbname = 'duyet_ho_so'; 
$username = 'root';
$password = ''; 

// Kết nối đến cơ sở dữ liệu
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
    exit;
}

// Lấy thông tin sinh viên từ cơ sở dữ liệu
$stmt = $pdo->prepare("SELECT * FROM account WHERE username = :username");
$stmt->execute(['username' => 'Nguyễn Văn A']);  
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "Sinh viên không tồn tại!";
    exit;
}

$hasHocBa = file_exists(filename: $student['hocba']);
$khoiXetTuyen = explode(',', $student['exam_groups']);  // Ví dụ: 'A01,B00'
$diemXetTuyen = explode(',', $student['exam_scores']);  // Ví dụ: '8.0,7.5,9.0'
$nganh = $student['study_area'];  // Ngành học
$timeSubmitted = $student['submission_time'];  
