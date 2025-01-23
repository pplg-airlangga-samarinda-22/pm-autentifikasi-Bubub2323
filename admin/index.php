<?php
session_start();
require "../koneksi.php";
if(empty($_SESSION['level'])){
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin pengaduanx</title>
</head>
<body>
    <h1>Selamat datang di sistem pengaduan Masyarakat</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="../PENGADUAN/pengaduan.php">Pengaduan</a>
        <a href="../masyarakat/masyarakat.php">masyarakat</a>
        <a href="../petugas/petugas.php">Petugas</a>
        <a href="laporan.php">laporan</a>
        <a href="logout.php">logout</a>
    </nav>
</body>
</html>