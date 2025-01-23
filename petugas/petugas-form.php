<?php 

session_start();
require"../koneksi.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NAMA = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telepon = $_POST['TELEPON'];
    $level = $_POST['level'];
    $sql = "INSERT INTO petugas (nama_petugas, username, password, telp, level) values (?, ?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$nama, $username, $password, $telepon, $level]);
    if($row){
        header("location:petugas.php");
    }else{
        echo "<script>alert('gagal login')</script>";
      }
}
?>