<?php

declare(strict_types=1);

$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator Biaya - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
<main class="utility-card calculator-card">
    <div class="utility-topline">
        <span class="eyebrow">MILESTONE 3</span>
        <span class="status-dot"><?= $isActive ? 'Kursus aktif' : 'Kursus nonaktif' ?></span>
    </div>
    <h1>Kalkulator Estimasi Biaya</h1>
    <p>Kursus: <strong><?= htmlspecialchars($courseName) ?></strong></p>

    <div class="table-wrap">
        <table class="course-table compact-table">
            <thead><tr><th>Komponen</th><th>Nilai</th></tr></thead>
            <tbody>
            <tr><td>Biaya per peserta</td><td><?= 'Rp ' . number_format($fee, 0, ',', '.') ?></td></tr>
            <tr><td>Jumlah peserta</td><td><?= $participantCount ?></td></tr>
            <tr><td>Subtotal</td><td><?= 'Rp ' . number_format($subtotal, 0, ',', '.') ?></td></tr>
            <tr><td>Diskon (<?= $discountPercent ?>%)</td><td>- <?= 'Rp ' . number_format($discount, 0, ',', '.') ?></td></tr>
            <tr><td>Biaya admin</td><td><?= 'Rp ' . number_format($adminFee, 0, ',', '.') ?></td></tr>
            <tr class="total-row"><th>Total akhir</th><th><?= 'Rp ' . number_format($total, 0, ',', '.') ?></th></tr>
            </tbody>
        </table>
    </div>

    <div class="formula-box">
        <strong>Rumus:</strong>
        <code>subtotal = fee x peserta</code>
        <code>diskon = subtotal x persen / 100</code>
        <code>total = subtotal - diskon + admin</code>
    </div>

    <div class="button-row">
        <a class="button" href="index.php">Kembali ke Beranda</a>
        <a class="button button-secondary" href="fee-tests.php">Lihat 5 Test Case</a>
    </div>
</main>
</body>
</html>