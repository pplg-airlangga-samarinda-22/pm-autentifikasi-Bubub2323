<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT*FROM petugas WHERE id_petugas = ? AND username = ? AND password = ?";
    $row = $koneksi -> execute_query($sql, [$id_petugas, $username, $password]);
    
    if (mysqli_num_rows($row) ==  1) {
        session_start();
        $_SESSION['id_petugas'] = $id_petugas;
        header("location:index1.php");
    } else {
        echo"<script>alert('Gagal Login!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>login admin</title>
</head>

<body>
    <form action=""method="post" class="form-login">
    <p>Login admin</p>
    <div class="form-item">
        <label for="id_petugas">id</label>
        <input type="text"name="id_petugas" id="id_petugas" required>
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

    </form>
</body>
</html>