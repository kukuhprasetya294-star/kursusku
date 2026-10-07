<?php
require_once __DIR__ . '/helpers.php';

// Master Data Dummy Riwayat Pendaftaran
$historyData = [
    [
        'id'               => 'REG-2026-001',
        'name'             => 'Bima Guru',
        'course'           => 'PHP Dasar',
        'participant_type' => 'Guru',
        'total_fee'        => 340000,
        'date'             => '2026-10-06'
    ],
    [
        'id'               => 'REG-2026-002',
        'name'             => 'Kukuh Prasetya',
        'course'           => 'Laravel Fundamental',
        'participant_type' => 'Mahasiswa',
        'total_fee'        => 280000,
        'date'             => '2026-10-07'
    ],
    [
        'id'               => 'REG-2026-003',
        'name'             => 'Andi Wijaya',
        'course'           => 'Web Dasar',
        'participant_type' => 'Umum',
        'total_fee'        => 200000,
        'date'             => '2026-10-07'
    ]
];

function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pendaftaran Dummy - KursusKu</title>
    <style>
        :root {
            --primary: #0f766e;
            --primary-dark: #0d615b;
            --bg-body: #edf2f4;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --border-color: #e2e8f0;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            padding: 40px 15px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--card-bg);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        h1 { font-size: 1.5rem; color: #0f172a; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        th {
            background-color: #f8fafc;
            font-weight: 700;
            color: #475569;
        }

        tr:hover { background-color: #f1f5f9; }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-guru { background-color: #fef3c7; color: #92400e; }
        .badge-mahasiswa { background-color: #e0f2fe; color: #0369a1; }
        .badge-umum { background-color: #f3f4f6; color: #374151; }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.88rem;
        }

        .btn:hover { background: var(--primary-dark); }
    </style>
</head>
<body>

<main class="container">
    <div class="header">
        <h1>Riwayat Pendaftaran (Dummy Data)</h1>
        <a href="registration.php" class="btn">+ Tambah Pendaftaran</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Peserta</th>
                <th>Kursus</th>
                <th>Tipe</th>
                <th>Total Biaya</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historyData as $row): ?>
            <tr>
                <td><strong><?= e($row['id']) ?></strong></td>
                <td><?= e($row['name']) ?></td>
                <td><?= e($row['course']) ?></td>
                <td>
                    <span class="badge badge-<?= strtolower(e($row['participant_type'])) ?>">
                        <?= e($row['participant_type']) ?>
                    </span>
                </td>
                <td><?= rupiah($row['total_fee']) ?></td>
                <td><?= e($row['date']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php" style="color: var(--primary); text-decoration: none; font-weight: 600;">&larr; Kembali ke Beranda</a>
</main>

</body>
</html>