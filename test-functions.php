<?php
require_once __DIR__ . '/helpers.php';

$tests = [
    ['Test Rupiah Format', rupiah(250000), 'Rp 250.000'],
    ['Test Status Penuh', statusKursus(25, 25), 'Penuh'],
    ['Test Status Tersedia', statusKursus(30, 29), 'Tersedia'],
    ['Test Sisa Kursi Kosong', sisaKursi(20, 0), 20],
    ['Test Sisa Kursi Penuh', sisaKursi(25, 25), 0],
    ['Test Format Tanggal', formatTanggal('2026-09-15'), '15-09-2026'],
];

?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Hasil Pengujian Fungsi Helpers</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #121212; color: #fff; }
        .pass { color: #00ff66; font-weight: bold; }
        .fail { color: #ff3333; font-weight: bold; }
        .card { background: #1e1e1e; padding: 15px; margin-bottom: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Pengujian Unit Function helpers.php (Week 04)</h1>
    <hr>
    <?php foreach ($tests as [$name, $actual, $expected]): ?>
        <?php $passed = ($actual === $expected); ?>
        <div class="card">
            <strong>[<?= $name ?>]</strong><br>
            Hasil Aktual  : <?= htmlspecialchars((string)$actual) ?><br>
            Ekspektasi    : <?= htmlspecialchars((string)$expected) ?><br>
            Status        : <span class="<?= $passed ? 'pass' : 'fail' ?>"><?= $passed ? 'PASS' : 'FAIL' ?></span>
        </div>
    <?php endforeach; ?>
</body>
</html>