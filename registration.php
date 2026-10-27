<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tahun    = date('Y');

// Mengambil parameter pilihan kursus dari URL (?course=...)
$selectedCourse = $_GET['course'] ?? '';

$courses = [
    'WEB-01' => 'WEB-01 - HTML & CSS Dasar',
    'PHP-01' => 'PHP-01 - PHP Pemula',
    'LAR-01' => 'LAR-01 - Framework Laravel',
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran - <?= htmlspecialchars($siteName); ?></title>

  <style>
    :root {
      --primary: #0f766e;
      --primary-dark: #0d615b;
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
    }

    body {
      font-family: 'Segoe UI', Roboto, sans-serif;
      background-color: var(--bg);
      color: var(--text-main);
      line-height: 1.6;
      padding: 40px 20px;
    }

    .form-card {
      max-width: 520px;
      margin: 0 auto;
      background: var(--card-bg);
      padding: 35px;
      border-radius: 12px;
      border: 1px solid var(--border);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .form-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--primary);
      text-align: center;
      margin-bottom: 8px;
    }

    .form-desc {
      text-align: center;
      color: var(--text-muted);
      font-size: 0.95rem;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      font-size: 0.9rem;
      margin-bottom: 6px;
      color: var(--text-main);
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 11px 14px;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-size: 0.95rem;
      color: var(--text-main);
      background-color: #ffffff;
      outline: none;
      transition: border-color 0.2s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--primary);
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      background-color: var(--primary);
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.2s ease;
    }

    .btn-submit:hover {
      background-color: var(--primary-dark);
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .back-link:hover {
      color: var(--primary);
    }
  </style>
</head>

<body>

  <div class="form-card">
    <h1 class="form-title">Formulir Pendaftaran</h1>
    <p class="form-desc">Lengkapi data di bawah ini untuk mendaftar kelas kursus.</p>

    <form action="process-registration.php" method="POST">
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required placeholder="Contoh: Kukuh Prasetya">
      </div>

      <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" required placeholder="nama@email.com">
      </div>

      <div class="form-group">
        <label for="hp">No. WhatsApp/HP</label>
        <input type="text" id="hp" name="hp" required placeholder="08xxxxxxxxxx">
      </div>

      <div class="form-group">
        <label for="course">Pilihan Kursus</label>
        <select id="course" name="course" required>
          <option value="">-- Pilih Kursus --</option>
          <?php foreach ($courses as $code => $label): ?>
            <option value="<?= $code ?>" <?= ($selectedCourse === $code) ? 'selected' : '' ?>>
              <?= $label ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn-submit">Kirim Pendaftaran</button>
    </form>

    <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
  </div>

</body>

</html>