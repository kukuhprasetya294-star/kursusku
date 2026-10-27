<?php
// helpers.php - Fungsi Pembantu

if (!function_exists('rupiah')) {
    function rupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('formatTanggal')) {
    function formatTanggal($tanggal) {
        return date('d M Y', strtotime($tanggal));
    }
}

if (!function_exists('statusKursus')) {
    function statusKursus($quota, $registered) {
        return ($registered >= $quota) ? 'Penuh' : 'Tersedia';
    }
}

if (!function_exists('sisaKursi')) {
    function sisaKursi($quota, $registered) {
        $sisa = $quota - $registered;
        return ($sisa > 0) ? $sisa : 0;
    }
}