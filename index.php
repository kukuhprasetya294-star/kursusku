<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$tahun    = date('Y');

$courses = [
    ['code' => 'WEB-01', 'name' => 'HTML & CSS Dasar', 'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Pemula',       'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'LAR-01', 'name' => 'Framework Laravel',  'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($siteName); ?> - Portal Belajar Pemrograman</title>
  
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
      font-family: 'Segoe UI', Roboto, sans-serif;
      background-color: var(--bg);
      color: var(--text-main);
      line-height: 1.6;
    }

    /* Navbar & Header */
    header {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
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
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--primary);
      text-decoration: none;
    }

    nav a {
      margin-left: 20px;
      color: var(--text-muted);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: var(--primary);
    }

    /* Hero Section & Animasi Floating */
    .hero {
      max-width: 1100px;
      margin: 60px auto;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
      animation: fadeIn 1s ease-out;
    }

    .hero-content {
      flex: 1;
    }

    .hero-content h2 {
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 15px;
      color: var(--text-main);
    }

    .hero-content h2 span {
      color: var(--primary);
    }

    .hero-content p {
      font-size: 1.1rem;
      color: var(--text-muted);
      margin-bottom: 25px;
    }

    /* Animasi Gambar Melayang (Floating) */
    .hero-image-container {
      flex: 1;
      text-align: center;
    }

    .hero-image {
      width: 100%;
      max-width: 450px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      border: 4px solid #ffffff;
      animation: floatAnimation 4s ease-in-out infinite;
    }

    .btn-main {
      display: inline-block;
      padding: 12px 28px;
      background-color: var(--primary);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(15, 118, 110, 0.25);
      transition: all 0.3s ease;
    }

    .btn-main:hover {
      background-color: var(--primary-dark);
      transform: translateY(-3px);
    }

    /* Grid Kursus dengan Animasi Hover Card */
    .section {
      max-width: 1100px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .section-title {
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
    }

    .course-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .course-card {
      background: var(--card-bg);
      padding: 25px;
      border-radius: 12px;
      border: 1px solid var(--border);
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
      transition: all 0.3s ease;
    }

    .course-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.08);
      border-color: var(--accent);
    }

    .course-card h3 {
      color: var(--primary);
      margin-bottom: 10px;
    }

    .course-card p {
      color: var(--text-muted);
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    .btn-register {
      display: inline-block;
      padding: 8px 18px;
      background-color: var(--primary);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      transition: background-color 0.2s ease;
    }

    .btn-register:hover {
      background-color: var(--primary-dark);
    }

    footer {
      text-align: center;
      padding: 30px 20px;
      color: var(--text-muted);
      border-top: 1px solid var(--border);
      background: var(--card-bg);
      margin-top: 60px;
    }

    /* Definisi Animasi CSS Keyframes */
    @keyframes floatAnimation {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-12px); }
      100% { transform: translateY(0px); }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body>

  <header>
    <div class="nav-container">
      <a href="index.php" class="logo"><?= htmlspecialchars($siteName); ?>.</a>
      <nav>
        <a href="#beranda">Beranda</a>
        <a href="#kursus">Kursus</a>
        <a href="registration.php">Daftar Kursus</a>
        <a href="#tentang">Tentang</a>
      </nav>
    </div>
  </header>

  <main>
    <section id="beranda" class="hero">
      <div class="hero-content">
        <h2>Selamat Datang di <span><?= htmlspecialchars($siteName); ?></span></h2>
        <p>Platform belajar teknologi untuk mahasiswa yang ingin meningkatkan kemampuan pemrograman web dengan materi berbasis proyek nyata.</p>
        <a href="#kursus" class="btn-main">Lihat Kursus</a>
      </div>
      <div class="hero-image-container">
        <img src="kursusku-ku/assets/img/randi.jpg" alt="Mahasiswa sedang belajar pemrograman web" class="hero-image">
      </div>
    </section>

    <section id="kursus" class="section">
      <h2 class="section-title">Program Kursus</h2>
      <div class="course-grid">

        <article class="course-card">
          <h3>HTML & CSS</h3>
          <p>Belajar membangun struktur dan tampilan website dari dasar secara responsif.</p>
          <a href="registration.php?course=WEB-01" class="btn-register">Daftar Kursus</a>
        </article>

        <article class="course-card">
          <h3>PHP Dasar</h3>
          <p>Belajar pemrograman web server-side dan logika aplikasi menggunakan PHP.</p>
          <a href="registration.php?course=PHP-01" class="btn-register">Daftar Kursus</a>
        </article>

        <article class="course-card">
          <h3>Laravel Modern</h3>
          <p>Membangun aplikasi web tingkat lanjut menggunakan framework Laravel.</p>
          <a href="registration.php?course=LAR-01" class="btn-register">Daftar Kursus</a>
        </article>

      </div>
    </section>

    <section id="tentang" class="section">
      <h2 class="section-title">Tentang KursusKu</h2>
      <p style="text-align: center; max-width: 700px; margin: 0 auto; color: var(--text-muted);">
        KursusKu merupakan prototype website pembelajaran yang dikembangkan dalam mata kuliah Pemrograman Web III di Laboratorium Komputer PTIK UIN Bukittinggi.
      </p>
    </section>
  </main>

  <footer>
    <p>&copy; <?= htmlspecialchars($tahun); ?> <?= htmlspecialchars($siteName); ?>. Pemrograman Web III.</p>
  </footer>

</body>

</html>