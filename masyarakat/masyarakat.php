<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Masyarakat</title>
</head>
<body>
    <h1>data masyarakat</h1>
    <a href="index.php"><kembali</a> <br>
    <a href="masyarakat-form.php">tambah masyarakat</a>
    <table>
        <thead>
            <th>no</th>
            <th>NIK</th>
            <th>nama</th>
            <th>username</th>
            <th>telepon</th>
            <th>aksi</th>
        </thead>
        <tbody>
            <?php

            $no = 0;
            $sql = "SELECT * FROM masyarakat";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
               ?>
               <tr>
               <td><?= ++$no ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['telp'] ?></td>
                <td>
                    <a href="masyarakat-edit.php?nik=<?$row['nik']?>">edit</a>
                    <a href="masyarakat-hapus.php?nik=<?$row['nik']?>">hapus</a>
                </td>
               </tr>
               <?php } ?>
               
        </tbody>
    </table>
    <a href="../index.php">kembali</a>
</body>
</html>