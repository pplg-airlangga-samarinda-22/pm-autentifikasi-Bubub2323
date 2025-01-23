<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM masyarakat where nik=?";
    $row = $koneksi->execute_query($sql, [$nik])->fetch_assoc();
    $nama = $row['nama'];
    $username = $row['username'];
    $telepon = $row['telp'];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_GET['nik'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE masyarakat SET nama=?, telp=? WHERE nik=?";
    $row = $koneksi ->execute_query($sql, [$nama, $telepon, $nik]);
    if ($row){
        header("location:masyarakat.php");
    }
}

?>