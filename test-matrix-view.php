<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Matriks Pengujian Week 06 - KursusKu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; padding: 30px; background: #f8fafc; color: #0f172a; }
        .card { background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; max-width: 900px; margin: auto; }
        h2 { margin-bottom: 5px; color: #0f766e; }
        p { color: #64748b; font-size: 0.9rem; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 12px; border-bottom: 1px solid #e2e8f0; font-size: 0.88rem; }
        th { background-color: #f1f5f9; color: #334155; }
        .badge-pass { background: #dcfce7; color: #15803d; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.78rem; }
    </style>
</head>
<body>
<div class="card">
    <h2>Matriks Pengujian Pendaftaran & Ringkasan (Week 06)</h2>
    <p>Proyek: KursusKu Prototype | Tanggal: Oktober 2026</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Skenario Pengujian</th>
                <th>Ekspektasi Hasil</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Form Pendaftaran Lengkap</td><td>Berhasil submit ke process-registration.php</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>2</td><td>Perhitungan Diskon Mahasiswa</td><td>Diskon 20% terpotong dari subtotal</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>3</td><td>Perhitungan Diskon Guru</td><td>Diskon 15% terpotong dari subtotal</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>4</td><td>Pilihan Beberapa Minat</td><td>Tampil sebagai Badge Pill terpisah</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>5</td><td>Pilihan Minat Kosong</td><td>Tampil pesan 'Tidak ada minat dipilih'</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>6</td><td>Riwayat Pendaftaran Dummy</td><td>Mengarah ke tabel history-dummy.php</td><td><span class="badge-pass">LULUS</span></td></tr>
            <tr><td>7</td><td>Validasi Form HTML5</td><td>Browser menahan submit jika field kosong</td><td><span class="badge-pass">LULUS</span></td></tr>
        </tbody>
    </table>
</div>
</body>
</html>