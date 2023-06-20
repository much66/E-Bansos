<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require'../function.php';
$ukecamatan = $_SESSION['ukecamatan'];
$user_agen = query("SELECT * FROM user_agen  WHERE ukecamatan ='$ukecamatan'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laman penerima</title>
    <link rel="stylesheet" href="../agen/agen.css">
    <link rel="stylesheet" href="homeadmin.css">

</head>
<body>
<header>
<div class="container">
<div class="header-left">
          <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;"><?= $ukecamatan;?></a>
        </div>
       <span></span>
        <div class="header-right">
          <a href="homeadmin.php">HOME</a>
          <a href="penerima.php?ukecamatan=<?="$ukecamatan";?>">DATA PENERIMA</a>
          <a href="agen.php?ukecamatan=<?="$ukecamatan";?>">DATA PETUGAS</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
</div>
</header>
<br>
<br>
    <h1>Daftar agen bansos di <?= $ukecamatan ?></h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
    <tr>
        <th>No</th>
        <th>Nama Agen</th>
        <th>Lokasi Bertugas</th>
        <th>Saldo total</th>
        <th>aksi</th>
    </tr>
</thead>
<tbody>

    <?php $no = 0; foreach($user_agen as $row): $no++;?>
    <td><?= $no ?></td>
    <td><?=$row["nama_agen"];?></td>
    <td><?=$row["ukecamatan"];?></td>
    <td>Rp <?=$row["sagen"];?></td>
<td>
    <a href="../agen/ubahagen.php?id_agen=<?= $row["id_agen"];?>" > ubah </a>|
    <a href="hagen.php?id_agen=<?= $row["id_agen"];?>" onclick="return confirm('apakah anda yakin');"> hapus </a> <br>
    <a href="#">tambah saldo</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
    </table>
<center>
    <a href="../agen/tagen.php" class="tmb">Tambah petugas</a>
    <br>    
    </center>
</body>
</html>