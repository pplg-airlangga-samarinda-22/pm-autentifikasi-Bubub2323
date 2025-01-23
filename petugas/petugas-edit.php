<?php
session_start();
require "../koneksi.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM petugas WHERE id_petugas=?";
    $row = $koneksi ->execute_query($sql, [$id])->fetch_assoc();
    var_dump($row);
    $nama = $row['nama_petugas'];
    $username = $row['username'];
    $password = $row['password'];
    $telepon = $row['telp_petugas'];
    $level = $row['level'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $level = $_POST['level'];
    $sql = "UPDATE petugas SET nama_petugas=?, telp_petugas=?, level=? WHERE id_petugas=?";
    $row = $koneksi->execute_query($sql, [$nama, $telepon, $level, $id]);

    if($row) {
        header("location:petugas.php");
    }else{
        echo "<script>alert('gagal login')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Edit petugas</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">level akses</label>
            <select name="level" id="level">
                <option value="admin" <?= ($level == 'admin')?'selected':''; ?>>admin</option>
                <option value="petugas" <?= ($level == 'petugas')?'selected':''; ?>>petugas</option>
            </select>
        </div>
        <div class="form-item">
            <label for="nama">nama petugas</label>
            <input type="text" name="nama" id="nama" value="<?=$nama?>">
        </div>
        <div class="form-item">
            <label for="telepon">telepon</label>
            <input type="tel" name="telepon" id="telepon" value="<?=$telepon?>">
        </div>
        <div class="form-item">
            <label for="username">username</label>
            <input type="text" name="username" id="username" value="<?=$username?>" disabled>
        </div>
        <button type="submit">kirim</button>

        <a href="petugas.php">batal</a>
    </form>
</body>
</html>