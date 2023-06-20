<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

require '../function.php';
    $nama = $_SESSION['nama'];
    $id_penerima = $_SESSION['id_penerima'];
    $nama = $_SESSION['nama'];  
    $nokk = $_SESSION['nokk'];
    $nik = $_SESSION['nik'];
    $ukecamatan = $_SESSION['ukecamatan'];
    $no_hp = $_SESSION['no_hp'];
    $ket = $_SESSION['ket'];
    $spenerima = $_SESSION['spenerima'];
    $upenerima = $_SESSION['upenerima'];
    $bar = query("SELECT * FROM user_penerima  WHERE id_penerima = $id_penerima");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Transaksi</title>
    <link rel="stylesheet" href="hompen.css?<?php echo time();?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
            <br><br><br><br><br><br>
        <th style="font-size: 20px;">QR Code</th>
        </tr>
        </thead>
      
        <tbody>
            <?php $no = 0;
    foreach( $bar as $m ):
                $no++;
                ?>
        <td> 
            <?php
            
             $kode = $m['id_penerima']."";
             require_once('../phpqrcode/qrlib.php');
             QRcode::png("$kode","kode".$no.".png","M", 2,2);
         ?>
         <img src="kode<?=$no;?>.png " alt="" style="width: 230px; height: 230px;;">
         <p style="font-size: 20px ;">Tunjukkan QRCode ini kepada Petugas untuk melakukan transaksi</p>
        </td>
        
        <?php endforeach; ?>
    </tbody>
</table>


</body>
        </html>