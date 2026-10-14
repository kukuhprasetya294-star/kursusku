<?php

declare(strict_types=1);

// Set zona waktu server ke Waktu Indonesia Barat (WIB)
date_default_timezone_set('Asia/Jakarta');

$serverTime = date('Y-m-d H:i:s');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Time Check</title>
</head>
<body>
    <h1>Waktu Server Saat Ini:</h1>
    <p><strong><?= $serverTime ?> WIB</strong></p>
</body>
</html>