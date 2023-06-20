<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
    }

    require '../function.php';
    $id_penerima = $_SESSION['id_penerima'];
    $nama = $_SESSION['nama'];  
    $nokk = $_SESSION['nokk'];
    $nik = $_SESSION['nik'];
    $ukecamatan = $_SESSION['ukecamatan'];
    $no_hp = $_SESSION['no_hp'];
    $ket = $_SESSION['ket'];
    $spenerima = $_SESSION['spenerima'];
    $upenerima = $_SESSION['upenerima'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data diri</title>
    <link rel="stylesheet" href="hompen.css?<?= time();?>">
</head>
<body>
    <header>
<div class="container">
        <div class="header-left">
          <a href="#"><img class="logo" src="sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;"><?= $nama;?></a>
        </div>
       <span ></span>
        <div class="header-right">
          <a href="homepen.php">HOME</a>
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
        <th>No KK</th>
        <th>NIK</th>
        <th>NAMA</th>
        <th>Kecamatan</th>
        <th>No Handphone</th>
        <th>Saldo</th>
        <th>Keterangan</th>
        <th>aksi</th>
        </tr>
        </thead>
        <tbody>
        <td><?=$nokk;?></td>
    <td><?=$nik;?></td>
    <td><?=$nama;?></td>
    <td><?=$ukecamatan;?></td>
    <td><?=$no_hp;?></td>
    <td>Rp <?=$spenerima;?></td>
    <td><?=$ket;?></td>   
    <td><a href="../admin/ubah.php?id_penerima=<?=$id_penerima;?>"  style="color: #333;">Edit</a></td> 
    </tbody>
</table>
</body>
</html>