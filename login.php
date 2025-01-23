<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT*FROM masyarakat WHERE nik = ? AND username = ? AND password = ?";
    $row = $koneksi -> execute_query($sql, [$nik, $username, $password]);
    
    if (mysqli_num_rows($row) ==  1) {
        session_start();
        $_SESSION['nik'] = $nik;
        header("location:index.php");
    } else {
        echo"<script>alert('Gagal Login!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
</head>

<body>
    <form action=""method="post" class="form-login">
    <p>Silahkan Login</p>
    <div class="form-item">
        <label for="nik">nik</label>
        <input type="text"name="nik" id="nik" required>
    </div>
    <div class="form-item">
        <label for="username">username</label>
        <input type="text"name="username" id="username" required>
    </div>
    <div class="form-item">
        <label for="password">password</label>
        <input type="text"name="password" id="password" required>
    </div>
    <button type="submit">Login</button>
    <a href="register.php">Register</a>
    <!-- <button type="submit" a href="admin.php">login sebagai admin</button> -->
     <a href="./admin/login.php">login admin klik di sini</a>
    </form>
    <!-- <button type="submit" a href="admin.php">login sebagai admin</button> -->
</body>
</html>