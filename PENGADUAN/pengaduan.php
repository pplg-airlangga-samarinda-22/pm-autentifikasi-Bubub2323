<?php

session_start();

require "../koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pengaduan</title>
</head>
<body>
    <h1>Data Pengaduan</h1>
    <a href="index.php">kembali</a>
    <table>
        <thead>
            <th>NO</th>
            <th>Tanggal</th>
            <th>NIK pelaporan</th>
            <th>Isi laporan</th>
            <th>Status</th>
            <th>aksi</th>
        </thead>
        <tbody>
            <?php
            $no= 0;
            $sql = "SELECT * FROM pengaduan";
            $rows = $koneksi -> execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach($rows as $row) {
                ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['tgl_pengaduan'] ?></td>
                <td><?=$row['nik']?></td>
                <td><?=$row['isi_laporan']?></td>
                <td><?= ($row['status']=0)?'menunggu':(($row['status']='proses')?'diproses': 'selesai')  ?></td>
                <td>
                    <?php
                    if ($row['status']==0) {
                        ?>
                        <a href="pengaduan-proses.php?id=<?=$row['id_pengaduan']?>">verifikasi</a>
                        <?php
                    } elseif ($row['status'] == 'selesai'){
                        ?>
                        <a href="pengaduan-lihat.php?id=<?=$row['id_pengaduan']?>"></a>
                        <?php
                    }
                    ?>
                    <a href="pengaduan-hapus.php?id=<?=$row['id_pengaduan']?>">hapus</a>
                </td>
            </tr>
             <?php } ?>
        </tbody>

    </table>
</body>
</html>