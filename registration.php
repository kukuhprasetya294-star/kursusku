<?php
require_once __DIR__ . '/helpers.php';

// Master Data Kursus
$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar', 'fee' => 200000],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'fee' => 250000],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan', 'fee' => 300000],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000],
    ['code' => 'DB-01',  'name' => 'MySQL Dasar', 'fee' => 275000],
    ['code' => 'UI-01',  'name' => 'UI Web Dasar', 'fee' => 225000],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="registration.php">Daftar</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Pendaftaran Kursus</p>
        <h1>Mulai belajar bersama KursusKu</h1>
        <p>Lengkapi form pendaftaran di bawah ini.</p>
    </section>

    <section class="form-card">
        <form action="process-registration.php" method="POST" class="registration-form">
            <input type="hidden" name="source" value="week-06">

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" name="name" type="text" minlength="3" maxlength="100" autocomplete="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" maxlength="120" autocomplete="email" required>
                </div>

                <div class="form-group" style="grid-column: span 2;">
                    <label for="phone">Nomor HP</label>
                    <input id="phone" name="phone" type="tel" maxlength="15" autocomplete="tel" placeholder="Contoh: 081234567890" required>
                </div>
            </div>

            <!-- Pilihan Kursus dari Array -->
            <div class="form-group">
                <label for="course_code">Kursus yang Dipilih</label>
                <select id="course_code" name="course_code" required>
                    <option value="">-- Pilih kursus --</option>
                    <?php foreach ($courses as $c): ?>
                        <option value="<?= htmlspecialchars($c['code']) ?>">
                            <?= htmlspecialchars($c['name']) ?> (<?= rupiah($c['fee']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Radio Button Tipe Peserta (Label Diskon Disembunyikan) -->
            <fieldset class="form-group" style="border:none; padding:0;">
                <legend>Jenis Peserta</legend>
                <label class="choice">
                    <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="guru"> Guru
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="umum"> Umum
                </label>
            </fieldset>

            <!-- Checkbox Minat Tambahan -->
            <fieldset class="form-group" style="border:none; padding:0;">
                <legend>Minat Tambahan</legend>
                <label class="choice"><input type="checkbox" name="interests[]" value="UI/UX"> UI/UX</label>
                <label class="choice"><input type="checkbox" name="interests[]" value="Database"> Database</label>
                <label class="choice"><input type="checkbox" name="interests[]" value="Backend"> Backend</label>
            </fieldset>

            <div class="form-group">
                <label for="note">Catatan</label>
                <textarea id="note" name="note" rows="4" maxlength="300" placeholder="Tuliskan catatan (opsional)"></textarea>
            </div>

            <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
        </form>
    </section>
</main>

</body>
</html>