<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}


$kota = $_SESSION['kota'];
$telp_kecamatan = $_SESSION['telp_kecamatan'];
$username = $_SESSION['username'];


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="../admin/homeadmin.css?<?= time()?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="container">
      <div class="header-left">
          <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;"><?= $kota;?></a>
        </div>
       <span></span>
        <div class="header-right">
          <a href="kota.php">HOME</a>
          <a href="kecamatan.php">DAFTAR KECAMATAN</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container"><br><br><br><br><br>
        <h1 style="text-transform:uppercase;">SELAMAT DATANG ADMIN <?= $username; ?> DI</h1>
        <h1>E-BANSOS TASIK</h1>
        <p>Merupakan partner resmi pemerintah kota tasikmalaya</p>
        <p>Bertujuan untuk mempermudah penyaluran bansos secara online di kota tasikmalaya</p>
        <div class="btn-wrapper">
        
         <center><a href="transaksi_admin.php" class="btn cek"><span class="fa fa-credit-card"></span>Cek Transaksi</a> </center>
        </div>
      </div>
    </div>
    
  </body>
</html>
