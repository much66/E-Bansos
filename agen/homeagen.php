<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;

}
require '../function.php';
    $nama_agen = $_SESSION['nama_agen'];
    $id_agen = $_SESSION['id_agen'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Home Agen</title>
    <link rel="stylesheet" href="homeagen.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
        <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase;">Agen <?= $nama_agen;?></a>
         </div>
        <div class="header-right">
          <a href="homeagen.php">HOME</a>
          <a href="penerima.php">DATA PENERIMA</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container"><br><br><br><br><br>
        <h1 style="text-transform:uppercase;" >SELAMAT DATANG AGEN <?= $nama_agen; ?> DI</h1>
        <h1>E-BANSOS TASIK</h1>
        <p>Merupakan partner resmi pemerintah kota tasikmalaya</p>
        <p>Bertujuan untuk mempermudah penyaluran bansos secara online di kota tasikmalaya</p>
        <div class="btn-wrapper">
          <a href="data_diri_agen.php" class="btn data">Data Diri</a>
          <p>atau</p>
          <a href="transaksi_agen.php" class="btn cek"><span class="fa fa-credit-card"></span>Cek Transaksi</a>
          <a href="../qr/scan.php" class="btn lakukan"><span class="fa fa-money"></span>Lakukan Transaksi</a>
        </div>
      </div>
    </div>
    
  </body>
</html>
