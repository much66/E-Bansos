<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

require'../function.php';

$kota = $_SESSION['kota'];

$user_penerima = query("SELECT * FROM admin_kecamatan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laman Kecamatan</title>
    <link rel="stylesheet" href="../penerima/hompen.css?<?= time()?>">

    <link rel="stylesheet" href="homeagen.css">
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
          <a href="kecamatan.php">DAFTAR KECAMATAN </a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
</div>
</header>
<br><br><br><br><br>
       <center>  <h1 style="color: #fff;">Daftar Kecamatan di Tasikmalaya</h1> </center>
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
        <th>Nama Kecamatan</th>
        <th>No Telp</th>
    </tr>
</thead>
<tbody>
    <?php foreach($user_penerima as $row): ?>
    <td><?=$row["ukecamatan"];?></td>
    <td><?=$row["telp_kecamatan"];?></td>
</tr>
<?php endforeach; ?>
</tbody>
    </table>
<center>
    <a href="../admin/tambah.php" class="tmb">Tambah penerima</a>    </center>
</body>
</html>