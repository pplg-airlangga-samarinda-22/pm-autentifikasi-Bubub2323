<?php 
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
} elseif ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $sql = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id]);

    if ($row) {
        header("location:pengaduan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Verval Pengaduan</title>
</head>
<body>
    <h1>Verifikasi dan validasi Pengaduan</h1>
    <a href="pengaduan.php">kembali</a><br>
    <form action="" method="POST">
        <div class="form-item">
            <laber for="laporan">Isi laporan</laber>
            <img src="../gambar/<?= $foto ?>" alt="" width="250px">
        </div>
        <button type="submit">proses</button>
    </form>
</body>
</html>