# Proyek KursusKu Prototype

Repository ini berisi tugas praktikum Mata Kuliah Pemrograman Web III (PHP & MySQL).

## Rumus Bisnis Kalkulator Biaya (Week 3)
- **Subtotal** = `fee` * `participantCount`
- **Diskon** = `subtotal` * `discountPercent` / 100
- **Total Akhir** = `subtotal` - `diskon` + `adminFee`

## Fitur Unggulan (Week 4)
1. Tabel katalog dinamis berisi 6 data kursus via array PHP.
2. Fungsi Reusable (`helpers.php`):
   - `rupiah()`
   - `statusKursus()`
   - `sisaKursi()`
   - `formatTanggal()`
3. Pengujian fungsi di `test-functions.php` dengan 6 pengujian PASS.