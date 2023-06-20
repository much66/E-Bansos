<?php   
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require'../function.php';

    $id_agen = $_SESSION['id_agen'];
    $nama_agen = $_SESSION['nama_agen'];  
    $ukecamatan = $_SESSION['ukecamatan'];
    $notelp = $_SESSION['notelp'];
    $sagen = $_SESSION['sagen'];
    $uagen = $_SESSION['uagen'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data diri</title>
    <link rel="stylesheet" href="../penerima/hompen.css?<?= time();?>">
</head>
<body>
    <header>
<div class="container">
        <div class="header-left">
          <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;">Agen <?= $nama_agen;?></a>
        </div>
       <span ></span>
        <div class="header-right">
          <a href="homeagen.php">HOME</a>
          <a href="penerima.php">DATA PENERIMA</a>

          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container" style="padding-top:-180px;">
    <h1>Data diri anda</h1>
    <table table border="1" cellpadding="20" cellspacing="0" style="background: #f5f5f5;
    border-collapse: separate;
    box-shadow: inset 0 1px 0 #fff;
    font-size: 12px;
    line-height: 24px;
    margin: 30px auto;
    text-align: center;
    width: 800px;">
        <thead style="background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
    border-left: 1px solid #555;
    border-right: 1px solid #777;
    border-top: 1px solid #555;
    border-bottom: 1px solid #333;
    box-shadow: inset 0 1px 0 #999;
    color: #fff;
    font-weight: bold;
    padding: 10px 15px;
    position: relative;
    text-shadow: 0 1px 0 #000;  ">
        <tr>
        <th>Nama Agen</th>
        <th>Lokasi Bertugas</th>
        <th>No Handphone</th>
        <th>Saldo total</th>
        <th>aksi</th>
        </tr>
        </thead>
        <tbody>
        <td style="text-transform:capitalize;"><?=$nama_agen;?></td>
    <td><?=$ukecamatan;?></td>
    <td><?=$notelp;?></td>
    <td><?=$sagen;?></td>
    <td><a href="ubahagen.php?id_agen=<?=$id_agen;?>" style="color: #333; text-decoration : none ;">edit</a></td> 
    </tbody>
</table>
</body>
</html>