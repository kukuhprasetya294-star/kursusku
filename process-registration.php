<?php
require_once __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nama   = htmlspecialchars($_POST['nama'] ?? '');
$email  = htmlspecialchars($_POST['email'] ?? '');
$hp     = htmlspecialchars($_POST['hp'] ?? '');
$course = htmlspecialchars($_POST['course'] ?? '');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Berhasil - KursusKu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8fafc; color: #0f172a; padding: 40px 20px; }
        .card { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; text-align: center; }
        .icon { font-size: 3rem; color: #10b981; margin-bottom: 10px; }
        h2 { color: #0f766e; margin-bottom: 15px; }
        .info-box { text-align: left; background: #f1f5f9; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .info-box p { margin-bottom: 8px; font-size: 0.95rem; }
        .btn-home { display: inline-block; padding: 10px 20px; background: #0f766e; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <div class="icon">&#10004;</div>
    <h2>Pendaftaran Berhasil!</h2>
    <p>Terima kasih telah mendaftar. Data pendaftaran Anda telah berhasil dicatat.</p>

    <div class="info-box">
        <p><strong>Nama:</strong> <?= $nama ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>No. HP:</strong> <?= $hp ?></p>
        <p><strong>Kode Kursus:</strong> <?= $course ?></p>
    </div>

    <a href="index.php" class="btn-home">Kembali ke Beranda</a>
</div>

</body>
</html>