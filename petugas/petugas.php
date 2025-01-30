<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Petugas</title>
</head>
<body>
    <h1>Data petugas</h1>
    <a href="../admin/index.php">kembali</a> <br>
    <a href="petugas-form.php">Tambah petugas baru</a>
    <table>
    <thead>
        <th>no</th>
        <th>nama</th>
        <th>telp</th>
        <th>username</th>
        <th>level</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        $no = 0;
        $sql = "SELECT * FROM petugas";
        $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row){
        ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row['nama_petugas'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['level'] ?></td>
            <td>
                <a href="petugas-edit.php?id=<?=$row['id_petugas']?>">Edit</a>
                <a href="petugas-hapus.php?id=<?=$row["id_petugas"]?>">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    <a href="../index.php">kembali</a>
</body>
</html>