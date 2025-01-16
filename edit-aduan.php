<?php
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $id_pengaduan = $_GET["id"];

    $sql = "SELECT * FROM pengaduan where id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id_pengaduan])->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tanggal = date('y-m-d');
    $id_pengaduan = $_GET["id"];
    $laporan = $_POST["laporan"];
    $foto = (isset($_FILES['foto']))?$_FILES['foto']['name']:"";

    $sql = "UPDATE pengaduan SET tgl_pengaduan=?, isi_laporan=?, foto=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$tanggal, $laporan, $foto, $id_pengaduan]);

    if (!empty($foto)){
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' .$_FILES['foto']['name']);

    }

    if ($row) {
        echo "<script>alert('Pengaduan baru berhasil disimpan!')</script>";
        header("location:aduan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aduan</title>
</head>
<body>
    <h1>Edit aduan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class = "form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan"><?= $row["isi_laporan"]?>
        </div>
        <div class="form-item">
            <label for="foto">Foto pendukung</label>
            <img src="gambar/<?= $row["foto"] ?>" alt=""><br>
            <input type="file" name="foto" id="foto"><br><br>
        </div>
        <button type="submit">kirim Laporan</button>
        <a href="aduan.php">Batal</a>
    </form>
</body>
</html>