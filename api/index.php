<?php

// 1. Muat otomatis sistem-sistem penting Laravel
require __DIR__ . '/../vendor/autoload.php';

// 2. Buat objek aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Bersihkan sisa-sisa cache runtime
$app->clearResolvedInstances();

// 4. Paksa jalur folder penyimpanan masuk ke folder /tmp Vercel
$app->useStoragePath('/tmp/storage');
$app->instance('path.storage', '/tmp/storage');

// 5. Jalankan engine Laravel untuk memproses halaman website
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);
