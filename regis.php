<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE password=?";
    $cek = $koneksi->execute_query($sql, [$password]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>alert('NIK sudah digunakan!')</script>";
    }else {
        $nama_petugas = $_POST['nama_petugas'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = ($_POST['level']);
        $sql = "INSERT INTO petugas SET nama_petugas=?, username=? , password=?, telp=?, level=?";
        $koneksi->execute_query($sql, [$nama_petugas, $username, $password, $telp, $level]);
        echo "<script>alert('Pendaftaran Berhasil!')</script>";
        header("location:login.php");
        // var_dump($password);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi Admin</h1>
    <form action="" method="post">
        <!-- <div class="form-item">
            <label for="id_petugas">id</label>
            <input type="text" name="id_petugas" id="id_petugas">
        </div> -->
        <div class="form-item">
            <label for="nama_petugas">Nama Lengkap</label>
            <input type="text" name="nama_petugas" id="nama_petugas">
        </div>
        <div class="form-item">
            <label for="username">username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-item">
            <label for="telp">No telp</label>
            <input type="tel" name="telp" id="telp">
        </div>
        <div class="form-item">
            <label>Level Petugas</label>
            <select name="level" class="form-control" required>
                <option value="">Pilih Level Petugas</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <button type="submit">Reqister</button>
    </form>
    <a href="Login.php">Batal</a>
</body>
</html>