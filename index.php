<?php
    session_start();
    require "koneksi.php";
    if (empty($_SESSION['nik'])) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan pengaduan</title>
</head>
<body>
    <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat</h1>
    <nav>
        <a href="index1.php">Dashboard</a>
        <a href="logout.php">logout</a>
        <a href="aduan.php">laporan aduan</a>
    </nav>
</body>
</html>