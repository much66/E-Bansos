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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Home Penerima</title>
    <link rel="stylesheet" href="hompen.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
          <a href="#"><img class="logo" src="sosial.png"></a>
          <a style="   opacity: 0,5; background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase; font-weight:bold;"> <i class="bi bi-umbrella-fill"></i> <?= $nama;?></a>
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
      <div class="container">
        <br><br>
        <h1 style="text-transform:uppercase;" >SELAMAT DATANG <?= $nama; ?> DI</h1>
        <h1>E-BANSOS TASIK</h1>
        <p>Merupakan partner resmi pemerintah kota tasikmalaya</p>
        <p>Bertujuan untuk mempermudah penyaluran bansos secara online di kota tasikmalaya</p>
        <div class="btn-wrapper">
          <a href="data_diri_pen.php" class="btn data">Data Diri</a>
          <p>atau</p>
          <a href="transaksi_penerima.php" class="btn cek"><span class="fa fa-credit-card"></span>Cek Transaksi</a>
          <a href="barcode.php" class="btn lakukan"><span class="fa fa-money"></span>Lakukan Transaksi</a>
        </div>
      </div>
    </div>
    
  </body>
</html>
