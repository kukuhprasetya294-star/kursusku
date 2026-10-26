# AI Usage Log - Week 07

**Nama Proyek:** kursusku  
**Modul:** Milestone 7 (Routing, Controller, & View)  
**Pengembang:** Kukuh Prasetya  

---

## Ringkasan Penggunaan AI
Penggunaan AI pada minggu ini bersifat sebagai asisten pembanding dan referensi mandiri saat pembuatan alur MVC pada Laravel. Fokus utamanya untuk membantu pengecekan perintah Artisan, validasi sintaks Blade, serta troubleshooting saat jalurnya tidak terpanggil di browser.

---

## Catatan Interaksi & Solusi

### 1. Pembuatan Controller & Routing
* **Kebutuhan:** Memastikan perintah pembuatan `HomeController` dan penulisan sintaks Route group di Laravel berjalan sesuai versi framework terbaru.
* **Bantuan AI:** Memberikan referensi sintaks `php artisan make:controller HomeController` dan struktur pemanggilan method di `routes/web.php`.
* **Penerapan:** Penulisan controller dan routing dilakukan manual dengan mengacu pada struktur panduan modul.

### 2. Pengecekan View & Asset Linking
* **Kebutuhan:** Memastikan penulisan direktif Blade (`@foreach`) dan pemanggilan asset CSS/Gambar (`asset()`) tidak error.
* **Bantuan AI:** Menampilkan contoh struktur HTML/Blade yang rapi untuk menampilkan list array data dari controller.
* **Penerapan:** Mengisi file `resources/views/home.blade.php` serta mengonfigurasi folder `public/css` dan `public/images`.

### 3. Troubleshooting Akses Server
* **Kebutuhan:** Mengatasi halaman yang tidak mau terbuka saat server lokal dijalankan.
* **Bantuan AI:** Mengecek kesalahan penulisan URL di address bar browser dan memberikan saran penyesuaian host `http://127.0.0.1:8000`.
* **Penerapan:** Membuka alamat IP server lokal secara benar di browser.

---

## Evaluasi Mandiri
Seluruh logika program, struktur file, dan alur kode pada proyek `kursusku` telah dites langsung di lingkungan lokal dan dipastikan berfungsi sesuai dengan spesifikasi tugas.