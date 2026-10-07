<?php
require_once __DIR__ . '/helpers.php';

// Master Data Kursus
$courses = [
    'WEB-01' => ['name' => 'Web Dasar', 'fee' => 200000],
    'PHP-01' => ['name' => 'PHP Dasar', 'fee' => 250000],
    'PHP-02' => ['name' => 'PHP Lanjutan', 'fee' => 300000],
    'LAR-01' => ['name' => 'Laravel Fundamental', 'fee' => 350000],
    'DB-01'  => ['name' => 'MySQL Dasar', 'fee' => 275000],
    'UI-01'  => ['name' => 'UI Web Dasar', 'fee' => 225000],
];

// 1. Tangkap Data POST (Minat default ke array kosong [])
$name            = trim($_POST['name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$courseCode      = $_POST['course_code'] ?? 'PHP-01';
$participantType = $_POST['participant_type'] ?? 'umum';
$method          = $_POST['method'] ?? 'Hybrid';
$packageCount    = (int)($_POST['package_count'] ?? 1);
$interests       = $_POST['interests'] ?? []; // Fix: Kosong jika tidak dicentang
$note            = trim($_POST['note'] ?? '');

// 2. Olah Informasi Biaya
$courseName = $courses[$courseCode]['name'] ?? 'PHP Dasar';
$unitFee    = $courses[$courseCode]['fee'] ?? 250000;
$subtotal   = $unitFee * max(1, $packageCount);

// Diskon Otomatis Terisi di Form Hasil (Mahasiswa = 20%, Guru = 15%, Umum = 0%)
$discountPercent = 0;
if ($participantType === 'mahasiswa') {
    $discountPercent = 20;
} elseif ($participantType === 'guru') {
    $discountPercent = 15;
}

$discountAmount = intdiv($subtotal * $discountPercent, 100);
$totalFee       = $subtotal - $discountAmount;

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    
    <style>
        :root {
            --primary: #0f766e;
            --primary-dark: #0d615b;
            --accent-bg: #e6f4f1;
            --bg-body: #edf2f4;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.5;
            padding: 40px 15px;
        }

        .summary-wrapper {
            max-width: 680px;
            margin: 0 auto;
            background: var(--card-bg);
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        .sub-header {
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--primary);
            margin-bottom: 6px;
        }

        .main-title {
            font-size: 1.85rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 28px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 28px;
        }

        .info-box {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            padding: 14px 18px;
            border-radius: 12px;
        }

        .info-box label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .info-box span {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .section-label {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0f172a;
            margin: 24px 0 12px;
        }

        .cost-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            margin-bottom: 20px;
        }

        .cost-table td {
            padding: 12px 18px;
            font-size: 0.92rem;
            border-bottom: 1px solid var(--border-color);
        }

        .cost-table tr:last-child td { border-bottom: none; }
        .cost-table .text-right { text-align: right; font-weight: 600; }

        .cost-table .total-row {
            background-color: var(--accent-bg);
            font-weight: 800;
            color: var(--primary);
        }

        .cost-table .total-row td { font-size: 1rem; }

        .badge-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .badge-pill {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .badge-empty {
            color: var(--text-muted);
            font-style: italic;
            font-size: 0.9rem;
        }

        .facility-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 20px;
        }

        .facility-list li {
            font-size: 0.92rem;
            color: var(--text-main);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .facility-list li::before {
            content: "•";
            color: var(--primary);
            font-weight: bold;
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .note-text {
            font-size: 0.92rem;
            color: var(--text-muted);
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 28px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover { background-color: var(--primary-dark); }

        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover { background-color: #f0fdfa; }

        @media (max-width: 580px) {
            .info-grid { grid-template-columns: 1fr; }
            .btn-group { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>

<main class="summary-wrapper">
    <div class="sub-header">MILESTONE 6 • RINGKASAN</div>
    <h1 class="main-title">Pendaftaran Berhasil Diproses</h1>

    <div class="info-grid">
        <div class="info-box">
            <label>Nama:</label>
            <span><?= e($name) ?></span>
        </div>
        <div class="info-box">
            <label>Email:</label>
            <span><?= e($email) ?></span>
        </div>
        <div class="info-box">
            <label>Kursus:</label>
            <span><?= e($courseName) ?></span>
        </div>
        <div class="info-box">
            <label>Tipe peserta:</label>
            <span><?= ucfirst(e($participantType)) ?></span>
        </div>
        <div class="info-box">
            <label>Metode:</label>
            <span><?= e($method) ?></span>
        </div>
        <div class="info-box">
            <label>Jumlah paket:</label>
            <span><?= $packageCount ?></span>
        </div>
    </div>

    <h2 class="section-label">Rincian Biaya</h2>
    <table class="cost-table">
        <tr>
            <td>Biaya satuan</td>
            <td class="text-right"><?= rupiah($unitFee) ?></td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td class="text-right"><?= rupiah($subtotal) ?></td>
        </tr>
        <tr>
            <td>Diskon <?= $discountPercent ?>%</td>
            <td class="text-right" style="color: #e11d48;">-<?= rupiah($discountAmount) ?></td>
        </tr>
        <tr class="total-row">
            <td>TOTAL AKHIR</td>
            <td class="text-right"><?= rupiah($totalFee) ?></td>
        </tr>
    </table>

    <h2 class="section-label">Minat</h2>
    <div class="badge-group">
        <?php if (!empty($interests)): ?>
            <?php foreach ((array)$interests as $item): ?>
                <span class="badge-pill"><?= e($item) ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            <span class="badge-empty">Tidak ada minat dipilih</span>
        <?php endif; ?>
    </div>

    <h2 class="section-label">Fasilitas</h2>
    <ul class="facility-list">
        <li>Modul digital</li>
        <li>Sertifikat penyelesaian</li>
        <li>Forum diskusi kelas</li>
    </ul>

    <h2 class="section-label">Catatan</h2>
    <div class="note-text">
        <?= e($note) ?: 'Tidak ada catatan.' ?>
    </div>

    <div class="btn-group">
        <a href="registration.php" class="btn btn-primary">Daftar Lagi</a>
        <a href="history-dummy.php" class="btn btn-outline">Lihat History Dummy</a>
        <a href="index.php" class="btn btn-outline">Beranda</a>
    </div>
</main>

</body>
</html>