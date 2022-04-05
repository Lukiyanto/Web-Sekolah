<?php
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    $identitas  = mysqli_query($koneksi, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
    <title>Website <?= $d->nama ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <!-- box menu mobile -->
    <div class="box-menu-mobile" id="mobileMenu">
        <span onclick="hideMobileMenu()">Close</span>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
            <li><a href="jurusan.php">Jurusan</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="informasi.php">Informasi</a></li>
            <li><a href="kontak.php">Kontak</a></li>
        </ul>
    </div>

    <!-- bagian header -->
    <div class="header">

        <div class="container">

            <div class="header-logo">
                <a href="index.php">
                    <img src="uploads/identitas/<?= $d->logo ?>" width="80">
                    <h2><?= $d->nama ?></h2>
                </a>

            </div>

            <ul class="header-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>

            <div class="mobile-menu-button">
                <a href="#" onclick="showMobileMenu()">Menu</a>
            </div>

        </div>

    </div>