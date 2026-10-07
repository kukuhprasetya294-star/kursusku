<?php
// Load fungsi helper dari Pertemuan 4
require_once __DIR__ . '/helpers.php';

// Variabel Dasar dari Pertemuan 2
$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

// Array Data 6 Kursus dari Pertemuan 4
$courses = [
    [
        'code'       => 'WEB-01',
        'name'       => 'Web Dasar',
        'fee'        => 200000,
        'quota'      => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code'       => 'PHP-01',
        'name'       => 'PHP Dasar',
        'fee'        => 250000,
        'quota'      => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code'       => 'PHP-02',
        'name'       => 'PHP Lanjutan',
        'fee'        => 300000,
        'quota'      => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code'       => 'LAR-01',
        'name'       => 'Laravel Fundamental',
        'fee'        => 350000,
        'quota'      => 25,
        'registered' => 25, // Status Penuh
        'start_date' => '2026-09-28',
    ],
    [
        'code'       => 'DB-01',
        'name'       => 'MySQL Dasar',
        'fee'        => 275000,
        'quota'      => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code'       => 'UI-01',
        'name'       => 'UI Web Dasar',
        'fee'        => 225000,
        'quota'      => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?> - Portal Pendaftaran Kursus</title>
    
    <style>
        :root {
            --primary: #0f766e;
            --primary-dark: #0d615b;
            --accent: #2dd4bf;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            line-height: 1.6;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
            padding: 15px 0;
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }

        nav a {
            margin-left: 18px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        nav a:hover {
            color: var(--primary);
        }

        .hero-section {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .hero-title span {
            color: var(--primary);
        }

        .hero-desc {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 650px;
            margin: 0 auto 25px;
        }

        .btn-calc {
            display: inline-block;
            padding: 12px 28px;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(15, 118, 110, 0.2);
        }

        .btn-calc:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }

        .section-title {
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 20px;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .feature-card {
            background: var(--card-bg);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid var(--border);
            transition: transform 0.2s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: var(--accent);
        }

        .feature-card h3 {
            color: var(--primary);
            margin-bottom: 8px;
        }

        .table-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #f1f5f9;
            color: var(--text-main);
            padding: 14px 18px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            font-size: 0.95rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .badge-available {
            background: #e7f8ef;
            color: #146c43;
            padding: 5px 12px;
            border-radius: 99px;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-block;
        }

        .badge-full {
            background: #fdeaea;
            color: #a61b1b;
            padding: 5px 12px;
            border-radius: 99px;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-block;
        }

        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .media-card {
            background: var(--card-bg);
            padding: 18px;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .media-card img, .media-card video {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 30px 20px;
            color: var(--text-muted);
            border-top: 1px solid var(--border);
            background: var(--card-bg);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- HEADER & NAVIGASI (Minggu 2) -->
<header>
    <div class="nav-container">
        <a href="index.php" class="logo"><?= htmlspecialchars($siteName) ?>.</a>
        <nav aria-label="Navigasi utama">
    <a href="index.php"><strong>KursusKu</strong></a>
    <a href="index.php#katalog">Katalog</a>
    <a href="registration.php">Daftar Kursus</a>
    <a href="#keunggulan">Keunggulan</a>
    <a href="#program">Program</a>
    <a href="#kontak">Kontak</a>
</nav>
    </div>
</header>

<!-- HERO SECTION (Minggu 2 & Link Kalkulator Minggu 3) -->
<section class="hero-section">
    <h1 class="hero-title"><span>Selamat Datang di <?= htmlspecialchars($siteName) ?></span><br><?= htmlspecialchars($tagline) ?></h1>
    <p class="hero-desc">Temukan kursus teknologi pilihanmu, pelajari materi berbasis proyek nyata, dan hitung estimasi biaya kursus secara fleksibel.</p>
    <!-- Link Penghubung ke Minggu 3 -->
    <a href="fee-calculator.php" class="btn-calc">&rarr; Buka Kalkulator Estimasi Biaya</a>
</section>

<div class="container">

    <!-- SECTION KEUNGGULAN (Minggu 2) -->
    <section id="keunggulan">
        <h2 class="section-title">Mengapa Memilih KursusKu?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>Materi Terarah</h3>
                <p>Materi disusun bertahap dari level dasar hingga praktik lanjutan.</p>
            </div>
            <div class="feature-card">
                <h3>Belajar dengan Proyek</h3>
                <p>Setiap tahap menghasilkan bagian nyata dari aplikasi yang dapat dijadikan portofolio.</p>
            </div>
            <div class="feature-card">
                <h3>Pendampingan Praktik</h3>
                <p>Mahasiswa belajar melalui demonstrasi, latihan terarah, dan evaluasi berkala.</p>
            </div>
        </div>
    </section>

    <!-- SECTION KATALOG KURSUS (Minggu 4) -->
    <section id="katalog">
        <h2 class="section-title">Katalog Kursus</h2>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kursus</th>
                        <th>Biaya</th>
                        <th>Mulai Kelas</th>
                        <th>Sisa Kursi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <?php 
                            // Pengolahan Logika via Helpers Function (Minggu 4)
                            $status = statusKursus($course['quota'], $course['registered']);
                            $statusClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
                        ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($course['code']) ?></strong></td>
                            <td><?= htmlspecialchars(trim($course['name'])) ?></td>
                            <td><?= rupiah($course['fee']) ?></td>
                            <td><?= formatTanggal($course['start_date']) ?></td>
                            <td><?= sisaKursi($course['quota'], $course['registered']) ?> Kursi</td>
                            <td><span class="<?= $statusClass ?>"><?= $status ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- SECTION ALUR PENDAFTARAN (Minggu 2) -->
    <section id="alur" style="margin-top: 50px;">
        <h2 class="section-title">Cara Mendaftar</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>1. Pilih Kursus</h3>
                <p>Pilih kelas yang sesuai dengan minat dari tabel katalog di atas.</p>
            </div>
            <div class="feature-card">
                <h3>2. Cek Estimasi Biaya</h3>
                <p>Gunakan Kalkulator Biaya untuk melihat detail diskon dan total bayar.</p>
            </div>
            <div class="feature-card">
                <h3>3. Konfirmasi Pendaftaran</h3>
                <p>Lengkapi formulir pendaftaran dan tunggu konfirmasi dari admin.</p>
            </div>
        </div>
    </section>

    <!-- SECTION MEDIA & GAMBAR/VIDEO (Minggu 2) -->
    <section id="media" style="margin-top: 50px;">
        <h2 class="section-title">Kenali Program Kami</h2>
        <div class="media-grid">
            <div class="media-card">
                <img src="assets/images/hero-kursus.jpg" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer">
                <h3>Fasilitas Praktikum</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Laboratorium komputer modern untuk mendukung kegiatan belajar mengajar.</p>
            </div>
            <div class="media-card">
                <video controls>
                    <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                    Browser Anda tidak mendukung video HTML5.
                </video>
                <h3>Video Introduksi</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Simak gambaran singkat mengenai alur pembelajaran di KursusKu.</p>
            </div>
        </div>
        <p style="text-align: center; margin-top: 20px;">
            Pelajari juga <a href="https://www.php.net/" target="_blank" rel="noopener" style="color: var(--primary); font-weight: bold;">Dokumentasi Resmi PHP</a>.
        </p>
    </section>

    <!-- SECTION KONTAK (Minggu 2) -->
    <section id="kontak" style="margin-top: 50px; text-align: center;">
        <h2 class="section-title">Kontak Kami</h2>
        <p>Email: <strong>support@kursusku.test</strong> | Alamat: <strong>Laboratorium Komputer PTIK UIN Bukittinggi</strong></p>
    </section>

</div>

<!-- FOOTER (Minggu 2) -->
<footer>
    <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?>. All rights reserved.</small>
</footer>

</body>
</html>