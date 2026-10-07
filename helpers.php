<?php
/**
 * Helpers Functions - KursusKu Project
 */

// Function 1: Format Angka ke Rupiah
function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// Function 2: Memeriksa Status Ketersediaan Kursus
function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

// Function 3: Menghitung Sisa Kursi
function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

// Function 4: Memformat Tanggal ke Format Indonesia (dd-mm-yyyy)
function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}