<?php

require'../../function.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM user_penerima WHERE
nik LIKE '%$keyword%' OR 
nokk LIKE '%$keyword%' OR 
ukecamatan LIKE '%$keyword%' OR 
nama LIKE '%$keyword%' OR 
no_hp LIKE '%$keyword%' OR 
spenerima LIKE '%$keyword%' ";
$user_penerima = query($query);


?>

<table border="1" cellpadding="20" cellspacing="0" style="width: 1000px;">
        <thead>
    <tr>
        <th>No </th>
        <th>No KK</th>
        <th>NIK</th>
        <th style="width: 200px;">NAMA</th>
        <th>Kecamatan</th>
        <th>No Handphone</th>
        <th style="width: 300px;">Saldo</th>
        <th>Keterangan</th>
        <th >aksi</th>
    </tr>
</thead>
<tbody>
    <?php 
    $no = 0;
    foreach($user_penerima as $row): $no++?>
    <td><?= $no ?></td>
    <td><?=$row["nokk"];?></td>
    <td><?=$row["nik"];?></td>
    <td><?=$row["nama"];?></td>
    <td><?=$row["ukecamatan"];?></td>
    <td><?=$row["no_hp"];?></td>
    <td>Rp <?=$row["spenerima"];?></td>
    <td><?=$row["ket"];?></td>
<td style="width :200px ;">
    <a href="ubah.php?id_penerima=<?= $row["id_penerima"];?>" class="garisbawah" > ubah </a>|
    <a href="../hapus.php?id_penerima=<?= $row["id_penerima"];?>" onclick="return confirm('apakah anda yakin');" class="garisbawah"> hapus </a>
    <br>
    <a href="#" >tambah saldo</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
    </table>