<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

require'../function.php';

$nama_agen = $_SESSION['nama_agen'];

$ukecamatan = $_SESSION["ukecamatan"];
$user_penerima = query("SELECT * FROM user_penerima WHERE ukecamatan = '$ukecamatan'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laman penerima</title>
    <link rel="stylesheet" href="../admin/penerima.css?<?= time()?>">
    <link rel="stylesheet" href="homeagen.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


</head>
<body>
    <header>
<div class="container">
<div class="header-left">
          <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;"><?= $nama_agen;?></a>
        </div>
       <span></span>
        <div class="header-right">
          <a href="homeagen.php">HOME</a>
          <a href="penerima.php">Data Penerima</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
</div>
</header>
<br><br><br>
         <h1>Daftar penerima bansos</h1> 
    <table border="1" cellpadding="20" cellspacing="0" style="width: 1000px;">
        <thead>
    <tr>
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
    <?php foreach($user_penerima as $row): ?>
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
    </td>
</tr>
<?php endforeach; ?>
</tbody>
    </table>
<center>
    <a href="../admin/tambah.php" class="tmb">Tambah penerima</a>    </center>
</body>
</html>