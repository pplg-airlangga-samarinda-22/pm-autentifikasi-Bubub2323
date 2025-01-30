<?php
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id_pengaduan = $_GET["id"] ?? null;

    if ($id_pengaduan) {
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
        $stmt = $koneksi->execute_query($sql, [$id_pengaduan]);
        $row = $stmt->fetch_assoc();

        if ($row) {
            $isi_laporan = $row['isi_laporan'];
            $foto = $row['foto'];
        } else {
            $isi_laporan = "";
            $foto = "";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tanggal = date('Y-m-d');
    $id_pengaduan = $_POST["id_pengaduan"];
    $laporan = $_POST["laporan"];
    $foto = (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") ? $_FILES['foto']['name'] : null;

    $sql = "UPDATE pengaduan SET tgl_pengaduan=?, isi_laporan=?, foto=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$tanggal, $laporan, $foto, $id_pengaduan]);

    if ($foto) {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $foto);
    }

    if ($row) {
        echo "<script>alert('Pengaduan telah berhasil diperbarui!')</script>";
        header("location:aduan.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Aduan</title>
</head>
<body>
    <h1>Edit Aduan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= htmlspecialchars($id_pengaduan) ?>">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan"><?= htmlspecialchars($isi_laporan) ?></textarea>
        </div>
        <div class="form-item">
            <label for="foto">Foto Pendukung</label>
            <?php if ($foto): ?>
                <img src="gambar/<?= htmlspecialchars($foto) ?>" alt=""><br>
            <?php endif; ?>
            <input type="file" name="foto" id="foto"><br><br>
        </div>
        <button type="submit">Kirim laporan</button>
        <a href="aduan.php">Batal</a>
    </form>
</body>
</html>
