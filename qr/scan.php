<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;

}


require '../function.php';
    $nama_agen = $_SESSION['nama_agen'];
    $id_agen = $_SESSION['id_agen'];
    $sagen = $_SESSION['sagen'];
    if( isset($_POST["bagikan"]) ) {
      if( transaksi($_POST) > 0 ) {
          echo "
          <script>
               alert('transaksi berhasil!!');
              document.location.href='../agen/transaksi_agen.php';
              </script>
              ";
      
          } else {
              echo"
              <script>
              alert('transaksi gagal!');
             document.location.href='scan.php';
             </script>
             ";     
      }
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan penerima</title>
    <link rel="stylesheet" href="../agen/homeagen.css">
    <script src="instascan.min.js"></script>
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style> button:hover{
        background-color: #333;
        color: #fff;
    }
    .manja a:hover{
      color :#fff;
    }
    </style>
  </head>
  <body>
  <header>
      <div class="container">
        <div class="header-left">
        <a href="#"><img class="logo" src="../penerima/sosial.png"></a>
          <a style="    background-color: rgba(34, 49, 52, 0.9); margin-top: 5px; margin-left : -40px; text-transform:uppercase;">Agen <?= $nama_agen;?></a>
         </div>
        <div class="header-right">
          <a href="../agen/homeagen.php">HOME</a>
          <a href="../agen/penerima.php">DATA PENERIMA</a>
          <a href="#">FAQ</a>
          <a href="../logout.php" class="login">LOGOUT</a>
        </div>
      </div>
    </header>  
    <form action="" method="post">
    <table table border="1" cellpadding="20" cellspacing="0" style="background: #f5f5f5;
    border-collapse: separate;
    box-shadow: inset 0 1px 0 #fff;
    font-size: 12px;
    line-height: 24px;
    margin: 30px auto;
    text-align: center;
    width: 640px;
    height:450px;"
    >
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
            <br><br><br>
        <th style="font-size: 20px;">Scan</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="id_agen" value="<?= $id_agen;?>" required>
<td>
<video id="preview" width="640" height="360"></video>
<div class="form-group">
<input type="text" id="qrcode" class="form-control" name="id_penerima" style="text-align:center;" width="1000" required>
<br>
<input type="date" name="tanggal" value="<?php echo date("m-d-Y"); ?> " required>
<input type="hidden" name="jumlah_uang" value="200000">
<input type="hidden" name="sagen" value="<?= $sagen - 200000;?>">

</div>
</td>
<tr>
              
                <td>
                    <button type="submit" name="bagikan" id="bagikan">Bagikan</button>
                    <button type="reset" name="reset"> <a href="../agen/homeagen.php" style="color: #333;" class="manja">Batal</a> </button>
                </td>
            </tr>

</tbody>
    </table>
    </form>
  </body>
  
  <script type="text/javascript">

      let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
      scanner.addListener('scan', function(content){

            $("#qrcode").val(content);
      });

      Instascan.Camera.getCameras().then(function (cameras){

        if(cameras.length > 0){
            scanner.start(cameras[0]);
        }else{
            console.error('No cameras found');
        }
      }).catch(function(e){
          console.error(e);
      });

  </script>
</html>