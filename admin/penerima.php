<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

require'../function.php';

$ukecamatan = $_SESSION["ukecamatan"];
$user_penerima = query("SELECT * FROM user_penerima WHERE ukecamatan = '$ukecamatan' ORDER BY id_penerima DESC");

if(isset($_POST["cari"])){
    $user_penerima = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laman penerima</title>
    <link rel="stylesheet" href="penerima.css?<?= time()?>">
    <link rel="stylesheet" href="homeadmin.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


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
          <a href="penerima.php">DATA PENERIMA</a>
          <a href="agen.php">DATA PETUGAS</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
</div>
</header>
<br><br><br>
         <h1>Daftar penerima bansos</h1> 

         <form action="" method="post" style="margin-left: 300px;">
        <input type="text" name="keyword" placeholder="Masukkan kata kunci..." size="35" autocomplete="off" autofocus id="keyword">
        <button type="submit" name="cari" id="tombolcari">Cari!</button>
         </form>
         <div id="container">
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
    </div>
<center>
    <a href="tambah.php" class="tmb">Tambah penerima</a>    </center>

    <script src="js/script.js"></script>
</body>
</html>