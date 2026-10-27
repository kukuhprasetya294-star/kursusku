# AI Usage Log - Week 09

**Nama Proyek:** kursusku  
**Modul:** Milestone 9 (Layout, Bootstrap, jQuery Ajax & Form)  
**Pengembang:** Kukuh Prasetya  

---

## Ringkasan Penggunaan AI
Penggunaan AI pada minggu ini difokuskan untuk membantu pembuatan Master Layout Blade, integrasi Bootstrap & jQuery via Vite, penyusunan form pendaftaran Blade, serta pembuatan fitur pengecekan ketersediaan kursi secara asynchronous (Ajax).

---

## Log Aktivitas Interaksi

### 1. Master Layout & Bootstrap Vite Setup
* **Kebutuhan:** Memasang paket Bootstrap, Popper.js, dan jQuery via npm serta menghubungkannya di `app.js` dan `app.css`.
* **Bantuan AI:** Memberikan instruksi instalasi npm dan konfigurasi `import` pada file Javascript/CSS Vite.
* **Penerapan:** Mengisikan konfigurasi pada `resources/js/app.js` dan `resources/css/app.css`.

### 2. Pembuatan Form & Handler Ajax
* **Kebutuhan:** Membuat request Ajax saat event `change` pada dropdown kursus tanpa melakukan reload halaman.
* **Bantuan AI:** Menyediakan skrip jQuery `$.ajax` untuk mengambil endpoint `/courses/{id}/availability` dan memperbarui DOM elemen `#availability`.
* **Penerapan:** Menautkan skrip Ajax di `app.js` serta menambahkan route JSON dummy di `routes/web.php`.

---

## Verifikasi Mandiri
Fitur pendaftaran dan pengecekan sisa kursi via Ajax telah diuji langsung di browser melalui DevTools Network tab dengan status response 200 OK.